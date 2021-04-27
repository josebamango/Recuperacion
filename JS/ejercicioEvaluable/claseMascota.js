function Mascota(nombre, imagen, hambre, tope) {
    this.nombre = nombre;
    this.imagen = imagen;
    this.hambre = hambre;
    this.tope = tope;
    this.visualizar = visualizar();
    /*this.comer = comer();*/
}

/*function comer(tope) {
    this.hambre += 1;
}*/


function visualizar() {
    /*return "<img src=${this.imagen} class='img-fluid' id='${this.imagen}'>";*/
    return `Nombre: ${this.nombre}`;
}