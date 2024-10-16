<?php
require_once 'dbConfig.php';


function getAllArtists($pdo) {
    $stmt = $pdo->query("SELECT * FROM artists ORDER BY date_added DESC");
    return $stmt->fetchAll();
}


function getArtistById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM artists WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}
function getArtists($pdo) {
    $query = "SELECT * FROM artists"; // Assumes your table name is 'artists'
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function updateArtist($pdo, $id, $firstname, $lastname, $email, $phone_number, $country, $genresigned, $signingdate) {
    $query = "UPDATE artists SET firstname = ?, lastname = ?, email = ?, phone_number = ?, country = ?, genresigned = ?, signingdate = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([$firstname, $lastname, $email, $phone_number, $country, $genresigned, $signingdate, $id]);
}


function deleteArtist($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM artists WHERE id = ?");
    return $stmt->execute([$id]);



}
?>
