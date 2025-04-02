<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: /login.php");
    exit();
}

require_once "/var/www/php/config/database.php";
require_once "/var/www/php/models/Image.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION["user_id"];
    error_log("User ID: $userId");

    if (isset($_POST["capturedImage"]) && isset($_POST["selectedFilter"])) {
        $capturedImageData = $_POST["capturedImage"];
        $imageId = Image::saveImage($userId, $capturedImageData);

        if ($imageId !== false) {
            header("Location: " . $_SERVER["REQUEST_URI"]);
            exit();
        } else {
            echo "Failed to save image.";
        }
    }

    if (isset($_FILES["imageFile"])) {
        $fileTmpPath = $_FILES["imageFile"]["tmp_name"];
        $fileName = basename($_FILES["imageFile"]["name"]);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedfileExtensions = ["jpg", "gif", "png"];
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $newFileName = md5(time() . $fileName) . "." . $fileExtension;
            $uploadFileDir = "/var/www/html/uploads/";
            $dest_path = $uploadFileDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $imageData = file_get_contents($dest_path);
                $imageId = Image::saveImage($userId, $imageData);
                if ($imageId !== false) {
                    header("Location: " . $_SERVER["REQUEST_URI"]);
                    exit();
                } else {
                    echo "Failed to save image.";
                }
            } else {
                echo "There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.";
            }
        } else {
            echo "Upload failed. Allowed file types: " .
                implode(",", $allowedfileExtensions);
        }
    }

    if (isset($_POST["deleteImageId"])) {
        $imageId = $_POST["deleteImageId"];
        if (Image::deleteImage($userId, $imageId)) {
            header("Location: " . $_SERVER["REQUEST_URI"]);
            exit();
        } else {
            echo "Failed to delete image.";
        }
    }
}

include "/var/www/html/photobooth.html";
?>
