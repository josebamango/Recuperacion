addEventListener('load', inicio, false);

function inicio() {
    var tabla = document.getElementById('tabla');
    var resultado = document.getElementById('resultado');
    var total = document.getElementById('total')
    var arraySalas = new Array();
    var tLibres = 0;
    var tOcupados = 0;
    for (i = 0; i < 5; i++) {
        arraySalas[i] = new Array();
        tabla.innerHTML += "Sala " + (i + 1) + " => ";
        var libres = 0;
        var ocupados = 0;
        for (j = 0; j < 20; j++) {
            arraySalas[i][j] = Math.floor(Math.random() * 2) + 0;
            var imagen = document.createElement('img');
            if (arraySalas[i][j] == 0) {
                imagen.setAttribute('src','libre.png');
                tabla.appendChild(imagen);
                tLibres++;
                libres++;
            } else {
                imagen.setAttribute('src','ocupado.png');
                tabla.appendChild(imagen);
                ocupados++;
                tOcupados++;
            }
        }
        ;
        tabla.innerHTML += "<br>";
        resultado.innerHTML += 'En la sala ' + (i + 1) + ' hay ' + libres + " ordenadores libres y  " + ocupados + " ocupados\n";
    }
    ;
    console.log(arraySalas);
    total.innerHTML += 'Hay en total ' + tLibres + " ordenadores libres y  " + tOcupados + " ocupados";

};