var pagina = document.getElementById('nomPag').value;

if (pagina == "index") {
	document.write ('<span class="estasAqui">Inicio</span>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;');
} else {
	document.write ('<a href="xindex.html" class="menuSup" onmouseover="window.status=\' •  Volver a Inicio  •\';return true;" onmouseout="window.status=\'\';return true;">Inicio</a>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;');
}

if (pagina == "casas") {
	document.write ('<span class="estasAqui">Casas Rurales</span>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;');
} else {
	document.write ('<a href="xcasasrurales.html" class="menuSup" onmouseover="window.status=\' •  Listado de Casas Rurales  •\';return true;" onmouseout="window.status=\'\';return true;">Casas Rurales</a>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;');
}

if (pagina == "apartam") {
	document.write ('<span class="estasAqui">Apartamentos</span>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;');
} else {
	document.write ('<a href="xapartamentos.html" class="menuSup" onmouseover="window.status=\' •  Listado de Apartamentos  •\';return true;" onmouseout="window.status=\'\';return true;">Apartamentos</a>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;');
}

if (pagina == "foro") {
	document.write ('<span class="estasAqui">Foro</span>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;');
} else {
	document.write ('<a href="xforo.html" class="menuSup" onmouseover="window.status=\' •  Entrar en el Foro  •\';return true;" onmouseout="window.status=\'\';return true;">Foro</a>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;');
}

if (pagina == "prueba") {

    document.body.style.backgroundColor='yellow';
	document.write ('<a class="waves-effect waves-light btn">button</a>');

} else {
	document.write ('<a href="xcontacto.html" class="menuSup" onmouseover="window.status=\' •  Ir a Contacto  •\';return true;" onmouseout="window.status=\'\';return true;">Contacto</a>');
}
//!---&nbsp  es espacio , &nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp; poner los de or//