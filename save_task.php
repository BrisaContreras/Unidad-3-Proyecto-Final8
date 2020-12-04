<?php

include('bd.php');

if (isset($_POST['save_task'])) {
  $Contrato = $_POST['Contrato'];
  $Telefono = $_POST['Telefono'];
  $Equipo = $_POST['Equipo'];
  $Marca= $_POST['Marca'];
  $Precio = $_POST['Precio'];

  $query = "INSERT INTO articulos(Contrato, Telefono, Equipo, Marca, Precio) 
  VALUES ('$Contrato', '$Telefono', '$Equipo', '$Marca', '$Precio')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
