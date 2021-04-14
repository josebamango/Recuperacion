addEventListener("load", inicio, false);

function inicio() {
    var valores = document.getElementById('valores');
    var resultado = document.getElementById('resultado');
    var boton = document.getElementById('boton');
    var arrayValores = new Array();

    boton.addEventListener('click', function () {
        arrayValores=[];
        valores.innerHTML = addValores();
        resultado.innerHTML = "La suma de todos los valores es " + suma(arrayValores) + "\nLa suma de los mayores de 36 es " + suma36(arrayValores) + "\nHay " + suma50(arrayValores) + " valores mayores de 50";
    }, false);


    function addValores() {
        for (i = 0; i < 8; i++) {
            var random = Math.floor(Math.random() * 100);
            arrayValores.push(random);
        }
        return arrayValores.join('-');
    }

    function suma(arrayValores) {
        let total = arrayValores.reduce((a, b) => a + b, 0);
        return total;
    }

    function suma36(arrayValores) {
        var aux = 0;
        for (i = 0; i < 8; i++) {
            if (arrayValores[i] > 36) {
                aux += arrayValores[i];
            }
        }
        return aux;
    }


    function suma50(arrayValores) {
        var aux = 0;
        for (i = 0; i < 8; i++) {
            if (arrayValores[i] > 50) {
                aux++;
            }
        }
        return aux;
    }

}

