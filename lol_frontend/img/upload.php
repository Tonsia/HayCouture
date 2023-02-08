<?php

$allowedExts = array("gif", "jpeg", "jpg", "png","webp");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (true
) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        $filename = $_FILES["file"]["name"];
        //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        //echo "Type: " . $_FILES["file"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

        if (file_exists("uploads/" . $filename)) {
            echo $filename;
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "test/" . $filename);
            echo $filename;
        }
    }
} else {
    echo "Invalid file";
}
?>