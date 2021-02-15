<?php
  $clients = $data["clients"];
?>

<h1>Achat </h1>

<?php 
foreach ($clients as $client): ?>
  <form action="gestionClient.php" method="post">
    <fieldset>
      <!-- Champs caché pour avoir un choix à "m" dans gestionClient.php -->
      <input type="hidden" value="a" name="choix">
      <!-- Champs caché pour identifier le client modifié dans gestionClient.php -->
      <input type="hidden" value="<?php echo $client->getId(); ?>" name="idClient">
      <p>
Client : <?php echo $client->getId(); ?> (<?php echo $client->getLastName(); ?>)
      </p>
      <p>
Débit : <?php echo $client->getDebit(); ?>
      </p>
      <label for="prix">Prix : </label>
      <input type="number" id="prix" value="" step="0.01" min="0.01" name="prix" required="required" > €<br>
    </fieldset>
    <button type="submit">Envoyer</button>
  </form>
<?php
endforeach;

if (count($clients) == 0): ?>
  <p>Aucun client trouvé.</p>
<?php
endif;?>