-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jun 2020 pada 21.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quispintar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` int(11) NOT NULL,
  `code_room` varchar(6) NOT NULL,
  `id_rm` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `id_player` text NOT NULL,
  `ranked` text NOT NULL,
  `progress` text NOT NULL,
  `point` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `code_room`, `id_rm`, `id_quiz`, `id_player`, `ranked`, `progress`, `point`) VALUES
(4, '200730', 1, 2, '9,10', '2,1', '10/10,6/10', '1737,2237');

-- --------------------------------------------------------

--
-- Struktur dari tabel `join_temp`
--

CREATE TABLE `join_temp` (
  `id` int(11) NOT NULL,
  `code_room` varchar(6) NOT NULL,
  `id_rm` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `id_player` text DEFAULT NULL,
  `status` enum('waiting','play','end') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `join_temp`
--

INSERT INTO `join_temp` (`id`, `code_room`, `id_rm`, `id_quiz`, `id_player`, `status`) VALUES
(4, '200730', 1, 2, ';9;10', 'end');

-- --------------------------------------------------------

--
-- Struktur dari tabel `leaderboard_temp`
--

CREATE TABLE `leaderboard_temp` (
  `id` int(11) NOT NULL,
  `id_join` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `ranked` int(11) NOT NULL,
  `progress` varchar(50) NOT NULL,
  `point` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `leaderboard_temp`
--

INSERT INTO `leaderboard_temp` (`id`, `id_join`, `id_player`, `ranked`, `progress`, `point`) VALUES
(214, 4, 9, 2, '10/10', '1737'),
(215, 4, 10, 1, '6/10', '2237');

-- --------------------------------------------------------

--
-- Struktur dari tabel `motivasi`
--

CREATE TABLE `motivasi` (
  `id` int(11) NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `motivasi`
--

INSERT INTO `motivasi` (`id`, `text`) VALUES
(1, 'Sebagai manusia yang cerdas dan berakal, janganlah berusaha untuk menjadi orang sukses, namun cobalah berusaha untuk menjadi orang bernilai di kehidupan sosial dan dirimu sendiri.'),
(2, 'Semangati dirimu sendiri dan lakukan pekerjaan penting untuk menjadikan dunia lebih baik, dan tidak perlu menunggu orang yang sempurna melakukannya. Yang hanya menunggu hanyalah orang bodoh.'),
(3, 'Ketika tindakan dan perilaku kamu bisa membuat orang lain terinspirasi, maka berbuatlah lebih banyak, bermimpilah lebih tinggi, dan belajarlah tanpa mengenal lelah, karena di sini kamu yang memimpin.'),
(4, 'Ingatlah kamu adalah manusia yang memiliki dua tangan yang berfungsi dengan baik. Maka semakin usiamu bertambah gunakanlah tanganmu dengan baik, satu untuk membantu orang lain dan satu untuk dirimu sendiri.'),
(5, 'Menjalani sebuah hidup pasti dihadapkan dengan pilihan, makanya tinggalkan dan buang segala yang membuat dirimu sedih, dan cintai segala sumber kebahagiaanmu.'),
(6, 'Segala duka dan lara yang kamu rasakan janganlah kamu keluhkan, nikmati dan jalani saja. Sebab tidak ada yang tahu masa depan, dan mungkin saja dukamu saat ini bisa menjadi hal bermakna suatu saat nanti.'),
(7, 'Masa muda adalah masa pencarian jati diri, jadi jangan menertawakan dan merendahkan anak muda yang terlihat berpura-pura.'),
(8, 'Syukurilah segala yang kamu miliki sekarang ini, karena memang seringkali kita hanya memandang ke atas dan bukannya ke bawah yang bisa membuat diri kita sadar.'),
(9, 'Janganlah kamu sia-siakan masa mudamu, nikmati saja dan buat masa itu menjadi penuh manfaat.'),
(10, 'Percayalah pada impianmu yang indah dan akan membuat dirimu senyum bahagia, karena dengan begitu kamu akan memiliki masa depanmu.'),
(11, 'Tahukah kamu, kalau dirimu itu memiliki peluang yang jauh lebih besar dibandingkan dengan apapun yang pernah kamu ketahui.'),
(12, 'Tahukah dirimu, bahwa kamu tidak dibatasi untuk tertawa, berimajinasi, dan bermimpi.'),
(13, 'Kegagalan bukanlah akhir dari segalanya, sebab sebenarnya kamu belum gagal.'),
(14, 'Tidak masalah ketika kamu tidak bisa melakukan segala sesuatu yang besar, sebab kamu bisa melakukan berbagai hal kecil dengan caramu sendiri yang luar biasa.\r\n'),
(15, 'Jangan takut untuk berbeda ketika segalanya terlihat sangat bertentangan dan berbeda dengan dirimu.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `point` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `points`
--

INSERT INTO `points` (`id`, `id_player`, `point`) VALUES
(32, 9, '1737'),
(33, 10, '2237');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tingkat` enum('Easy','Medium','Hard') NOT NULL,
  `deskripsi` text NOT NULL,
  `soal` longtext NOT NULL,
  `gambar_soal` longtext NOT NULL,
  `jawaban_soal` text NOT NULL,
  `jawaban_a_soal` longtext NOT NULL,
  `jawaban_b_soal` longtext NOT NULL,
  `jawaban_c_soal` longtext NOT NULL,
  `jawaban_d_soal` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`id`, `id_pembuat`, `judul`, `gambar`, `kategori`, `tingkat`, `deskripsi`, `soal`, `gambar_soal`, `jawaban_soal`, `jawaban_a_soal`, `jawaban_b_soal`, `jawaban_c_soal`, `jawaban_d_soal`) VALUES
(1, 1, 'Ini Quiz Asd', 'quiz-comic-pop-art-style_175838-505.jpg', 'Bahasa Indonesia', 'Hard', '<p>ini quiz test</p>', '<p>soal 1</p>;<p>soal 2</p>;<p>soal 3</p>;<p>soal 4</p>;<p>soal 5</p>;<p>soal 6</p>;<p>soal 7</p>;<p>soal 8</p>;<p>soal 9</p>;<p>soal 10</p>', ';;;;;;;;;', 'A;B;C;D;A;B;C;D;C;B', 'a;a;a;a;a;a;a;a;a;a', 'b;b;b;b;b;b;b;b;b;b', 'c;c;c;c;c;c;c;c;c;d', 'd;d;d;d;d;d;d;d;d;c'),
(2, 1, 'Quis Iseng', 'screenshot-from-2020-05-30-19-05-20.png', 'Keterampilan/Bahasa Asing', 'Medium', '<p style=\"box-sizing: border-box; color: #444444; font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">iseng2 aja</p>', '<p>Tahukah kamu, mengapa motor berhenti di depan lampu merah?</p>;<p>Tebak binatang apa yang jago renang?</p>;<p>Ibu Anna memiliki tiga anak.</p>\r\n<p>Dua di antaranya adalah Faith dan Natasha.</p>\r\n<p>Siapa nama anak ketiganya?</p>;<p>saya mempunyai 3 apel. jika kamu mengambil 2 buah dari saya. berapa apel yang kamu punya ?</p>;<p>jika ada 12 ikan dan setengah dari mereka tenggelam, berapa banyak yang tersisa ?</p>;<p>sebuah kereta listrik bergerak ke utara dengan kecepatan 100 mph. ke arah mana asapnya berhembus ?</p>;<p>berapa banyak batu bata yang dibutuhkan untuk menyelesaikan bangunan yang terbuat dari batu bata?</p>;<p>saat mengikuti sebuah balapan, kamu menyalip orang diposisi nomor 2. ada di posisi berapakah kamu?</p>;<p>beberapa bulan memiliki 31 hari, lainnya 30 hari. berapa bulan yang memiliki 28 hari?</p>;<p>petani memiliki 12 domba, semuanya mati kecuali 8 ekor. berapa banyak yang tersisa?</p>', 'screenshot-from-2020-05-30-19-24-15.png;;;;;;;;;', 'D;B;C;B;D;D;B;B;D;C', 'karena motornya direm;ikan;faith;1 apel;0 ikan;utara;0 batu bata;posisi 1;ga ada;0 domba', 'karena takut ditangkep polisi;bebek;natashya;2 apel;4 ikan;barat;1 batu bata;posisi 2;1 bulan;7 domba', 'karena ga bawa sim;angsa;anna;3 apel;6 ikan;selatan;50 batu bata;posisi 3;11 bulan;8 domba', 'karena lampunya merah;hiu;angel;4 apel;12 ikan;tidak ada yang benar;tergantung bangunannya;posisi 4;12 bulan;15 domba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `judul`, `url`, `deskripsi`) VALUES
(1, 'Quiz Pintar', 'http://localhost/quiz-pintar/', 'Quiz Pintar adalah ...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('guru','pelajar') DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `avatar`, `email`, `hp`, `alamat`, `role`, `password`) VALUES
(1, 'Bayu Agung Gumelar', 'monster3.png', 'bayuagung100@gmail.com', '089634372389', 'Kemuning Permai blok b2 no 31', 'guru', '5f4dcc3b5aa765d61d8327deb882cf99'),
(8, 'smile', '', 'smileyoudontcry100@gmail.com', '089634372389', 'Kemuning', 'pelajar', '5f4dcc3b5aa765d61d8327deb882cf99'),
(9, 'Balar', NULL, 'balar@gmail.com', '08111838679', 'kemuning', 'pelajar', '5f4dcc3b5aa765d61d8327deb882cf99'),
(10, 'Test', NULL, 'test@gmail.com', '123456789', 'citra', 'pelajar', '5f4dcc3b5aa765d61d8327deb882cf99'),
(11, 'Samuel DIdik Gunawan', NULL, 'sampoerna.sd@gmail.com', '089519282254', 'Perum Sudirman Indah', 'pelajar', 'c19748eff57304b251848aeb558d1c75');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `join_temp`
--
ALTER TABLE `join_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `leaderboard_temp`
--
ALTER TABLE `leaderboard_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `motivasi`
--
ALTER TABLE `motivasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `join_temp`
--
ALTER TABLE `join_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `leaderboard_temp`
--
ALTER TABLE `leaderboard_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT untuk tabel `motivasi`
--
ALTER TABLE `motivasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
