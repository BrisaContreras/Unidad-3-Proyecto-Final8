<?php include("bd.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="Contrato" class="form-control" placeholder="Contrato" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Telefono" class="form-control" placeholder="Telefono" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Equipo" class="form-control" placeholder="Equipo" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Marca" class="form-control" placeholder="Marca" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Precio" class="form-control" placeholder="Precio" autofocus>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Contrato</th>
            <th>Telefono</th>
            <th>Equipo</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Creado</th>
            <th>Editar/Eliminar</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM articulos";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['Contrato']; ?></td>
            <td><?php echo $row['Telefono']; ?></td>
            <td><?php echo $row['Equipo']; ?></td>
            <td><?php echo $row['Marca']; ?></td>
            <td><?php echo $row['Precio']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?NoSerie=<?php echo $row['NoSerie']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?NoSerie=<?php echo $row['NoSerie']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
