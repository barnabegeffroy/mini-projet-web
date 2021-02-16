<?php
function loadHoroscope($sign) {
?>
    <div class="horoscope">
        <?php include_once '../src/View/horoscope/'.$sign.'.html' ?>
    </div>
<?php
}
?>