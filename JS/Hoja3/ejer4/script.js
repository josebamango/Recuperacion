addEventListener("load", inicio, false);

function inicio() {

    var boton = document.getElementById('boton')
    var reset = document.getElementById('reset')
    var resultado1 = document.getElementById('resultado1');
    var resultado2 = document.getElementById('resultado2');
    var resultado3 = document.getElementById('resultado3');
    var array1 = new Array();
    var array2 = new Array();
    var array3 = new Array();


    boton.addEventListener("click", function () {
        var filas1 = Math.floor(Math.random() * 20);
        var filas2 = Math.floor(Math.random() * 20);
        array1 = [];
        array2 = [];
        array3 = [];
        for (i = 0; i < filas1; i++) {
            var numeros1 = Math.floor(Math.random() * 50);
            array1.push(numeros1);
            resultado1.innerHTML = array1.join('-');
        }
        for (i = 0; i < filas2; i++) {
            var numeros2 = Math.floor(Math.random() * 50);
            array2.push(numeros2);
            resultado2.innerHTML = array2.join('-');
        }
        if (filas1 > filas2 || filas1 == filas2) {
            for (i = 0; i < filas1; i++) {
                array3[i] = array1[i] + array2[i];
                if (isNaN(array3[i])){
                    array3[i]=array1[i];
                }
            }
            resultado3.innerHTML = array3.join('-');
        } else {
            for (i = 0; i < filas2; i++) {
                array3[i] = array1[i] + array2[i];
                if (isNaN(array3[i])){
                    array3[i]=array2[i];
                }
            }
            resultado3.innerHTML = array3.join('-');

        }


    });


}

