#include <iostream>
#include <string>
#include "Film.cpp"

using namespace std;

// Array untuk menyimpan kumpulan object film
Film daftarFilm[100];
// Menyimpan jumlah object film yang digunakan
int jumlahFilm = 0;

// Fungsi untuk menambahkan film
void TambahData(){
    // Mengecek apakah jumlah data sudah mencapai kapasitas array
    if (jumlahFilm >= 100){
        cout << "Data film sudah penuh!" << endl;
        return;
    }
    cout << "\n--------------- Add Data ---------------" << endl;
    // Variabel untuk menyimpan data film yang akan ditambahkan
    int IdFilm;
    string Judul;
    string Genre;
    int HargaTiket;
    int Studio;

    // Memasukkan IdFilm, Judul, Genre, HargaTiket, Studio
    cout << "Masukkan ID Film: ";
    cin >> IdFilm;
    cin.ignore();
    
    cout << "Masukkan Judul Film: "; 
    getline(cin, Judul); 

    cout << "Masukkan Genre Film: ";
    getline(cin, Genre);
    
    cout << "Masukkan Harga Tiket: ";
    cin >> HargaTiket;
    
    cout << "Masukkan Nomor Studio: ";
    cin >> Studio;
    
    // Membuat object FilmBaru menggunakan data yang telah dimasukkan
    Film FilmBaru{
        IdFilm,
        Judul,
        Genre,
        HargaTiket,
        Studio
    };
    // Menyimpan object FilmBaru ke dalam array
    daftarFilm[jumlahFilm] = FilmBaru;
    // Menambah jumlah data film
    jumlahFilm++;
    cout << "Film berhasil ditambahkan!" << endl;
}

// Fungsi untuk mencari data
void CariData(){
    cout << "\n-------------- Cari Data ---------------" << endl;
    // Variabel untuk menyimpan IdFilm yang dicari
    int IdFilm;
    cout << "Masukkan ID Film yang dicari: ";
    cin >> IdFilm;

    // Melakukan pencarian pada seluruh data filmm
    for (int i = 0; i < jumlahFilm; i++){
        // Membandingkan IdFilm pada array dengan yang dicari
        if(daftarFilm[i].getIdFilm() == IdFilm){
            // Menampilkan data film yang ditemukan
            cout << "\nData Ditemukan" << endl;
            cout << "ID Film      : " << daftarFilm[i].getIdFilm() << endl;
            cout << "Judul        : " << daftarFilm[i].getJudul() << endl;
            cout << "Genre        : " << daftarFilm[i].getGenre() << endl;
            cout << "Harga Tiket  : " << daftarFilm[i].getHargaTiket() << endl;
            cout << "Nomor Studio : " << daftarFilm[i].getStudio() << endl;
            return;
        }
    }
    // Pesan jika IDFilm tidak ditemukan
    cout << "Film tidak ditemukan." << endl;
}

// Fungsi untuk melakukan perubahan pada data
void UpdateData(){
    cout << "\n------------- Update Data --------------" << endl;
    // Variabel untuk menyimpan IDFilm yang ingin diubah
    int IdFilm;
    cout << "Masukkan ID Film yang ingin diubah: ";
    cin >> IdFilm;
    cin.ignore();

    // Mencari film berdasarkan ID
    for (int i = 0; i < jumlahFilm; i++){
        if (daftarFilm[i].getIdFilm() == IdFilm){
            // Variabel untuk menyimpan data perubahan
            string Judul;
            string Genre;
            int HargaTiket;
            int Studio;
            
            cout << "Judul Film baru: ";
            getline(cin, Judul);
            
            cout << "Genre Film baru: ";
            getline(cin, Genre);

            cout << "Harga Tiket baru: ";
            cin >> HargaTiket;

            cout << "Nomor Studio baru: ";
            cin >> Studio;

            // Mengubah data object menggunakan setter
            daftarFilm[i].setJudul(Judul);
            daftarFilm[i].setGenre(Genre);
            daftarFilm[i].setHargaTiket(HargaTiket);
            daftarFilm[i].setStudio(Studio);
            cout << "Film berhasil diubah!" << endl;
            return;
        }
    }
    cout << "Film tidak ditemukan." << endl;
}

void DeleteData(){
    cout << "\n-------------- Hapus Data --------------" << endl;
    // Variabel untuk menyimpan IdFilm yang ingin dihapus
    int IdFilm;

    cout << "Masukkan ID Film yang ingin dihapus: "; 
    cin >> IdFilm;

    // Mencari film berdasarkan id
    for (int i = 0; i < jumlahFilm; i++){
        // Menampilkan data film yang ingin dihapus
        if (daftarFilm[i].getIdFilm() == IdFilm){
            cout << "\nData Film ditemukan!" << endl;
            cout << "ID Film      : " << daftarFilm[i].getIdFilm() << endl;
            cout << "Judul        : " << daftarFilm[i].getJudul() << endl;
            cout << "Genre        : " << daftarFilm[i].getGenre() << endl;
            cout << "Harga Tiket  : " << daftarFilm[i].getHargaTiket() << endl;
            cout << "Nomor Studio : " << daftarFilm[i].getStudio() << endl;

            char konfirmasi;
            cout << "\nYakin ingin menghapus data ini? (y/n): ";
            cin >> konfirmasi;

            // Mengecek apakah pengguna menyetujui penghapusan
            if (konfirmasi == 'y' || konfirmasi == 'Y'){
                // Menggeser object setelah data dihapus
                for (int j = i; j < jumlahFilm - 1; j++){
                    daftarFilm[j] = daftarFilm[j + 1];
                }
                // Mengurangi jumlah data karena data telah dihapus
                jumlahFilm--;
                cout << "Film berhasil dihapus!" << endl;
            } else {
                cout << "Penghapusan dibatalkan." << endl;
            }
            return;
        }
    }
    cout << "Film tidak ditemukan." << endl;
}

// Fungsi untuk menampilkan semua data yang ada 
void TampilData(){
    cout << "\n========================================" << endl;
    cout << "          DAFTAR SEMUA FILM" << endl;
    cout << "========================================" << endl;

    // Mengecek apakah belum ada data film
    if (jumlahFilm == 0){
        cout << "Belum ada film." << endl;
    } else {
        // Menampilkan seluruh object film yang tersedia
        for (int i = 0; i < jumlahFilm; i++) {
            cout << "ID Film      : " << daftarFilm[i].getIdFilm() << endl;
            cout << "Judul        : " << daftarFilm[i].getJudul() << endl;
            cout << "Genre        : " << daftarFilm[i].getGenre() << endl;
            cout << "Harga Tiket  : " << daftarFilm[i].getHargaTiket() << endl;
            cout << "Nomor Studio : " << daftarFilm[i].getStudio() << endl;
            cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~" << endl;
        }
    }
}

int main(){
    // Variabel untuk menyimpan pilihan menu dari pengguna
    int pilihan = -1;
    // Menampilkan menu utama
    while (pilihan != 0){
        cout << "\n========================================" << endl;
        cout << "             MENU BIOSKOP" << endl;
        cout << "========================================" << endl;
        cout << "1. Tambah Data Film" << endl;
        cout << "2. Update Data Film" << endl;
        cout << "3. Hapus Data Film" << endl;
        cout << "4. Cari Data Film" << endl;
        cout << "5. Tampilkan Semua Film" << endl;
        cout << "0. Keluar" << endl;
        cout << "========================================" << endl;

        // Memanggil fungsi sesuai pilihan
        cout << "Masukkan pilihan: ";
        cin >> pilihan;
        if (pilihan == 1){
            TambahData();
        } else if (pilihan == 2){
            UpdateData();
        } else if (pilihan == 3){
            DeleteData();
        } else if (pilihan == 4){
            CariData();
        } else if (pilihan == 5){
            TampilData();
        } else if (pilihan == 0){
            cout << "Keluar dari Menu" << endl;
        } else {
            cout << "Pilihan tidak tersedia!" << endl;
        }
    }
    return 0;
}
