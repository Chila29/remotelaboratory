<?php
include('../component/connectdb.inc.php');
$start = (int)(isset($_POST['start']));
$sql = 'UPDATE motor SET status_motor_forward =' . $start;
mysqli_query($conn, $sql);
?>