<?php
$servername = "localhost";
$username = "root";
$password = "";
$db ="practice";

$conn = mysqli_connect($servername,$username,$password,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo"db status ok.";

echo"<!DOCTYPE html>
<html>
<head>
    <title>Feedback Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        h2 {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>";
?>