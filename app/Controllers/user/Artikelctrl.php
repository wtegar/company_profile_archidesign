<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ArtikelModel;
use App\Models\MetaModel;

class Artikelctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ArtikelModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'en';
        $data = [
            'lang' => $lang,
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'artikelterbaru' => $this->ArtikelModel->getArtikelTerbaru(),
        ];

        $data['meta'] = $this->MetaModel->getMetaByPageName('Artikel');
        $data['canonicalUrl'] = base_url('/artikel');

        helper('text');

        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);
        $data['Title'] = 'Artikel';

        return view('user/artikel/index', $data);
    }

    public function detail($slug)
    {
        // Mendapatkan bahasa aktif dari session
        $bahasa = session('lang');

        // Ambil artikel berdasarkan slug sesuai bahasa
        $artikel = $bahasa === 'en'
            ? $this->ArtikelModel->getDetailArtikelBySlugId($slug)
            : $this->ArtikelModel->getDetailArtikelBySlugId($slug);

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel tidak ditemukan");
        }

        $lang = session()->get('lang') ?? 'id';

        // Tentukan prefix berdasarkan bahasa (artikel untuk 'id' dan article untuk 'en')
        $url_prefix = $lang === 'id' ? 'artikel' : 'article';

        // Memilih slug berdasarkan prefix URL
        $correct_slug_id = $artikel->slug_id;
        $correct_slug_en = $artikel->slug_en;

        // Jika slug tidak sesuai dengan slug dalam bahasa saat ini, redirect ke slug yang benar
        if ($lang === 'id' && $slug !== $correct_slug_id) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_id}"));
        } elseif ($lang === 'en' && $slug !== $correct_slug_en) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_en}"));
        }

        // Menentukan data artikel sesuai bahasa
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'artikel' => [
                'judul_artikel' => $bahasa === 'en' ? $artikel->judul_artikel_en : $artikel->judul_artikel,
                'deskripsi_artikel' => $bahasa === 'en' ? $artikel->deskripsi_artikel_en : $artikel->deskripsi_artikel,
                'foto_artikel' => $artikel->foto_artikel,
                'created_at' => $artikel->created_at,
                'meta_title' => $bahasa === 'en' ? $artikel->meta_title_en : $artikel->meta_title_id,
                'meta_description' => $bahasa === 'en' ? $artikel->meta_description_en : $artikel->meta_description_id,
                'slug' => $bahasa === 'en' ? $artikel->slug_en : $artikel->slug_id,  // Menambahkan slug sesuai bahasa
            ],
            'artikel_lain' => $this->ArtikelModel->getArtikelLainnya($artikel->id_artikel, 4),
        ];

        helper('text');

        $data['Title'] = $data['artikel']['meta_title'] ?? 'Detail Artikel';
        $data['Meta'] = character_limiter($data['artikel']['meta_description'], 150);

        return view('user/artikel/detail', $data);
    }


    private function generateMetaDescription($data)
    {
        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = session('lang') === 'en'
            ? strip_tags($data['profil'][0]->deskripsi_perusahaan_en)
            : strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

        $teks = session('lang') === 'en'
            ? "Articles from $nama_perusahaan. $deskripsi_perusahaan"
            : "Artikel dari $nama_perusahaan. $deskripsi_perusahaan";

        return $teks;
    }
}
