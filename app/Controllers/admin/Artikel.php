<?php

namespace App\Controllers\admin;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    private $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $data = [
            'artikels' => $this->artikelModel->findAll(),
        ];

        return view('admin/artikel/index', $data);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        return view('admin/artikel/tambah', [
            'validation' => $this->validator
        ]);
    }

    public function proses_tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        // Validasi foto artikel
        if (!$this->validate([
            'foto_artikel' => [
                'rules' => 'uploaded[foto_artikel]|is_image[foto_artikel]|max_dims[foto_artikel,572,572]|mime_in[foto_artikel,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'max_dims' => 'Maksimal ukuran gambar 572x572 pixels',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Simpan artikel ke dalam database
            $file_foto = $this->request->getFile('foto_artikel');
            $currentDateTime = date('dmYHis');
            $newFileName = "{$currentDateTime}.{$file_foto->getExtension()}";
            $file_foto->move('asset-user/images', $newFileName);

            // Validate image dimensions
            list($width, $height) = getimagesize('asset-user/images/' . $newFileName);
            if ($width !== 572 || $height !== 572) {
                unlink('asset-user/images/' . $newFileName); // Remove uploaded image
                session()->setFlashdata('error', 'Ukuran gambar harus 572x572 pixels.');
                return redirect()->back()->withInput();
            }

            // Menyimpan data yang diinputkan
            $data = [
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'deskripsi_artikel' => $this->request->getPost('deskripsi_artikel'),
                'judul_artikel_en' => $this->request->getPost('judul_artikel_en'),
                'deskripsi_artikel_en' => $this->request->getPost('deskripsi_artikel_en'),
                'meta_title_id' => $this->request->getPost('meta_title_id'),
                'meta_title_en' => $this->request->getPost('meta_title_en'),
                'meta_description_id' => $this->request->getPost('meta_description_id'),
                'meta_description_en' => $this->request->getPost('meta_description_en'),
                'foto_artikel' => $newFileName,
                'slug_id' => url_title($this->request->getPost('judul_artikel'), '-', true), // Slug ID dalam bahasa Indonesia
                'slug_en' => url_title($this->request->getPost('judul_artikel_en'), '-', true), // Slug dalam bahasa Inggris
            ];

            $this->artikelModel->insert($data);

            return redirect()->to(base_url('admin/artikel'));
        }
    }

    public function edit($id_artikel)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $artikelData = $this->artikelModel->find($id_artikel);
        $validation = \Config\Services::validation();

        return view('admin/artikel/edit', [
            'artikelData' => $artikelData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_artikel = null)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        // Pengecekan apakah ID artikel valid
        if (!$id_artikel) {
            return redirect()->back();
        }

        // Validasi input
        $file_foto = $this->request->getFile('foto_artikel');
        $newFileName = '';

        // Jika file foto di-upload
        if ($file_foto->isValid()) {
            // Hapus foto lama jika ada
            $artikelData = $this->artikelModel->find($id_artikel);
            $oldFilePath = 'asset-user/images/' . $artikelData->foto_artikel;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Simpan foto baru
            $newFileName = $file_foto->getRandomName();
            $file_foto->move('asset-user/images', $newFileName);

            // Validate image dimensions
            list($width, $height) = getimagesize('asset-user/images/' . $newFileName);
            if ($width !== 572 || $height !== 572) {
                unlink('asset-user/images/' . $newFileName); // Remove uploaded image
                session()->setFlashdata('error', 'Ukuran gambar harus 572x572 pixels.');
                return redirect()->back()->withInput();
            }
        } else {
            // Jika tidak ada file foto baru, gunakan foto lama
            $artikelData = $this->artikelModel->find($id_artikel);
            $newFileName = $artikelData->foto_artikel;
        }

        // Update data artikel
        $data = [
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'deskripsi_artikel' => $this->request->getPost('deskripsi_artikel'),
            'judul_artikel_en' => $this->request->getPost('judul_artikel_en'),
            'deskripsi_artikel_en' => $this->request->getPost('deskripsi_artikel_en'),
            'meta_title_id' => $this->request->getPost('meta_title_id'),
            'meta_title_en' => $this->request->getPost('meta_title_en'),
            'meta_description_id' => $this->request->getPost('meta_description_id'),
            'meta_description_en' => $this->request->getPost('meta_description_en'),
            'foto_artikel' => $newFileName, // Gunakan nama file foto baru atau lama
            'slug_id' => url_title($this->request->getPost('judul_artikel'), '-', true), // Update Slug ID dalam bahasa Indonesia
            'slug_en' => url_title($this->request->getPost('judul_artikel_en'), '-', true), // Update Slug dalam bahasa Inggris
        ];

        // Update data artikel dalam database
        $this->artikelModel->update($id_artikel, $data);

        // Redirect ke halaman admin artikel
        return redirect()->to(base_url('admin/artikel/index'));
    }

    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $data = $this->artikelModel->find($id);
        unlink('asset-user/images/' . $data->foto_artikel); // Hapus foto dari folder
        $this->artikelModel->delete($id);

        return redirect()->to(base_url('admin/artikel/index'));
    }
}
