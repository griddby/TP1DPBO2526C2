import java.util.Scanner;

// Membuat kelas Film
public class Film {
    // Atribut
    private int IdFilm;
    private String Judul;
    private String Genre;
    private int HargaTiket;
    private int Studio;

    // Konstruktor
    public Film(){ 
    }
    public Film(int IdFilm, String Judul, String Genre, int HargaTiket, int Studio){
        this.IdFilm = IdFilm;
        this.Judul = Judul;
        this.Genre = Genre;
        this.HargaTiket = HargaTiket;
        this.Studio = Studio;
    }

    // Setter
    public void setIdFilm(int IdFilm){
        this.IdFilm = IdFilm;
    }

    public void setJudul(String Judul){
        this.Judul = Judul;
    }
    
    public void setGenre(String Genre){
        this.Genre = Genre;
    }
    
    public void setHargaTiket(int HargaTiket){
        this.HargaTiket = HargaTiket;
    }
    
    public void setStudio(int Studio){
        this.Studio = Studio;
    }
    
    // Getter
    public int getIdFilm(){
        return IdFilm;
    }

    public String getJudul(){
        return Judul;
    }

    public String getGenre(){
        return Genre;
    }

    public int getHargaTiket(){
        return HargaTiket;
    }

    public int getStudio(){
        return Studio;
    }
}