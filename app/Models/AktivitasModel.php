<?php

namespace App\Models;

use CodeIgniter\Model;

class AktivitasModel extends Model
{
    protected $table = 'tb_aktivitas';
    protected $primaryKey = 'id_aktivitas';
    protected $returnType = 'object';
    protected $allowedFields = [
        'nama_aktivitas_in', 
        'nama_aktivitas_en', 
        'deskripsi_aktivitas_in', 
        'deskripsi_aktivitas_en', 
        'foto_aktivitas',
        'slug_id',  // Slug untuk bahasa Indonesia
        'slug_en',   // Slug untuk bahasa Inggris
        'meta_title',        // Meta title untuk bahasa Indonesia
        'meta_description',  // Meta description untuk bahasa Indonesia
        'meta_title_en',     // Meta title untuk bahasa Inggris
        'meta_description_en' // Meta description untuk bahasa Inggris
    ];

    // Fungsi untuk mengambil aktivitas berdasarkan slug
    public function getAktivitasBySlug($slug)
    {
        return $this->where('slug_en', $slug)
                    ->orWhere('slug_id', $slug)
                    ->first();
    }

    // Fungsi untuk generate slug
    public function generateSlug($string)
    {
        // Mengubah string menjadi huruf kecil
        $string = strtolower($string);
        // Menghapus karakter non-alphanumeric
        $string = preg_replace('/[^a-z0-9-]+/', '-', $string);
        // Menghilangkan tanda '-' yang berulang
        $string = preg_replace('/-+/', '-', $string);
        // Menghilangkan '-' di awal dan akhir string
        return trim($string, '-');
    }

    // Menyimpan data aktivitas dengan slug
    public function saveAktivitas(array $data)
    {
        // Generate slug jika ada nama aktivitas
        if (isset($data['nama_aktivitas_in'])) {
            $data['slug_id'] = $this->generateSlug($data['nama_aktivitas_in']);
        }
        
        if (isset($data['nama_aktivitas_en'])) {
            $data['slug_en'] = $this->generateSlug($data['nama_aktivitas_en']);
        }

        // Gunakan metode save() dari model parent
        return parent::save($data);
    }
}
