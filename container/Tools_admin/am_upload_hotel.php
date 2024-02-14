<?php 
    session_start();
    require "../../config/db.php";

    if (isset($_POST['name_hotel'])) {
        $name_hotel = $_POST['name_hotel'];
        $details = $_POST['details'];
        $province = $_POST['province'];
        $country = $_POST['country'];

        $room_size1 = $_POST['room_size1'];
        $details_room1 = $_POST['details_room1'];
        $view_room1 = $_POST['view_room1'];
        $price1 = $_POST['price1'];
        $quantity1 = $_POST['quantity1'];
        $Total1 = $_POST['Total1'];

        $imageHotelName = $_FILES["image_hotel"]["name"]; 
        $imageHotelTmp = $_FILES["image_hotel"]["tmp_name"];
        $imageHotelContent = file_get_contents($imageHotelTmp);

        $image_room1_1 = $_FILES["image_room1_1"]["tmp_name"];
        $imageroomContent1_1 = (is_uploaded_file($image_room1_1)) ? file_get_contents($image_room1_1) : null;
        $image_room1_2 = $_FILES["image_room1_2"]["tmp_name"];
        $imageroomContent1_2 = (is_uploaded_file($image_room1_2)) ? file_get_contents($image_room1_2) : null;
        $image_room1_3 = $_FILES["image_room1_3"]["tmp_name"];
        $imageroomContent1_3 = (is_uploaded_file($image_room1_3)) ? file_get_contents($image_room1_3) : null;

        try {
            $stmt = $conn->prepare("INSERT INTO book_room(name_hotel, details, province, country, name_image_hotel, image_hotel, room_size1, details_room1, view_rooml, price1, quantity1, Total1, image_room1_1, image_room1_2, image_room1_3) 
            VALUES(:name_hotel, :details, :province, :country, :imageHotelName, :imageHotelContent, :room_size1, :details_room1, :view_room1, :price1, :quantity1, :Total1, :imageroomContent1_1, :imageroomContent1_2, :imageroomContent1_3)");

            $stmt->bindParam(":name_hotel", $name_hotel);
            $stmt->bindParam(":details", $details);
            $stmt->bindParam(":province", $province);
            $stmt->bindParam(":country", $country);
            $stmt->bindParam(":imageHotelName", $imageHotelName);
            $stmt->bindParam(":imageHotelContent", $imageHotelContent);
            $stmt->bindParam(":room_size1", $room_size1);
            $stmt->bindParam(":details_room1", $details_room1);
            $stmt->bindParam(":view_room1", $view_room1);
            $stmt->bindParam(":price1", $price1);
            $stmt->bindParam(":quantity1", $quantity1);
            $stmt->bindParam(":Total1", $Total1);
            $stmt->bindParam(":imageroomContent1_1", $imageroomContent1_1);
            $stmt->bindParam(":imageroomContent1_2", $imageroomContent1_2);
            $stmt->bindParam(":imageroomContent1_3", $imageroomContent1_3);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION["success"] = "Data uploaded successfully.";
                header("Location: ../../admin/pages/forms/general.php");
            } else {
                $_SESSION["error"] = "Failed to upload data. Please try again.";
                header("Location: ../../admin/pages/forms/general.php");
            }
        } catch (PDOException $e) {
            $_SESSION["error"] = "Database error: " . $e->getMessage();
            header("Location: ../../admin/pages/forms/general.php");
        }
    }
?>
