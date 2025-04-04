<?php

require_once "/var/www/php/config/database.php";
require_once "/var/www/php/models/db.php";

class Image
{
    public static function saveImage($userId, $imageData)
    {
        $conn = DB::getConnection();
        $stmt = $conn->prepare(
            "INSERT INTO images (user_id, image_data) VALUES (:userId, :imageData)"
        );
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":imageData", $imageData, PDO::PARAM_LOB);
        if ($stmt->execute()) {
            return $conn->lastInsertId();
        } else {
            return false;
        }
    }

    public static function getRecentImagesByUserId($userId, $limit = 10)
    {
        $conn = DB::getConnection();
        $stmt = $conn->prepare(
            "SELECT * FROM images WHERE user_id = :userId ORDER BY created_at DESC LIMIT :limit"
        );
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteImage($userId, $imageId)
    {
        $conn = DB::getConnection();
        $stmt = $conn->prepare(
            "DELETE FROM images WHERE user_id = :userId AND id = :imageId"
        );
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":imageId", $imageId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function getAllImages()
    {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM images ORDER BY created_at DESC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function incrementLikes($imageId)
    {
        $conn = DB::getConnection();
        $stmt = $conn->prepare(
            "UPDATE images SET likes_count = likes_count + 1 WHERE id = :imageId"
        );
        $stmt->bindParam(":imageId", $imageId);
        return $stmt->execute();
    }

    public static function decrementLikes($imageId)
    {
        $conn = DB::getConnection();
        $stmt = $conn->prepare(
            "UPDATE images SET likes_count = GREATEST(likes_count - 1, 0) WHERE id = :imageId"
        );
        $stmt->bindParam(":imageId", $imageId);
        return $stmt->execute();
    }

    public static function getLikesCount($imageId)
    {
        $conn = DB::getConnection();
        $stmt = $conn->prepare(
            "SELECT likes_count FROM images WHERE id = :imageId"
        );
        $stmt->bindParam(":imageId", $imageId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['likes_count'];
    }
}
?>
