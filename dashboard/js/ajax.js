function loadXMLDocUsers() {
    var xmlhttp;
    var lugar = ("ajax");
    var n = document.getElementById('buscar').value;

    if (n == '') {
        document.getElementById("mytable").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mytable").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("POST", "../users/proc.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send('q=' + n + '&lugar=' + lugar);


}
//funcion de tipo usuario
function loadXMLDocTipeUsers() {


    var xmlhttp;
    var lugar = ("ajax");
    var n = document.getElementById('buscar').value;

    if (n == '') {
        document.getElementById("mytable").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mytable").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("POST", "../tipeusers/proc.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send('q=' + n + '&lugar=' + lugar);


}
//funcion de categorias
function loadXMLDocCategories() {


    var xmlhttp;
    var lugar = ("ajax");
    var n = document.getElementById('buscar').value;

    if (n == '') {
        document.getElementById("mytable").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mytable").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("POST", "../categories/proc.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send('q=' + n + '&lugar=' + lugar);


}
//Productos
function loadXMLDocProducts() {


    var xmlhttp;
    var lugar = ("ajax");
    var n = document.getElementById('buscar').value;

    if (n == '') {
        document.getElementById("mytable").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mytable").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("POST", "../products/proc.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send('q=' + n + '&lugar=' + lugar);


}




//clientes
function loadXMLDocClientes() {


    var xmlhttp;
    var lugar = ("ajax");
    var n = document.getElementById('buscar').value;

    if (n == '') {
        document.getElementById("mytable").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mytable").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("POST", "../clients/proc.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send('q=' + n + '&lugar=' + lugar);


}

var cars = [];
function appendToList() {

    /*var sumP = 0;
       var cuantosLi = 0;
       jQuery("ul.jt-menu:first").children("li").each(function(index) {
           sumP = parseInt(jQuery(this).width());      
           cuantosLi = cuantosLi+1;
       });*/

    var combo = document.getElementById("productos");
    var selected = combo.options[combo.selectedIndex].text;
    var value = $("#productos").val();
    var yea = document.getElementById("mitablita").rows.length;
    var arr = yea - 1;
    var repetido = 0;

    if (selected != "Seleccione una opción") {

        cars[arr] = selected;

        if (arr == 0) {
            var listItem = "<tr> <td>" + cars[arr] + "</td> <td><a class='red-text'><i class='material-icons'>delete</i></a></td></tr>";
            $("#items").append(listItem);

        }
        else {
            for (i = 0; arr - 1 >= i; i++) {
                if (cars[i] == selected) {
                    repetido = 1
                }

            }
            if (repetido == 0) {
                var listItem = "<tr> <td>" + cars[arr] + "</td> <td><a class='red-text'><i class='material-icons'>delete</i></a></td></tr>";
                $("#items").append(listItem);
            }

        }

    }
}

function rojo(cantidad) {

    //document.body.style.backgroundColor = "blue";
    var yea = document.getElementById("mitablita").rows.length;
    var arr = yea - 1;
    var cant = cantidad;
    for (i = 1, o = 0; cant >= i; i++ , o++) {
        cars[o] = document.getElementById("mitablita").rows[i].cells[0].innerHTML;

    }


}


function datos() {


    var productos = { "data": cars };
    return productos;
}
function guardarlala(id) {

document.body.style.backgroundColor = "blue";
    var json = JSON.stringify(datos());

    ajaxF("prod.php?id=" + id, { "json": json })

        .done(function (info) {

            console.log(info);
        });
}
function ajaxF(url, data) {
    var ajaxs = $.ajax({
        "method": "POST",
        "url": url,
        "data": data
    })
    return ajaxs;
}