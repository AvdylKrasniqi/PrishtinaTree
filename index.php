<?php
require("header.php");

?>
<!DOCTYPE html>
<html>
	<?php get_header(); ?>
	<div class="row m-0" style="overflow: hidden;">
		
		<div class="col p-0">
			<div id="progress"><div id="progress-bar"></div></div>
			<div id="mapid" class="w-100"></div>
			<button onclick="$('#descDiv').toggle(function(){map.invalidateSize()});" id="descToggler" class="btn btn-sm btn-outline-dark btn-light" style="cursor: pointer; position: absolute; top:10px; right: 10px; z-index: 400"><span class="icon-arrow-right"></span></button>
		</div>
		<div id="descDiv" class="col-4  p-5" style=" overflow-y: scroll;">
			<div id="legjenda" class="d-none row">
				<div class="col-12">
					<h3 id="emriLagjes">Loading</h3>
				</div>
				<div class="col-12">
					<hr/>
				</div>
				<div class="col-2">
                    <span class="icon-drunjte" style="font-size: 60px;"></span>
				</div>
				<div class="col-5">
					<h5>DRUNJË</h5>
					<p>Gjithsej njësi:
				</div>
				<div class="col-5" style="align-self: flex-end;">
					<span id="totalDrunje" class="font-weight-bold" style="font-size: 39px;">Loading</span></p>
				</div>
				<div class="col-12">
					<hr/>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-2">
                            <span class="icon-gjethembajtes" style="font-size: 60px;"></span>
						</div>
						<div class="col-10">
							<h5>Gjetherënës</h5>
							<p>Gjithsej: <span id="totalDrunjeGjethrenes" class="font-weight-bold">Loading</span></p>
						</div>

						<div class="col-12">
							<button onclick="toggleTypeOfTrees(this, 'gjetherenes', 0)" data-display="true" class="button rounded-circle border-0 pt-3" style="background-color: #4e753e; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Lartë: <span id="gjrLarte" >Loading</span></label><br/>
							<button onclick="toggleTypeOfTrees(this, 'gjetherenes', 1)" data-display="true" class="button rounded-circle border-0 pt-3" style="background-color: #7e9c3b; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Mesëm: <span id="gjrMesem" >Loading</span></label><br/>
							<button onclick="toggleTypeOfTrees(this, 'gjetherenes', 2)" data-display="true" class="button rounded-circle border-0 pt-3" style="background-color: #c0ae28; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;" >Ultë: <span id="gjrUlet" >Loading</span></label><br/>
						</div>
					</div>
				</div>

				<div class="col-6">
					<div class="row">
						<div class="col-2">
							<span class="icon-gjetherenes" style="font-size: 60px;"></span>
						</div>
						<div class="col-10">
							<h5>Gjethembajtës</h5>
							<p>Gjithsej: <span id="totalDrunjeGjethmbajtes" class="font-weight-bold">Loading</span></p>
						</div>
						<div class="col-12">
							<button onclick="toggleTypeOfTrees(this, 'gjethembajtes', 0)" data-display="true" class="button rounded-circle border-0 pt-3" style="background-color: #674835; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Lartë: <span id="gjmLarte" >Loading</span></label><br/>
							<button onclick="toggleTypeOfTrees(this, 'gjethembajtes', 1)" data-display="true" class="button rounded-circle border-0 pt-3" style="background-color: #62653a; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Mesëm: <span id="gjmMesem" >Loading</span></label><br/>
							<button onclick="toggleTypeOfTrees(this, 'gjethembajtes', 2)" data-display="true" class="button rounded-circle border-0 pt-3" style="background-color: #714220; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Ultë: <span id="gjmUlet" >Loading</span></label><br/>
						</div>
					</div>
				</div>
				<div class="col-12">
					<hr>
				</div>
				<div class="col-2">
					<span class="icon-Mobiliari" style="font-size: 60px;"></span>
				</div>
				<div class="col-5">
					<h5 class="text-uppercase">Mobilari urban</h5>
					<p>Gjithsej njësi:
				</div>
				<div class="col-5" style="align-self: flex-end;">
					<span id="totalMobilari" class="font-weight-bold" style="font-size: 39px;">Loading</span></p>
				</div>
				<div class="col-12">
					<hr/>
				</div>
				<div class="col-6">
					<button onclick="toggleTypeOfMobiliari(this, 'ulese')" data-display="true" class="button rounded-circle border-0 pt-3" style="background-color: #e24d21; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Ulëse: <span id="nrUlese">Loading</span></label><br/>
					<button onclick="toggleTypeOfMobiliari(this, 'ndricim')" data-display="true" class="button rounded-circle border-0 pt-3" style="background-color: #4090a8; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Ndriçim: <span id="nrNdricim">Loading</span></label><br/>
					<button onclick="toggleTypeOfMobiliari(this, 'mbeturina')" data-display="true" class="button rounded-circle border-0 pt-3" style="background-color: #624785; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Mbeturina: <span id="nrMbeturina">Loading</span></label><br/>
				</div>
				<div class="col-6 text-right">
					<p>gjendja e mirë: <b><span id="mobGjendjeEMire">Loading</span></b></p>
					<p>gjendja jo e mirë: <b><span id="mobGjendjeJoEMire">Loading</span></b></p>
				</div>
                <div class="col-12"><hr/></div>
                <div class="col-2"><span style="font-size: 70px;" class="icon-co2"></span></div>
                <div class="col-6"><h5>Reduktimi i Dioksidit të Karbonit për çdo vit:</h5></div>
                <div class="col-4"><span id="reduktimiCO2PerVit" style="font-size: 20px; font-weight: bold;"></span>ton</div>
                <div class="col-12"><hr/></div>
                <div class="col-8 DPKB"><h6>Drunjë për kokë banori në Prishtinë (të hartëzuara):</h6></div>
                <div class="col-2 DPKB"><b id="drunjePerKokeBanori"></b>%</div>
                <div class="col-8 NDNL"><h6>Përqindja e numrit të drunjëve të Prishtinës (të hartëzuara):</h6></div>
                <div class="col-2 NDNL"><b id="perqindjaENumritTeDrunjeveTePrishtines"></b>%</div>
                <div class="col-8 mt-2"><h6>30 drunjë për kokë banori - numri ideal. Përqindja e arritur në Prishtinë (të hartëzuara):</h6></div>
                <div class="col-2 mt-2"><b id="30drunjePerKokeBanori"></b>%</div>
			</div>
            <div id="shtoElement" class="row">
                <div class="col-12">
                    <form action="#" method="POST">
                        <div class="row w-100">
                            <div class="col-12">
                                <button onclick="getLocation();" class="btn btn-primary">Get Location</button>
                            </div>
                            <div class="col-6">

                                <label for="newElementLatitude">Latitude: </label>
                                <input type="text" id="newElementLatitude" class="form-control" required="required">
                            </div>
                            <div class="col-6">
                                <label for="newElementLongitude">Longitude: </label>
                                <input type="text" id="newElementLongitude" class="form-control" required="required">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</body>
<script src="./js/script.js"></script>
    <script>
        $(document).ready(function(){
            $("body").css("overflow-y", "hidden");
            $("#descDiv").css("height", "calc(100vh - " + $("nav").height() + "px)");
        })
    </script>
</html>