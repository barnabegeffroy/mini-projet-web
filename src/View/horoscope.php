<?php
function loadHoroscope($sign)
{
?>
    <div class="horoscope">
        <?php include_once '../View/horoscope/' . $sign . '.html' ?>
    </div>
<?php
}
?>