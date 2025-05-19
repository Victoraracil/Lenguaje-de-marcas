<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<script type="text/javascript" src="scripts/carrito.js"></script>
</head>
<body>
	<div id="contenedor_articulos">
	</div>
	
	<hr class="clear" />
	
	<div id="contenedor_carrito">
		<div id="titulo_carrito">
			<span>Carrito</span>
		</div>
		<div id="barra_carrito">
			<div id="articulos_carrito" class="fondo"></div>
		</div>
		<div id="totales">
			<span class="sptexto">
				<label>Artículos </label><label class="cuenta" id="narticulos">0</label>
			</span>
			<span class="sptexto">
				<label>Precio </label><label class="cuenta" id="ptotal">0 €</label>
			</span>
			<span>
			</span>
		</div>
	</div>
	
	<hr class="clear" />
	
	<div id="formularios">
		<div class="form" id="formNuevoArticulo">
			<p>Nuevo artículo</p>
			<form method="post" action="index.html">
				<fieldset>
					<label for="nombre">Nombre<span class="small">Nombre artículo</span></label>
					<input type="text" name="nombre" id="nombre"/>
					<label for="precio">Precio<span class="small">Precio artículo</span></label>
					<input type="text" name="precio" id="precio"/>
					<input type="button" value="Añadir" class="boton" id="botonAnyadir" />
				</fieldset>
			</form>
		</div>
		
		<div class="form" id="formNuevaCompra">
			<p>Nueva compra</p>
			<form method="post" action="index.html">
				<fieldset>
					<label for="articulo">Artículo<span class="small">Artículo</span></label>
					<input type="text" name="articulo" id="articulo"/>
					<label for="cantidad">Cantidad<span class="small">Cantidad</span></label>
					<input type="text" name="cantidad" id="cantidad"/>
					<input type="button" value="Comprar" class="boton" id="botonComprar"/>
				</fieldset>
			</form>
		</div>
	</div>

	<hr class="clear" />

	<div id="errores">
	</div>
</body>
</html>