<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$api_url = "https://api.deepai.org/api/text2img"; // API IA (change si besoin)
$api_key = "TON_CLE_API"; // Remplace par ta clé API

// Récupération des données envoyées par le formulaire
$inputJSON = file_get_contents("php://input");
$input = json_decode($inputJSON, true);
$prompt = $input["prompt"];
$style = $input["style"];

// Création du body pour la requête API
$data = [
    "text" => $prompt . " style: " . $style
];

$options = [
    "http" => [
        "method" => "POST",
        "header" => "Authorization: Bearer " . $api_key . "\r\nContent-Type: application/json\r\n",
        "content" => json_encode($data)
    ]
];

// Envoi de la requête à l’API
$context = stream_context_create($options);
$response = file_get_contents($api_url, false, $context);

// Vérification et renvoi de la réponse
if ($response) {
    echo $response;
} else {
    echo json_encode(["error" => "Impossible de contacter l'IA"]);
}
?>
