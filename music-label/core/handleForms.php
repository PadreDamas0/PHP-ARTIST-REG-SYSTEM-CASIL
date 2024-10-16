<?php
require_once 'dbConfig.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'dbConfig.php';


if (isset($_POST['DeleteArtist'])) {
    $artist_id = $_POST['artist_id'];
    echo "Delete request received.<br>"; // Debug line
    echo "Artist ID to delete: " . $artist_id . "<br>"; // Debug line

    // Check if the artist exists
    $checkStmt = $pdo->prepare("SELECT * FROM artists WHERE id = :id");
    $checkStmt->bindParam(':id', $artist_id);
    $checkStmt->execute();

    if ($checkStmt->rowCount() == 0) {
        echo "No artist found with ID: " . $artist_id; // No artist found
    } else {
        // Prepare and execute the delete statement
        $deleteStmt = $pdo->prepare("DELETE FROM artists WHERE id = :id");
        $deleteStmt->bindParam(':id', $artist_id);

        if ($deleteStmt->execute()) {
            header("Location: ../index.php"); // Redirect back to the index page after deletion
            exit;
        } else {
            echo "Failed to delete artist: " . implode(", ", $deleteStmt->errorInfo()); // Print error
        }
    }
}


if (isset($_POST['InsertArtist'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $country = $_POST['country'];
    $genresigned = $_POST['genresigned'];
    $signingdate = $_POST['signingdate'];

    $query = "INSERT INTO artists (firstname, lastname, email, phone_number, country, genresigned, signingdate) 
              VALUES (:firstname, :lastname, :email, :phone_number, :country, :genresigned, :signingdate)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'phone_number' => $phone_number,
        'country' => $country,
        'genresigned' => $genresigned,
        'signingdate' => $signingdate
    ]);

    header("Location: ../index.php");
    exit();


if (isset($_POST['DeleteArtist'])) {
    // Debug line to see if the form is being submitted
    echo "Delete request received.<br>"; // This will show if the delete request is received

    $artist_id = $_POST['artist_id'];

    // Prepare and execute the delete statement
    $deleteStmt = $pdo->prepare("DELETE FROM artists WHERE id = :id");
    $deleteStmt->bindParam(':id', $artist_id);

    if ($deleteStmt->execute()) {
        echo "Artist deleted successfully."; // For debugging purposes
        header("Location: ../index.php"); // Redirect back to the index page after deletion
        exit;
    } else {
        echo "Failed to delete artist.";
    }
}



if (isset($_POST['UpdateArtist'])) {
    $artist_id = $_POST['artist_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $country = $_POST['country'];
    $genresigned = $_POST['genresigned'];
    $signingdate = $_POST['signingdate'];

    $query = "UPDATE artists 
              SET firstname = :firstname, lastname = :lastname, email = :email, phone_number = :phone_number, 
                  country = :country, genresigned = :genresigned, signingdate = :signingdate 
              WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'phone_number' => $phone_number,
        'country' => $country,
        'genresigned' => $genresigned,
        'signingdate' => $signingdate,
        'id' => $artist_id
    ]);

    header("Location: ../index.php");
    exit();
}



}


?>
