<h1>Résultat </h1>

<div class="person-container">
  <div class="person-item">
    <p>
      Bonjour <?php echo $data->getFirstName(); ?> (<?php echo $data->getLastName(); ?>)
    </p>
    <p>
      Voici votre signe astrologique : <?php echo $data->getZodiacSign(); ?>
    </p>
  </div>
  <!-- <?php
  // include_once './horoscope.php';
  // loadHoroscope($data->getZodiacSign());
  ?> -->
</div>


<?php
//envoie d'un mail à l'utilisateur pour le remercier
$to      = $data->getEMail();
$subject = 'Merci !';
$message = 'Merci d\'avoir participer à notre formulaire ! Nous espérons vous revoir très vite sur notre site http://pgsql.pedago.ensiie.fr/~barnabe.geffroy/mini-projet/public/ :)';
$headers = 'From: no-reply@astrologiie.ensiie' . "\r\n" .
  'Reply-To: no-reply@astrologiie.ensiie' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>