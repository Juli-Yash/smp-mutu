<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Pendaftaran;
use GuzzleHttp\Client;

class PendaftaranController extends Controller
{
    // Tampilkan form pendaftaran
    public function showForm()
    {
        if (!auth()->check() || auth()->user()->role !== 'user') {
            return view('adsiswa.form-pendaftaran')->with([
                'showAlert' => true,
                'sudahDaftar' => false
            ]);
        }

        $userId = auth()->id();
        $sudahDaftar = Pendaftaran::where('user_id', $userId)->exists();

        return view('adsiswa.form-pendaftaran')->with([
            'showAlert' => false,
            'sudahDaftar' => $sudahDaftar
        ]);
    }
    
    // Proses Penyimpanan Data Pendaftaran
    public function store(Request $request)
    {
        // Validasi Input Data
        $request->validate([
            'nama'                  => 'required|string|max:255',
            'jenis_kelamin'         => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir'          => 'required|string|max:100',
            'tanggal_lahir'         => 'required|date',
            'nisn'                  => 'required|digits:10|unique:pendaftarans,nisn',
            'asal_sekolah'          => 'required|string|max:255',
            'agama'                 => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'jarak_tempat_tinggal'  => 'required|numeric|min:0',
            'no_telp'               => ['required', 'regex:/^(0|\+62)[0-9]{9,13}$/'],
            'pilihan_ekskul'        => 'required|in:Pencak Silat,Hizbul Wathan,Futsal,Kesenian',
            'alamat'                => 'required|string|max:500',
            'nilai_rata_rata_skl'   => 'required|numeric|min:0|max:100',
            'scan_skl'              => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'scan_akta'             => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'scan_kk'               => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'scan_piagam'           => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'scan_kip'              => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'nama_ayah'             => 'required|string|max:255',
            'pendidikan_ayah'       => 'required|string|max:255',
            'pekerjaan_ayah'        => 'required|string|max:255',
            'penghasilan_ayah'      => 'required|string|max:255',
            'nama_ibu'              => 'required|string|max:255',
            'pendidikan_ibu'        => 'required|string|max:255',
            'pekerjaan_ibu'         => 'required|string|max:255',
            'penghasilan_ibu'       => 'required|string|max:255',
        ]);

        // Menyiapkan Data Dasar
        $data = $request->except(['scan_skl', 'scan_akta', 'scan_kk', 'scan_piagam', 'scan_kip']);
        $data['user_id'] = Auth::id();
        do {
            $data['nomor_pendaftaran'] = 'PPDB-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(3));
        } while (Pendaftaran::where('nomor_pendaftaran', $data['nomor_pendaftaran'])->exists());

        // Upload Berkas File
        $files = [
            'scan_akta'   => 'uploads/akta',
            'scan_kk'     => 'uploads/kk',
            'scan_skl'    => 'uploads/skl',
            'scan_piagam' => 'uploads/piagam',
            'scan_kip'    => 'uploads/kip',
        ];

        foreach ($files as $field => $folder) {
            if ($request->hasFile($field)) {
                    $data[$field] = $request->file($field)->store($folder, 'public');
            }
        }

        // Simpan ke Database
        $pendaftaran = Pendaftaran::create($data);

         // Mengirim Notifikasi ke WhatsApp
        try {
            $message = "Halo, {$pendaftaran->nama}.\n\n".
                "Selamat! Pendaftaran Anda di *SMP Muhammadiyah 1 Rowokele* telah *berhasil* kami terima.\n\n".
                "*Detail Pendaftaran Anda:*\n" .
                "Nama: {$pendaftaran->nama}\n".
                "Nomor Pendaftaran: {$pendaftaran->nomor_pendaftaran}\n".
                "NISN: {$pendaftaran->nisn}\n\n".
                "Informasi lebih lanjut akan kami kirimkan melalui WhatsApp dan laman pengumuman resmi, silakan tunggu informasi selanjutnya dari panitia.\n\n".
                "Terima kasih telah mendaftar. Semoga sukses dan sampai jumpa di sekolah!";

            $response = Http::withHeaders([
                'Authorization' => config('services.whatsapp_fonnte.token'),
            ])->asForm()->post(config('services.whatsapp_fonnte.url'), [
                'target' => $pendaftaran->no_telp,
                'message' => $message,
            ]);
            if ($response->failed()) {
                \Log::error("WhatsApp gagal: " . $response->body());
            }
        } catch (\Exception $e) {
            \Log::error("Error WhatsApp: " . $e->getMessage());
        }
        return redirect()->route('siswa.dashboard')->with('success', 'Pendaftaran berhasil. Notifikasi WhatsApp dikirim.');
    }    

    // Update Status Pendaftar
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diterima,Ditolak,Diproses',
            'catatan_penolakan' => 'nullable|string|max:1000',
        ]);

        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->status = $request->status;
        $pendaftar->verified_by_name = auth()->user()->name;

        if ($request->status === 'Ditolak') {
            $pendaftar->catatan_penolakan = $request->catatan_penolakan;
        } else {
            $pendaftar->catatan_penolakan = null;
        }
        $pendaftar->save();

        if (in_array($request->status, ['Diterima', 'Ditolak'])) {
            $nama = $pendaftar->nama;
            $nisn = $pendaftar->nisn;
            $nomorPendaftaran = $pendaftar->nomor_pendaftaran;
            $noTelp = $pendaftar->no_telp;
            $status = strtoupper($request->status);

            $pesan = "Halo $nama,\n\n" .
                "*Pengumuman Hasil Seleksi PPDB*\n" .
                "SMP Muhammadiyah 1 Rowokele\n\n" .
                "*Detail Pendaftaran Anda:*\n" .
                "Nama: $nama\n" .
                "Nomor Pendaftaran: $nomorPendaftaran\n" .
                "NISN: $nisn\n" .
                "Hasil Seleksi: *$status*\n\n";
                "Terima kasih telah mendaftar.";
            
            if ($status === 'DITERIMA') {
                $pesan .=   "Selamat! Anda *DITERIMA* sebagai calon peserta didik baru.\n" .
                            "Silakan segera melakukan daftar ulang sesuai jadwal yang ditentukan.\n" .
                            "Informasi lebih lanjut akan disampaikan melalui WhatsApp dan situs resmi sekolah.\n\n";
            } else {
                $pesan .=   "Kami mohon maaf, saat ini Anda *belum diterima* di SMP Muhammadiyah 1 Rowokele.\n" .
                            "Terima kasih telah mengikuti proses PPDB.\n" .
                            "Semangat terus dan tetap semangat meraih cita-cita!\n\n";
            }
            $pesan .=   "Jika ada pertanyaan, hubungi panitia melalui kontak resmi sekolah.\n\n" .
                        "Hormat kami,\nPanitia PPDB SMP Muhammadiyah 1 Rowokele";

            try {
                $response = Http::withHeaders([
                    'Authorization' => config('services.whatsapp_fonnte.token'),
                ])->asForm()->post(config('services.whatsapp_fonnte.url'), [
                    'target' => $noTelp,
                    'message' => $pesan,
                ]);

                if ($response->failed()) {
                    \Log::error("Gagal kirim WhatsApp hasil seleksi: " . $response->body());
                }
            } catch (\Exception $e) {
                \Log::error("Error kirim WhatsApp hasil seleksi: " . $e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Status pendaftar berhasil diperbarui dan notifikasi telah dikirim.');
    }

    // Edit Data Siswa
    public function edit($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        return view('admin.data-siswa.edit', compact('pendaftar'));
    }

    // Update Data Siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nisn' => 'required|numeric|digits_between:8,20|unique:pendaftarans,nisn,' . $id,
            'agama' => 'required|string|max:100',
            'asal_sekolah' => 'required|string|max:255',
            'jarak_tempat_tinggal' => 'required|numeric',
            'pilihan_ekskul' => 'required|string',
            'nilai_rata_rata_skl' => 'required|numeric',
            'status' => 'required|in:Diproses,Diterima,Ditolak',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string',
    
            // File: opsional
            'scan_skl' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'scan_akta' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'scan_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'scan_piagam' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'scan_kip' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    
            // Data orang tua
            'nama_ayah' => 'nullable|string|max:255',
            'pendidikan_ayah' => 'nullable|string|max:100',
            'pekerjaan_ayah' => 'nullable|string|max:100',
            'penghasilan_ayah' => 'nullable|numeric',
    
            'nama_ibu' => 'nullable|string|max:255',
            'pendidikan_ibu' => 'nullable|string|max:100',
            'pekerjaan_ibu' => 'nullable|string|max:100',
            'penghasilan_ibu' => 'nullable|numeric',
        ]);
    
        $pendaftar = Pendaftaran::findOrFail($id);
    
        $data = $request->except(['scan_skl', 'scan_akta', 'scan_kk', 'scan_piagam', 'scan_kip']);

        $folderMap = [
            'scan_skl' => 'skl',
            'scan_akta' => 'akta',
            'scan_kk' => 'kk',
            'scan_piagam' => 'piagam',
            'scan_kip' => 'kip',
        ];
    
        foreach ($folderMap as $field => $folder) {
            if ($request->hasFile($field)) {

                if ($pendaftar->$field && \Storage::disk('public')->exists($pendaftar->$field)) {
                    \Storage::disk('public')->delete($pendaftar->$field);
                }
    
                $data[$field] = $request->file($field)->store("uploads/{$folder}", 'public');
            }
        }
    
        $pendaftar->update($data);
    
        return redirect()->route('admin.pendaftar.edit', $id)->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
    
        $fileFields = ['scan_skl', 'scan_akta', 'scan_kk', 'scan_piagam', 'scan_kip'];
    
        foreach ($fileFields as $field) {
            $filePath = $pendaftar->$field;
    
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }
    
        $pendaftar->delete();
    
        return redirect()->route('admin.hasil')->with('success', 'Data pendaftar berhasil dihapus.');
    }
}