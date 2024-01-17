
const btn = document.querySelector('.btn');

function concat(a, b) {
    return a + b;
}

btn.addEventListener('click', concat('test1', 'test'));

