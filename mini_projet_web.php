<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Horoscope de bg</title>
    </head>
    <body>
      <p> <h3> Découvrez votre horoscope selon votre signe astrologique </h3> </p>
    <form action="cible.php" method="POST">
        <p> <label> Prénom : <input type="text" name="prenom"/> </label> </p>
        <p> <label> Nom : <input type="text" name="nom"/> </label> </p>
     	<p> Etes-vous un homme ou une femme? </p>
		<input type="radio" name="genre" value="homme" id="homme" checked="checked" /> <label for="homme">Homme</label>
		<input type="radio" name="genre" value="femme" id="femme" /> <label for="femme">Femme</label>
        <p> <label> Date de naissance (jj-mm-aaaa) : <input type="text" name="date"/> </label> </p>
        <p> <input type="submit" /> </p>

    </form>

    </body>
</html>
