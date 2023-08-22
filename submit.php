<?php
// insertData.php

// Assuming you've already established a database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = "";
$dbname = "reko1";   // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$pelicula = $_POST['Pelicula'];
$genero = $_POST['Genero'];
$puntaje = $_POST['Puntaje'];
$fecha = $_POST['Fecha'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO reko1 (Pelicula, Genero, Puntaje, Fecha)
        VALUES ('$pelicula', '$genero', '$puntaje', '$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
 
$selectQuery = "SELECT * FROM reko1";
$result = $conn->query($selectQuery);

echo "<h2>Submissions</h2>";
echo "<div>";
while ($row = $result->fetch_assoc()) {
    echo "<p>Pelicula: " . $row["Pelicula"] . " - Genero: " . $row["Genero"] . " - Puntaje: " . $row["Puntaje"] . " - Fecha: " . $row["Fecha"] . "</p>";
}
echo "</div>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
<button onclick="location.href=index.html" id="return">Inicio</button>  
<script>
document.getElementById("return").addEventListener("click", function(){
window.location.href = "index.html"   
})
</script>