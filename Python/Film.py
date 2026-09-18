class Film:
    def __init__(self, IdFilm:int, Judul:str, Genre:str, HargaTiket:int, Studio:int):
        self.__IdFilm = int(IdFilm)
        self.__Judul = str(Judul)
        self.__Genre = str(Genre)
        self.__HargaTiket = str(HargaTiket)
        self.__Studio = str(Studio)

    # Setter
    def setIdFilm(self, IdFilm:int) -> None:
        self.__IdFilm = int(IdFilm)

    def setJudul(self, Judul:str) -> None:
        self.__Judul = str(Judul)

    def setGenre(self, Genre:str) -> None:
        self.__Genre = str(Genre)

    def setHargaTiket(self, HargaTiket:int) -> None:
        self.__HargaTiket = int(HargaTiket)

    def setStudio(self, Studio:int) -> None:
        self.__Studio = int(Studio)

    # Getter
    def getIdFilm(self) -> int:
        return self.__IdFilm

    def getJudul(self) -> str:
        return self.__Judul

    def getGenre(self) -> str:
        return self.__Genre

    def getHargaTiket(self) -> int:
        return self.__HargaTiket

    def getStudio(self) -> int:
        return self.__Studio
