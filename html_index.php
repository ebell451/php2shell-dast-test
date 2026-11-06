<?php
// Simple multi-part form target for DAST behavioral scanning.
// It explicitly reads PHP input stream data to trigger the multi-part parser.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: text/plain');

    // Accessing POST or FILES array triggers multi-part boundary processing in PHP core
    $fileCount = isset($_FILES) ? count($_FILES) : 0;
    $postCount = isset($_POST) ? count($_POST) : 0;

    echo "[+] Request received via POST.\n";
    echo "[+] Processed keys: " . $postCount . " fields, " . $fileCount . " files.\n";
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP2Shell Target Site</title>
</head>
<body>
    <h1>DAST Scanner Verification Endpoint</h1>
    <p>Submit a multipart/form-data POST request to this endpoint to test for behavioral OOM signatures.</p>
    <form action="/" method="POST" enctype="multipart/form-data">
        <input type="text" name="test_field" value="proof_of_concept">
        <input type="submit" value="Submit Baseline">
    </form>
</body>
</html>
