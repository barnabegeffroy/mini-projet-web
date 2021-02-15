<h1>Création </h1>

<form action="gestionClient.php" method="post">
  <fieldset>
    <!-- Champs caché pour avoir un choix à "c" dans gestionClient.php -->
    <input type="hidden" value="c" name="choix">

    <label for="idClient">Id : </label>
    <input type="number" id="idClient" value="" step="1" name="idClient" required="required" ><br>
    <label for="nom">Nom : </label>
    <input type="text" id="nom" placeholder="Vin GAZOLE" value="" name="nom" required="required" ><br>
    <label for="debit">Débit : </label>
    <input type="number" id="debit" value="0.00" step="0.01" name="debit" required="required" > €<br>
  </fieldset>
  <button type="submit">Créer</button>
</form>