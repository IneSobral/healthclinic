<?php require('templates/header.php'); ?>

<main class="admin__section">
    <h1 class='heading__2'>Gestão de médicos > Remover médico</h1>
    <div class="container__section mb-3">
        <h2>Remover médico</h2>
        <ul>
            <?php
            foreach ($doctors as $doctor) {
                echo '
                <li>
                    <span>' . $doctor["doctor_name"] . '</span>
                    <button type="submit" class="remove-doctor" data-doctor-id="' . $doctor["doctor_id"] . '" name="remove">X</button>
                </li>
            ';
            }
            ?>
        </ul>
    </div>
</main>

<script>
        document.addEventListener('DOMContentLoaded', function () {
        const removeButtons = document.querySelectorAll('.remove-doctor');

        removeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const doctorId = button.dataset.doctorId;
             
                if (confirm('Tem certeza que deseja remover este médico?')) {
                    fetch('/adminDoctorsRemove/', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'remove=removeDoctor&doctor_id=' + doctorId,
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                                if (data.status === 'success') {
                                    console.log('consegui');
                                    const listItem = button.closest('li');
                                    listItem.remove();
                            }
                        })
                        .catch(error => {
                            console.error('Erro:', error);
                        });
                }
            });
        });
    });

</script>

<?php // require('templates/footer.php'); ?>
</body>
</html>
