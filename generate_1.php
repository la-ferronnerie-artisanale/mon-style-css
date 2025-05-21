<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Vérification de la méthode de requête
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["error" => "Utilisez une requête POST"]);
    exit;
}

// Récupération des données JSON envoyées
$inputJSON = file_get_contents("php://input");
$input = json_decode($inputJSON, true);

// Vérification des paramètres
$prompt = trim($input["prompt"] ?? "");
$style = trim($input["style"] ?? "");

if (empty($prompt)) {
    echo json_encode(["error" => "Le prompt est requis"]);
    exit;
}

// Simule une réponse IA (à remplacer par une vraie API)
$response = "Votre création : " . $prompt . " | Style : " . ($style ?: "Standard");

// Envoi de la réponse JSON
echo json_encode(["response" => $response]);
?>
