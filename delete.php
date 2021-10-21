<?php
    include "connect.php";

    $id = $_GET["delete"];
    $del = "DELETE FROM events WHERE event_id = '$id'";

    if(mysqli_query($conn, $del)) {
        header("Location: index.php");
    } else {
        echo "error".mysqli_error($conn);
    }

?>