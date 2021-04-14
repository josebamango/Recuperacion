addEventListener("load", inicio, false);

function inicio() {
    var cadena = document.getElementById('cadena');
    var añadir = document.getElementById('añadir');
    var mostrar = document.getElementById('mostrar');
    var resultado1 = document.getElementById('resultado1');
    var resultado2 = document.getElementById('resultado2');
    var resultado3 = document.getElementById('resultado3');
    var resultado4 = document.getElementById('resultado4');
    var arrayCadena = new Array();
    var start = 0;
    var ventana = window.open(URL, 'popup', "width=500,height=500,scrollbars=NO");
    ventana.setInterval(mover, 10);

    function mover() {
        do {
            start += 2;
            ventana.moveTo(start, 200);
        } while (start < 10);


    }

    añadir.addEventListener("click", function () {
        addPalabras();
        console.log(arrayCadena);
    });

    mostrar.addEventListener("click", function () {
        primera();
        ultima();
        nPalabras();
        ordenadas();
    })

    function addPalabras() {
        arrayCadena.push(cadena.value);

    }

    function primera() {
        return resultado1.innerHTML += "La primera palabra introducida fue " + arrayCadena[0];
    }

    function ultima() {
        return resultado2.innerHTML += "La última palabra introducida fue " + arrayCadena[arrayCadena.length - 1];
    }

    function nPalabras() {
        return resultado3.innerHTML += "Has introducido " + arrayCadena.length + " palabras";
    }

    function ordenadas() {
        return resultado4.innerHTML = arrayCadena.sort();
    }


}

