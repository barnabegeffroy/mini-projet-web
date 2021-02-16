<h1>Visualisation </h1>

<div class="client-container">
  <div class="client-item">
    <p>
      Bonjour <?php echo $data->getFirstName(); ?> (<?php echo $data->getLastName(); ?>)
    </p>
    <p>
      Voici votre signe astrologique : <?php echo $data->getAstroSign(); ?>
    </p>
  </div>
  <?php
  include_once './horoscope.php';
  loadHoroscope($data->getAstrosign());
  ?>
</div>