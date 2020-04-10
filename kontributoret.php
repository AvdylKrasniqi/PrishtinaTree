
<?php


?>
<!DOCTYPE html>
<html>
<head>
	<title>Prishtina Trees</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script type="text/javascript" src="./assets/jquery/jquery-3.4.1.min.js"></script>
	
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
  	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
	
	<link href="./assets/bootstrap/bootstrap-4.4.1.min.css" rel="stylesheet">
	<script src="./assets/bootstrap/bootstrap-4.4.1.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>

	
	<script type="text/javascript" src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"  crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"  crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"  crossorigin="anonymous">

	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	
	<script type="text/javascript" src="./assets/datas/trees/pejtoni.min.js"></script>


</head>
<body>
	<!-- Image and text -->
<nav class="navbar navbar-success navbar-expand-lg bg-success">
  <a class="navbar-brand text-white" href="#">
    <img src="./assets/images/tree.png" width="30" height="30" class="d-inline-block align-top" alt="">
    PrishtinaTrees
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link text-white" href="index.php">[ Ballina ]</a>
      <a class="nav-item nav-link text-white" href="kontribo.php">[ Shto të dhëna ]</a>
      <a class="nav-item nav-link active text-white" href="kontributoret.php">[ Kontributorët ] <span class="sr-only">(current)</span></a>
    </div>
  </div>
</nav>
	<div class="row m-0" >
		<div id="descDiv" class="col-12 pt-3">
			<div class="card">
			  <div class="card-header">
			    <strong>Kontributorët</strong>
			  </div>
			  <div class="card-body">
			  	<h5 class="card-title">Vullnetarë në numërimin e pemëve/shtyllave elektrike/shportave/nivelin e zhurmave</h5>
				<p class="cartd-text">Filan Fisteku</p>
				<hr/>
			    <h5 class="card-title">Zhvillimi softuerik</h5>
			    <p class="card-text"><a href="https://github.com/AvdylKrasniqi">Avdyl Krasniqi</a>, Student në Fakultetin e Inxhinierisë Elektrike dhe Kompjuterike, Departamenti i Inxhinierisë Kompjuterike</p>
			    <p class="card-text"><a href="https://github.com/barlli">Bardh Kasapolli</a>, Student në Fakultetin e Inxhinierisë Elektrike dhe Kompjuterike, Departamenti i Inxhinierisë Kompjuterike</p>
			    <hr/>
			    <h5 class="card-title">Institucionet</h5>
			    <div class="row text-center">
			    	<div class="col">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/University_of_Prishtina_logo.svg/446px-University_of_Prishtina_logo.svg.png"  style="height: 150px;">
			    	</div>
			    	<div class="col">
						<img src="https://upload.wikimedia.org/wikipedia/commons/d/de/Prishtina-Stema.PNG" style="height: 150px;">
			    	</div>
			    </div>
			  </div>
			</div>

			
		</div>
	</div>
</body>
</html>