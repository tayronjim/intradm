<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	
	<title>Intranet Diaz Morones</title>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript">
		$("document").ready(function(){
			$("ul.nav li a").mouseover(function(){
				$("#TitleIcon").text($(this).prop("title"));
			});
			$("ul.nav li a").mouseout(function(){
				$("#TitleIcon").text("");
			});

		});
	</script>
	<link rel="stylesheet" type="text/css" href="font/css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

<img src="img/logo nuevo vetical.png" width="200px">
	<div class="page-wrap">

		<nav>
			<ul class="nav">
				<li><a title="Administracion" href="../administracion/" target="_BLANK"><i class="fa fa-pie-chart fa-4x"></i></a></li>
				<li><a title="Area de Links" href="../links/index.php" target="_BLANK"><i class="fa fa-link fa-4x"></i></a></li>
				<li><a title="Buzon de Sugerencias" href="../buzon/index.php" target="_BLANK"><i class="fa fa-paper-plane-o fa-4x"></i></a></li>
				<li><a title="Sistema de Tickets" href="../tickets/index.php" target="_BLANK"><i class="fa fa-ticket fa-4x"></i></a></li>
			</ul>
		</nav>
		<nav>
			<ul class="nav">
				<li><a title="Base de Conocimientos" href="#" target="_BLANK"><i class="fa fa-graduation-cap fa-4x"></i></a></li>
				<li><a title="Temas de Ayuda" href="#" target="_BLANK"><i class="fa fa-question fa-4x"></i></a></li>
				<li><a title="Activos" href="../activos/" target="_BLANK"><i class="fa fa-laptop fa-4x"></i></a></li>
			</ul>
		</nav>

	</div>
	<div class="divTitleIcon">
		<span id="TitleIcon" text=""></span>
	</div>
<?php
//$command = "C:\Program Files\Internet Explorer\iexplore.exe";
//$command = "iexplore.exe";
//exec($command);
?>
<!-- <script>
 function go() {
   w = new ActiveXObject("WScript.Shell");
   w.run('C:\\Program Files\\Internet Explorer\\iexplore.exe');
   return true;
   }
</script>
 <form>
  Iniciar el libro de notas o Note pad
     <input type="button" value="Go"
     onClick="return go()">
 </form> -->


</body>

</html>