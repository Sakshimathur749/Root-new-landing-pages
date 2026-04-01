<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include '../landing-pages-db/config-db.php';
// Set the default timezone to Indian Standard Time (IST)
date_default_timezone_set('Asia/Kolkata');
$currentURL = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Unknown';
if (isset($_POST['submit'])) {
//    Trim and sanitize input data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);
    $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time
    $agreeTerms = isset($_POST['agreeTerms']) ? 1 : 0;    // Validation flags
    $errors = [];
    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $errors[] = "Only letters and white space allowed in name.";
    }
    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    // Validate phone
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Invalid phone number format. Only 10 digits allowed.";
    }
    if (empty($course) || $course == '-1') {
        $errors[] = "Selecting a course is required.";
    }
    // If no errors, proceed with database insertion
    if (empty($errors)) {
        $query = "INSERT INTO all_landing_pages_enquiry (`name`, `email`, `phone`, `date`, `course`, `site_ulrs`, `agree_terms`) VALUES ('$name', '$email', '$phone', '$currentDateTime', '$course', '$currentURL', '$agreeTerms')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            $_SESSION['success'] = 'Your Message Sent!';

            // --- Send lead data to Google Sheet (server-side) ---
            $googleScriptUrl = 'https://script.google.com/macros/s/AKfycbzbC2OLa5G0qVMpAoZ0f0wrgrUBmGVa8d0EM0ywDXZHFnHieZdvBFaaZZFf9AnCl2Q/exec';
            $sheetPayload = [
                'name'      => $name,
                'email'     => $email,
                'phone'     => $phone,
                'course'    => $course,
                'url'       => $currentURL,
                'timestamp' => $currentDateTime,
            ];

            if (function_exists('curl_init')) {
                $ch = curl_init($googleScriptUrl);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sheetPayload));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 2); // don't delay the user
                curl_exec($ch);
                curl_close($ch);
            }
            // --- End Google Sheet integration ---

            echo "<script type='text/javascript'>console.log('Data inserted successfully');</script>";
            echo "<script type='text/javascript'>window.location='thanks.html';</script>";
        } else {
            $_SESSION['status'] = 'Failed to send your message!';
            echo "<script type='text/javascript'>console.log('Database insertion failed');</script>";
            echo "<script type='text/javascript'>alert('Failed to send your message!');</script>";
            echo "<script type='text/javascript'>window.location='index.html';</script>";
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<script type='text/javascript'>alert('$error');</script>";
            echo "<script type='text/javascript'>console.log('$error');</script>";
        }
        echo "<script type='text/javascript'>window.location='index.html';</script>";
    }
}


?>