addEventListener("load", inicio, false);

function inicio() {
    var primera = document.getElementById('primera');
    var segunda = document.getElementById('segunda');
    var boton = document.getElementById('boton')
    var resultado = document.getElementById('resultado');

    boton.addEventListener('click', function () {
        cPrimera(primera.value);
        cSegunda(segunda.value);
        cIncremento(primera.value, segunda.value);
    });


}

function cPrimera(primera) {
    if (primera < 0 || primera != 0) {
        resultado.innerHTML = "La primera es negativa o distinta de 0\n";
    } else {
        resultado.innerHTML = "La primera es igual a 0\n";
    }
}

function cSegunda(segunda) {
    if (segunda >= 0) {
        resultado.innerHTML += "La segunda es positiva\n";
    } else {
        resultado.innerHTML += "La segunda es negativa\n"
    }
}

function cIncremento(primera, segunda) {
    if ((primera + 1) >= segunda) {
        resultado.innerHTML += "Al sumar 1 a la primera iguala o supera a la segunda";
    } else {
        resultado.innerHTML += "Al sumar 1 a la primera no iguala o supera a la segunda";
    }
}