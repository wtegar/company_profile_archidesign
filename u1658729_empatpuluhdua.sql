-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Nov 2024 pada 09.32
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1658729_empatpuluhdua`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(13, '2023-07-20-081917', 'App\\Database\\Migrations\\TbProduk', 'default', 'App', 1690513521, 1),
(14, '2023-07-20-084755', 'App\\Database\\Migrations\\TbSlider', 'default', 'App', 1690513521, 1),
(15, '2023-07-20-085024', 'App\\Database\\Migrations\\TbProfil', 'default', 'App', 1690513521, 1),
(16, '2023-07-28-035902', 'App\\Database\\Migrations\\TbAktivitas', 'default', 'App', 1690517128, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(5) UNSIGNED NOT NULL,
  `nama_aktivitas_in` varchar(200) NOT NULL,
  `nama_aktivitas_en` varchar(200) NOT NULL,
  `foto_aktivitas` varchar(100) NOT NULL,
  `deskripsi_aktivitas_in` text DEFAULT NULL,
  `deskripsi_aktivitas_en` text DEFAULT NULL,
  `slug_id` varchar(255) NOT NULL,
  `slug_en` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_title_en` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_description_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id_aktivitas`, `nama_aktivitas_in`, `nama_aktivitas_en`, `foto_aktivitas`, `deskripsi_aktivitas_in`, `deskripsi_aktivitas_en`, `slug_id`, `slug_en`, `meta_title`, `meta_title_en`, `meta_description`, `meta_description_en`) VALUES
(2, 'Pengembangan Proyek ', 'Project Development', 'Project Plan Development_Pengembangan Rencana Proyek_22072024235841.jpg', '<p><strong>Pengembangan Rencana Proyek</strong> adalah tahap kunci dalam manajemen proyek yang melibatkan pembuatan strategi terperinci untuk melaksanakan proyek dari awal hingga akhir. Aktivitas ini bertujuan untuk memastikan bahwa proyek dapat diselesaikan dengan sukses sesuai dengan tujuan, anggaran, dan jadwal yang ditetapkan. Mengembangkan anggaran yang komprehensif untuk seluruh proyek, memastikan bahwa semua biaya diperkirakan dengan tepat dan proyek tetap dalam batas biaya yang ditetapkan. Mengidentifikasi dan mengalokasikan sumber daya yang diperlukan untuk menyelesaikan proyek, termasuk tenaga kerja, peralatan, dan material.</p>', '<p>Project Plan Development is a key stage in project management that involves creating a detailed strategy for executing a project from start to finish. This activity aims to ensure that the project can be completed successfully according to the stated objectives, budget and schedule. Develop a comprehensive budget for the entire project, ensuring that all costs are estimated appropriately and the project remains within established cost limits. Identify and allocate the resources necessary to complete the project, including labor, equipment, and materials.</p>', 'pengembangan-proyek', 'project-development', 'Pengembangan Rencana Proyek: Strategi Sukses Manajemen Proyek', 'Project Plan Development: Successful Project Management Strategies', 'Pelajari langkah-langkah penting dalam pengembangan rencana proyek untuk memastikan keberhasilan, termasuk penganggaran, alokasi sumber daya, dan penjadwalan yang efektif.', 'Learn the essential steps in developing a project plan to ensure success, including budgeting, resource allocation, and effective scheduling.'),
(6, 'Konstruksi dan Perbaikan', 'Construction and Repair', 'Construction and Repair_Konstruksi dan Perbaikan_23072024000343.jpg', '<p>Konstruksi adalah proses fisik yang melibatkan pembangunan struktur baru berdasarkan desain dan perencanaan yang telah disusun sebelumnya. Aktivitas ini mencakup semua tahap dari persiapan lokasi hingga penyelesaian akhir proyek, termasuk pengawasan, koordinasi, dan pelaksanaan pekerjaan sesuai dengan spesifikasi desain. &nbsp;proses yang dilakukan untuk mengembalikan atau memperbaiki struktur atau sistem yang mengalami kerusakan, keausan, atau masalah lainnya. Aktivitas ini bertujuan untuk mengembalikan kondisi fungsional dan estetis dari struktur atau sistem yang ada.</p>', '<p>Construction is a physical process that involves building a new structure based on previously prepared designs and plans. These activities cover all stages from site preparation to final project completion, including supervision, coordination, and execution of work according to design specifications. &nbsp;the process carried out to restore or repair structures or systems that have experienced damage, wear, or other problems. This activity aims to restore the functional and aesthetic condition of the existing structure or system.</p>', 'konstruksi-dan-perbaikan', 'construction-and-repair', 'Konstruksi dan Perbaikan: Membangun dan Memulihkan Struktur', 'Construction and Repair: Building and Restoring Structures', 'Pelajari proses konstruksi dan perbaikan untuk membangun struktur baru dan mengembalikan kondisi fungsional serta estetis dari sistem yang ada.', 'Learn about the construction and repair processes to build new structures and restore the functional and aesthetic condition of existing systems.'),
(7, 'aktifitas id', 'aktivity en', 'asdadad_testess_26072024095342.jpg', '<p>deskripsi id&nbsp;</p>', '<p>description en</p>', 'aktifitas-id', 'aktivity-en', 'meta title id ', 'meta title en', 'meta desc id ', 'meta desc en');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(5) UNSIGNED NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `judul_artikel_en` varchar(255) DEFAULT NULL,
  `foto_artikel` varchar(255) NOT NULL,
  `deskripsi_artikel` longtext NOT NULL,
  `deskripsi_artikel_en` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `slug_id` varchar(255) DEFAULT NULL,
  `slug_en` varchar(255) DEFAULT NULL,
  `meta_title_id` varchar(255) DEFAULT NULL,
  `meta_title_en` varchar(255) DEFAULT NULL,
  `meta_description_id` text DEFAULT NULL,
  `meta_description_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul_artikel`, `judul_artikel_en`, `foto_artikel`, `deskripsi_artikel`, `deskripsi_artikel_en`, `created_at`, `slug_id`, `slug_en`, `meta_title_id`, `meta_title_en`, `meta_description_id`, `meta_description_en`) VALUES
(6, ' Mengubah Ruang dengan Desain Interior Modern oleh PT. ArchiDesign', 'Transforming Spaces with Modern Interior Design by PT. ArchiDesign', '1721668175_08482d18459c3ea03002.jpg', '<p>Desain interior bukan hanya tentang penampilan, tetapi juga tentang fungsionalitas dan kenyamanan. PT. ArchiDesign, sebuah perusahaan arsitektur dan desain interior yang berbasis di Indonesia, memahami pentingnya menciptakan ruang yang tidak hanya estetis tetapi juga fungsional. Dengan pendekatan yang berpusat pada klien, PT. ArchiDesign telah berhasil mengubah banyak ruang residensial dan komersial menjadi tempat yang indah dan nyaman untuk ditinggali dan bekerja.</p>\r\n<p>Tim profesional PT. ArchiDesign terdiri dari arsitek, desainer interior, dan manajer proyek yang berpengalaman. Mereka bekerja sama untuk memahami visi dan kebutuhan klien, kemudian mengembangkan konsep desain yang inovatif dan kreatif. Dari sketsa awal hingga dokumentasi teknis dan implementasi, PT. ArchiDesign memastikan setiap detail dipertimbangkan untuk mencapai hasil yang memuaskan.</p>', '<p>Interior design is not only about appearance but also about functionality and comfort. PT. ArchiDesign, an architecture and interior design company based in Indonesia, understands the importance of creating spaces that are not only aesthetic but also practical. With a client-centered approach, PT. ArchiDesign has successfully transformed many residential and commercial spaces into beautiful, comfortable places to live and work.</p>\r\n<p>The professional team at PT. ArchiDesign consists of experienced architects, interior designers, and project managers. They work together to understand the client&rsquo;s vision and needs, then develop innovative and creative design concepts. From initial sketches to technical documentation and implementation, PT. ArchiDesign ensures that every detail is considered to achieve a satisfying result.</p>', '2024-07-18 14:56:49', 'mengubah-ruang-dengan-desain-interior-modern-oleh-pt-archidesign', 'transforming-spaces-with-modern-interior-design-by-pt-archidesign', 'Transformasi Ruang Anda dengan Desain Interior Modern oleh PT. ArchiDesign', 'Transform Your Space with Modern Interior Design by PT. ArchiDesign', 'Temukan PT. ArchiDesign, perusahaan arsitektur dan desain interior terkemuka di Indonesia. Kami mengkhususkan diri dalam menciptakan ruang yang indah dan fungsional yang disesuaikan dengan kebutuhan klien, mulai dari proyek residensial hingga komersial. Jelajahi solusi desain inovatif yang menggabungkan estetika dengan kenyamanan.', 'Discover PT. ArchiDesign, a leading Indonesian architecture and interior design company. We specialize in creating beautiful, functional spaces tailored to client needs, from residential to commercial projects. Explore innovative design solutions that blend aesthetics with comfort.'),
(7, 'Inovasi dan Keberlanjutan dalam Arsitektur oleh PT. ArchiDesign', 'Innovation and Sustainability in Architecture by PT. ArchiDesign', '1721668195_9ca348e358bfa9040e27.jpg', '<p>Dalam era modern ini, keberlanjutan menjadi salah satu faktor penting dalam industri arsitektur. PT. ArchiDesign mengambil langkah maju dengan mengintegrasikan prinsip-prinsip keberlanjutan dalam setiap proyek mereka. Dari tahap perencanaan hingga konstruksi, PT. ArchiDesign memastikan bahwa setiap keputusan desain mempertimbangkan dampak lingkungan dan keberlanjutan jangka panjang.</p>\r\n<p>Salah satu pendekatan inovatif yang diterapkan oleh PT. ArchiDesign adalah penggunaan material ramah lingkungan dan teknologi hemat energi. Mereka bekerja sama dengan pemasok lokal untuk memastikan material yang digunakan tidak hanya berkualitas tinggi tetapi juga memiliki jejak karbon yang rendah. Selain itu, PT. ArchiDesign juga menerapkan desain yang efisien dalam penggunaan energi, seperti pencahayaan alami dan sistem ventilasi yang optimal.</p>', '<p>In today&rsquo;s modern era, sustainability has become a crucial factor in the architecture industry. PT. ArchiDesign is taking a forward-thinking approach by integrating sustainability principles into every project. From the planning stage to construction, PT. ArchiDesign ensures that each design decision considers environmental impact and long-term sustainability.</p>\r\n<p>One of the innovative approaches employed by PT. ArchiDesign is the use of eco-friendly materials and energy-efficient technology. They collaborate with local suppliers to ensure that the materials used are not only of high quality but also have a low carbon footprint. Additionally, PT. ArchiDesign incorporates energy-efficient design elements, such as natural lighting and optimized ventilation systems.</p>', '2024-07-19 09:31:41', 'inovasi-dan-keberlanjutan-dalam-arsitektur-oleh-pt-archidesign', 'innovation-and-sustainability-in-architecture-by-pt-archidesign', 'Inovasi dan Keberlanjutan Arsitektur oleh PT. ArchiDesign', 'Innovative and Sustainable Architecture by PT. ArchiDesign', 'Jelajahi komitmen PT. ArchiDesign terhadap arsitektur berkelanjutan. Temukan bagaimana kami mengintegrasikan material ramah lingkungan, teknologi hemat energi, dan desain inovatif untuk menciptakan ruang yang berdampak dan bertanggung jawab terhadap lingkungan demi masa depan yang lebih hijau.', 'Explore PT. ArchiDesign\'s commitment to sustainable architecture. Discover how we integrate eco-friendly materials, energy-efficient technology, and innovative designs to create impactful, environmentally responsible spaces for a greener future.'),
(8, 'PT. ArchiDesign: Menghadirkan Kreativitas dalam Setiap Desain', 'PT. ArchiDesign: Bringing Creativity to Every Design', '1721668214_367257802ebcdc62bcf5.jpg', '<p>Setiap proyek yang dikerjakan oleh PT. ArchiDesign adalah bukti nyata dari kemampuan mereka dalam menggabungkan estetika dan fungsionalitas. Perusahaan ini tidak hanya fokus pada penampilan luar dari sebuah bangunan, tetapi juga pada bagaimana ruang di dalamnya dapat digunakan secara optimal.</p>\r\n<p>PT. ArchiDesign memulai setiap proyek dengan sesi konsultasi desain yang mendalam. Mereka bertemu dengan klien untuk memahami kebutuhan, gaya, dan preferensi mereka. Dari sini, tim desainer mengembangkan konsep desain yang mencakup tata letak ruang, pemilihan furnitur, dan dekorasi yang sesuai. Tidak hanya itu, PT. ArchiDesign juga membuat render 3D dan visualisasi untuk memberikan gambaran yang jelas tentang desain akhir.</p>', '<p>Every project undertaken by PT. ArchiDesign is a testament to their ability to merge aesthetics with functionality. The company focuses not only on a building\'s exterior appeal but also on optimizing the usability of interior spaces.</p>\r\n<p>PT. ArchiDesign begins each project with in-depth design consultation sessions. They meet with clients to understand their needs, style, and preferences. From there, the design team develops concepts that include spatial layout, furniture selection, and complementary decor. Additionally, PT. ArchiDesign provides 3D renderings and visualizations to offer a clear picture of the final design.</p>', '2024-07-20 12:37:31', 'pt-archidesign-menghadirkan-kreativitas-dalam-setiap-desain', 'pt-archidesign-bringing-creativity-to-every-design', 'PT. ArchiDesign: Kreativitas dan Fungsionalitas dalam Desain Arsitektur', 'PT. ArchiDesign: Creativity and Functionality in Architectural Design', 'PT. ArchiDesign menyatukan estetika dan fungsionalitas dalam setiap proyek desain. Dengan konsultasi mendalam dan visualisasi 3D, kami menciptakan ruang yang indah dan optimal sesuai kebutuhan klien.', 'PT. ArchiDesign combines aesthetics and functionality in every design project. Through in-depth consultations and 3D visualizations, we create beautiful, optimized spaces tailored to clients\' needs.'),
(9, 'PT. ArchiDesign: Komitmen terhadap Kualitas dan Kepuasan Kli', 'PT. ArchiDesign: Commitment to Quality and Client Satisfaction', '1721668248_c4b1a6b006d38845751d.jpg', '<p>Kepuasan klien adalah prioritas utama bagi PT. ArchiDesign. Perusahaan ini percaya bahwa setiap proyek harus mencerminkan visi dan kebutuhan klien mereka. Oleh karena itu, PT. ArchiDesign selalu berusaha untuk melampaui harapan klien dengan memberikan hasil yang terbaik.</p>\r\n<p>Dalam setiap proyek, PT. ArchiDesign memulai dengan memahami kebutuhan dan preferensi klien melalui konsultasi mendalam. Mereka bekerja sama dengan klien dalam setiap tahap desain, dari konsep awal hingga penyelesaian akhir. Pendekatan kolaboratif ini memastikan bahwa setiap detail diperhatikan dan disesuaikan dengan keinginan klien.</p>\r\n<p>Keunggulan PT. ArchiDesign terletak pada tim profesional yang berpengalaman dan penggunaan material berkualitas tinggi. Mereka memastikan bahwa setiap proyek tidak hanya indah tetapi juga fungsional dan tahan lama. Dengan portofolio yang mencakup proyek residensial, komersial, dan restorasi, PT. ArchiDesign telah membuktikan komitmennya terhadap kualitas dan kepuasan klien.</p>\r\n<p>Dengan reputasi yang solid dan dedikasi terhadap inovasi dan keberlanjutan, PT. ArchiDesign terus menjadi pilihan utama bagi klien yang mencari solusi arsitektur dan desain interior yang unggul.</p>', '<p>Client satisfaction is PT. ArchiDesign&rsquo;s top priority. The company believes that each project should reflect the client\'s vision and needs, striving to exceed expectations by delivering the best results.</p>\r\n<p>In every project, PT. ArchiDesign begins by understanding the client\'s requirements and preferences through in-depth consultations. They collaborate with clients throughout each design phase, from initial concept to final completion. This collaborative approach ensures that every detail is meticulously crafted to match the client&rsquo;s desires.</p>\r\n<p>PT. ArchiDesign\'s strength lies in its experienced professional team and the use of high-quality materials. They ensure that each project is not only beautiful but also functional and durable. With a portfolio that spans residential, commercial, and restoration projects, PT. ArchiDesign has proven its commitment to quality and client satisfaction.</p>\r\n<p>With a solid reputation and dedication to innovation and sustainability, PT. ArchiDesign remains the top choice for clients seeking exceptional architecture and interior design solutions.</p>', '2024-07-22 11:27:22', 'pt-archidesign-komitmen-terhadap-kualitas-dan-kepuasan-kli', 'pt-archidesign-commitment-to-quality-and-client-satisfaction', 'PT. ArchiDesign: Komitmen Terhadap Kualitas dan Kepuasan Klien dalam Desain Arsitektur', 'PT. ArchiDesign: Commitment to Quality and Client Satisfaction in Architectural Design', 'PT. ArchiDesign mengutamakan kualitas dan kepuasan klien melalui pendekatan kolaboratif, penggunaan material berkualitas, dan desain inovatif. Kami hadir untuk mewujudkan visi Anda dalam proyek residensial, komersial, dan restorasi dengan hasil terbaik.', 'PT. ArchiDesign prioritizes quality and client satisfaction through a collaborative approach, high-quality materials, and innovative design. We are here to bring your vision to life in residential, commercial, and restoration projects with outstanding results.'),
(10, 'ini judul artikel', 'judul artikel en', '26072024033056.jpg', '<p>dec artikel id</p>', '<p>desc artikel en</p>', '2024-07-26 10:30:56', 'ini-judul-artikel', 'judul-artikel-en', 'meta title id', 'meta title en', 'meta desc id', 'meta desc en');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_meta`
--

CREATE TABLE `tb_meta` (
  `id_seo` int(11) UNSIGNED NOT NULL,
  `nama_halaman` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_title_en` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_description_en` text DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_meta`
--

INSERT INTO `tb_meta` (`id_seo`, `nama_halaman`, `meta_title`, `meta_title_en`, `meta_description`, `meta_description_en`, `canonical_url`) VALUES
(1, 'Beranda', 'Archidesign | Beranda', 'Archidesign | Dashboard', 'Temukan informasi tentang kami, akses kontak, dan baca artikel terbaru yang bermanfaat di beranda ini. Selamat datang di nabila fruity - UMKM Binaan Kadin Kota Malang', 'Find information about us, access contact details, and read the latest helpful articles on this homepage. Welcome to Nabila Fruity - A Small and Medium Enterprise Fostered by Kadin Malang City.', 'abc'),
(2, 'Tentang', 'Tentang Kami - Profil dan Informasi Kontak nabila fruity', 'About Us - Profile and Contact Information of Nabila Fruity', 'Pelajari lebih lanjut tentang siapa kami, layanan yang kami tawarkan, dan bagaimana cara menghubungi kami melalui telepon, alamat, atau email.', 'Learn more about who we are, the services we offer, and how to contact us via phone, address, or email.', 'bca'),
(3, 'Artikel', 'Artikel - Informasi dan Tips Terbaru', 'Articles - Latest Information and Tips', 'Temukan berbagai artikel menarik di website kami, mulai dari manfaat cengkeh, manfaat pala, hingga produk olahan kayu manis', 'Discover a variety of interesting articles on our website, ranging from the benefits of cloves, the benefits of nutmeg, to processed cinnamon products.', 'aaa'),
(4, 'Kontak', 'Hubungi Kami - Informasi Kontak Lengkap', 'Contact Us - Complete Contact Information', 'Hubungi kami melalui alamat, nomor telepon, atau email. Dapatkan informasi kontak lengkap untuk kebutuhan bisnis Anda.', 'Contact us through our address, phone number, or email. Get complete contact information for your business needs.', 'bz'),
(5, 'Produk', 'Produk Kami | Rempah Berkualitas dan Lainnya', 'Our Products | Quality Spices and More', 'Temukan produk berkualitas kami seperti cengkeh, lada, pala, dan jintan putih. Semua produk tersedia dengan harga kompetitif', 'Discover our quality products such as cloves, pepper, nutmeg, and cumin. All products are available at competitive prices.', 'bbc'),
(6, 'Aktivitas', 'Aktivitas Kami: Ekspor Rempah dan Aktivitas Lainnya', 'Our Activities: Spice Exports and Other Activities', 'Kami menjalankan berbagai aktivitas bisnis, termasuk ekspor rempah seperti cengkeh, dan aktivitas lainnya. Lihat lebih banyak tentang kegiatan kami di sini.', 'We engage in various business activities, including the export of spices like cloves and other activities. See more about our activities here.', 'cca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(5) UNSIGNED NOT NULL,
  `nama_produk_in` varchar(200) NOT NULL,
  `nama_produk_en` varchar(200) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk_in` text DEFAULT NULL,
  `deskripsi_produk_en` text DEFAULT NULL,
  `slug_en` varchar(255) DEFAULT NULL,
  `slug_id` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_title_en` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_description_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk_in`, `nama_produk_en`, `foto_produk`, `deskripsi_produk_in`, `deskripsi_produk_en`, `slug_en`, `slug_id`, `meta_title`, `meta_title_en`, `meta_description`, `meta_description_en`) VALUES
(3, 'Perencanaan dan Desain Arsitektur', 'Architectural Planning and Design', 'Nutmeg_Pala_1721288409.jpg', '<p>Kami memulai dengan menganalisis lokasi proyek untuk memahami karakteristik fisik dan konteks lingkungan. Mengembangkan konsep desain yang inovatif dan kreatif sesuai dengan visi klien. Membuat sketsa awal dan model 3D untuk visualisasi proyek. Menyusun dokumen teknis dan rencana konstruksi yang detail. Selanjutnya, kami berkoordinasi dengan berbagai pihak terkait, seperti insinyur struktural, ahli mekanik, dan kontraktor, untuk memastikan semua aspek teknis dan praktis dipertimbangkan.</p>\r\n<p>Kami juga melakukan evaluasi berkelanjutan selama proses desain dan konstruksi untuk memastikan kualitas dan kesesuaian dengan spesifikasi yang ditentukan. Penggunaan teknologi canggih dan perangkat lunak desain terkini membantu kami dalam menyempurnakan setiap detail dan memastikan akurasi tinggi dalam implementasi.</p>\r\n<p>Selain itu, kami selalu memperhatikan aspek keberlanjutan dengan memilih material yang ramah lingkungan dan menerapkan prinsip desain hijau untuk meminimalkan dampak lingkungan. Kami juga mengutamakan kenyamanan dan fungsi ruang untuk menciptakan lingkungan yang harmonis dan sesuai dengan kebutuhan pengguna akhir.</p>\r\n<p>Pada tahap akhir, kami melakukan pengawasan ketat selama proses konstruksi untuk memastikan bahwa proyek berjalan sesuai jadwal dan anggaran. Kami juga memberikan dukungan pasca-konstruksi untuk memastikan semua sistem berjalan dengan baik dan klien puas dengan hasil akhir. Melalui pendekatan holistik ini, kami berkomitmen untuk memberikan hasil terbaik yang tidak hanya memenuhi, tetapi melampaui harapan klien kami.</p>', '<p>We begin by analyzing the project site to understand its physical characteristics and environmental context. Develop innovative and creative design concepts according to the client\'s vision. Create initial sketches and 3D models for project visualization. Prepare technical documents and detailed construction plans. Furthermore, we coordinate with various related parties, such as structural engineers, mechanical experts, and contractors, to ensure all technical and practical aspects are considered.</p>\r\n<p>We also conduct ongoing evaluations throughout the design and construction process to ensure quality and conformity to specified specifications. The use of advanced technology and latest design software helps us in perfecting every detail and ensures high accuracy in implementation.</p>\r\n<p>In addition, we always pay attention to sustainability aspects by choosing environmentally friendly materials and applying green design principles to minimize environmental impact. We also prioritize the comfort and function of the space to create a harmonious environment that suits the needs of the end user.</p>\r\n<p>In the final stage, we carry out strict supervision during the construction process to ensure that the project runs on schedule and budget. We also provide post-construction support to ensure all systems run smoothly and the client is satisfied with the final result. Through this holistic approach, we are committed to delivering superior results that not only meet, but exceed our clients\' expectations.</p>', 'architectural-planning-and-design', 'perencanaan-dan-desain-arsitektur', 'Perencanaan & Desain Arsitektur Terintegrasi | Inovasi & Keberlanjutan', 'Integrated Architectural Planning & Design | Innovation & Sustainability', 'Kami menawarkan layanan perencanaan dan desain arsitektur yang inovatif, berkelanjutan, dan detail. Mulai dari analisis lokasi, konsep kreatif, hingga pengawasan konstruksi untuk hasil optimal sesuai kebutuhan klien.', 'We provide innovative, sustainable, and detailed architectural planning and design services—from site analysis, creative concept development, to construction supervision, ensuring optimal results tailored to client needs.'),
(4, 'Desain Interior Restorasi dan Renovasi', 'Restoration and Renovation Interior Design', 'Cumin_Desain Interior Restorasi dan Renovasi_1721665029.jpg', '<p>Desain interior restorasi dan renovasi adalah proses yang menggabungkan keahlian estetika dan teknis untuk memperbarui, memperbaiki, dan menghidupkan kembali ruang yang sudah ada. Tujuan utama dari desain ini adalah untuk mengembalikan atau meningkatkan fungsi, kenyamanan, dan daya tarik visual ruang sambil mempertahankan atau menyoroti karakter aslinya. Kami memulai dengan penilaian menyeluruh terhadap kondisi fisik dan struktur ruang yang akan direnovasi. Ini mencakup identifikasi masalah yang ada, seperti kerusakan struktural, masalah kelembapan, atau kebutuhan pembaruan. Analisis ini juga melibatkan pemahaman tentang gaya dan karakter desain yang ada untuk memastikan bahwa perubahan yang dilakukan tidak hanya efektif secara fungsional tetapi juga harmonis secara visual. &nbsp;Berdasarkan hasil penilaian, kami mengembangkan konsep desain yang disesuaikan dengan kebutuhan dan preferensi klien. Konsep ini mencakup pemilihan material, warna, pencahayaan, dan tata letak yang sesuai dengan tujuan restorasi atau renovasi. Kami juga mempertimbangkan aspek fungsionalitas dan ergonomi untuk meningkatkan kenyamanan dan efisiensi ruang.</p>', '<p>Restoration and renovation interior design is a process that combines aesthetic and technical expertise to update, repair and revitalize existing spaces. The primary goal of this design is to restore or enhance the function, comfort, and visual appeal of a space while maintaining or highlighting its original character. We start with a thorough assessment of the physical condition and structure of the space to be renovated. This includes identifying existing problems, such as structural damage, moisture problems, or the need for updates. This analysis also involves understanding the style and character of the existing design to ensure that changes made are not only functionally effective but also visually harmonious. &nbsp;Based on the assessment results, we develop a design concept tailored to the client\'s needs and preferences. This concept includes selecting materials, colors, lighting and layout that suit the goals of the restoration or renovation. We also consider aspects of functionality and ergonomics to increase comfort and space efficiency.</p>', 'restoration-and-renovation-interior-design', 'desain-interior-restorasi-dan-renovasi', 'Desain Interior Restorasi & Renovasi - Perbarui Ruang dengan Elegan', 'Interior Restoration & Renovation Design - Elevate Your Space with Elegance', 'Jasa desain interior restorasi dan renovasi untuk memperbarui fungsi dan estetika ruang. Sesuaikan dengan gaya asli untuk hasil yang harmonis dan berkesan.', 'Interior restoration and renovation services to enhance functionality and aesthetics. Tailored to preserve the original style for a harmonious and memorable result.'),
(10, 'Manajemen Proyek Konstruksi', 'Construction Project Management', 'sdfsdfdsf_Manajemen Proyek Konstruksi_1721665049.jpg', '<p>Mengawasi proses konstruksi untuk memastikan proyek berjalan sesuai rencana dan jadwal. Berkoordinasi dengan kontraktor dan subkontraktor untuk memastikan kualitas dan kepatuhan terhadap spesifikasi desain. Melakukan inspeksi rutin untuk memastikan kualitas pekerjaan konstruksi. Kami memantau kemajuan proyek secara berkala untuk memastikan bahwa semua pekerjaan dilakukan sesuai dengan rencana dan jadwal yang telah ditetapkan. Hal ini melibatkan pengecekan tahapan pekerjaan, penilaian terhadap pencapaian target, dan penyesuaian jadwal jika diperlukan untuk mengatasi keterlambatan atau masalah yang mungkin muncul. Kami berkoordinasi secara aktif dengan kontraktor utama dan subkontraktor untuk memastikan bahwa setiap aspek konstruksi dilaksanakan dengan tepat. Komunikasi yang jelas dan efektif sangat penting untuk menghindari miskomunikasi dan memastikan bahwa semua pihak terlibat memahami dan mematuhi spesifikasi desain serta standar kualitas yang ditetapkan.</p>', '<p>Oversee the construction process to ensure the project runs according to plan and schedule. Coordinate with contractors and subcontractors to ensure quality and compliance with design specifications. Conduct regular inspections to ensure the quality of construction work. We monitor project progress regularly to ensure that all work is carried out according to the established plans and schedules. This involves checking work stages, assessing target achievement, and adjusting the schedule if necessary to overcome delays or problems that may arise. We actively coordinate with the main contractor and subcontractors to ensure that every aspect of construction is executed appropriately. Clear and effective communication is essential to avoid miscommunication and ensure that all parties involved understand and comply with design specifications and established quality standards.</p>', 'construction-project-management', 'manajemen-proyek-konstruksi', 'Manajemen Proyek Konstruksi: Pengawasan dan Koordinasi Berkualitas', 'Construction Project Management: Quality Oversight and Coordination', 'Pelajari bagaimana manajemen proyek konstruksi memastikan kelancaran proses, mengawasi kualitas, dan berkoordinasi dengan kontraktor untuk memenuhi spesifikasi desain dan jadwal yang telah ditetapkan.', 'Learn how construction project management ensures smooth processes, oversees quality, and coordinates with contractors to meet design specifications and established schedules.'),
(11, 'Restorasi dan Renovasi', 'Restoration and Renovation', 'Restoration and Renovation_Restorasi dan Renovasi_22072024235105.jpg', '<p>proses pemulihan bangunan atau struktur ke kondisi aslinya, biasanya dengan mempertahankan dan memulihkan elemen-elemen bersejarah atau arsitektur yang signifikan. Tujuannya adalah untuk mengembalikan bangunan ke bentuk dan fungsi yang asli, sering kali dengan menggunakan teknik dan material yang sama dengan yang digunakan pada saat bangunan pertama kali dibangun. proses memperbarui dan memperbaiki bangunan atau ruang untuk meningkatkan fungsi, estetika, atau efisiensi. Renovasi sering dilakukan untuk memperbaiki atau menyesuaikan bangunan dengan kebutuhan dan standar saat ini, tanpa mempertahankan karakteristik asli yang mungkin sudah ketinggalan zaman.</p>', '<p>the process of restoring a building or structure to its original condition, usually by retaining and restoring significant historic or architectural elements. The goal is to return a building to its original form and function, often using the same techniques and materials used when the building was first built. the process of updating and repairing a building or space to improve function, aesthetics, or efficiency. Renovations are often carried out to repair or adapt a building to current needs and standards, without maintaining original characteristics that may have become outdated.</p>', 'restoration-and-renovation', 'restorasi-dan-renovasi', 'Restorasi dan Renovasi Bangunan - Menghidupkan Kembali dan Memperbarui Ruang', 'Building Restoration and Renovation - Reviving and Updating Spaces', 'Layanan restorasi dan renovasi untuk mengembalikan bangunan ke kondisi asli atau memperbaruinya agar sesuai dengan kebutuhan modern tanpa kehilangan nilai estetika.', 'Restoration and renovation services to return buildings to their original condition or update them to meet modern needs without losing aesthetic value.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `logo_perusahaan` varchar(100) NOT NULL,
  `deskripsi_perusahaan_in` text DEFAULT NULL,
  `deskripsi_perusahaan_en` text DEFAULT NULL,
  `deskripsi_kontak_in` text DEFAULT NULL,
  `deskripsi_kontak_en` text DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `link_whatsapp` text DEFAULT NULL,
  `favicon_website` varchar(100) NOT NULL,
  `title_website` varchar(100) NOT NULL,
  `foto_utama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `teks_footer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `username`, `password`, `nama_perusahaan`, `logo_perusahaan`, `deskripsi_perusahaan_in`, `deskripsi_perusahaan_en`, `deskripsi_kontak_in`, `deskripsi_kontak_en`, `link_maps`, `link_whatsapp`, `favicon_website`, `title_website`, `foto_utama`, `alamat`, `no_hp`, `email`, `teks_footer`) VALUES
(1, 'user', 'user', 'PT. ArchiDesign', 'Logo_PT.-ArchiDesign_22072024174230.jpg', '<p>PT. ArchiDesign adalah perusahaan yang berfokus pada layanan arsitektur dan desain interior. Kami memiliki tim profesional yang terdiri dari arsitek, desainer interior, dan manajer proyek yang berdedikasi untuk menciptakan ruang yang tidak hanya estetis tetapi juga fungsional, sesuai dengan kebutuhan dan preferensi klien kami. Kami menangani proyek residensial dan komersial, mulai dari perencanaan awal hingga pembangunan dan penyelesaian.</p>', '<p>PT. ArchiDesign is a company focused on architecture and interior design services. We have a professional team of architects, interior designers, and project managers dedicated to creating spaces that are not only aesthetically pleasing but also functional, tailored to the needs and preferences of our clients. We handle both residential and commercial projects, from initial planning to construction and completion.</p>', '<p>Malang Raya</p>', '<p>Malang Raya</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4046040.312635006!2d108.0530452!3d-7.9771059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629c21940f685%3A0xce6adb8a6aba4f5!2sNakam%20Foods%20Indonesia!5e0!3m2!1sid!2sid!4v1691128148640!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://wa.me/+6282131222332', 'Favicon_PT.-ArchiDesign_28072024152148.jpg', 'PT. ArchiDesign', '1721452976_10a26834f6aad117a70d.jpg', '<p>Malang Raya</p>', '+62 821 3122 2332', 'bogem123@gmail.com', 'All Rights Reserved. Designed with love by Me');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(5) UNSIGNED NOT NULL,
  `file_foto_slider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id_slider`, `file_foto_slider`) VALUES
(9, 'PT.-ArchiDesign_22072024144701.jpg'),
(10, 'PT.-ArchiDesign_22072024144713.jpg'),
(11, 'PT.-ArchiDesign_22072024144730.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `tb_meta`
--
ALTER TABLE `tb_meta`
  ADD PRIMARY KEY (`id_seo`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_meta`
--
ALTER TABLE `tb_meta`
  MODIFY `id_seo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
