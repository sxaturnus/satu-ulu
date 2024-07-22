<?php 

include '../koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk menghindari SQL injection
    $stmt = $koneksi->prepare("DELETE FROM auth WHERE id_auth = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
        header("Location: rt.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("location:rt.php?status=deleted");
    exit();
}

$koneksi->close();
?>
