<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\MetaModel;

class Productsctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()

    {
        $lang = session()->get('lang') ?? 'en';
        $data = [
            'lang' => $lang,
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
        ];

        $data['meta'] = $this->MetaModel->getMetaByPageName('Produk');
        $data['canonicalUrl'] = base_url('/product');

        helper('text');

        if (session('lang') === 'in') {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

            $data['Title'] = 'Produk';
            $teks = "Produk dari $nama_perusahaan. $deskripsi_perusahaan";
        } else {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

            $data['Title'] = 'Products';
            $teks = "Products of $nama_perusahaan. $deskripsi_perusahaan";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/products/index', $data);
    }

    public function detail($slug)
    {
        // Mengambil produk berdasarkan slug
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbproduk' => $this->ProdukModel->where('slug_id', $slug)->orWhere('slug_en', $slug)->first(),
        ];

        // Cek apakah produk ditemukan
        if (!$data['tbproduk']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk tidak ditemukan");
        }

       $produk =  $this->ProdukModel->where('slug_id', $slug)->orWhere('slug_en', $slug)->first();

        $lang = session()->get('lang') ?? 'id';

        // Tentukan prefix berdasarkan bahasa (artikel untuk 'id' dan article untuk 'en')
        $url_prefix = $lang === 'id' ? 'produk' : 'product';

        // Memilih slug berdasarkan prefix URL
        $correct_slug_id = $produk->slug_id;
        $correct_slug_en = $produk->slug_en;

        // Jika slug tidak sesuai dengan slug dalam bahasa saat ini, redirect ke slug yang benar
        if ($lang === 'id' && $slug !== $correct_slug_id) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_id}"));
        } elseif ($lang === 'en' && $slug !== $correct_slug_en) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_en}"));
        }

        helper('text');

        if (session('lang') === 'in') {
            $nama_produk = $data['tbproduk']->nama_produk_in;
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_in);

            // Ambil meta title dan description
            $data['Title'] = $data['tbproduk']->meta_title ?? $nama_produk; // Jika meta title tidak ada, gunakan nama produk
            $data['Meta'] = character_limiter($data['tbproduk']->meta_description ?? $deskripsi_produk, 150); // Jika meta description tidak ada, gunakan deskripsi produk
        } else {
            $nama_produk = $data['tbproduk']->nama_produk_en;
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_en);

            // Ambil meta title dan description
            $data['Title'] = $data['tbproduk']->meta_title_en ?? $nama_produk; // Jika meta title tidak ada, gunakan nama produk
            $data['Meta'] = character_limiter($data['tbproduk']->meta_description_en ?? $deskripsi_produk, 150); // Jika meta description tidak ada, gunakan deskripsi produk
        }

        return view('user/products/detail', $data);
    }
}
