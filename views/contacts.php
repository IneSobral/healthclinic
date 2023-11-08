<?php
    require('templates/header.php');
?>
    <main class="contact__section">
        <div class='intro__hero'>
            <h1 class='intro__heading'>Sobre nós</h1>
        </div>
        <article class='container mt-5'>
            <h2 class='heading__3'>Venha nos visitar!</h2>
            <div class='container d-flex'>
                <div class='mt-3'>
                    <h3 class='heading__4'>Localização</h3>
                    <p>Rua da Infantaria nº 111 C, <br>1000-100<br> Lisboa</p>
                    <h3 class='heading__4'>Horário de funcionamento:</h3>
                    <p>Abertos das 9h00 às 19h00 (Encerramos ao fim-de-semana)</p>
                </div>
                <img src="./imagens/profile1.jpg" alt="" class='contact-img'>
            </div>
        </article>

        <div class='container mt-4'>
            <h2 class='heading__3'>Entre em contacto</h2>
           <div class="row justify-content-center mt-4">
                <div class="col-md-8">
<?php
if(isset($message)){
            echo '<p role="alert" class="alert alert-success">' .$message. '</p>';
        }
if(isset($messageError)){
            echo '<p role="alert" class="alert alert-danger">' .$messageError. '</p>';
        }

?>
                    <form action="contacts" method="post" class='contact-form mx-3'>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subject" class="col-sm-2 col-form-label">Assunto</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="assunto" placeholder="Assunto">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="message" class="col-sm-2 col-form-label">Mensagem</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="inputPassword3" name="mensagem" placeholder="Escreva a sua mensagem aqui ..."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name='agrees'>
                                <label class="form-check-label small-p" for="gridCheck1">
                                Declaro que tomei conhecimento das informações aqui disponibilizadas sobre o tratamento de dados
                                pessoais e autorizo que os mesmos sejam recolhidos pela HealthConnect e tratados no âmbito da finalidade indicada.
                                </label>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 text-center">
                            <button type="submit" class="btn btn-primary" name='Submit'>Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
           </div>
        </div>
        
    </main>

<?php
    //require('templates/footer.php');
?>

</body>
</html>