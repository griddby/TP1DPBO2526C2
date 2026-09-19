#include <iostream>
#include <string>

using namespace std;

// Membuat kelas film
class Film {
    private:
        int IdFilm;
        string Judul;
        string Genre;
        int HargaTiket;
        int Studio;

    public:
        // Constructor kosong
        Film() {
        }

        // Constructor berparameter
        Film(int IdFilm, string Judul, string Genre, int HargaTiket, int Studio){
            this->IdFilm = IdFilm;
            this->Judul = Judul;
            this->Genre = Genre;
            this->HargaTiket = HargaTiket;
            this->Studio = Studio;
        }

        // Setter
        void setIdFilm(int IdFilm){
            this->IdFilm = IdFilm;
        }
        
        void setJudul(string Judul){
            this->Judul = Judul;
        }
        
        void setGenre(string Genre){
            this->Genre = Genre;
        }
        
        void setHargaTiket(int HargaTiket){
            this->HargaTiket = HargaTiket;
        }
        
        void setStudio(int Studio){
            this->Studio = Studio;
        }
        
        // Getter
        int getIdFilm(){
            return IdFilm;
        }

        string getJudul(){
            return Judul;
        }

        string getGenre(){
            return Genre;
        }

        int getHargaTiket(){
            return HargaTiket;
        }

        int getStudio(){
            return Studio;
        }

        // Destruktor
        ~Film(){
        }
};