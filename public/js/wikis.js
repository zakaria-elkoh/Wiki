
const statusSelect = document.querySelectorAll('.statu');

statusSelect.forEach(statu => {
    statu.addEventListener('change', function(e) {
        const wiki_id = e.target.id;
        const wiki_statu = e.target.value;
        console.log(wiki_id);
        console.log(wiki_statu);

        const data = { 
            id: wiki_id, 
            wiki_statu: wiki_statu 
        };

        fetch(`http://localhost/wiki/update/statu`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
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