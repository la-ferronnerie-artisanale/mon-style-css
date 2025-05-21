<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Vérification de la méthode de requête
if ($_SERVER["REQUEST_METHOD"] !== "POST" && $_SERVER["REQUEST_METHOD"] !== "GET") {
    echo json_encode(["error" => "Méthode non autorisée"]);
    exit;
}

// Récupération des données (POST ou GET)
$prompt = isset($_POST["prompt"]) ? trim($_POST["prompt"]) : (isset($_GET["prompt"]) ? trim($_GET["prompt"]) : "");
$style = isset($_POST["style"]) ? trim($_POST["style"]) : (isset($_GET["style"]) ? trim($_GET["style"]) : "");

// Vérification des paramètres
if (empty($prompt)) {
    echo json_encode(["error" => "Le prompt est requis"]);
    exit;
}

// Simule une réponse IA (à remplacer par une vraie API)
$response = "Votre création : " . $prompt . " | Style : " . ($style ?: "Standard");

// Envoi de la réponse JSON
echo json_encode(["response" => $response]);
?>
