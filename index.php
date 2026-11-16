<?php
require_once "config.php";
require_once "fonctions.php";

$patients = [
    ["id" => 1, "nom" => "Benali Sara", "age" => 70, "code_service" => "CARDIO", "urgence" => "ROUGE"],
    ["id" => 2, "nom" => "Trabelsi Ahmed", "age" => 45, "code_service" => "DERMA", "urgence" => "ORANGE"],
    ["id" => 3, "nom" => "Jlassi Amina", "age" => 8, "code_service" => "PEDIATRIE", "urgence" => "VERT"],
    ["id" => 4, "nom" => "Ayari Karim", "age" => 68, "code_service" => "CARDIO", "urgence" => "VERT"],
];

$urgences = filtrerUrgences($patients);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Patients</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des Patients</h1>

    <div class="grille">
        <?php foreach ($patients as $p) {
            $badge = getBadgeService($p["code_service"]);
            if ($p["urgence"] === "ROUGE") {
                $classeUrgence = "urgence-rouge";
            } elseif ($p["urgence"] === "ORANGE") {
                $classeUrgence = "urgence-orange";
            } else {
                $classeUrgence = "urgence-vert";
            }
        ?>
            <div class="carte <?php echo $classeUrgence; ?>">
                <h2><?php echo $p["nom"]; ?> (<?php echo $p["age"]; ?> ans)</h2>
                <span class="badge <?php echo $badge["classe"]; ?>">
                    <?php echo $badge["libelle"]; ?>
                </span>
                <p><strong>Niveau d'urgence :</strong> <?php echo getLibelleUrgence($p["urgence"]); ?></p>
                <p><strong>Facture estimée :</strong> <?php echo calculerFacture($p["age"], TARIF_BASE_CONSULTATION); ?> TND</p>
            </div>
        <?php } ?>
    </div>

    <div class="recap">
        <h2>Récapitulatif</h2>
        <p><strong>Nombre total de patients :</strong> <?php echo count($patients); ?></p>
        <h3>Urgences Absolues (ROUGE)</h3>
        <ul>
            <?php foreach ($urgences as $u) {
                $service = getBadgeService($u["code_service"]);
            ?>
                <li><?php echo $u["nom"]; ?> - Service : <?php echo $service["libelle"]; ?></li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>