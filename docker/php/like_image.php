<?php
session_start();
require_once "/var/www/php/models/Image.php";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    http_response_code(401);
    echo json_encode(["error" => "Non autorisé"]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["image_id"])) {
    $imageId = $_POST["image_id"];
    
    if (Image::incrementLikes($imageId)) {
        $newCount = Image::getLikesCount($imageId);
        echo json_encode([
            "success" => true,
            "likes_count" => $newCount
        ]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Erreur lors de la mise à jour des likes"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Requête invalide"]);
}
?> 