function usersvacios(name) {
elemento = document.getElementById(name).value; 
if (!elemento){ 
loadXMLDocUsersy();

   }
} 

function loadXMLDocUsersy()
{      
    
var xmlhttp;
var lugar=("busquedas");
var n=document.getElementById('buscar').value;



if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("mytable").innerHTML=xmlhttp.responseText;
}
}

xmlhttp.open("POST","../users/proc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send('q='+n+'&lugar='+lugar);


}
//tipousuarios
function tipeusersvacios(name) {
elemento = document.getElementById(name).value; 
if (!elemento){ 
loadXMLDocTipeUsersy();

   }
} 

function loadXMLDocTipeUsersy()
{      
    
var xmlhttp;
var lugar=("busquedas");
var n=document.getElementById('buscar').value;



if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("mytable").innerHTML=xmlhttp.responseText;
}
}

xmlhttp.open("POST","../tipeusers/proc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send('q='+n+'&lugar='+lugar);


}

//Categorias
function categoriesvacios(name) {
elemento = document.getElementById(name).value; 
if (!elemento){ 
loadXMLDoccategoriesy();

   }
} 

function loadXMLDoccategoriesy()
{      
    
var xmlhttp;
var lugar=("busquedas");
var n=document.getElementById('buscar').value;



if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("mytable").innerHTML=xmlhttp.responseText;
}
}

xmlhttp.open("POST","../categories/proc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send('q='+n+'&lugar='+lugar);


}

function Productsvacios(name) {
elemento = document.getElementById(name).value; 
if (!elemento){ 
loadXMLDocProductsy();

   }
} 
//productos
function loadXMLDocProductsy()
{      
    
var xmlhttp;
var lugar=("busquedas");
var n=document.getElementById('buscar').value;



if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("mytable").innerHTML=xmlhttp.responseText;
}
}

xmlhttp.open("POST","../products/proc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send('q='+n+'&lugar='+lugar);


}

//clientes
function Clientesvacios(name) {
elemento = document.getElementById(name).value; 
if (!elemento){ 
loadXMLDocClientesy();

   }
} 

function loadXMLDocClientesy()
{      
    
var xmlhttp;
var lugar=("busquedas");
var n=document.getElementById('buscar').value;



if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("mytable").innerHTML=xmlhttp.responseText;
}
}

xmlhttp.open("POST","../clients/proc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send('q='+n+'&lugar='+lugar);


}
 








 







