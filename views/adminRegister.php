
<?php
    require('templates/header.php');

?>
    <section>
        <h1>Crie conta para novo administrador</h1>
<?php
        if(isset($message)){
            echo '.<p role="alert">.' .$message. '</p>';
        }
?>
        <form method="POST" action="/adminRegister/">
            <div>
                <label>
                    Nome
                    <input type="text" name="name" required minlength="3" maxlength="60">
                </label>
            </div>
            <div>
                <label>
                    Email
                    <input type="email" name="email" required>
                </label>
            </div>
            <div>
                <label>
                    Password
                    <input type="password" name="password" required minlength="8" maxlength="1000">
                </label>
            </div>
            <div>
                <label>
                    Repetir Password
                    <input type="password" name="password_confirm" required minlength="8" maxlength="1000">
                </label>
            </div>
            <div>
                <label>
                    Telefone
                    <input type="text" name="contact" required minlength="9" maxlength="15">
                </label>
            </div>
            <div>
                <button type="submit" name="send" class="btn btn-primary">Criar conta</button>
            </div>
         </form>
      </section>
    </body>
</html>