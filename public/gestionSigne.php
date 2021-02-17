<?php
include_once '../src/utils/autoloader.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbfactory = new \Rediite\Model\Factory\dbFactory();
$dbAdapter = $dbfactory->createService();


$sex =  !empty($_POST['choix']) ? $_POST['choix'] : null;
$prenom =  !empty($_POST['prenom']) ? $_POST['prenom'] : null;
$nom =  !empty($_POST['nom']) ? $_POST['nom'] : null;
$email =  !empty($_POST['email']) ? $_POST['email'] : null;
$date =  !empty($_POST['date']) ? $_POST['date'] : null;
list($jour, $mois, $annee) = explode('/', $date);

/* // problème en choisissant le sexe
if (null == $sex) {
	// on renvoie vers l'index /!\ message d'erreur à ajouter
	afficherErreur("Choix incorrect");
	return;
} else */ if (!checkdate($mois, $jour, $annee)) {
	// on renvoie vers l'index /!\ message d'erreur à ajouter
	afficherErreur("Date saisie non valide");
	return;
} else {
	$person = new \Rediite\Model\Entity\Person($prenom, $nom, $email);
	$personRepository = new \Rediite\Model\Repository\PersonRepository($dbAdapter);
	$addSign = $personRepository->changeDateToSign($person,$jour,$mois);
	if (!$addSign) {
		afficherErreur("Erreur lors de la conversion date en signe astrologique");
		return;
	}
	$success = $personRepository->createPerson($person);
	if (!$success) {
		afficherErreur("Erreur lors de la création de la personne (existe-t-il déjà ?)");
		return;
	}

	// Récupérer le nombre de personnes du même signe
	$number =
<<<SQL
  	SELECT count(nom_signe_astro) FROM astro_personne WHERE nom_signe_astro=:sign;
SQL;
	$stmt = $dbAdapter->prepare($number);
	$stmt->bindValue(':sign', $person->getZodiacSign(), \PDO::PARAM_STR);
	$stmt->execute();
	$number = $stmt->fetch();

/* mettre du javascript ici */
?>
<body onLoad="javascript:alert('Félicitations! Tu êtes le $number ème $signe à t'être inscrit !');"\>
</body>
<?php
	// Visualise la personne créée
	$data = $person;
	include_once '../src/View/template.php';
	loadView('person', $data);
}


function afficherErreur(string $error)
{
	header('Location: index.php?erreur=' . $error);
}

?>