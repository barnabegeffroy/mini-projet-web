<h1>Menu </h1>

<?php
$erreur = !empty($_GET['erreur']) ? $_GET['erreur'] : null;
if (null != $erreur): ?>
<p class="error"><?php echo $erreur; ?></p>
<?php
endif;?>

<form action="gestionClient.php" method="post">
  <label for="idClient">Numéro de client :</label>
  <input type="number" id="idClient" name="idClient"/><br>

  <fieldset>
  <legend>Choix:</legend>
    <label for="v">Visualisation :</label>
    <input type="radio" id="v" value="v" name="choix" required="required" checked><br>
    <label for="m">Modification :</label>
    <input type="radio" id="m" value="m" name="choix" required="required"><br>
    <label for="c">Création :</label>
    <input type="radio" id="c" value="c" name="choix" required="required"><br>
    <label for="a">Achat :</label>
    <input type="radio" id="a" value="a" name="choix" required="required"><br>
  </fieldset>
  <button type="submit">Envoyer</button>
</form>
