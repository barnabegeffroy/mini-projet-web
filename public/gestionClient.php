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

$choixMenu =  !empty($_POST['choix']) ? $_POST['choix'] : null;
$idClient =  !empty($_POST['idClient']) ? $_POST['idClient'] : null;


// problème en choisissant le menu
if (null == $choixMenu) {
	// on renvoie vers l'index /!\ message d'erreur à ajouter
	afficherErreur("Choix incorrect");
	return;
}
else if (null == $idClient && $choixMenu != 'c') {
	// on renvoie vers l'index /!\ message d'erreur à ajouter
	afficherErreur("Numéro de client requis pour ce choix");
	return;
}
else {
	$data = null != $idClient ? ['clients' => $clientRepository->findClientById($idClient)] : null;
	switch ($choixMenu) {
		case 'v':
			include_once '../src/View/template.php';
			loadView('client', $data);
			break;
			
		case 'm':
			$debit = !empty($_POST['debit']) ? $_POST['debit'] : null;
			if (null == $debit) {
				// Appelé depuis le formulaire de home.php
				include_once '../src/View/template.php';
				loadView('clientEdit', $data);
			}
			else {
				// Appelé depuis le formulaire de clientEdit.php
				$success = $clientRepository->changeClientDebit($idClient, $debit);
				if (!$success) {
					afficherErreur("Erreur lors du changement du débit du client");
					return;
				}

				// Met à jour le client modifié la ligne précédente et le visualise
				$data = ['clients' => $clientRepository->findClientById($idClient)];
				include_once '../src/View/template.php';
				loadView('client', $data);
			}
			break;
			
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
			break;
			
		case 'a':
			$prix = !empty($_POST['prix']) ? $_POST['prix'] : null;
			if (null == $prix) {
				// Appelé depuis le formulaire de home.php
				include_once '../src/View/template.php';
				loadView('clientBuy', $data);
			}
			else {
				// Appelé depuis le formulaire de clientBuy.php
				
				$client = count($data['clients']) > 0 ? $data['clients'][0] : null;
				if (null == $client) {
					afficherErreur("Erreur client non trouvé");
					return;
				}
				// Création de l'achat
				$success = $achatRepository->createAchat($prix, $client->getId());
				if (!$success) {
					afficherErreur("Erreur lors de la création de l'achat");
					return;
				}
				// Débit du compte de l'acheteur
				$success = $clientRepository->changeClientDebit($client->getId(), $client->getDebit() - $prix);
				if (!$success) {
					afficherErreur("Erreur lors du changement du débit du client");
					return;
				}

				// Met à jour les données du client visualisé
				$data = ['clients' => $clientRepository->findClientById($idClient)];
				include_once '../src/View/template.php';
				loadView('client', $data);
			}
			break;
		
		default:
			afficherErreur("Choix incorrect");
			break;
	}
}

function afficherErreur(string $error) {
	header('Location: index.php?erreur='.$error); 
}
