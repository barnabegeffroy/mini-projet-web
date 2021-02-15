<h1>Horoscope</h1>

<?php
$erreur = !empty($_GET['erreur']) ? $_GET['erreur'] : null;
if (null != $erreur) : ?>
  <p class="error"><?php echo $erreur; ?></p>
<?php
endif; ?>

<form action="gestionClient.php" method="post">
  <label for="prenom">Prénom :</label>
  <input type="text" id="prenom" name="prenom" /><br>
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom" /><br>
  <fieldset>
    <legend>Etes-vous un homme ou une femme?</legend>
    <label for="h">Homme</label>
    <input type="radio" id="h" value="h" name="choix" required="required"><br>
    <label for="f">Femme</label>
    <input type="radio" id="f" value="f" name="choix" required="required"><br>
    <label for="a">Autre</label>
    <input type="radio" id="a" value="a" name="choix" required="required"><br>
  </fieldset>
  <button type="submit">Envoyer</button>
</form>