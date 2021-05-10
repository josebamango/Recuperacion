addEventListener("load", inicio, false);

function inicio() {
    /* ELEMENTOS DEL HTML */
    let addEdificio = document.getElementById("addEdificio");
    let addPropietario = document.getElementById("addPropietario");
    let calle = document.getElementById("calle");
    let numero = document.getElementById("numero");
    let cp = document.getElementById("cp");
    let npuertas = document.getElementById("npuertas");
    let nombre = document.getElementById("nombre");
    let planta = document.getElementById("planta");
    let nplantas = document.getElementById("nplantas");
    let nedificio = document.getElementById("nEdificio");
    let puerta = document.getElementById("puerta");
    let resultado = document.getElementById("resultado");
    let mostrar = document.getElementById("mostrar");
    /* EVENTOS */
    mostrar.addEventListener("click", function () {
        resultado.value = "";
        resultado.value += mostrarArray(arrayEdificios);
    }, false)
    let arrayEdificios = Array();
    addEdificio.addEventListener("click", function () {
        let ed = new Edificio(calle.value, numero.value, cp.value, crearArrayPlantas(nplantas.value));
        ed.addPlantasPuertas(parseInt(npuertas.value));
        arrayEdificios.push(ed);
    }, false);
    addPropietario.addEventListener("click", function () {
        arrayEdificios[nedificio.value-1].addPropietario(nombre.value, planta.value, puerta.value);
    }, false)
}

function mostrarArray(array) {
    let texto = "";
    for (const arrayElement of array) {
        texto += `${arrayElement.imprimirInfo()}\n${arrayElement.imprimePlantas()}\n\n`;
    }
    return texto;
}

function crearArrayPlantas(nPlantas) {
    let array = Array(nPlantas);
    for (let i = 0; i < nPlantas-1; i++) {
        array.push(i);
    }
    return array;
}