addEventListener("load", inicio, false);

function inicio() {
    var cadena = document.getElementById('cadena');
    var boton = document.getElementById('boton');
    var resultado = document.getElementById('resultado');

    boton.addEventListener('click', function () {
        console.log(cadena.value);
        var mayus = cadena.value.toUpperCase();
        var minus = cadena.value.toLowerCase();
        console.log(mayus);
        if (cadena.value == mayus) {
            resultado.innerHTML = "La cadena está escrita es mayúsculas";
        } else if(cadena.value==minus) {
            resultado.innerHTML = "La cadena está escrita en minúsculas";
        }else{
            resultado.innerHTML="La cadena está escrita en mayúsculas y minúsculas"
        }
    }, false)
}