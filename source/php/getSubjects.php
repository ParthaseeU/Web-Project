<?php
header("Access-Control-Allow-Origin: *");
include 'connect.php';

// Query the database
$result = $conn->query("SELECT SubjectCode FROM Subject;");

// Fetch and return data as json
$values = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $values[] = $row['SubjectCode'];
    }
}

echo json_encode($values);
