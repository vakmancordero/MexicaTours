<?php
    
    require __DIR__. '/includes/header.php'; 
    require __DIR__. '/includes/log-user-in.php';
    
    isset($_SESSION['user_session']) ? header("location:dashboard.php") : null;
    
    include_once('/classes/session.php');

?>

<br/>
<div class="row">
    <div class="col l6 m8 s10 offset-s1 offset-m2 offset-l3">
        <div class="card">
            <div class="card-content">
                <div class="center-align card-title">
                    <h3>Iniciar sesión</h3>
                </div>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" >
                    <span class="red lighten-5"><?= isset($_SESSION['login_issue']) && !empty($_SESSION['login_issue']) ? $_SESSION['login_issue']: ''?></span>
                        <?php session::destroy('login_issue') ?>
                    
                    <div class="input-field col s10 offset-s1">
                        <input type="email" name="email" id="email" class="validate">
                        <label for="email">E-mail</label>
                        <span><?= isset($_SESSION['error_email']) && !empty($_SESSION['error_email']) ? $_SESSION['error_email']: ''?></span>
                        <?php session::destroy('error_email') ?>
                    </div>
                    
                    <div class="input-field col s10 offset-s1">
                        <input type="password" name="password" id="password" class="validate" autocomplete="new-password">
                        <label for="password">Contraseña</label>
                        <span><?= isset($_SESSION['error_password']) && !empty($_SESSION['error_password']) ? $_SESSION['error_password']: ''?></span>
                        <?php session::destroy('error_password') ?>
                    </div>
                    
                    <div class="row">
                        <div class="col s5 offset-s1 right-align">
                            <input type="checkbox" class="with-gap" name="persist" id="persist"  />
                            <label for="persist">Mantener sesión</label>
                        </div>
                        <div class="col s5 offset-s1 left-align">
                            <a href="signup.php">Regístrate!</a>
                        </div>
                    </div>
                    <div class="center-align">
                        <button type="submit" class="waves-effect waves-light btn deep-orange darken-2">
                            Entrar!<i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    
    require __DIR__. '/includes/footer.php';

?>