//FILTROS PARA ESCOLHER CHECKBOX

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
 

//SEARCH BOX 

    const itemList = document.querySelectorAll('.list__item');
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('input', (e) => {
        const value = e.target.value.toLowerCase();
        
        itemList.forEach((item) => {
            const label = item.querySelector('.form-check-label');
            const txtValue = label.textContent.toLowerCase();
            const isMatch = txtValue.includes(value);
            
            isMatch = item.style.display ? 'block' : 'none';
        });
    });
