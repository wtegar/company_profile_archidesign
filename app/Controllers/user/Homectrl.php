<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\MetaModel;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\AktivitasModel;

class Homectrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $AktivitasModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->AktivitasModel = new AktivitasModel();
        $this->MetaModel = new MetaModel();
        helper('text'); // Memuat helper teks di sini
    }

    public function index()
    {
        // Ambil bahasa dari sesi, default 'en'
        $lang = session()->get('lang') ?? 'en';
        

        // Dapatkan data profil, slider, produk, aktivitas, dan meta berdasarkan bahasa
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->findAll(),
            'lang' => $lang,
            'meta' => $this->MetaModel->getMetaByPageName('Beranda'),
            'canonicalUrl' => base_url('/'),
            'Title' => $this->ProfilModel->findAll()[0]->title_website,
        ];

        // Batasi teks meta deskripsi berdasarkan bahasa yang dipilih
        $teks = strip_tags($lang === 'in'
            ? $data['profil'][0]->deskripsi_perusahaan_in
            : $data['profil'][0]->deskripsi_perusahaan_en);

        $data['Meta'] = character_limiter($teks, 150); // Batasi 150 karakter

        // Menyiapkan meta title dan meta description sesuai bahasa
        if ($lang === 'id') {
            $data['Title'] = $data['meta']->meta_title;
            $data['MetaDescription'] = $data['meta']->meta_description;
        } else {
            $data['Title'] = $data['meta']->meta_title_en;
            $data['MetaDescription'] = $data['meta']->meta_description_en;
        }

        return view('user/home/index', $data);
    }

    public function redirectToHome()
    {
        return redirect()->to('user/home');
    }

    public function language($locale)
    {
        $session = session();

        // Validasi bahasa yang diterima
        if (in_array($locale, ['in', 'en'])) {
            // Mengatur sesi bahasa ke bahasa yang dipilih
            $session->set('lang', $locale);
        }

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
}
