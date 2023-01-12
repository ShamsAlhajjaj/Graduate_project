<?php


if (
    isset($_POST['upload'])
    && $_POST['book_dis'] > 0
    && $_POST['book_name'] > 0 && $_POST['author_name'] > 0
) {
    $book_name = $_POST['book_name'];
    $book_dis = $_POST['book_dis'];
    $author = $_POST['author_name'];

    try {
        $db = new PDO("mysql:host=localhost; dbname=shams", "root", "");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $target_dir = "book/";
    $target_dir2 = "_images/playback_images/";

    $audio_types = array("audio/mpeg", "audio/mp3", "audio/ogg");
    $image_types = array("image/jpeg", "image/png", "image/gif");

    // الملف الأول
    $file_info = pathinfo($_FILES["ubook"]["name"]);
    $new_filename = $book_name . uniqid() . "." . $file_info["extension"];
    $target_file = $target_dir . $new_filename;

    if (in_array($_FILES["ubook"]["type"], $audio_types) /*&& $_FILES["ubook"]["size"] <= 100097152*/) {
        if (move_uploaded_file($_FILES["ubook"]["tmp_name"], $target_file)) {
            $book = $new_filename;
            echo "The file " . $book . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your sound Book.";
        }
    } else {
        echo "Sorry, the file type or size is not allowed.";
    }

    // الملف الثاني
    $file_info = pathinfo($_FILES["uimg"]["name"]);
    $new_filename = $book_name . uniqid() . "." . $file_info["extension"];
    $target_file = $target_dir2 . $new_filename;

    if (in_array($_FILES["uimg"]["type"], $image_types) /*&& $_FILES["uimg"]["size"] <= 10097152*/) {
        if (move_uploaded_file($_FILES["uimg"]["tmp_name"], $target_file)) {
            $img = $new_filename;
            echo "The file " . $img . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your image.";
        }
    } else {
        echo "Sorry, the file type or size is not allowed.";
    }

    ////////////////////////////////////////////////////////



    $query = $db->prepare(
        "INSERT INTO `books`(`name`, `dis`, `author`, `cover`, `dir`, `language`)
    VALUES ('" . $book_name . "','" . $book_dis . "','" . $author . "','" . $img . "','book/" . $book . "','ar')"
    );
    $query->execute();
} else {
    echo "<h1>there is an error</h1>";
}