<?php
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
                    <h1 class="m-0 text-dark">Crear Administrador</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Crear Administrador</li>
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
                            <h3 class="card-title">Nuevo Administrador</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" name="create-admin" id="create-admin" method="POST" action="insert-admin.php">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nameUser" class="col-sm-2 col-form-label">Nombre:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nameUser" name="nameUser" placeholder="Nombre:">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user" class="col-sm-2 col-form-label">Usuario:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="user" autocomplete="username " name="user" placeholder="Usuario:">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Añadir</button>
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