<?php

class Film {
    // Atribut yang dimiliki oleh object Film
    private int $IdFilm;
    private string $Judul;
    private string $Genre;
    private int $HargaTiket;
    private int $Studio;
    private string $Gambar;

    // Constructor untuk mengisi data awal object Film
    public function __construct(int $IdFilm, string $Judul, string $Genre, int $HargaTiket, int $Studio, string $Gambar){
        $this->IdFilm = $IdFilm;
        $this->Judul = $Judul;
        $this->Genre = $Genre;
        $this->HargaTiket = $HargaTiket;
        $this->Studio = $Studio;
        $this->Gambar = $Gambar;
    }

    // Setter digunakan untuk mengubah nilai atribut
    public function setIdFilm(int $IdFilm): void {
        $this->IdFilm = $IdFilm;
    }

    public function setJudul(string $Judul): void {
        $this->Judul = $Judul;
    }

    public function setGenre(string $Genre): void {
        $this->Genre = $Genre;
    }

    public function setHargaTiket(int $HargaTiket): void {
        $this->HargaTiket = $HargaTiket;
    }

    public function setStudio(int $Studio): void {
        $this->Studio = $Studio;
    }

    public function setGambar(string $Gambar): void {
        $this->Gambar = $Gambar;
    }

    // Getter digunakan untuk mengambil nilai atribut
    public function getIdFilm(): int {
        return $this->IdFilm;
    }

    public function getJudul(): string {
        return $this->Judul;
    }

    public function getGenre(): string {
        return $this->Genre;
    }

    public function getHargaTiket(): int {
        return $this->HargaTiket;
    }

    public function getStudio(): int {
        return $this->Studio;
    }

    public function getGambar(): string {
        return $this->Gambar;
    }
}