addEventListener("load", inicio, false)
;

function inicio() {
    var primera = document.getElementById('primera');
    var segunda = document.getElementById('segunda');
    var boton = document.getElementById('boton')
    var resultado = document.getElementById('resultado');

    boton.addEventListener('click', function () {
        cPrimera(primera);
        cSegunda(segunda);
        cIncremento(primera, segunda);
    });


}

function cPrimera(primera) {
    if (primera < 0 || primera != 0) {
        resultado.innerHTML = "La primera es negativa o distinta de 0";
    } else {
        resultado.innerHTML = "La primera es igual a 0";
    }
}

function cSegunda(segunda) {
    if (segunda >= 0) {
        resultado.innerHTML = "La segunda es positiva";
    } else {
        resultado.innerHTML = "La segunda es negativa"
    }
}

function cIncremento(primera, segunda) {
    if ((primera + 1) >= segunda) {
        resultado.innerHTML = "Al sumar 1 a la primera iguala o supera a la segunda";
    } else {
        resultado.innerHTML = "Al sumar 1 a la primera no iguala o supera a la segunda";
    }
}