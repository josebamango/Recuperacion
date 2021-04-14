addEventListener("load", inicio, false);

function inicio() {

    var boton = document.getElementById('boton')
    var array1 = new Array();
    var array2 = new Array();


    boton.addEventListener("click", function () {
        for (i = 0; i < longitud(); i++) {
            array1.push(valores());
            console.log("esto es un valor " + valores());
        }
        console.log("este es el array " + array1);
        console.log("tiene estas filas " + longitud());
    })


    function longitud() {
        var filas = Math.floor(Math.random() * 20);
        return filas;
    };

    function valores() {
        var numeros = Math.floor(Math.random() * 50);
        return numeros;
    }
}

