
<?php
    require('templates/header.php');

?>

    <main class="login__section">
        <div class="container__section">
            <div class='left-slide'>
                <img src="../imagens/login.jpg" alt="login-image" >
            </div>
            <div class='rigth-slide'>
                <h1>Iniciar sessão</h1>
                <form action="../login/" method='POST' class='form'>
                    <div class='form-email'>
                        <label for="">Email
                            <input type="email" name='email' required>
                        </label>
                    </div>
                    <div  class='form-password'>
                        <label for="">Password
                            <input type="password" name='password' required minlenght='8' maxlenght='1000'>
                        </label>
                    </div>
                <div class='form-btn'>
                    <button type='submit' name='send' class="btn btn-primary">Entrar</button>
                </div>
<?php
     if( isset($message)) {
        echo '<p role="alert" class="alert alert-danger">' . $message . '</p>';
    }
?>
                <p>Se ainda não tiver conta,<br> <a href="../register/">pode criar conta aqui.</a></p>
                </form>
            </div>
        </div>
    </main>

<?php
    //require('templates/footer.php');
?>
</body>
</html>