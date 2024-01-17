
const btns = document.querySelectorAll('.editBtn');
let currentCategoryEl;

btns.forEach(btn => {
    btn.addEventListener('click', function(e) {

        currentCategoryEl = document.getElementById(`category-${e.target.id}`);
        currentCategoryEl.contentEditable = true;
        currentCategoryEl.focus();

        currentCategoryEl.addEventListener('blur', function() {
            currentCategoryEl.contentEditable = false;
            const newValue = currentCategoryEl.innerText;
            const data = { 
                id: e.target.id, 
                new_value: newValue 
            };
            const jsonData = JSON.stringify(data);
            fetch(`http://localhost/wiki/category/update`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: jsonData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
