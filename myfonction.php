<?php

include 'config/connect.php';

$action = $_POST['action'];
$location = $_POST['location'];

if ($location == "login") {
    $options = array();
    $stmt = $pdo->prepare('SELECT * FROM `Agent` WHERE username=:username');
    $stmt->execute(array(':username' => $_POST['User']));
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($row) > 0) {
        if ($_POST['password'] !== $row[0]['password']) {
            $error[] = "Password is not valid";
            $resp['msg'] = $row[0]['password'] . $_POST['password'];
            $resp['status'] = false;
            echo json_encode($resp);
            exit;
        }

        session_start();

        $_SESSION['MatriAgent'] = $row[0]['MatriAgent'];
        $resp['redirect'] = "dashboard.php";
        $resp['User'] = $_SESSION['MatriAgent'];
        $resp['Username'] = $row[0]['NomAgent'] . " " . $row[0]['PrenomAgent'] . " " . $row[0]['MatriAgent'];
        $resp['status'] = true;
        echo json_encode($resp);
        exit;
    } else {
        $error[] = "username does not match";
        $resp['msg'] = $error;
        $resp['status'] = false;
        echo json_encode($resp);
        exit;
    }
} elseif ($location == "search") {
    if ($action == "Candidat") {
        if (isset($_POST['word'])) {

            $key = "%{$_POST['word']}%";

            $sql = "SELECT * FROM Candidat
	        WHERE Nom LIKE ? OR Tel LIKE ? 
            OR Email LIKE ? OR PostNom LIKE ?
            OR Prenom LIKE ?
	        LIMIT 5";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$key, $key, $key, $key, $key]);

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($results);
            } else
                echo "not found";
        }
    } elseif ($action == "Promo") {
        if (isset($_POST['word'])) {

            $key = "%{$_POST['word']}%";
            /* `Promotion`(`CodePromo`, `Intitule`, `CodeDepart`) */
            $sql = "SELECT * FROM Promotion
	        WHERE CodePromo LIKE ? OR Intitule LIKE ? 
            OR CodeDepart LIKE ? 
	        LIMIT 5";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$key, $key, $key]);

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($results);
            } else
                echo "not found";
        }
    } elseif ($action == "Inscrit") {
        if (isset($_POST['word'])) {

            $key = "%{$_POST['word']}%";
            /* `Promotion`(`CodePromo`, `Intitule`, `CodeDepart`) */
            $sql = "SELECT I.`NumInscription`,I.`DateIns`,I.`AnneeAcad`,
            I.`CodePromo`,I.`NumCand`, C.`Nom`, C.`PostNom`, C.`Prenom` FROM `Inscription` I 
            JOIN `Candidat` C ON I.`NumCand`=C.`NumCand` 
            WHERE C.`Nom` LIKE ? OR C.`Prenom` LIKE ? OR C.`PostNom` LIKE ?;";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$key, $key, $key]);

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($results);
            } else
                echo "not found";
        }
    } elseif ($action == "Frais") {
        if (isset($_POST['word'])) {

            $key = "%{$_POST['word']}%";
            /* `Promotion`(`CodePromo`, `Intitule`, `CodeDepart`) */
            $sql = "SELECT `CodeFrais`, `MontFrais`, `LibFrais` FROM `Frais` WHERE `CodeFrais` LIKE ? OR `LibFrais` LIKE ? ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$key, $key]);

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($results);
            } else
                echo "not found";
        }
    } elseif ($action == "Doc") {
        if (isset($_POST['word'])) {

            $key = "%{$_POST['word']}%";
            /* `Promotion`(`CodePromo`, `Intitule`, `CodeDepart`) */
            $sql = "SELECT `CodeDoc`, `LibDoc` FROM `Document` WHERE `CodeDoc` LIKE ? OR `LibDoc` LIKE ? ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$key, $key]);

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($results);
            } else
                echo "not found";
        }
    }

} elseif ($location == "Candidat") {
    $formData = $_POST['formData'];
    parse_str($formData, $parsedData);

    $nom = $parsedData['nom']; // Récupérer la valeur de 'nom'
    $postnom = $parsedData['postnom']; // Récupérer la valeur de 'postnom'
    $prenom = $parsedData['prenom']; // Récupérer la valeur de 'prenom'
    $dannai = $parsedData['dannai']; // Récupérer la valeur de 'dannai'
    $sexe = $parsedData['sexe']; // Récupérer la valeur de 'sexe'
    $adresse = $parsedData['adresse']; // Récupérer la valeur de 'adresse'
    $tel = $parsedData['tel']; // Récupérer la valeur de 'tel'
    $mail = $parsedData['mail']; // Récupérer la valeur de 'mail'

    if ($action == "Insert") {
        $stmt = $pdo->prepare('CALL InsertCandidat (:nom, :postnom, :prenom, :dannai, :sexe, :adresse, :tel, :mail)');
        $stmt->execute(
            array(
                'nom' => $nom,
                'postnom' => $postnom,
                'prenom' => $prenom,
                'dannai' => $dannai,
                'sexe' => $sexe,
                'adresse' => $adresse,
                'tel' => $tel,
                'mail' => $mail,
            )
        );
        if ($stmt) {
            print("ajout de $nom effectuer \n");
        }

    } elseif ($action == "Update") {

        $stmt = $pdo->prepare('CALL UpdateCandidat (:mat, :nom, :postnom, :prenom, :dannai, :sexe, :adresse, :tel, :mail)');
        $stmt->execute(
            array(
                'mat' => $mat,
                'nom' => $nom,
                'postnom' => $postnom,
                'prenom' => $prenom,
                'dannai' => $dannai,
                'sexe' => $sexe,
                'adresse' => $adresse,
                'tel' => $tel,
                'mail' => $mail,
            )
        );
        if ($stmt) {
            print("Modification du $mat effectuer \n");
        }
    } elseif ($action == "Delete") {
        $stmt = $pdo->prepare('DELETE FROM Candidat WHERE :mat');
        $stmt->execute(
            array(
                'mat' => $mat,
            )
        );

        if ($stmt) {
            print("Suppresion du $mat effectuer \n");
        }
    } elseif ($action == "LoadSingle") {
        $numcand = $_POST['numcand'];
        $options = array();
        $stmt = $pdo->prepare('SELECT * FROM `Candidat` WHERE numcand=:numcand');

        if ($stmt) {
            if (
                $stmt->execute(
                    array(
                        'numcand' => $numcand,
                    )
                )
            ) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $options[] = $row;
                }
                $dataset = array(
                    "echo" => 1,
                    "totalrecords" => count($options),
                    "totaldisplayrecords" => count($options),
                    "data" => $options
                );

                echo json_encode($dataset);

            } else {
                echo "Erreur lors de l'exécution de la requête.";
            }
        } else {
            echo "Erreur lors de la préparation de la requête.";
        }
    } elseif ($action == "Loaddata") {
        $options = array();
        $stmt = $pdo->prepare('SELECT * FROM `Candidat` ORDER BY `Candidat`.`NumCand` DESC');
        if ($stmt) {
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $options[] = $row;
                }

                $dataset = array(
                    "echo" => 1,
                    "totalrecords" => count($options),
                    "totaldisplayrecords" => count($options),
                    "data" => $options
                );

                echo json_encode($dataset);

            } else {
                echo "Erreur lors de l'exécution de la requête.";
            }
        } else {
            echo "Erreur lors de la préparation de la requête.";
        }
    }
} elseif ($location == "Document") {
    extract($_POST);
    $CodeDoc = $_POST['CodeDoc'];
    $LibDoc = $_POST['LibDoc'];
    if ($action == "Insert") {
        $stmt = $pdo->prepare('INSERT INTO `Document`(`CodeDoc`, `LibDoc`) VALUES (:CodeDoc, :LibDoc)');
        $stmt->execute(
            array(
                'CodeDoc' => $CodeDoc,
                'LibDoc' => $LibDoc,
            )
        );
        /* if ($stmt) {
            print("ajout du document: $LibDoc effectuer \n");
            echo json_encode(array('message' => 'Data inserted'));
        } */
    } elseif ($action == "Update") {

        $stmt = $pdo->prepare('UPDATE `Document`  SET CodeDoc= :CodeDoc, LibDoc= :LibDoc WHERE CodeDoc= :CodeDoc');
        $stmt->execute(
            array(
                'CodeDoc' => $CodeDoc,
                'LibDoc' => $LibDoc,
            )
        );
        if ($stmt) {
            print("Modification du document: $LibDoc effectuer \n");
        }
    } elseif ($action == "Delete") {
        $stmt = $pdo->prepare('DELETE FROM `Document` WHERE CodeDoc= :CodeDoc');
        $stmt->execute(
            array(
                'CodeDoc' => $CodeDoc,
            )
        );
        if ($stmt) {
            print("suppression du document: $LibDoc effectuer \n");
        }
    } elseif ($action == "Loaddata") {
        $options = array();
        $stmt = $pdo->prepare('SELECT * FROM `Document`');
        if ($stmt) {
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $options[] = $row;
                }

                $dataset = array(
                    "echo" => 1,
                    "totalrecords" => count($options),
                    "totaldisplayrecords" => count($options),
                    "data" => $options
                );

                echo json_encode($dataset);

            } else {
                echo "Erreur lors de l'exécution de la requête.";
            }
        } else {
            echo "Erreur lors de la préparation de la requête.";
        }

    } elseif ($action == "LoadSingle") {
        $options = array();
        $stmt = $pdo->prepare('SELECT * FROM `Document` WHERE CodeDoc=:CodeDoc');

        if ($stmt) {
            if (
                $stmt->execute(
                    array(
                        'CodeDoc' => $CodeDoc,
                    )
                )
            ) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $options[] = $row;
                }
                $dataset = array(
                    "echo" => 1,
                    "totalrecords" => count($options),
                    "totaldisplayrecords" => count($options),
                    "data" => $options
                );

                echo json_encode($dataset);

            } else {
                echo "Erreur lors de l'exécution de la requête.";
            }
        } else {
            echo "Erreur lors de la préparation de la requête.";
        }

    }
} elseif ($location == "Deposer") {

    $numcand = $_POST['numcand'];
    $CodeDoc = $_POST['CodeDoc'];
    $Mention = $_POST['Mention'];
    $Pourcentage = $_POST['Pourcentage'];
    $LieuEtablit = $_POST['LieuEtablit'];

    if ($action == "Insert") {
        $stmt = $pdo->prepare("INSERT INTO `Deposer`(`LieuEtablit`, `Mention`, `Pourcentage`, `NumCand`, `CodeDoc`) 
        VALUES  (:LieuEtablit, :Mention, :Pourcentage, :NumCand, :CodeDoc)");
        $stmt->execute(
            array(
                'NumCand' => $numcand,
                'CodeDoc' => $CodeDoc,
                'Mention' => $Mention,
                'LieuEtablit' => $LieuEtablit,
                'Pourcentage' => $Pourcentage,
            )
        );
        if ($stmt) {
            print("Depot Dossier effectuer par $numcand effectuer \n");
        }

    }
} elseif ($location == "Section") {
    $CodeSection = "INFO"; // Le code de la section
    $Libelle = "Informatique"; // Le libellé de la section

    if ($action == "Insert") {
        $stmt = $pdo->prepare("INSERT INTO `Section`(`CodeSection`, `Libelle`) 
        VALUES (:CodeSection, :Libelle)");
        $stmt->execute(
            array(
                'CodeSection' => $CodeSection,
                'Libelle' => $Libelle,
            )
        );
        if ($stmt) {
            print("Section $Libelle ($CodeSection) ajoutée avec succès \n");
        }
    }
} elseif ($location == "Promotion") {
    $CodePromo = "INFO2023"; // Le code de la promotion
    $Intitule = "Informatique 2023"; // L'intitulé de la promotion
    $CodeDepart = "INFO"; // Le code du département auquel la promotion est rattachée

    if ($action == "Insert") {
        $stmt = $pdo->prepare("INSERT INTO `Promotion`(`CodePromo`, `Intitule`, `CodeDepart`) 
        VALUES (:CodePromo, :Intitule, :CodeDepart)");
        $stmt->execute(
            array(
                'CodePromo' => $CodePromo,
                'Intitule' => $Intitule,
                'CodeDepart' => $CodeDepart,
            )
        );
        if ($stmt) {
            print("Promotion $Intitule ($CodePromo) ajoutée avec succès \n");
        }
    }
} elseif ($location == "Inscription") {

    $NumCand = $_POST['numcand']; // Remplacez par la valeur appropriée
    $DateIns = $_POST['Date']; // La date d'inscription (à remplacer par la date actuelle)
    $AnneeAcad = $_POST['Annaca']; // L'année académique de l'inscription
    $CodePromo = $_POST['codepromo']; // Le code de la promotion
    $parts = explode('/', $DateIns);
    $formattedDate = $parts[2] . '-' . $parts[1] . '-' . $parts[0];

    $Noms = "Munzemba dimbueni Esdras";
    $parts = explode(" ", $Noms);

    if ($action == "Insert") {
        $stmt = $pdo->prepare("INSERT INTO `Inscription`( `DateIns`, `AnneeAcad`, `CodePromo`, NumCand) 
        VALUES (:DateIns, :AnneeAcad, :CodePromo, :NumCand)");
        $stmt->execute(
            array(
                'DateIns' => $formattedDate,
                'AnneeAcad' => $AnneeAcad,
                'CodePromo' => $CodePromo,
                'NumCand' => $NumCand,
            )
        );
        if ($stmt) {
            print("Inscription de $NumCand effectuée \n");
        }
    }
} elseif ($location == "Paiement") {

    $Motif = $_POST['Motif'];
    $NumInscription = $_POST['NumInscription'];
    $MatriAgent = $_POST['MatriAgent'];
    $Montant = $_POST['Montant'];
    $Caissier = $_POST['Caissier'];
    $Date = $_POST['Date'];
    $CodeFrais = "SELECT `CodeFrais` FROM `Frais` WHERE `LibFrais`=$Motif";

    if ($action == "Insert") {
        $stmt = $pdo->prepare("INSERT INTO `Paiement`( `Motif`, `NumInscription`, `MatriAgent`) 
        VALUES (:Motif, :NumInscription, :MatriAgent)");
        $stmt->execute(
            array(
                'Motif' => $Motif,
                'NumInscription' => $NumInscription,
                'MatriAgent' => $MatriAgent,
            )
        );
        if ($stmt) {
            $NumPaie = $pdo->lastInsertId();
            $stmt = $pdo->prepare("INSERT INTO `Concerner`(`MontPaye`, `NumPaie`, `CodeFrais`) 
            VALUES (:MontPaye, :NumPaie, (SELECT `CodeFrais` FROM `Frais` WHERE `LibFrais`=:LibFrais))");
            $stmt->execute(
                array(
                    'MontPaye' => $Montant,
                    'NumPaie' => $NumPaie,
                    'LibFrais' => $Motif,
                )
            );
            echo json_encode($NumPaie);


        }
    }
}