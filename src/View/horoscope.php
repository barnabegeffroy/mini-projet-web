<?php
function loadHoroscope($sign) {
?>
    <div class="horoscope">
        <?php include_once '../src/View/horoscope/'.$sign.'.php' ?>
    </div>
<?php
}
?>
