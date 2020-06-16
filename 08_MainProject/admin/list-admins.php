<?php
include_once "functions/sessions.php";
include_once "functions/functions.php";
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
                    <h1 class="m-0 text-dark">Lista de Admins</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="adminArea.php">Home</a></li>
                        <li class="breadcrumb-item active">Lista de Admins</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Maneja los usuarios en esta sección</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="registers" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $sql = "SELECT id_admin, user, nameUser FROM admins";
                                        $result = $conn->query($sql);
                                    } catch (\Throwable $th) {
                                        $error = $th->getMessage();
                                        echo $error;
                                    };

                                    while ($admin = $result->fetch_assoc()) : ?>
                                        <tr>
                                            <td class="table-align"><?php echo $admin['user']; ?></td>
                                            <td class="table-align"><?php echo $admin['nameUser']; ?></td>
                                            <td class="table-align">
                                                <a href="edit-admin.php?id=<?php echo $admin['id_admin']; ?>" class="btn btn-warning btn-margin">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" data-id="<?php echo $admin['id_admin']; ?>" data-tipo="admin" class="btn btn-danger delete-register btn-margin">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    endwhile;
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once "templates/footer.php" ?>