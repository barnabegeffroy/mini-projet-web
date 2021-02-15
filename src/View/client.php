<?php
  $clients = $data["clients"];
?>

<h1>Visualisation </h1>

<?php 
foreach ($clients as $client): ?>
  <div class="client-container">
    <div class="client-item">
      <p>
Client : <?php echo $client->getId(); ?> (<?php echo $client->getLastName(); ?>)
      </p>
      <p>
Débit : <?php echo $client->getDebit(); ?>
      </p>
    </div>
  </div>
<?php
endforeach;

if (count($clients) == 0): ?>
  <p>Aucun client trouvé.</p>
<?php
endif;?>