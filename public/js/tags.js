
const btns = document.querySelectorAll('.editBtn');
let currentTagEl;

btns.forEach(btn => {
    btn.addEventListener('click', function(e) {

        currentTagEl = document.getElementById(`tag-${e.target.id}`);
        currentTagEl.contentEditable = true;
        currentTagEl.focus();
        
        currentTagEl.addEventListener('blur', function() {
            currentTagEl.contentEditable = false;
            const newValue = currentTagEl.innerText;
            const data = { 
                id: e.target.id, 
                new_value: newValue 
            };
            const jsonData = JSON.stringify(data);
            fetch(`http://localhost/wiki/tag/update`, {
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
                console.error('There has been a problem with your fetch operation:', error);
            });
        });
    });
});
