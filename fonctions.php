<?php
function calculerFacture(int $age, float $tarifBase): float {
    if ($age > 65) {
        return $tarifBase * 1.20;
    } else {
        return $tarifBase;
    }
}

function getBadgeService(string $codeService): array {
    switch ($codeService) {
        case "CARDIO":
            return ["libelle" => "Cardiologie", "classe" => "badge-cardio"];
        case "DERMA":
            return ["libelle" => "Dermatologie", "classe" => "badge-derma"];
        case "PEDIATRIE":
            return ["libelle" => "Pédiatrie", "classe" => "badge-pediatrie"];
        default:
            return ["libelle" => "Autre", "classe" => "badge-default"];
    }
}

function filtrerUrgences(array $patients): array {
    return array_filter($patients, fn(array $p): bool => $p["urgence"] === "ROUGE");
}

function getLibelleUrgence(string $codeUrgence): string {
    switch ($codeUrgence) {
        case "ROUGE":
            return "Urgence absolue";
        case "ORANGE":
            return "Urgence relative";
        case "VERT":
            return "Consultation standard";
        default:
            return "Inconnu";
    }
}