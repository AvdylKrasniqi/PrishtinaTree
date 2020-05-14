
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package prishtinatrees
 */

//acf_form_head();

get_header();
if(WPCF7_ContactForm::get_current() !== null){
    echo '<script> var submittedBefore = true; var submittedFormId = ' . WPCF7_ContactForm::get_current()->id . '; </script>';
}
?>
	<main id="primary" class="site-main">



    <div class="row m-0" style="overflow: hidden;">

            <div class="col p-0">
                <div id="progress"><div id="progress-bar"></div></div>
                <div id="mapid" class="w-100"></div>
                <button onclick="<?php if(!wp_is_mobile()) { echo"$('#descDiv').toggle(function(){map.invalidateSize() });";} ?> " id="descToggler" class="btn btn-sm btn-outline-dark btn-light" style="cursor: pointer; position: absolute; top:10px; right: 10px; z-index: 400"><span class="icon-map"></span></button>
            </div>
            <div id="descDiv" class="col-4 p-5 <?php if(wp_is_mobile()) echo "d-none"; ?>" style="overflow-y: scroll;">
                <?php if(wp_is_mobile()){
                    echo '<button class="btn btn-light float-right" id="toggleBack"><span class="icon-map"></span></button>
                    <script>
                    $("#toggleBack").on("click", function() {
                        $("#descDiv").prev().removeClass("d-none");
                        $("#descDiv").removeClass("col p-1").addClass("col-4 p-5 d-none");
                    });
</script>
';
                } ?>
                <div id="legjenda" class="row">
                    <div class="col-12">
                        <h3 id="emriLagjes" class="text-uppercase">Loading</h3>
                    </div>
                    <div class="col-12">
                        <hr/>
                    </div>
                    <div class="col-3" style="overflow: hidden;">
                        <span class="icon-drunjte" style="font-size: 60px;"></span>
                    </div>
                    <div class="col-5">
                        <h5>DRUNJË</h5>
                        <p>Gjithsej njësi:
                    </div>
                    <div class="col-4" style="align-self: flex-end;">
                        <span id="totalDrunje" class="font-weight-bold" style="font-size: 39px;">Loading</span></p>
                    </div>
                    <div class="col-12">
                        <hr/>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3" style="overflow: hidden;">
                                <span class="icon-gjethembajtes" style="font-size: 60px;"></span>
                            </div>
                            <div class="col-9">
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
                            <div class="col-3" style="overflow: hidden;">
                                <span class="icon-gjetherenes" style="font-size: 60px;"></span>
                            </div>
                            <div class="col-9">
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
                    <div class="col-3" style="overflow: hidden;">
                        <span class="icon-Mobiliari" style="font-size: 60px;"></span>
                    </div>
                    <div class="col-5">
                        <h5 class="text-uppercase">Mobiliari urban</h5>
                        <p>Gjithsej njësi:
                    </div>
                    <div class="col-4" style="align-self: flex-end;">
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
                    <div class="col-3" style="overflow: hidden;">
                        <span class="icon-zhurma" style="font-size: 40px; padding-left: 15px;"></span>
                    </div>
                    <div class="col-5"><h6>Niveli mesatar i Zhurmës: </h6></div>
                    <div class="col-4"><span id="mesatarjaZhurma" style="font-size: 20px; font-weight: bold;">Loading</span><span class="text-muted">dB</span></div>
                    <div class="col-12"><hr/></div>
                    <div class="col-3" style="overflow: hidden;"><span style="font-size: 70px;" class="icon-co2"></span></div>
                    <div class="col-5"><h6>Reduktimi i Dioksidit të Karbonit për çdo vit:</h6></div>
                    <div class="col-4"><span id="reduktimiCO2PerVit" style="font-size: 20px; font-weight: bold;"></span>ton</div>
                    <div class="col-12"><hr/></div>
                    <div class="col-8 DPKB"><h6>Drunjë për kokë banori në Prishtinë (të hartëzuara):</h6></div>
                    <div class="col-2 DPKB"><b id="drunjePerKokeBanori"></b>%</div>
                    <div class="col-8 NDNL"><h6>Përqindja e numrit të drunjëve të Prishtinës (të hartëzuara):</h6></div>
                    <div class="col-2 NDNL"><b id="perqindjaENumritTeDrunjeveTePrishtines"></b>%</div>
                    <div class="col-8 mt-2"><h6>30 drunjë për kokë banori - numri ideal. Përqindja e arritur në Prishtinë (të hartëzuara):</h6></div>
                    <div class="col-2 mt-2"><b id="30drunjePerKokeBanori"></b>%</div>
                    <div class="col-12"><hr/></div>
                    <div class="col-12">
                        <p>PrishtinaTrees.org është projekt që përditësohet vazhdimisht. Shumë elemente mund të
                            mungojnë si pasojë e pamundësisë në qasje, ose ndonjë arsyeje tjetër. Nëse besoni se keni
                            gjetur një element që nuk është shfaqur në hartë, ju lutem plotësoni pyetësorin në vijim. Për të
                            filluar shtypni “Shto Element”
                            <br/><br/>
                            <i class="text-muted">
                            PrishtinaTrees.org is a constantly evolving platform. Many elements may be missing due to lack
                            of access, or for a number or other reasons. If you believe you have identified an element that is
                            not displayed on the map, please fill in the following questionnaire. To begin, press “Add
                            Element”</i>
                        </p>
                        <button class="btn btn-primary btn-block" onclick="$('#legjenda').hide(); $('#shtoElement').show(); currentLocation.setLatLng(map.getCenter()); if($('#contributingFor').val() != null) { console.log('ops'); map.addLayer(currentLocation) }">Shto element / Add Element</button>
                    </div>
                </div>
                <div id="shtoElement" class="row" style="display: none;">
                    <button class="btn btn-light btn-block " onclick="$('#legjenda').show(); $('#shtoElement').hide(); map.removeLayer(currentLocation);">Anulo / Cancel</button>
                    <div class="col-12">
                        <p>Në vijim plotësoni detajet/karakteristikat e elementit që dëshironi të shtoni në hartë. Të dhënat
me simbolin * janë obligative. Pas vendosjes së të dhënave, shtypni “Submit”<br/>
<i class="text-muted">Fill in the following details / characteristics of the element you want to add to the map. Data with
the symbol * is mandatory. After filling in the information, press &quot;Submit&quot;</i></p>
                        <select name="contributingFor" id="contributingFor" class="form-control mt-2">
                            <option selected disabled>Zgjidhni llojin e elementeve</option>
                            <option value="trees">Pemë</option>
                            <option value="mobiliari">Mobiliari</option>
                            <option value="zhurma">Zhurma</option>
                        </select>
                        <div id="newTreeForm" class="contributeForms" style="display: none;">
                            <button onclick="getLocation();" class="btn btn-primary btn-block mt-2">Vendos vendndodhjen time</button>
                            <?= do_shortcode('[contact-form-7 id="15510" title="new tree form"]'); ?>
                        </div>
                        <div id="newMobiliariForm" class="contributeForms" style="display: none;">
                            <button onclick="getLocation();" class="btn btn-primary btn-block mt-2">Vendos vendndodhjen time</button>
                            <?= do_shortcode('[contact-form-7 id="15509" title="new mobiliari form"]'); ?>
                        </div>
                        <div id="newZhurmaForm" class="contributeForms" style="display: none;">
                            <button onclick="getLocation();" class="btn btn-primary btn-block mt-2">Vendos vendndodhjen time</button>
                            <?= do_shortcode('[contact-form-7 id="15511" title="new zhurma form"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="<?= get_home_url() ?>/wp-includes/prishtinatrees/js/script.js"></script>
        <?php
                    $posts = array(
                      'post_type'   => 'polygon',
                      'numberposts' => -1,
                    );
                    $lastposts = get_posts($posts);

//                    var_dump($lastposts);
                    if ( $lastposts ) {
                        echo "<script>";
                        foreach ( $lastposts as $post ){
                            setup_postdata( $post );
                            echo 'PolygonParsers.push(new PolygonParser(' . get_the_ID() . ', "' . get_home_url() . '/datas/polygons/'. get_the_ID()  . '.json", "';
                            echo the_field('name') . '", ["' . get_home_url()  . '/datas/trees/' . get_the_ID() . '.json"], ["' . get_home_url()  . '/datas/mobiliari/' . get_the_ID() . '.json"], ["' . get_home_url()  . '/datas/zhurma/' . get_the_ID() . '.json"]));' . PHP_EOL;
                        }
                        echo "</script>";
                        wp_reset_postdata();
                    }
        ?>
        <script>

            $(document).ready(function(){


                $("body").css("overflow-y", "hidden");

                $("#descDiv").css("height", "calc(100vh - " + $("nav").height() + "px)");
                    $('input[type="file"]').change(function(e){
                    var fileName = e.target.files[0].name;
                    $(e.target).next(fileName);
                });

                $( "#contributingFor" ).change(function() {
                 map.addLayer(currentLocation); currentLocation.openPopup();

                  if($(this).val() === "trees"){
                    $(".contributeForms").hide();
                    $("#newTreeForm").show();
                  }else if($(this).val() === "mobiliari"){
                    $(".contributeForms").hide();
                    $("#newMobiliariForm").show();
                  }else if($(this).val() === "zhurma"){
                    $(".contributeForms").hide();
                    $("#newZhurmaForm").show();
                  }
                });

                if(typeof submittedBefore !== 'undefined' && typeof submittedFormId !== 'undefined' ){
                    $('#legjenda').hide();
                    $('#shtoElement').show();
                    $("#contributingFor").val("trees");

                    if(submittedFormId == "15510"){
                        if(!$("#newTreeForm").text().includes("Thank you")){
                            map.addLayer(currentLocation);
                        }
                        $("#contributingFor").val("trees");
                        $("#newTreeForm").show();
                    } else if(submittedFormId == "15509"){
                        if(!$("#newMobiliariForm").text().includes("Thank you")){
                            map.addLayer(currentLocation);
                        }
                        $("#contributingFor").val("mobiliari");
                        $("#newMobiliariForm").show();
                    }
                    else if(submittedFormId == "15511"){
                        if(!$("#newZhurmaForm").text().includes("Thank you")){
                            map.addLayer(currentLocation);
                        }
                        $("#contributingFor").val("mobiliari");
                        $("#newZhurmaForm").show();
                    }
                }

            })
            <?php if(wp_is_mobile()) {
                echo '
                    $("#descToggler").on("click", function(){
                        $("#descDiv").removeClass("col-4 p-5 d-none").addClass("col p-1");
                        $("#descDiv").prev().addClass("d-none");
                    });
                ';
            }?>
        </script>
    </html>
	</main><!-- #main -->
<?php
get_footer();
