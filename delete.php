<?php
include "config.php";

$id = $_GET['id'];

// Display a confirmation popup
echo "<script>
    var userConfirmed = confirm('Are you sure you want to delete this item?');
    if (userConfirmed) {
        window.location = 'delete.php?id=$id';
    } else {
        window.location = 'index.php';
    }
</script>";
?>
