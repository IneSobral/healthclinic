
<?php
    require('templates/header.php');

?>
    <section>
        <h1 class='heading__2 mx-2 mt-2'>Crie uma conta facilmente!</h1>
        <p class='mx-3'>Se já for nosso cliente, faça <a href="/login/">login</a>.</p>
<?php
        if(isset($message)){
            echo '.<p role="alert">.' .$message. '</p>';
        }
?>
        <div class='bg-shape'>
            <form method="POST" action="/register/" class='formAdmin formAdmin2 form-register'>
            <h2 class='heading__3 text-center'>Criar conta</h2>
                <div>
                    <label>
                        Nome
                        <input type="text" name="user_name" required minlength="3" maxlength="60">
                    </label>
                </div>
                <div>
                    <label>
                        Email
                        <input type="email" name="user_email" required>
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
                        Morada
                        <input type="text" name="street_name" required minlength="8" maxlength="120">
                    </label>
                </div>
                <div>
                    <label>
                        Cidade
                        <input type="text" name="city" required minlength="3" maxlength="50">
                    </label>
                </div>
                <div>
                    <label>
                        Código Postal
                        <input type="text" name="zip_code" required minlength="4" maxlength="8">
                    </label>
                </div>
                <div>
                    <label>
                        País
                        <input type="text" name="country" required minlength="4" maxlength="30">
                    </label>
                </div>
                <div>
                    <label>
                        Telefone
                        <input type="text" name="user_contact" required minlength="9" maxlength="15">
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="agrees" required class='inline-checkbox'>
                        Aceita os termos e políticas de privacidade?
                    </label>
                </div>
                <div>
                    <button type="submit" name="send" class="btn btn-primary">Criar conta</button>
                </div>
            </form>
         </div>
      </section>
<?php
    require('templates/footer.php');
?>
    </body>
</html>