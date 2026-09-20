<?php

require_once "Film.php";
session_start();

// Membuat array untuk menyimpan kumpulan object Film
if (!isset($_SESSION['daftarFilm'])) {
    $_SESSION['daftarFilm'] = [];
}

$daftarFilm = &$_SESSION['daftarFilm'];

// Menambahkan data film baru
if (isset($_POST['tambah'])) {
    $IdFilm = (int) $_POST['IdFilm'];
    $Judul = $_POST['Judul'];
    $Genre = $_POST['Genre'];
    $HargaTiket = (int) $_POST['HargaTiket'];
    $Studio = (int) $_POST['Studio'];
    
    // Menentukan folder penyimpanan gambar
    $folderGambar = "images/";
    // Mengambil nama file gambar
    $namaGambar = basename($_FILES['Gambar']['name']);
    // Membuat path gambar lokal
    $pathGambar = $folderGambar . $namaGambar;
    // Memindahkan gambar ke folder images
    move_uploaded_file($_FILES['Gambar']['tmp_name'], $pathGambar);
    
    // Membuat object Film baru
    $FilmBaru = new Film($IdFilm, $Judul, $Genre, $HargaTiket, $Studio, $pathGambar);
    // Menambahkan object Film ke dalam array
    $daftarFilm[] = $FilmBaru;
    header("Location: Index.php");
    exit;
}

// Mengubah data film
if (isset($_POST['update'])) {
    $IdFilmLama = (int) $_POST['IdFilmLama'];

    foreach ($daftarFilm as $film) {
        if ($film->getIdFilm() == $IdFilmLama) {
            // Mengubah data menggunakan setter
            $film->setIdFilm((int) $_POST['IdFilm']);
            $film->setJudul($_POST['Judul']);
            $film->setGenre($_POST['Genre']);
            $film->setHargaTiket((int) $_POST['HargaTiket']);
            $film->setStudio((int) $_POST['Studio']);

            // Mengganti gambar jika user memilih gambar baru
            if (isset($_FILES['Gambar']) && $_FILES['Gambar']['error'] == 0) {
                $folderGambar = "images/";
                $namaGambar = basename($_FILES['Gambar']['name']);
                $pathGambar = $folderGambar . $namaGambar;
                // Memindahkan gambar baru ke folder images
                move_uploaded_file($_FILES['Gambar']['tmp_name'], $pathGambar);
                // Mengubah atribut Gambar
                $film->setGambar($pathGambar);
            }
            return;
        }
    }
    header("Location: Index.php");
    exit;
}

// Menghapus data film
if (isset($_GET['hapus'])) {
    $IdFilm = (int) $_GET['hapus'];
    foreach ($daftarFilm as $index => $film) {
        if ($film->getIdFilm() == $IdFilm) {
            // Menghapus object Film dari array
            unset($daftarFilm[$index]);
            // Mengatur kembali index array
            $daftarFilm = array_values($daftarFilm);
            return;
        }
    }
    header("Location: Index.php");
    exit;
}

// Mencari data berdasarkan judul atau genre
$hasilCari = [];
if (isset($_GET['cari']) && $_GET['cari'] != "") {
    $keyword = strtolower($_GET['cari']);
    foreach ($daftarFilm as $film) {
        // Memeriksa judul dan genre dengan keyword pencarian
        if (
            strpos(strtolower($film->getJudul()), $keyword) !== false ||
            strpos(strtolower($film->getGenre()), $keyword) !== false
        ) {
            $hasilCari[] = $film;
        }
    }
} else {
    // Menampilkan semua film jika tidak melakukan pencarian
    $hasilCari = $daftarFilm;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Film Bioskop</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header website -->
    <header>
        <h1>DATA FILM BIOSKOP</h1>
        <p>Manajemen Data Film</p>
    </header>

    <div class="container">
        <!-- Form untuk menambahkan film -->
        <div class="card">
            <h2>Tambah Data Film</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ID Film</label>
                    <input type="number" name="IdFilm" required>
                </div>

                <div class="form-group">
                    <label>Judul Film</label>
                    <input type="text" name="Judul" placeholder="Masukkan judul film" required>
                </div>

                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="Genre" placeholder="Masukkan genre film" required>
                </div>

                <div class="form-group">
                    <label>Harga Tiket</label>
                    <input type="number" name="HargaTiket" placeholder="Masukkan harga tiket" required>
                </div>

                <div class="form-group">
                    <label>Studio</label>
                    <input type="number" name="Studio" placeholder="Masukkan nomor studio" required>
                </div>

                <div class="form-group">
                    <label>Gambar Film</label>
                    <input type="file" name="Gambar" accept="image/*" required>
                </div>
                
                <button type="submit" name="tambah" class="btn-primary">Tambah Data</button>
            </form>
        </div>

        <!-- Form untuk mencari film -->
        <div class="card">
            <h2>Cari Data Film</h2>
            <form method="GET" class="search-form">
                <input type="text" name="cari" placeholder="Cari berdasarkan judul atau genre..." value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">
                <button type="submit" class="btn-primary">Cari</button>
                <a href="Index.php" class="btn-secondary">Tampilkan Semua</a>
            </form>
        </div>

        <!-- Tabel untuk menampilkan semua film -->
        <div class="card">
            <div class="table-header">
                <h2>Daftar Film</h2>
                <span class="jumlah-data">Total: <?= count($hasilCari); ?> Film</span>
            </div>

            <?php if (count($hasilCari) > 0): ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>ID Film</th>
                                <th>Judul</th>
                                <th>Genre</th>
                                <th>Harga Tiket</th>
                                <th>Studio</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($hasilCari as $film): ?>
                                <tr>
                                    <!-- Menampilkan gambar dari path lokal -->
                                    <td>
                                        <img src="<?= htmlspecialchars($film->getGambar()); ?>" alt="<?= htmlspecialchars($film->getJudul()); ?>" class="gambar-film">
                                    </td>

                                    <td><?= $film->getIdFilm(); ?></td>
                                    <td class="judul-film"><?= htmlspecialchars($film->getJudul()); ?></td>

                                    <td>
                                        <span class="genre"><?= htmlspecialchars($film->getGenre()); ?></span>
                                    </td>

                                    <td>Rp <?= number_format($film->getHargaTiket(), 0, ',', '.'); ?></td>

                                    <td>Studio <?= $film->getStudio(); ?></td>
                                    
                                    <td>
                                        <!-- Tombol edit untuk mengubah data -->
                                        <a href="?edit=<?= $film->getIdFilm(); ?>" class="btn-edit">Edit</a>
                                        <!-- Tombol hapus untuk menghapus data -->
                                        <a href="?hapus=<?= $film->getIdFilm(); ?>" class="btn-delete" onclick="return confirm('Apakah kamu yakin ingin menghapus film ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>
                <!-- Pesan ketika belum ada data -->
                <div class="empty">
                    <p>Belum ada data film.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Form update ditampilkan ketika tombol Edit ditekan -->
        <?php if (isset($_GET['edit'])): ?>
            <?php
            $IdFilmEdit = (int) $_GET['edit'];
            foreach ($daftarFilm as $film):
                if ($film->getIdFilm() == $IdFilmEdit):
            ?>

                <div class="card">
                    <h2>Update Data Film</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <!-- Menyimpan ID lama untuk mencari object yang akan diubah -->
                        <input type="hidden" name="IdFilmLama" value="<?= $film->getIdFilm(); ?>">
                        <div class="form-group">
                            <label>ID Film</label>
                            <input type="number" name="IdFilm" value="<?= $film->getIdFilm(); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Judul Film</label>
                            <input type="text" name="Judul" value="<?= htmlspecialchars($film->getJudul()); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Genre</label>
                            <input type="text" name="Genre" value="<?= htmlspecialchars($film->getGenre()); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Harga Tiket</label>
                            <input type="number" name="HargaTiket" value="<?= $film->getHargaTiket(); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Studio</label>
                            <input type="number" name="Studio" value="<?= $film->getStudio(); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Gambar Film</label>
                            <input type="file" name="Gambar" accept="image/*">

                            <!-- Menampilkan gambar yang sedang digunakan -->
                            <p>Gambar saat ini:</p>
                            <img src="<?= htmlspecialchars($film->getGambar()); ?>" alt="<?= htmlspecialchars($film->getJudul()); ?>" class="gambar-preview">
                        </div>

                        <button type="submit" name="update" class="btn-primary">Update Data</button>
                        <a href="Index.php" class="btn-secondary">Batal</a>
                    </form>
                </div>
            <?php
                endif;
            endforeach;
            ?>
        <?php endif; ?>

    </div>
    <!-- Footer website -->
    <footer>
        <p>© 2026 Data Film Bioskop</p>
    </footer>
</body>
</html>