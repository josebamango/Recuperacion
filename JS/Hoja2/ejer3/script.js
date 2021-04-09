addEventListener('load', inicio, false);

function inicio() {
    var tabla = document.getElementById('tabla');
    var resultado = document.getElementById('resultado');
    var total = document.getElementById('total');
    var sala = document.getElementById('sala');
    var ordenador = document.getElementById('ordenador');
    var reservar = document.getElementById('reservar');
    var liberar = document.getElementById('liberar');
    var tLibres = 0;
    var tOcupados = 0;
    var cLiberar=0;
    var cRerservar=0;
    var arraySalas = new Array();

    pintar();


    function pintar() {
        for (i = 0; i < 5; i++) {
            arraySalas[i] = new Array();
            tabla.innerHTML += "Sala " + (i + 1) + " => ";
            var libres = 0;
            var ocupados = 0;
            for (j = 0; j < 20; j++) {
                arraySalas[i][j] = Math.floor(Math.random() * 2) + 0;
                var imagen = document.createElement('img');
                if (arraySalas[i][j] == 0) {
                    imagen.setAttribute('src', 'libre.png');
                    tabla.appendChild(imagen);
                    tLibres++;
                    libres++;
                } else {
                    imagen.setAttribute('src', 'ocupado.png');
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
        total.innerHTML += 'Hay en total ' + tLibres + " ordenadores libres y  " + tOcupados + " ocupados";
    };


    reservar.addEventListener("click", function () {
        cRerservar++;
        modificar(1);
    }, false)

    liberar.addEventListener("click", function () {
        cLiberar++;
        modificar(0);
    }, false)

    function modificar(indice) {
        var salaSelected = sala.options[sala.selectedIndex].value;
        var ordenadorSelected = ordenador.options[ordenador.selectedIndex].value;
        arraySalas[salaSelected - 1][ordenadorSelected - 1] = indice;
        document.getElementById('tabla').remove();
        var tabla2 = document.createElement('div');
        tabla2.setAttribute('class', 'mt-5 mb-5 border border-dark p-3')
        tabla2.setAttribute('id', 'tabla');
        document.getElementById('tablas').appendChild(tabla2);
        resultado.innerHTML = '';
        total.innerHTML = '';
        tLibres = 0;
        tOcupados = 0;
        for (i = 0; i < arraySalas.length; i++) {
            var libres = 0;
            var ocupados = 0;
            tabla2.innerHTML += "Sala " + (i + 1) + " => ";
            for (j = 0; j < arraySalas[i].length; j++) {
                var imagen = document.createElement('img');
                if (arraySalas[i][j] == 0) {
                    imagen.setAttribute('src', 'libre.png');
                    tabla2.appendChild(imagen);
                    libres++;
                    tLibres++;
                } else {
                    imagen.setAttribute('src', 'ocupado.png');
                    tabla2.appendChild(imagen);
                    ocupados++;
                    tOcupados++;
                }
            }
            tabla2.innerHTML += "<br>";
            resultado.innerHTML += 'En la sala ' + (i + 1) + ' hay ' + libres + " ordenadores libres y  " + ocupados + " ocupados\n";
        }
        total.innerHTML += 'Hay en total ' + tLibres + " ordenadores libres y  " + tOcupados + " ocupados\n"+" Has hecho " + cRerservar +" reservas y has hecho otras "+ cLiberar+" liberaciones";
    }

}


