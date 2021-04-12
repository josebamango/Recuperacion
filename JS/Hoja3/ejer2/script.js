addEventListener("load", inicio, false);

function inicio() {
    var concursantes = document.getElementById('concursantes');
    var ganador = document.getElementById('ganador');
    var boton = document.getElementById('boton');
    var reset = document.getElementById('reset');
    var alumnos = new Array('Joseba', 'Alex', 'Carlos', 'Berto', 'Cristian', 'Pablo', 'Victor', 'Corral');
    concursantes.innerHTML = alumnos.join('-');
    boton.addEventListener('click', function () {
        sorteo(alumnos);
    }, false);

    reset.addEventListener('click', function () {
        resetear();
    }, false)

    function sorteo(alumnos) {
        var limite = alumnos.length;
        var random = Math.floor(Math.random() * limite);
        ganador.innerHTML = alumnos[random];
        alumnos.splice(random, 1);
        concursantes.innerHTML = alumnos.join('-');
        return [alumnos[random], random];
    }

    function resetear() {
        var aux = new Array('Joseba', 'Alex', 'Carlos', 'Berto', 'Cristian', 'Pablo', 'Victor', 'Corral');
        concursantes.innerHTML = aux.join('-');
    }

}

