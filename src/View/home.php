<h1>Découvrez votre signe astrologique !</h1>

<?php
$erreur = !empty($_GET['erreur']) ? $_GET['erreur'] : null;
if (null != $erreur) : ?>
  <p class="error"><?php echo $erreur; ?></p>
<?php
endif; ?>

<form action="gestionClient.php" method="post">
  <label for="prenom">Prénom :</label>
  <input type="text" id="prenom" name="prenom" required="required"/><br>
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom" required="required"/><br>
  <label for="email">Email :</label>
  <input type="text" id="email" name="email" required="required"/><br>
  <label for="email">Date de naissance (jj/mm/aaaa):</label>
  <input type="text" id="date" name="date" required="required"/><br>
  <fieldset>
    <legend>Etes-vous un homme ou une femme?</legend>
    <label for="h">Homme</label>
    <input type="radio" id="h" value="h" name="sex" required="required"><br>
    <label for="f">Femme</label>
    <input type="radio" id="f" value="f" name="sex" required="required"><br>
    <label for="a">Autre</label>
    <input type="radio" id="a" value="a" name="sex" required="required"><br>
  </fieldset>
  <button type="submit">Envoyer</button>
</form>