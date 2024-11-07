<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id_produk';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_produk_in', 'nama_produk_en', 'foto_produk', 'deskripsi_produk_in', 'deskripsi_produk_en', 'slug_en', 'slug_id', 'meta_title', 'meta_title_en', 'meta_description', 'meta_description_en'];

    public function getProdukById($id_produk)
    {
        return $this->where('id_produk', $id_produk)->first();
    }
}

