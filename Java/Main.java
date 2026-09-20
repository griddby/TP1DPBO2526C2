import java.util.Scanner;

public class Main {
    // Array untuk menyimpan kumpulan object Film
    static Film[] daftarFilm = new Film[100];
    // Menyimpan jumlah object film yang ada
    static int jumlahFilm = 0;
    // Scanner untuk menerima input dari user
    static Scanner input = new Scanner(System.in);

    // Fungsi untuk menambahkan data film
    static void TambahData() {
        // Mengecek apakah array sudah penuh
        if (jumlahFilm >= 100) {
            System.out.println("Data film sudah penuh!");
            return;
        }
        
        System.out.println("--------------- Add Data ---------------");
        // Meminta input data film dari user
        System.out.print("Masukkan ID Film: ");
        int IdFilm = input.nextInt();
        input.nextLine();

        System.out.print("Masukkan Judul Film: ");
        String Judul = input.nextLine();

        System.out.print("Masukkan Genre Film: ");
        String Genre = input.nextLine();

        System.out.print("Masukkan Harga Tiket: ");
        int HargaTiket = input.nextInt();

        System.out.print("Masukkan Nomor Studio: ");
        int Studio = input.nextInt();

        // Membuat object film baru berdasarkan data masukkan
        Film FilmBaru = new Film(
            IdFilm,
            Judul,
            Genre,
            HargaTiket,
            Studio
        );
        // Menambahkan object film ke dalam array
        daftarFilm[jumlahFilm] = FilmBaru;
        // Menambah jumlah data
        jumlahFilm++;
        System.out.println("Film berhasil ditambahkan!");
    }

    // Fungsi untuk mencari data film berdasarkan ID Film
    static void CariData() {
        System.out.println("-------------- Cari Data ---------------");
        // Meminta ID Film yang ingin dicari
        System.out.print("Masukkan ID Film yang dicari: ");
        int IdFilm = input.nextInt();

        // Melakukan pencarian pada setiap object film di dalam array
        for (int i = 0; i < jumlahFilm; i++) {
            // Mengecek apakah ID Film sesuai dengan ID yang dicari
            if (daftarFilm[i].getIdFilm() == IdFilm) {
                // Menampilkan data film yang ditemukan
                System.out.println("Data Ditemukan");
                System.out.println("ID Film      : " + daftarFilm[i].getIdFilm());
                System.out.println("Judul        : " + daftarFilm[i].getJudul());
                System.out.println("Genre        : " + daftarFilm[i].getGenre());
                System.out.println("Harga Tiket  : " + daftarFilm[i].getHargaTiket());
                System.out.println("Nomor Studio : " + daftarFilm[i].getStudio());
                return;
            }
        }
        // Jika data tidak ditemukan
        System.out.println("Film tidak ditemukan");
    }

    // Fungsi untuk mengubah data film
    static void UpdateData() {
        System.out.println("------------- Update Data --------------");
        // Meminta ID film yang ingin diubah
        System.out.print("Masukkan ID Film yang ingin diubah: ");
        int IdFilm = input.nextInt();
        input.nextLine();

        // Mencari film berdasarkan ID
        for (int i = 0; i < jumlahFilm; i++) {
            if (daftarFilm[i].getIdFilm() == IdFilm) {
                // Meminta data baru dari user
                System.out.print("Judul Film baru: ");
                String Judul = input.nextLine();
                System.out.print("Genre Film baru: ");
                String Genre = input.nextLine();
                System.out.print("Harga Tiket baru: ");
                int HargaTiket = input.nextInt();
                System.out.print("Nomor Studio baru: ");
                int Studio = input.nextInt();

                // Mengubah atribut object menggunakan setter
                daftarFilm[i].setJudul(Judul);
                daftarFilm[i].setGenre(Genre);
                daftarFilm[i].setHargaTiket(HargaTiket);
                daftarFilm[i].setStudio(Studio);

                System.out.println("Film berhasil diubah!");
                return;
            }
        }
        // Jika film tidak ditemukan
        System.out.println("Film tidak ditemukan.");
    }


    // Fungsi untuk menghapus data film
    static void DeleteData() {
        System.out.println("-------------- Hapus Data --------------");
        // Meminta ID film yang ingin dihapus
        System.out.print("Masukkan ID Film yang ingin dihapus: ");
        int IdFilm = input.nextInt();
        // Mencari object film berdasarkan ID
        for (int i = 0; i < jumlahFilm; i++) {
            if (daftarFilm[i].getIdFilm() == IdFilm) {
                // Menampilkan data sebelum dihapus
                System.out.println("\nData Film ditemukan!");
                System.out.println("ID Film      : " + daftarFilm[i].getIdFilm());
                System.out.println("Judul        : " + daftarFilm[i].getJudul());
                System.out.println("Genre        : " + daftarFilm[i].getGenre());
                System.out.println("Harga Tiket  : " + daftarFilm[i].getHargaTiket());
                System.out.println("Nomor Studio : " + daftarFilm[i].getStudio());

                // Meminta konfirmasi sebelum menghapus data
                System.out.print("\nYakin ingin menghapus data ini? (y/n): ");
                char konfirmasi = input.next().charAt(0);
                if (konfirmasi == 'y' || konfirmasi == 'Y') {
                    // Menggeser object setelah data yang dihapus
                    for (int j = i; j < jumlahFilm - 1; j++) {
                        daftarFilm[j] = daftarFilm[j + 1];
                    }
                    // Mengurangi jumlah object
                    jumlahFilm--;
                    // Mengosongkan posisi terakhir
                    daftarFilm[jumlahFilm] = null;
                    System.out.println("Film berhasil dihapus!");
                } else {
                    // Jika user menjawab selain y
                    System.out.println("Penghapusan dibatalkan.");
                }
                return;
            }
        }
        // Jika film tidak ditemukan
        System.out.println("Film tidak ditemukan.");
    }


    // Fungsi untuk menampilkan seluruh data film
    static void TampilData() {
        System.out.println("\n========================================");
        System.out.println("          DAFTAR SEMUA FILM");
        System.out.println("========================================");
        // Mengecek apakah array masih kosong
        if (jumlahFilm == 0) {
            System.out.println("Belum ada film.");
        } else {
            // Jika terdapat data, tampilkan semua object film
            for (int i = 0; i < jumlahFilm; i++) {
                System.out.println("ID Film      : " + daftarFilm[i].getIdFilm());
                System.out.println("Judul        : " + daftarFilm[i].getJudul());
                System.out.println("Genre        : " + daftarFilm[i].getGenre());
                System.out.println("Harga Tiket  : " + daftarFilm[i].getHargaTiket());
                System.out.println("Nomor Studio : " + daftarFilm[i].getStudio());
                System.out.println("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
            }
        }
    }


    // Fungsi utama program
    public static void main(String[] args) {
        // Nilai awal pilihan menu
        int pilihan = -1;
        // Menu akan terus berjalan selama pilihan bukan 0
        while (pilihan != 0) {
            // Menampilkan menu utama
            System.out.println("\n========================================");
            System.out.println("             MENU BIOSKOP");
            System.out.println("========================================");
            System.out.println("1. Tambah Data Film");
            System.out.println("2. Update Data Film");
            System.out.println("3. Hapus Data Film");
            System.out.println("4. Cari Data Film");
            System.out.println("5. Tampilkan Semua Film");
            System.out.println("0. Keluar");
            System.out.println("========================================");

            // Meminta pilihan menu dari user
            System.out.print("Masukkan pilihan: ");
            pilihan = input.nextInt();

            // Menjalankan fungsi sesuai pilihan user
            if (pilihan == 1) {
                TambahData();
            } else if (pilihan == 2) {
                UpdateData();
            } else if (pilihan == 3) {
                DeleteData();
            } else if (pilihan == 4) {
                CariData();
            } else if (pilihan == 5) {
                TampilData();
            // Jika user memilih 0, program selesai
            } else if (pilihan == 0) {
                System.out.println("Keluar dari Menu");
            // Jika input tidak sesuai pilihan menu
            } else {
                System.out.println("Pilihan tidak tersedia!");
            }
        }
        // Menutup Scanner
        input.close();
    }
}