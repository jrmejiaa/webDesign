<?php
include_once "functions/sessions.php";
include_once "functions/functions.php";
// Save the id to get out the data from the database
$id = $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)){
    die("Error");
}
include_once "templates/header.php";
include_once "templates/navbar.php";
include_once "templates/aside.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Editar Administrador</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="adminArea.php">Home</a></li>
                        <li class="breadcrumb-item active">Editar Administrador</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row">
        <div class="col-md-8">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- /.card -->
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Editar Administrador</h3>
                        </div>
                        <?php 
                            $sql = "SELECT * FROM admins WHERE id_admin = $id";
                            $result = $conn->query($sql);
                            $admin = $result->fetch_assoc();
                        ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" name="save-register" id="save-register" method="POST" action="model-admin.php">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nameUser" class="col-sm-3 col-form-label">Nombre:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nameUser" name="nameUser" placeholder="Tu Nombre" value="<?php echo $admin['nameUser']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user" class="col-sm-3 col-form-label">Usuario:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="user" autocomplete="username " name="user" placeholder="Tu Usuario" value="<?php echo $admin['user']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Repetir Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Repetir Password">
                                    </div>
                                    <span class="col-sm-3 col-form-label help-block" id="result_password"></span>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="state-admin" id="state-admin" value="update">
                                <input type="hidden" name="id_register" id="id_register" value="<?php echo $admin['id_admin']; ?>">
                                <button type="submit" class="btn btn-info" id="create-admin">Añadir</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php include_once "templates/footer.php" ?>