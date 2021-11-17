<?php
include('../component/connectdb.inc.php');
    $hertz = $_POST['hertz'];
    $sql = 'INSERT INTO knob_hertz(hertz) VALUES("' . $hertz . '")';
    mysqli_query($conn, $sql);
?>