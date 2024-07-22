<?php 

include '../koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk menghindari SQL injection
    $stmt = $koneksi->prepare("DELETE FROM bansos WHERE id_bansos = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
        header("Location: bansos.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("location:bansos.php?status=deleted");
    exit();
}

$koneksi->close();
?>
