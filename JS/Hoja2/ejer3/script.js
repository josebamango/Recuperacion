addEventListener('load', inicio, false);

function inicio() {
    var tabla = document.getElementById('tabla');
    var resultado = document.getElementById('resultado');
    var arraySalas = new Array();
    var cLibres = 0;
    var cOcupadas = 0;
    for (i = 0; i < 5; i++) {
        arraySalas[i] = new Array();
        tabla.innerHTML += "Sala " + (i + 1) + " => ";
        for (j = 0; j < 20; j++) {
            arraySalas[i][j] = Math.floor(Math.random() * 2) + 0;
            tabla.innerHTML += +arraySalas[i][j] + " | ";
            if (arraySalas[i][j] == 0) {
                cLibres++;
            } else {
                cOcupadas++;
            }
        };
        tabla.innerHTML += "\n";
    };
    console.log(arraySalas);
    console.log(cLibres);
    resultado.innerHTML = 'Hay ' + cLibres + " salas libres y " + cOcupadas + " salas ocupadas";
};