<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'bd_brisa_telmex'
) or die(mysqli_error($mysqli));

?>
