<?php 
  require_once 'conexion.php';
  //consultar por id
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql ="SELECT * FROM `tarea` where id=$id";
    $datos = $con->query($sql);
    $campo=$datos->fetch_object();
    
    $nombre=$campo->nombre;
    $prioridad=$campo->prioridad;
    $activo=$campo->activo;

  }

  //Guardar la tarea
  if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "Guardar") {
    $nombre = $_POST['nombre'];
    $prioridad = $_POST['prioridad'];
    $activo = 0;
    if(isset($_POST['activo'])){
      $activo = 1;
    }
    $sql="INSERT INTO `tarea`(`id`, `nombre`, `prioridad`, `activo`) VALUES (DEFAULT,'$nombre','$prioridad','$activo')";
    $datos = $con->query($sql);
    header("location:index.php");

    }else if($_POST['accion'] == "Editar"){
    $id = $_POST['id'];      
    $nombre = $_POST['nombre'];
    $prioridad = $_POST['prioridad'];
    $activo = 0;
    if(isset($_POST['activo'])){
      $activo = 1;
    }

    $sql="UPDATE `tarea` SET `nombre`='$nombre',`prioridad`='$prioridad',`activo`='$activo' WHERE id = $id";
    $datos = $con->query($sql);
    header("location:index.php");

    }  
  }
  $sql ="SELECT * FROM `tarea`";
  $datos = $con->query($sql);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Lista de tareas</title>
</head>
<body>
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Registrar tarea</h4>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo @$id ?>">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre de la tarea</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo @$nombre;?>" required maxlength="255">
                        </div>
                        <div class="col-md-6">
                            <label for="prioridad" class="form-label">Prioridad de la tarea</label>
                            <input type="text" class="form-control" name="prioridad" value="<?php echo @$prioridad;?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" <?php echo(@$activo==1)?"checked":""?> name="activo" id="activo">
                                <label class="form-check-label" for="activo">Completado?</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-4">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <input type="reset" class="btn btn-danger" name="accion" value="Limpiar">
                                <?php
                                if (isset($_GET['id'])) {
                                    ?>
                                    <input type="submit" class="btn btn-warning" name="accion" value="Editar">
                                    <?php
                                } else {
                                    ?>
                                    <input type="submit" class="btn btn-success" name="accion" value="Guardar">
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Prioridad</th>
      <th scope="col">Completado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      while($fila=$datos->fetch_object()){
      ?>
      <tr>
       <td scope="row">
        <?php echo $fila->id;?>
       </td>
       <td>
        <?php echo $fila->nombre;?>
       </td>
       <td>
        <?php echo $fila->prioridad;?>
       </td>
       <td>
        <?php echo ($fila->activo==1?"Completado":"Pendiente");?>
       </td>
       <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="?id=<?php echo $fila->id;?>" class="btn btn-primary">Editar</a>
        <a href="eliminar.php?id=<?php echo base64_encode($fila->id);?>" class="btn btn-danger">Eliminar</a>
        <!--<button class="btn btn-warning">Cambiar estado</button>-->
        </div>
        
       </td>
      </tr> 
    <?php 
      }
    ?>


    
  </tbody>
  </table>

  </div>
  <a href="http://127.0.0.1:8000/home" class="btn btn-dark">Regresar</a></div>

  </body>
</html>