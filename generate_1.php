<?php
// Autorisations CORS et contenu JSON
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Désactiver CSP stricte (optionnel, uniquement si problème de sécurité)
header("Content-Security-Policy: default-src * data: blob: 'unsafe-inline' 'unsafe-eval';");

// Vérifier la méthode de requête (GET et POST acceptés)
if ($_SERVER["REQUEST_METHOD"] !== "GET" && $_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["error" => "Méthode non autorisée"]);
    exit;
}

// Récupération des paramètres via GET ou POST
$prompt = !empty($_GET["prompt"]) ? trim($_GET["prompt"]) : (!empty($_POST["prompt"]) ? trim($_POST["prompt"]) : "");
$style = !empty($_GET["style"]) ? trim($_GET["style"]) : (!empty($_POST["style"]) ? trim($_POST["style"]) : "Standard");

// Vérification des paramètres obligatoires
if (empty($prompt)) {
    echo json_encode(["error" => "Le prompt est requis"]);
    exit;
}

// Simuler une réponse IA (personnalisable)
$response = "✅ Votre création : " . ucfirst($prompt) . " | Style : " . ucfirst($style);

// Envoi de la réponse JSON propre
echo json_encode(["response" => $response]);
?>
