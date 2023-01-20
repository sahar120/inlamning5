<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbserverprogrammering";

$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

$login_success = false;
$full_name = "";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row["userid"] == $_POST["anvandernamn"] && $row["passwd"] == $_POST["losenord"]) {
			$login_success = true;
			$full_name = $row["firstname"] . " " .
			$row["lastname"];
            echo "Välkommen $full_name till programmet.";
		}
        
        else {
            echo $row["userid"] . " " . $row["passwd"] . "<br>";
        }
        
	}
} else {
    echo "0 results";
}
if (!$login_success) {
    echo "Felmeddelande, det gick inte att logga in.";
    }
$conn->close();
