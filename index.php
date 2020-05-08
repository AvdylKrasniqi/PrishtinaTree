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
			<button onclick="$('#descDiv').toggle(function(){map.invalidateSize()});" id="descToggler" class="btn btn-sm btn-outline-dark btn-light" style="cursor: pointer; position: absolute; top:10px; right: 10px; z-index: 400">></i></button>
		</div>
		<div id="descDiv" class="col-4 p-5" style="height: 100vh; overflow-y: scroll;">

			<div id="legjenda" class="row pt-3">
				<div class="col-12">
					<h3 id="emriLagjes">Emri Lagjes</h3>
				</div>
				<div class="col-12">
					<hr/>
				</div>
				<div class="col-2">
					<img class="ml-1 w-100" src="./assets/images/drunjte.png"/>
				</div>
				<div class="col-5">
					<h5>DRUNJË</h5>
					<p>Gjithsej njësi:
				</div>
				<div class="col-5" style="align-self: flex-end;">
					<span id="totalDrunje" class="font-weight-bold" style="font-size: 39px;">1078</span></p>
				</div>
				<div class="col-12">
					<hr/>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-2">
							<img src="./assets/images/gjethembajtes.png" style="height: 50px;" />
						</div>
						<div class="col-10">
							<h5>Gjetherënës</h5>
							<p>Gjithsej: <span id="totalDrunjeGjethrenes" class="font-weight-bold">508</span></p>
						</div>

						<div class="col-12">
							<button class="button rounded-circle border-0 pt-3" style="background-color: #4e753e; outline: none; height: 30px; width: 30px;">&nbsp;</button><label id="gjrLarte" class="pl-1" style="vertical-align: top;">Lartë: <span>508</span></label><br/>
							<button class="button rounded-circle border-0 pt-3" style="background-color: #7e9c3b; outline: none; height: 30px; width: 30px;">&nbsp;</button><label id="gjrMesem" class="pl-1" style="vertical-align: top;">Mesëm: <span>25</span></label><br/>
							<button class="button rounded-circle border-0 pt-3" style="background-color: #c0ae28; outline: none; height: 30px; width: 30px;">&nbsp;</button><label id="gjrUlet" class="pl-1" style="vertical-align: top;">Ultë: <span>200</span></label><br/>
						</div>
					</div>
				</div>

				<div class="col-6">
					<div class="row">
						<div class="col-2">
							<img src="./assets/images/gjetherenes.png" style="height: 50px;" />
						</div>
						<div class="col-10">
							<h5>Gjethembajtës</h5>
							<p>Gjithsej: <span id="totalDrunjeGjethmbajtes" class="font-weight-bold">508</span></p>
						</div>
						<div class="col-12">
							<button class="button rounded-circle border-0 pt-3" style="background-color: #674835; outline: none; height: 30px; width: 30px;">&nbsp;</button><label id="gjmLarte" class="pl-1" style="vertical-align: top;">Lartë: <span>508</span></label><br/>
							<button class="button rounded-circle border-0 pt-3" style="background-color: #62653a; outline: none; height: 30px; width: 30px;">&nbsp;</button><label id="gjmMesem" class="pl-1" style="vertical-align: top;">Mesëm: <span>25</span></label><br/>
							<button class="button rounded-circle border-0 pt-3" style="background-color: #714220; outline: none; height: 30px; width: 30px;">&nbsp;</button><label id="gjmUlet" class="pl-1" style="vertical-align: top;">Ultë: <span>200</span></label><br/>
						</div>
					</div>
				</div>
				<div class="col-12">
					<hr>
				</div>
				<div class="col-2">
					<img class="ml-1 w-100" src="./assets/images/Mobiliari.png"/>
				</div>
				<div class="col-5">
					<h5 class="text-uppercase">Mobilari urban</h5>
					<p>Gjithsej njësi:
				</div>
				<div class="col-5" style="align-self: flex-end;">
					<span id="totalMobilari" class="font-weight-bold" style="font-size: 39px;">1078</span></p>
				</div>
				<div class="col-12">
					<hr/>
				</div>
				<div class="col-6">
					<button class="button rounded-circle border-0 pt-3" style="background-color: #e24d21; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Ulëse: <span>508</span></label><br/>
					<button class="button rounded-circle border-0 pt-3" style="background-color: #4090a8; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Ndriçim: <span>508</span></label><br/>
					<button class="button rounded-circle border-0 pt-3" style="background-color: #624785; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Mbeturina: <span>508</span></label><br/>
				</div>
				<div class="col-6 text-right">
					<p>gjendja e mirë: <span><b>200</b></span></p>
					<p>gjendja jo e mirë: <span><b>200</b></span></p>
				</div>
			</div>

			<div style="height: 200px;"></div>
		</div>

	</div>
</body>
<script src="./js/script.js"></script>
    <script>
        $(document).ready(function(){
            $("body").css("overflow-y", "hidden");
        })
    </script>
</html>