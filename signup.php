<?php
    
    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/sign-user-up.php';
    
    include_once('/classes/session.php');

?>

<br/>
<div class="row">
    <div class="col l6 m6 s6 offset-l3">
        <div class="card">
            <div class="card-content">
                <div class="center-align card-title">
                    <h3>Regístrate</h3>
                </div>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="row">
                        <span><?= isset($_SESSION['error_general']) && !empty($_SESSION['error_general']) ? $_SESSION['error_general']: ''?></span>
                            <?php session::destroy('error_general') ?>

                            <span class="green lighten-2"><?= isset($_SESSION['confirmation']) && !empty($_SESSION['confirmation']) ? $_SESSION['confirmation']: ''?></span>
                            <?php session::destroy('confirmation') ?>

                        <div class="input-field col s10 offset-s1">
                            <input type="email" name="email" id="email" class="validate">
                            <label for="email">E-mail</label>

                            <span><?= isset($_SESSION['error_email']) && !empty($_SESSION['error_email']) ? $_SESSION['error_email']: ''?></span>
                            <?php session::destroy('error_email') ?>
                        </div>

                        <div class="input-field col s10 offset-s1">
                            <input type="password" name="password" id="password" class="validate">
                            <label for="password">Password</label>

                            <span><?= isset($_SESSION['error_password']) && !empty($_SESSION['error_password']) ? $_SESSION['error_password']: ''?></span>
                            <?php session::destroy('error_password') ?>
                        </div>

                        <div class="input-field col s10 offset-s1">
                            <input type="password" name="repassword" id="repassword" class="validate">
                            <label for="repassword">Repetir Password</label>

                            <span><?= isset($_SESSION['error_repassword']) && !empty($_SESSION['error_repassword']) ? $_SESSION['error_repassword']: ''?></span>
                            <?php session::destroy('error_repassword') ?>
                        </div>

                        <div class="row">
                            <div class="col s11 offset-s1 center-align">
                                <a href="index.php">Ya está registrado? Iniciar sesión</a>
                            </div>
                        </div>

                        <div class="center-align">
                            <button class="waves-effect waves-light btn grey darken-3">Regístrate!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    
    require __DIR__. '/includes/footer.php';

?>