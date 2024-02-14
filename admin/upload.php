<?php 
    session_start();
    require "../config/db.php";

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $room_size = $_POST['room_size'];

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            $imageName = $_FILES["image"]["name"]; 
            $image = $_FILES["image"]["tmp_name"];
            $imgContent = file_get_contents($image);
   
            try {
                $stmt = $conn->prepare("INSERT INTO book_room3(name, room_size, image_name, image_data) VALUES(:name, :room_size, :image_name, :imgContent)");
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":room_size", $room_size);
                $stmt->bindParam(":image_name", $imageName);
                $stmt->bindParam(":imgContent", $imgContent);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $_SESSION["success"] = "Image uploaded successfully.";
                    header("Location: Upload_Image.php");
                } else {
                    $_SESSION["error"] = "Failed to upload image. please try again.";
                    header("Location: Upload_Image.php");
                }
            } catch (PDOException $e) {
                $_SESSION["error"] = "Database error: " . $e->getMessage();
                header("Location: Upload_Image.php");
            }
        } else {
            $_SESSION["error"] = "Please select an image file to upload.";
            header("Location: Upload_Image.php");
        }
    }
?>
