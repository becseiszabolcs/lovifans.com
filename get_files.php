<?php
// Validate and sanitize input parameters
$file = isset($_GET['file']) ? basename($_GET['file']) : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;
$date = isset($_GET['date']) ? $_GET['date'] : null;







// Check if required parameters are provided
if ($file !== null && $type !== null && $date !== null) {
    // Validate $type if necessary (e.g., check if it's 'image')

    // Construct the file path based on parameters
    $filePath = "$_SERVER[DOCUMENT_ROOT]/private/uploads/$type/$date/$file";

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set appropriate headers
        header('Content-Type: ' . mime_content_type($filePath));
        header('Content-Disposition: inline; filename="' . $file . '"');

        // Output the file contents
        readfile($filePath);
        exit; // Stop further execution
    } else {
        // If the file is not found, return a 404 error
        http_response_code(404);
        echo 'File not found.';
    }
} else {
    // If required parameters are missing, return a 400 error
    http_response_code(400);
    echo 'Bad request.';
}
