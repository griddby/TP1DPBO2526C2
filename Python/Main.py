from Film import Film

# List untuk menyimpan kumpulen object film
daftarFilm = [] 

# Fungsi untuk menambahkan data film
def TambahData():
    print("--------------- Add Data ---------------")
    # Meminta input data dari film dari user
    IdFilm = int(input("Masukkan ID Film: "))
    Judul = str(input("Masukkan Judul Film: "))
    Genre = str(input("Masukkan Genre Film: "))
    HargaTiket = int(input("Masukkan Harga Tiket: "))
    Studio = int(input("Masukkan Nomor Studio: "))

    # Membuat object film baru berdasarkan data masukkan
    FilmBaru = Film(
        IdFilm,
        Judul,
        Genre,
        HargaTiket,
        Studio
    )
    # Menambahkan object film ke dalam data list
    daftarFilm.append(FilmBaru)
    print("Film berhasil ditambahkan!")

# Fungsi untuk mencari data film berdasarkan ID Film
def CariData():
    print("-------------- Cari Data ---------------")
    # Meminta ID Film yang ingin dicari
    IdFilm = int(input("Masukkan IdFilm yang dicari: "))

    # Melakukan pencarian pada setiap object film di dalam list
    for film in daftarFilm:
        # Mengecek apakah ID Film sesuai dengan ID yang dicari
        if film.getIdFilm() == IdFilm:
            # Menampilkan data film yang ditemukan
            print("Data Ditemukan")
            print("ID Film      :", film.getIdFilm())
            print("Judul        :", film.getJudul())
            print("Genre        :", film.getGenre())
            print("Harga Tiket  :", film.getHargaTiket())
            print("Nomor Studio :", film.getStudio())
            return
    # Jika perulangan selesai dan data tidak ditemukan
    print("Film tidak ditemukan")

# Fungsi untuk mengubah data film
def UpdateData():
    print("------------- Update Data --------------")

    # Meminta ID film yang ingin dicari
    IdFilm = int(input("Masukkan ID Film yang ingin diubah: "))

    # Mencari film berdasarkan ID
    for film in daftarFilm:
        if film.getIdFilm() == IdFilm:
            # Meminta data baru dari user
            Judul = input("Judul Film baru: ")
            Genre = input("Genre Film baru: ")
            HargaTiket = int(input("Harga Tiket baru: "))
            Studio = int(input("Nomor Studio baru: "))

            # Mengubah atribut object menggunakan setter
            film.setJudul(Judul)
            film.setGenre(Genre)
            film.setHargaTiket(HargaTiket)
            film.setStudio(Studio)
            print("Film berhasil diubah!")
            return
    # Jika film tidak ditemukan
    print("Film tidak ditemukan.")

# Fungsi untuk menghapus data film
def DeleteData():
    print("-------------- Hapus Data --------------")
    # Meminta ID film yang ingin dihapus
    IdFilm = int(input("Masukkan ID Film yang ingin dihapus: "))

    # Mencari object film berdasarkan ID
    for film in daftarFilm:
        if film.getIdFilm() == IdFilm:
            # Menampilkan data sebelum dihapus
            print("\nData Film ditemukan!")
            print("ID Film      :", film.getIdFilm())
            print("Judul        :", film.getJudul())
            print("Genre        :", film.getGenre())
            print("Harga Tiket  :", film.getHargaTiket())
            print("Nomor Studio :", film.getStudio())

            # Meminta konfirmasi sebelum menghapus data
            konfirmasi = input("\nYakin ingin menghapus data ini? (y/n): ")
            if konfirmasi.lower() == "y":
                daftarFilm.remove(film)
                print("Film berhasil dihapus!")
            # Jika user menjawab selain y
            else:
                print("Penghapusan dibatalkan.")
            return
    # Jika film tidak ditemukan
    print("Film tidak ditemukan.")

# Fungsi untuk menampilkan seluruh data film
def TampilData():
    print("\n========================================")
    print("          DAFTAR SEMUA FILM")
    print("========================================")

    # Mengecek apakah list masih kosong
    if len(daftarFilm) == 0:
        print("Belum ada film.")

    # Jika terdapat data, tampilkan semua object film
    for film in daftarFilm:
        print("ID Film      :", film.getIdFilm())
        print("Judul        :", film.getJudul())
        print("Genre        :", film.getGenre())
        print("Harga Tiket  :", film.getHargaTiket())
        print("Nomor Studio :", film.getStudio())
        print("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~")

# Nilai awal pilihan menu
pilihan = -1
# Menu akan terus berjalan selama pilihan bukan 0
while pilihan != 0:
    # Menampilkan menu utama
    print("\n========================================")
    print("             MENU BIOSKOP")
    print("========================================")
    print("1. Tambah Data Film")
    print("2. Update Data Film")
    print("3. Hapus Data Film")
    print("4. Cari Data Film")
    print("5. Tampilkan Semua Film")
    print("0. Keluar")
    print("========================================")

    # Meminta pilihan menu dari user
    pilihan = int(input("Masukkan pilihan: "))

    # Menjalankan fungsi sesuai pilihan user
    if pilihan == 1:
        TambahData()
    elif pilihan == 2:
        UpdateData()
    elif pilihan == 3:
        DeleteData()
    elif pilihan == 4:
        CariData()
    elif pilihan == 5:
        TampilData()
    # Jika user memilih 0, program selesai
    elif pilihan == 0:
        print("Keluar dari Menu")
    # Jika input tidak sesuai pilihan menu
    else:
        print("Pilihan tidak tersedia:")