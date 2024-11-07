<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\AktivitasModel;
use App\Models\MetaModel;

class Aktivitasctrl extends BaseController
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
    }

    public function index()
    {
        

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->findAll(),
        ];

        $data['meta'] = $this->MetaModel->getMetaByPageName('Aktivitas');
        $data['canonicalUrl'] = base_url('/activities');

        helper('text');

        if (session('lang') === 'in') {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? 'Aktivitas';
            $teks = "Aktivitas dari $nama_perusahaan. $deskripsi_perusahaan";
        } else {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? 'Activities';
            $teks = "Activities of $nama_perusahaan. $deskripsi_perusahaan";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/aktivitas/index', $data);
    }

    public function detail($slug)
    {
        $aktivitas =  $this->AktivitasModel->where('slug_id', $slug)->orWhere('slug_en', $slug)->first();

        $lang = session()->get('lang') ?? 'id';

        // Tentukan prefix berdasarkan bahasa (artikel untuk 'id' dan article untuk 'en')
        $url_prefix = $lang === 'id' ? 'kegiatan' : 'activities';

        // Memilih slug berdasarkan prefix URL
        $correct_slug_id = $aktivitas->slug_id;
        $correct_slug_en = $aktivitas->slug_en;

        // Jika slug tidak sesuai dengan slug dalam bahasa saat ini, redirect ke slug yang benar
        if ($lang === 'id' && $slug !== $correct_slug_id) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_id}"));
        } elseif ($lang === 'en' && $slug !== $correct_slug_en) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_en}"));
        }

        // Ambil data profil dan aktivitas berdasarkan slug
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->getAktivitasBySlug($slug),
        ];

        // Cek apakah aktivitas ditemukan
        if (!$data['tbaktivitas']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        helper('text');

        // Tentukan bahasa berdasarkan session
        if (session('lang') === 'id') {
            $nama_aktivitas = $data['tbaktivitas']->nama_aktivitas_in;
            $deskripsi_aktivitas = strip_tags($data['tbaktivitas']->deskripsi_aktivitas_in);
            
            // Mengambil meta title dan description
            $data['Title'] = $data['tbaktivitas']->meta_title ?? $nama_aktivitas;
            $teks = "$nama_aktivitas. $deskripsi_aktivitas";
        } else {
            $nama_aktivitas = $data['tbaktivitas']->nama_aktivitas_en;
            $deskripsi_aktivitas = strip_tags($data['tbaktivitas']->deskripsi_aktivitas_en);

            // Mengambil meta title dan description
            $data['Title'] = $data['tbaktivitas']->meta_title_en ?? $nama_aktivitas;
            $teks = "$nama_aktivitas. $deskripsi_aktivitas";
        }

        // Menggunakan meta description dari aktivitas
        $data['Meta'] = character_limiter($data['tbaktivitas']->meta_description ?? $teks, 150);

        return view('user/aktivitas/detail', $data);
    }
}
