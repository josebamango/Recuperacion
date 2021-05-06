function Habitacion(nPlanta, nHabitacion, codPaciente, foto, tratamientos) {
    this.nPlanta = nPlanta;
    this.nHabitacion = nHabitacion;
    this.codPaciente = codPaciente;
    this.foto = foto;
    this.tratamientos =new Array();
    this.addTratamiento = addTratamiento;
    this.info = info;

}

function addTratamiento(tr) {
    tratamientos.push(tr);
}

function infoTratamientos() {
    return this.tratamientos.join("-");
}

function infoGeneral() {
    return `Planta: ${this.nPlanta}, Habitación Nº: ${this.nHabitacion}, CodP: ${this.codPaciente}`;
}



