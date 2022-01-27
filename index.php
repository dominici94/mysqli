<?php

require_once __DIR__ . '/macro.php';

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn && $conn->connect_error){
    echo 'connection failed: ' . $conn->connect_error;
}

// var_dump($conn);

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

// var_dump($result);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Cognome e Nome studente: " . $row['surname'] . " " . $row['name'] . " " . $row['id']. " <br>";
    }
}elseif ($result) {
    echo "0 results";
}else{
    echo "query error";
}

$conn->close();

?>