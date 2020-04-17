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
			<div href="#" id="size">
				Radius i cluster:
				 <input type="range" value="50" min="0.9" max="100" step="0.1" id="sizeInput"/>
				<span id="currentSize">50</span>
			</div>
			<!-- 
			<table  class="table table-bordered table-striped table-hover text-center">
				<thead>
					<tr>
						<th scope="col">Ikona</th>
						<th scope="col">Përshkrimi</th>
						<th scope="col">Shfaqe</th>
					</tr>
				</thead>
				<tbody>
					<tr scope="row">
						<td><i class="fas fa-tree text-success"></i></td>
						<td>Dru</td>
						<td><input id="toggleDrunjet" type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
					</tr>
					<tr scope="row">
						<td><i class="fas fa-trash-alt"></i></td>
						<td>Shportë</td>
						<td><input id="toggleShportat" type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
					</tr>
					<tr scope="row">
						<td><i class="fas fa-volume-up text-info"></i></td>
						<td>Niveli i zhurmës</td>
						<td><input id="toggleZhurmen" type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
					</tr>
					<tr scope="row">
						<td><i class="fas fa-bolt text-warning"></i></td>
						<td>Shtyllë elektrike</td>
						<td><input id="toggleShtyllat" type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
					</tr>
				</tbody>
			</table>
			 -->
			<h3>Legjenda</h3>
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
						<div class="col-2 p-2">
							<img src="./assets/images/gjethembajtes.png" class="w-100" style="height: 50px;" />
						</div>
						<div class="col-10">
							<h5>Gjethrënës</h5>
							<p>Gjithsej: <span id="totalDrunjeGjethrenes" class="font-weight-bold">508</span></p>
						</div>

						<div class="col-12">
							<button class="button rounded-circle border-0 pt-3" style="background-color: #4e753e; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Lartë: <span>508</span></label><br/>
							<button class="button rounded-circle border-0 pt-3" style="background-color: #7e9c3b; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Mesëm: <span>25</span></label><br/>
							<button class="button rounded-circle border-0 pt-3" style="background-color: #c0ae28; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Ultë: <span>200</span></label><br/>
						</div>
					</div>
				</div>

				<div class="col-6">
					<div class="row">
						<div class="col-2 p-2">
							<img src="./assets/images/gjetherenes.png" class="w-100" style="height: 50px;" />
						</div>
						<div class="col-10">
							<h5>Gjethmbajtës</h5>
							<p>Gjithsej: <span id="totalDrunjeGjethmbajtes" class="font-weight-bold">508</span></p>
						</div>
						<div class="col-12">
							<button class="button rounded-circle border-0 pt-3" style="background-color: #674835; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Lartë: <span>508</span></label><br/>
							<button class="button rounded-circle border-0 pt-3" style="background-color: #62653a; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Mesëm: <span>25</span></label><br/>
							<button class="button rounded-circle border-0 pt-3" style="background-color: #714220; outline: none; height: 30px; width: 30px;">&nbsp;</button><label class="pl-1" style="vertical-align: top;">Ultë: <span>200</span></label><br/>
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
					<button class="button rounded-circle border-0 pt-2" style="background-color: #e24d21; height: 30px; width: 30px;">&nbsp;</button>Ulëse: <span class=" pt-2">508</span><br/>
					<button class="button rounded-circle border-0 pt-2" style="background-color: #4090a8; height: 30px; width: 30px;">&nbsp;</button>Ndriçim: <span class=" pt-2">25</span><br/>
					<button class="button rounded-circle border-0 pt-2" style="background-color: #624785; height: 30px; width: 30px;">&nbsp;</button>Mbeturina: <span class=" pt-2">200</span><br/>
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
		var notified = false;
		$("#sizeInput").on("input change", function() {
		 	dosmth($(this).val()); 
		})
		function dosmth(val){
			console.log(val);
			if(notified)
				return;
			if(val <= 20)
			{
				notified = true;
				alert("Kujdes: Zvoglimi i tepert i radius shkakton ngadalsim!");
			}
		}
	</script>
</html>