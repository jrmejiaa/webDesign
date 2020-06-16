<?php
session_start();
$closeSession = $_GET['closeSession'];
if ($closeSession) {
    session_destroy();
}
include_once "functions/functions.php";
include_once "templates/header.php";
?>

<body class="hold-transition login-page">
    <?php 
        $sessionExpired = $_SESSION['EXPIRED'];
        if($sessionExpired):?>
            <div class="notification shadow error">
                Tu Sesión Ha Expirado por Inactividad<br> Por favor, Vuelve a Iniciar Sesión
            </div>
    <?php endif; ?>
    <div class="login-box">
        <div class="login-logo">
            <a href="../index.php"><b>GDL</b>WebCamp</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar Sesión</p>

                <form name="login-admin-form" id="login-admin" method="POST" action="login-admin.php">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="user" id="user" placeholder="Usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-6">
                            <input type="hidden" id="login-admin-submit" name="login-admin" value="1">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

    <?php
    include_once "templates/footer.php";
    ?>