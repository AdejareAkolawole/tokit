<?php
if (isset($_GET['url'])) {
    $fileUrl = $_GET['url'];
    $fileName = "TikTok_Video_" . time() . ".mp4";

    header('Content-Description: File Transfer');
    header('Content-Type: video/mp4');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    
    // Read the file from the external URL and output it
    readfile($fileUrl);
    exit;
}
?>