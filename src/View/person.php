<h1>Résultat </h1>

<div class="person-container">
  <div class="person-item">
    <p>
      Bonjour <?php echo $data[0]->getFirstName(); ?> <?php echo $data[0]->getLastName(); ?>
    </p>
    <p>
      Voici votre signe astrologique : <?php echo $data[0]->getZodiacSign(); ?>
    </p>
    <p>
      Voici votre identifiant : <?php echo $data[0]->getId(); ?>
    </p>
    <p>
      Voici votre date : <?php echo $data[1]; ?>
    </p>
    <p>
      Voici votre annee : <?php echo $data[2]; ?>
    </p>
    <p>
      Voici votre jour : <?php echo intval($data[4]); ?>
    </p>
    <p>
      Voici votre mois : <?php echo $data[3]; ?>
    </p>
  </div>
  <!-- <?php
  // include_once './horoscope.php';
  // loadHoroscope($data[0]->getZodiacSign());
  ?> -->
</div>


<?php
//envoie d'un mail à l'utilisateur pour le remercier
$to      = $data[0]->getEMail();
$subject = 'Merci !';
$message = 'Merci d\'avoir participer à notre formulaire ! Nous espérons vous revoir très vite sur notre site http://pgsql.pedago.ensiie.fr/~barnabe.geffroy/mini-projet/public/ :)';
$headers = 'From: no-reply@astrologiie.ensiie' . "\r\n" .
  'Reply-To: no-reply@astrologiie.ensiie' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>