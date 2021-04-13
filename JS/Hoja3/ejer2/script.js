addEventListener("load", inicio, false);

function inicio() {
    var concursantes = document.getElementById('concursantes');
    var ganador = document.getElementById('ganador');
    var boton = document.getElementById('boton');
    var reset = document.getElementById('reset');
    var alumnos = new Array('Joseba', 'Alex', 'Carlos', 'Berto', 'Cristian', 'Pablo', 'Victor', 'Corral');
    concursantes.innerHTML = alumnos.join('-');
    var contador = 0;

    boton.addEventListener('click', function () {
        contador++;
        if(contador<9){
            [n1, cifra] = sorteo(alumnos);
            console.log(n1 + cifra);
            ganador.innerHTML = n1 + " " + cifra;
            concursantes.innerHTML = alumnos.join('-');
        }

    }, false);

    reset.addEventListener('click', function () {
        resetear();
    }, false)

    function sorteo(alumnos) {
        var limite = alumnos.length;
        var random = Math.floor(Math.random() * limite);
        alumnos.splice(random, 1);
        return [alumnos[random], contador];
    }

    function resetear() {
        var aux = new Array('Joseba', 'Alex', 'Carlos', 'Berto', 'Cristian', 'Pablo', 'Victor', 'Corral');
        alumnos = aux;
        concursantes.innerHTML = aux.join('-');
        ganador.innerHTML = '';
        contador=0;
    }


}

