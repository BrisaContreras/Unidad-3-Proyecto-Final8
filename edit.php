<?php
include("bd.php");
$Contrato = '';
$Telefono= '';
$Equipo = '';
$Marca = '';
$Precio = '';

if  (isset($_GET['NoSerie'])) {
  $NoSerie = $_GET['NoSerie'];
  $query = "SELECT * FROM articulos WHERE NoSerie=$NoSerie";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 4) {
    $row = mysqli_fetch_array($result);
    $Contrato = $row['Contrato'];
    $Telefono = $row['Telefono'];
    $Equipo = $row['Equipo'];
    $Marca = $row['Marca'];
    $Precio = $row['Precio'];
  }
}

if (isset($_POST['update'])) {
  $NoSerie = $_GET['NoSerie'];
  $Contrato= $_POST['Contrato'];
  $Telefono = $_POST['Telefono'];
  $Equipo= $_POST['Equipo'];
  $Marca= $_POST['Marca'];
  $Precio= $_POST['Precio'];

  $query = "UPDATE articulos set Contrato = '$Contrato', Telefono = '$Telefono',
   Equipo = '$Equipo', Marca = '$Marca', Precio = '$Precio' WHERE NoSerie=$NoSerie";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Eliminado';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?NoSerie=<?php echo $_GET['NoSerie']; ?>" method="POST">
        <div class="form-group">
          <input name="Contrato" type="text" class="form-control" value="<?php echo $Contrato; ?>" placeholder="Contrato">
        </div>
        <div class="form-group">
          <input name="Telefono" type="text" class="form-control" value="<?php echo $Telefono; ?>" placeholder="Telefono">
        </div>
        <div class="form-group">
          <input name="Equipo" type="text" class="form-control" value="<?php echo $Equipo; ?>" placeholder="Equipo">
        </div>
        <div class="form-group">
          <input name="Marca" type="text" class="form-control" value="<?php echo $Marca; ?>" placeholder="Marca">
        </div>
        <div class="form-group">
          <input name="Precio" type="text" class="form-control" value="<?php echo $Precio; ?>" placeholder="Precio">
        </div>
        <button class="btn-success" name="update">
          Eliminar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
