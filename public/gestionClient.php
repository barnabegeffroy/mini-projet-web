<?php
include_once '../src/utils/autoloader.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbfactory = new \Rediite\Model\Factory\dbFactory();
$dbAdapter = $dbfactory->createService();

$clientHydrator = new \Rediite\Model\Hydrator\ClientHydrator();
$clientRepository = new \Rediite\Model\Repository\ClientRepository($dbAdapter, $clientHydrator);
$achatHydrator = new \Rediite\Model\Hydrator\AchatHydrator();
$achatRepository = new \Rediite\Model\Repository\AchatRepository($dbAdapter, $achatHydrator);

$sex =  !empty($_POST['choix']) ? $_POST['choix'] : null;
$prenom =  !empty($_POST['prenom']) ? $_POST['prenom'] : null;
$nom =  !empty($_POST['nom']) ? $_POST['nom'] : null;
$email =  !empty($_POST['email']) ? $_POST['email'] : null;
$date =  !empty($_POST['date']) ? $_POST['date'] : null;
list($jour, $mois, $annee) = explode('/', $date);

// problème en choisissant le sexe
if (null == $sex) {
	// on renvoie vers l'index /!\ message d'erreur à ajouter
	afficherErreur("Choix incorrect");
	return;
}
else if (null == $idClient && $choixMenu != 'c') {
	// on renvoie vers l'index /!\ message d'erreur à ajouter
	afficherErreur("Numéro de client requis pour ce choix");
	return;
}
else if (! checkdate($mois,$jour,$annee)){
	afficherErreur("Date saisie non valide");
	return;
}

else {		
		case 'c':
			$nom = !empty($_POST['nom']) ? $_POST['nom'] : null;
			$debit = !empty($_POST['debit']) ? $_POST['debit'] : null;
			if (null == $nom) {
				// Appelé depuis le formulaire de home.php
				include_once '../src/View/template.php';
				loadView('clientCreate', $data);
			}
			else {
				// Appelé depuis le formulaire de clientCreate.php
				$success = $clientRepository->createClient($idClient, $nom, $debit);
				if (!$success) {
					afficherErreur("Erreur lors de la création du client (existe-t-il déjà ?)");
					return;
				}

				// Cherche le client créé la ligne précédente et le visualise
				$data = ['clients' => $clientRepository->findClientById($idClient)];
				include_once '../src/View/template.php';
				loadView('client', $data);
			}
		default:
			afficherErreur("Choix incorrect");
			break;
	}
}

function afficherErreur(string $error) {
	header('Location: index.php?erreur='.$error); 
}
