<?php
include('../component/connectdb.inc.php');
$stop = (int)(isset($_POST['stop']));
$sql = 'UPDATE motor SET status_motor_forward =' . $stop . ',status_motor_reverse='.$stop;
mysqli_query($conn, $sql);
?>