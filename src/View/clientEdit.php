<?php
  $clients = $data["clients"];
?>

<h1>Modification </h1>

<?php 
foreach ($clients as $client): ?>
  <form action="gestionClient.php" method="post">
    <fieldset>
      <!-- Champs caché pour avoir un choix à "m" dans gestionClient.php -->
      <input type="hidden" value="m" name="choix">
      <!-- Champs caché pour identifier le client modifié dans gestionClient.php -->
      <input type="hidden" value="<?php echo $client->getId(); ?>" name="idClient">
      <p>
Client : <?php echo $client->getId(); ?> (<?php echo $client->getLastName(); ?>)
      </p>
      <label for="debit">Débit : </label>
      <input type="number" id="debit" value="<?php echo $client->getDebit(); ?>" step="0.01" name="debit" required="required" > €<br>
    </fieldset>
    <button type="submit">Envoyer</button>
  </form>
<?php
endforeach;

if (count($clients) == 0): ?>
  <p>Aucun client trouvé.</p>
<?php
endif;?>