
<?php

require("header.php");

?>
<!DOCTYPE html>
<html>
<!-- Image and text -->
<?php get_header(); ?>
<style>
    #howitworks span {
        font-size: 40px;
    }
</style>
<div id="howitworks" class="container my-5">
    <div class="row m-0 mt-5">
        <div class="col-6">
            <span class="icon-headerico" style="font-size: 70px;"></span>
            <h4 class="my-3">Si funksionon PrishtinaTrees.org</h4>
        </div>
        <div class="col-6 text-en">
            <span class="icon-headerico" style="font-size: 70px;"></span>
            <h4 class="my-3">How PrishtinaTrees.org works</h4>
        </div>
        <div class="col-12"><hr/></div>
        <div class="col-6">
            <span class="icon-scope"></span>
            <h6>Shtrirja</h6>
            <p>Qëllimi i platformës është të dokumentojë në hartë të gjithë elementët e nevojshëm (drunjë dhe mobiliar urban) që janë pozicio- nuar brenda kufijve të asaj që konsiderohet të jetë "zona urbane". Drunjtë në Parqet e Qytetit dhe Parqet Nacionale të tilla si 'Germia' nuk do të hartëzohen për shkak të sasisë së madhe të elementeve. Ato mund të maten më lehtë duke përdorur një formulë që llogarit drunjë për sipërfaqe.</p>
        </div>
        <div class="col-6 text-en">
            <span class="icon-scope"></span>
            <h6>Scope</h6>
            <p>The aim of the platform is to map all necessary elements (trees and urban furniture) that are positioned within the borders of what is considered to be the ‘urban zone’. Trees in City Parks and National Parks such as ‘Germia’ will not be mapped because of the sheer quantity of elements. They can be more easily measured by using a formula that calculates trees per area.</p>
        </div>
        <div class="col-6">
            <span class="icon-neighborhoods"></span>
            <h6>Lagjet</h6>
            <p>Harta është e ndarë në lagje siç përcaktohet zyrtarisht nga Komuna e Prishtinës. Në shumë raste, lagjet janë ndarë më tej në copa më të vogla për llogaritje dhe menaxhim më të lehtë të të dhënave.</p>
        </div>
        <div class="col-6 text-en">
            <span class="icon-neighborhoods"></span>
            <h6>Neighborhoods</h6>
            <p>The mapping is divided into neighborhoods as officially defined by the Municipality of Prishtina. In many cases, neighborhoods have been further broken down into smaller pieces for easier calculation and management of data.</p>
        </div>
        <div class="col-6">
            <span class="icon-methodology"></span>
            <h6>Metodologjia</h6>
            <p>Secili dru/pemë dhe njësi e mobiljeve urbane janë pozicionuar gjeografikisht në terren, duke përdorur telefonat inteligjentë dhe një version mobil të QGIS. Për më tepër, karakteristikat e tjera dhe të dhënat mbështetëse janë mbledhur poashtu në terren. Në shumë raste janë marrë fotografi të elementeve të karakteristikave, por kjo ishte e kufizuar në shumë raste nga kapaciteti i ruajtjes (data stor- age). Për të matur nivelin e zhurmës, janë zgjodhur pika strategjike dhe niveli i zhurmës është matur duke përdorur telefona inteligjentë në afate kohore të ndryshme, me ç’rast rezultati përfundimtar është mesatarja e të gjitha këtyre matjeve.</p>
        </div>
        <div class="col-6 text-en">
            <span class="icon-methodology"></span>
            <h6>Methodology</h6>
            <p>Each tree and piece of urban furniture has been geographically positioned in-situ, using smartphones and a mobile version of QGIS. In addition, other characteristics and supporting data was collected in-situ as well. In many cases photographs of characteristics elements were taken, but this was limited in many cases by the capacity of our storage. In order to measure the Level of Noise, strategic points were chosen and the level of noise was measured using smartphones in different timeframes, with the end result being the average of all these measurements.</p>
        </div>
        <div class="col-6">
            <span class="icon-mapped-elements"></span>
            <h6>Elementet e hartës</h6>
            <p>Ekzistojnë dy lloje kryesore të elementeve të dokumentuara në hartë, përkatësisht Drunjë dhe Mobiliari Urban, si dhe Niveli i Zhur- mës si e treta por me një rëndësi më të vogël. Drunjtë ndahen në gjetherënëse dhe gjethëmbajtëse. Më tej ato ndahen në gjendje (e mirë ose jo e mirë) dhe lartësi (të ulët, të mesme, të lartë). Mobiliari urban ndahen në ndriçim, shporta të mbeturinave, ulëse dhe lojëra. Kjo kategori gjithashtu është ndarë në gjendje (e mirë apo jo e mirë). Niveli i Zhurmës zakonisht mblidhet në vendet që janë më të frekuentuara me trafikun e këmbësorëve dhe / ose makinave.</p>
        </div>
        <div class="col-6 text-en">
            <span class="icon-mapped-elements"></span>
            <h6>Mapped Elements</h6>
            <p>There are two main types of mapped elements, namely Trees and Urban Furniture, as well as a third one of a lesser importance, Level of Noise. Trees are subdivided into deciduous and coniferous. Further they are subdivided into state (good or bad) and height (low, medium, high). Urban furniture is subdivided into lighting, garbage bins, seating and play, with this category also subdivided into state (good or bad). Level of Noise is usually collected in places that are busier in pedestrian and/or car traffic.</p>
        </div>
        <div class="col-6">
            <span class="icon-volunteering"></span>
            <h6>Vullnetarizmi</h6>
            <p>Pjesa më e madhe e të dhënave janë mbledhur në mënyrë vullne- tare nga studentë dhe qytetarë. Përmes kësaj platforme, të gjithë mund të kontribuojnë me shtimin e elementeve individuale, por nëse doni të kontribuoni në një shkallë më të madhe, ju lutemi mos hezitoni të na kontaktoni për të mësuar se si mund të bëhet kjo.</p>
        </div>
        <div class="col-6 text-en">
            <span class="icon-volunteering"></span>
            <h6>Volunteering</h6>
            <p>Much of the data has been collected in a voluntary way by students and citizens. Through this platform, everyone can contribute with adding individual elements, but if you want to contribute in a larger scale, please don’t hesitate to contact us to find out how.</p>
        </div>
        <div class="col-6">
            <span class="icon-data"></span>
            <h6>Të dhënat</h6>
            <p>Të dhënat e paraqitura në PrishtinaTrees.org janë të hapura dhe mund të shkarkohen për përdorim personal / institucional. Ne inku- rajojmë shumë përdorimin e këtyre të dhënave në hulumtim, edukim dhe akademi. Për të shkarkuar grupin e plotë të të dhënave, <a href="">klikoni këtu.</a></p>
        </div>
        <div class="col-6 text-en">
            <span class="icon-data"></span>
            <h6>Data</h6>
            <p>The data shown in PrishtinaTrees.org is open and can be download- ed for personal/institutional use. We highly encourage the use of this data in research, education and academia. To download complete data set, <a href="#">click here.</a></p>
        </div>
        <div class="col-6">
            <span class="icon-contribute"></span>
            <h6>Si të kontribuoni?</h6>
            <p>Kontributi më i mirë që mund të bëni është duke shtuar elemente në platformë. Kjo mund të bëhet përmes platformës, ose në një mënyrë më të organizuar. Për të kuptuar se si mund të organizohet një gjë e tillë, ju lutem mos hezitoni të na kontaktoni.</p>
        </div>
        <div class="col-6 text-en">
            <span class="icon-contribute"></span>
            <h6>How to Contribute?</h6>
            <p>The best contribution is by adding elements into the platform. This can be done via the platform, or in a more organized way. To find out how this can be arranged, please don’t hesitate to contact us.</p>
        </div>
        <div class="col-6">
            <span class="icon-feedback"></span>
            <h6>Kontakt / Feedback</h6>
            <p>PrishtinaTrees.org është gjithmonë duke u përditësuar dhe kontributi juaj është i mirëseardhur ndërsa ne vazhdojmë ta zhvillojmë atë. Ju lutemi na shkruani për rekomandimet dhe idetë tuaja për të përmirë- suar platformën ose për të na njoftuar në lidhje me çdo probleme që hasni gjatë përdorimit të saj.</p>
        </div>
        <div class="col-6 text-en">
            <span class="icon-feedback"></span>
            <h6>Contact / Feedback</h6>
            <p>PrishtinaTrees.org is always being updated and your input is welcome as we keep on developing it. Please write to us to let us know your recommendations and ideas for improving the platform or to let us know about any issues you run into while using it.</p>
        </div>
    </div>
</div>
</body>
</html>