addEventListener("load", inicio, false);

function inicio() {

    var nombre = document.getElementById('nombre');
    var imagen = document.getElementById('imagen');
    var hambre = document.getElementById('hambre');
    var tope = document.getElementById('tope');
    var crear = document.getElementById('crear');
    var mostrar = document.getElementById('mostrar');
    var resultado = document.getElementById('resultado');
    var arrayMascotas = Array();

    crear.addEventListener('click', function () {
        let pet = new Mascota(nombre.value, imagen.name, hambre.value, tope.value);
        arrayMascotas.push(pet);
    }, false)

    mostrar.addEventListener("click", function () {
        resultado.value = "";
        resultado.value += mostrarArray(arrayMascotas);
        console.log(imagen.name);
    }, false)

}

/*function mostrarArray(array) {
    let texto = "";
    for (const arrayElement of array) {
        texto += `${arrayElement.visualizar()}\n`;
    }
    return texto;
}*/

function mostrarArray(array) {
    var texto = "";
    for (var i = 0; i < array.length; i++) {
        texto += "<img class='img-fluid' src:'" + array[i].imagen + "'\n";
    }
    return texto;
}

