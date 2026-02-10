<?php
function uploadImage($file, $uploadDir)
{
    // Check if the file was uploaded without errors
    if ($file['error'] === 0) {

        // Generate a unique file name to avoid overwriting existing files
        $uniqueFilename = uniqid() . '_' . $file['name'];

        // Specify the full path to the destination file
        $uploadPath = $uploadDir . $uniqueFilename;


        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file['tmp_name'], __DIR__ . '/../' . $uploadPath)) {
            return "http://localhost/www/pemiloss/" . $uploadPath; // Return the path to the uploaded image
        } else {
            return false; // Upload failed
        }
    } else {
        // Handle upload errors
        return false;
    }
}
