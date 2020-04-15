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




			<button onclick="$('#descDiv').toggle(function(){map.invalidateSize()});" id="descToggler" class="btn btn-sm btn-outline-dark btn-light" style="cursor: pointer; position: absolute; top:10px; right: 10px; z-index: 400"><i class="fas fa-angle-right"></i></button>
		</div>
		<div id="descDiv" class="col-4 p-5" style="height: 100vh; overflow-y: scroll;">
			<div href="#" id="size">Shpeshtësia: <input type="range" value="160" min="0.01" max="500" step="0.01" id="sizeInput"/><span id="currentSize">160</span></div>
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
			<h3>Legjenda</h3>
			<div id="legjenda" class="row pt-3">
				<div class="col-12" style="border-bottom: 1px dashed;">
					<h3 id="emriLagjes">Emri Lagjes</h3>
				</div>
				<div class="col-3 p-1" style="border-bottom: 1px dashed;">
					<img class="w-100" src="./assets/images/drunjte.png"/>
				</div>
				<div class="col-9" style="border-bottom: 1px dashed;">
					<h5>DRUNJË</h5>
					<p>Gjithsej njësi:<span id="totalDrunje" class="font-weight-bold">1078</span></p>
				</div>
				<div class="col-6 row m-0 p-0">
					<div class="col-3 p-2">
						<img src="./assets/images/gjethembajtes.png" class="w-100"/>
					</div>
					<div class="col-9">
						<h5>Gjethrënës</h5>
						<p>Gjithsej: <span id="totalDrunjeGjethrenes" class="font-weight-bold">508</span></p>
					</div>
					<div class="col-12 m-0 p-0 text-center">
						<button class="button rounded-circle border-0 pt-2" style="background-color: #4e753e; height: 30px; width: 30px;">&nbsp;</button>Lartë: <span class=" pt-2">508</span><br/>
						<button class="button rounded-circle border-0 pt-2" style="background-color: #7e9c3b; height: 30px; width: 30px;">&nbsp;</button>Mesëm: <span class=" pt-2">25</span><br/>
						<button class="button rounded-circle border-0 pt-2" style="background-color: #c0ae28; height: 30px; width: 30px;">&nbsp;</button>Ultë: <span class=" pt-2">200</span><br/>
					</div>
				</div>
				<div class="col-6 row m-0 p-0">
					<div class="col-3 p-2">
						<img src="./assets/images/gjetherenes.png" class="w-100"/>
					</div>
					<div class="col-9">
						<h5>Gjethmbajtës</h5>
						<p>Gjithsej: <span id="totalDrunjeGjethmbajtes" class="font-weight-bold">508</span></p>
					</div>
					<div class="col-12 m-0 p-0 text-center">
						<button class="button rounded-circle border-0" style="background-color: #674835; height: 30px; width: 30px;">&nbsp;</button>Lartë: <span>508</span><br/>
						<button class="button rounded-circle border-0" style="background-color: #62653a; height: 30px; width: 30px;">&nbsp;</button>Mesëm: <span>25</span><br/>
						<button class="button rounded-circle border-0" style="background-color: #714220; height: 30px; width: 30px;">&nbsp;</button>Ultë: <span>200</span><br/>
					</div>
				</div>
				<div class="col-12 pt-2 pb-2" style="border-bottom: 1px dashed;"></div>
				<div class="col-3 p-1" style="border-bottom: 1px dashed;">
					<img class="w-100" src="./assets/images/drunjte.png"/>
				</div>
				<div class="col-9" style="border-bottom: 1px dashed;">
					<h5>Mobilari</h5>
					<p>Gjithsej njësi:<span id="totalDrunje" class="font-weight-bold">1078</span></p>
				</div>
				<div class="col-6 row m-0 p-0">
					<div class="col-3 p-2">
						<img src="./assets/images/gjethembajtes.png" class="w-100"/>
					</div>
					<div class="col-9">
						<h5>Gjethrënës</h5>
						<p>Gjithsej: <span id="totalDrunjeGjethrenes" class="font-weight-bold">508</span></p>
					</div>
					<div class="col-12 m-0 p-0 text-center">
						<button class="button rounded-circle border-0 pt-2" style="background-color: #e24d21; height: 30px; width: 30px;">&nbsp;</button>Ulëse: <span class=" pt-2">508</span><br/>
						<button class="button rounded-circle border-0 pt-2" style="background-color: #4090a8; height: 30px; width: 30px;">&nbsp;</button>Ndriçim: <span class=" pt-2">25</span><br/>
						<button class="button rounded-circle border-0 pt-2" style="background-color: #624785; height: 30px; width: 30px;">&nbsp;</button>Mbeturina: <span class=" pt-2">200</span><br/>
					</div>
				</div>
				<div class="col-6 row m-0 p-0">
					<div class="col-3 p-2">
						<img src="./assets/images/gjetherenes.png" class="w-100"/>
					</div>
					<div class="col-9">
						<h5>Gjethmbajtës</h5>
						<p>Gjithsej: <span id="totalDrunjeGjethmbajtes" class="font-weight-bold">508</span></p>
					</div>
					<div class="col-12 m-0 p-0 text-center">
						<button class="button rounded-circle border-0" style="background-color: #674835; height: 30px; width: 30px;">&nbsp;</button>Lartë: <span>508</span><br/>
						<button class="button rounded-circle border-0" style="background-color: #62653a; height: 30px; width: 30px;">&nbsp;</button>Mesëm: <span>25</span><br/>
						<button class="button rounded-circle border-0" style="background-color: #714220; height: 30px; width: 30px;">&nbsp;</button>Ultë: <span>200</span><br/>
					</div>
				</div>
				<div class="col-12 pt-2 pb-2" style="border-bottom: 1px dashed;"></div>
				
				<div class="col-12 pt-2 pb-2" style="border-bottom: 1px dashed;"></div>
			</div>
		</div>
	</div>
</body>
<script src="./js/script.js"></script>
</html>