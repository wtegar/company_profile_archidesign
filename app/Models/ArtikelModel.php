<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = "tb_artikel";
    protected $primaryKey = "id_artikel";
    protected $returnType = "object";
    protected $allowedFields = [
        'id_artikel', 
        'judul_artikel', 
        'judul_artikel_en', 
        'foto_artikel', 
        'deskripsi_artikel', 
        'deskripsi_artikel_en', 
        'slug_id', 
        'slug_en', 
        'meta_title_id',  
        'meta_title_en', 
        'meta_description_id', 
        'meta_description_en'
    ];

    public function getArtikelTerbaru()
    {
        return $this->orderBy('id_artikel', 'desc')->findAll();
    }

    public function getDetailArtikel($id_artikel)
    {
        $artikel = $this->find($id_artikel);
        
        if (!$artikel) {
            return null;
        }
        
        // Tentukan bahasa aktif
        $language = session()->get('lang');
        
        // Pilih judul dan deskripsi sesuai bahasa
        $artikel->judul = $language == 'en' ? $artikel->judul_artikel_en : $artikel->judul_artikel;
        $artikel->deskripsi = $language == 'en' ? $artikel->deskripsi_artikel_en : $artikel->deskripsi_artikel;
        $artikel->slug = $language == 'en' ? $artikel->slug_en : $artikel->slug_id;
        $artikel->meta_title = $language == 'en' ? $artikel->meta_title_en : $artikel->meta_title_id;
        $artikel->meta_description = $language == 'en' ? $artikel->meta_description_en : $artikel->meta_description_id;

        return $artikel;
    }

    public function getArtikelLainnya($id_artikel, $limit = 4)
    {
        return $this->where('id_artikel !=', $id_artikel)
            ->orderBy('id_artikel', 'ASC')
            ->limit($limit)
            ->findAll();
    }

    public function getAllArticles()
    {
        return $this->findAll();
    }

    // Metode baru untuk mengambil detail artikel berdasarkan slug_id
    public function getDetailArtikelBySlugId($slug_id)
    {
        // Mencari artikel berdasarkan slug_id
        $artikel = $this->where('slug_id', $slug_id)->orWhere('slug_en', $slug_id)->first();

        if (!$artikel) {
            return null;
        }

        // Tentukan bahasa aktif
        $language = session()->get('lang');
        
        // Pilih judul dan deskripsi sesuai bahasa
        $artikel->judul = $language == 'en' ? $artikel->judul_artikel_en : $artikel->judul_artikel;
        $artikel->deskripsi = $language == 'en' ? $artikel->deskripsi_artikel_en : $artikel->deskripsi_artikel;
        $artikel->slug = $language == 'en' ? $artikel->slug_en : $artikel->slug_id;
        $artikel->meta_title = $language == 'en' ? $artikel->meta_title_en : $artikel->meta_title_id;
        $artikel->meta_description = $language == 'en' ? $artikel->meta_description_en : $artikel->meta_description_id;

        return $artikel;
    }
}
