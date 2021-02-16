<?php
$person = $data["person"];
?>

<h1>Visualisation </h1>


<div class="client-container">
  <div class="client-item">
    <p>
      Bonjour <?php echo $person->getFirstName(); ?> (<?php echo $person->getLastName(); ?>)
    </p>
    <p>
      Voici votre signe astrologique : <?php echo $person->getAstroSign(); ?>
    </p>
  </div>
</div>