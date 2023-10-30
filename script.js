//FILTROS PARA ESCOLHER CHECKBOX
document.addEventListener("DOMContentLoaded", function () {
const checkboxes = document.querySelectorAll('.form-check-input');
const cards = document.querySelectorAll('.doctor-card');
const clearFilters = document.getElementById('clearFilters');

function updateCardDisplay() {
    const selectedSpecialties = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked && checkbox.getAttribute('data-specialty'))
        .map(checkbox => checkbox.getAttribute('data-specialty'));
    
    const selectedTele = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked && checkbox.getAttribute('data-teleconsulta'))
        .map(checkbox => checkbox.getAttribute('data-teleconsulta'));

    cards.forEach(card => {
            const specialty = card.getAttribute('data-specialty');
            const teleconsultation = card.getAttribute('data-teleconsulta');

            const specialtyMatch = selectedSpecialties.length === 0 || selectedSpecialties.includes(specialty);
            const teleMatch = selectedTele.length === 0 || selectedTele.includes(teleconsultation);

            if (specialtyMatch && teleMatch) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateCardDisplay);
        });

        clearFilters.addEventListener('click', () => {
         
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });

            cards.forEach(card => {
                card.style.display = 'flex';
            });
        });
    });

//SEARCH BOX 

    const itemList = document.querySelectorAll('.list__item');
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('input', (e) => {
        const value = e.target.value.toLowerCase();
        
        itemList.forEach((item) => {
            const label = item.querySelector('.form-check-label');
            const txtValue = label.textContent.toLowerCase();
            const isMatch = txtValue.includes(value);
            
            item.style.display = isMatch ? 'block' : 'none';
        });
    });


    document.addEventListener("DOMContentLoaded", () => {
        const specialtySelect = document.getElementById('specialtySelect');
        const doctorSelect = document.getElementById('doctorSelect');
    
        specialtySelect.addEventListener("change", () => {
            const selectedSpecialty = specialtySelect.value;
    
            // Você deve fazer uma solicitação AJAX (fetch) para buscar os médicos com base na especialidade selecionada
            // Suponha que você tenha um arquivo PHP para processar a solicitação e retornar médicos
    
            fetch('seu_arquivo_php.php?specialty=' + selectedSpecialty)
                .then(response => response.json())
                .then(doctors => {
                    doctorSelect.innerHTML = '<option value=""> Selecione </option>';
                    doctors.forEach(doctor => {
                        const option = document.createElement('option');
                        option.value = doctor['doctor_id'];
                        option.textContent = doctor['doctor_name'];
                        doctorSelect.appendChild(option);
                    });
                });
        });
    });

