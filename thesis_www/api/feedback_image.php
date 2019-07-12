<?php
header('Access-Control-Allow-Origin: *');


if(isset($_FILES["feedbackImageFile"]) && $_FILES['feedbackImageFile']['size'] != 0){
    $target_dir = "../uploads/feedback/";
    $target_file = $target_dir . basename($_FILES["feedbackImageFile"]["name"]);
    $uploadOk = 1;
    $jpgFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    // Check file size
    if ($_FILES["feedbackImageFile"]["size"] > 9999999) {
        die('error');
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($jpgFileType != "jpg") {
        die('error');
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        die('error');
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["feedbackImageFile"]["tmp_name"], $target_file)) {
            $data = ['success' => true, 'message' => 'Upload and move success', 'fileName' => basename( $_FILES["feedbackImageFile"]["name"])];
            echo json_encode($data);
        } else {
            die('error');
        }
    }
}
 
?>