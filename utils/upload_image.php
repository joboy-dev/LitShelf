<?php
    function uploadImage($imageFile, string $uploadFolder) {
        // Get all file metadata
        $img_name = $imageFile['name'];
        $img_type = $imageFile['type'];
        $tmp_name = $imageFile['tmp_name'];
        $error = $imageFile['error'];
        $img_size = $imageFile['size'];

        // Check if file was selected
        if ($error === 0) {
            // Check if image file is too large
            if ($img_size > 1125000) {
                return 'too large';
            } else {
                $img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'png', 'jpeg');

                // Check if selected file has an allowed extension
                if (in_array($img_extension, $allowed_extensions)) {
                    // Generate unique id for image
                    $new_img_name = uniqid('IMG-', true).'.'.$img_extension;

                    // Setup upload path and upload the image to the required path
                    $img_upload_path = "uploads/$uploadFolder/".$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // echo $img_upload_path;
                    
                    return $img_upload_path;
                } else {
                    return 'invalid';
                }
            }
        } else {
            return 'no file';
        }
    }


    function uploadImageAdmin($imageFile, string $uploadFolder) {
        // Get all file metadata
        $img_name = $imageFile['name'];
        $img_type = $imageFile['type'];
        $tmp_name = $imageFile['tmp_name'];
        $error = $imageFile['error'];
        $img_size = $imageFile['size'];

        // Check if file was selected
        if ($error === 0) {
            // Check if image file is too large
            if ($img_size > 1125000) {
                return 'too large';
            } else {
                $img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'png', 'jpeg');

                // Check if selected file has an allowed extension
                if (in_array($img_extension, $allowed_extensions)) {
                    // Generate unique id for image
                    $new_img_name = uniqid('IMG-', true).'.'.$img_extension;

                    // Setup upload path and upload the image to the required path
                    $img_upload_path = "../uploads/$uploadFolder/".$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // echo $img_upload_path;
                    
                    return $img_upload_path;
                } else {
                    return 'invalid';
                }
            }
        } else {
            return 'no file';
        }
    }

    
?>