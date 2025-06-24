<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nomor_pendaftaran',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nisn',
        'asal_sekolah',
        'agama',
        'jarak_tempat_tinggal',
        'no_telp',
        'pilihan_ekskul',
        'alamat',
        'nilai_rata_rata_skl',
        'scan_skl',
        'scan_akta',
        'scan_kk',
        'scan_piagam',
        'scan_kip',
        'status',
        'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'penghasilan_ayah',
        'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'penghasilan_ibu',
    ];

    // Accessor untuk status dengan format tombol warna
    public function getStatusLabelAttribute()
    {
        $status = strtolower($this->status);

        switch ($status) {
            case 'diterima':
                $class = 'btn btn-success btn-sm';
                break;
            case 'diproses':
                $class = 'btn btn-warning btn-sm text-white';
                break;
            case 'ditolak':
                $class = 'btn btn-danger btn-sm';
                break;
            default:
                $class = 'btn btn-secondary btn-sm';
                break;
        }

        return "<span class=\"$class\">{$this->status}</span>";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}