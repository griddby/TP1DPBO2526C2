class Studio:
    def __init__(self, IdStudio:int, Nomor:int, Jenis:str, HargaTiket:int, Kapasitas:int, Layar:str, SoundSystem:str, Status:str):
        self.__IdStudio = int(IdStudio)
        self.__Nomor = int(Nomor)
        self.__Jenis = str(Jenis)
        self.__HargaTiket = int(HargaTiket)
        self.__Kapasitas = int(Kapasitas)
        self.__Layar = str(Layar)
        self.__SoundSystem = str(SoundSystem)
        self.__Status = str(Status)

    # Setter
    def setIdStudio(self, IdStudio:int) -> None:
        self.__IdStudio = int(IdStudio)

    def setNomor(self, Nomor:int) -> None:
        self.__Nomor = int(Nomor)

    def setJenis(self, Jenis:str) -> None:
        self.__Jenis = str(Jenis)

    def setHargaTiket(self, HargaTiket:int) -> None:
        self.__HargaTiket = int(HargaTiket)

    def setKapasitas(self, Kapasitas:int) -> None:
        self.__Kapasitas = int(Kapasitas)

    def setLayar(self, Layar:str) -> None:
        self.__Layar = str(Layar)

    def setSoundSystem(self, SoundSystem:str) -> None:
        self.__SoundSystem = str(SoundSystem)

    def setStatus(self, Status:str) -> None:
        self.__Status = str(Status)

    # Getter
    def getIdStudio(self) -> int:
        return self.__IdStudio

    def getNomor(self) -> int:
        return self.__Nomor

    def getJenis(self) -> str:
        return self.__Jenis

    def getHargaTiket(self) -> int:
        return self.__HargaTiket

    def getKapasitas(self) -> int:
        return self.__Kapasitas

    def getLayar(self) -> str:
        return self.__Layar

    def getSoundSystem(self) -> str:
        return self.__SoundSystem

    def getStatus(self) -> str:
        return self.__Status
        
