<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Intranet Diaz Morones</title>
	<style type="text/css">
		#cuerpo{
			margin: auto;
			width: 600px;
			height: auto;
			border:1px solid blue;
			background-color: WHITE;
			font-family: arial;

		}
		#titulo{
			width: 100%;
			height: 60px;
			background-color: #2d3091;
			color: WHITE;
			position: relative;
			text-align: center;
			padding-top: 10px;
			font-weight: bold;
			font-size: 25px;
		}
		#contenido{
			width: 100%
			height:100%;
			position: relative;
			padding: 15px;
		}
		#logo{margin-left: 180px;}
		.submensaje{
			color: #999;
			font-size: 10px;
		}
		#txttitulo{
			width: 180px;
			height: 20px;
			border:1px solid #999;
		}
		#text1{
			font-size: 12px;
		}
	</style>
</head>
<body>
	<div id="cuerpo">
		<div id="titulo"> Buzón de Sugerencias</div>
		<div id="contenido">
			<label id="text1">Como parte de mejora continua se ha creado un buzón donde puedas mandar todas tus sugerencias</label><br><br><br>
			<img src="http://www.diazmorones.com/imagenes/logo_vetical.jpg" id="logo"><br><br>
			<br><br><br>
			<b>Titulo de la sugerencia:</b><br><input type="text" name="titulo" id="txttitulo"><br><br>
			<b>Su sugerencia:</b><br><label class="submensaje">Porfavor sea lo mas explicito posible.</label><br><textarea cols="50" rows="5"></textarea>
		</div>
	</div>
</body>
</html>