<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Vérifier la méthode de requête
if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    echo json_encode(["error" => "Méthode non autorisée"]);
    exit;
}

// Récupération des paramètres via GET
$prompt = isset($_GET["prompt"]) ? trim($_GET["prompt"]) : "";
$style = isset($_GET["style"]) ? trim($_GET["style"]) : "Standard";

// Vérification des paramètres
if (empty($prompt)) {
    echo json_encode(["error" => "Le prompt est requis"]);
    exit;
}

// Simuler une réponse IA
$response = "Votre création : " . $prompt . " | Style : " . $style;

// Envoi de la réponse JSON propre
echo json_encode(["response" => $response]);
?>
