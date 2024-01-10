
const categories = document.querySelectorAll('.category'),
searchWrapper = document.querySelector('.search-wrapper'),
searchBtn = document.querySelector('.search-btn'),
searchInput = document.querySelector('.search-input'),
wikisWrapper = document.querySelector('.wikis-wrapper');

categories.forEach(el => {
    el.addEventListener("click", () => {
        alert(el.innerHTML);
    });
});

searchBtn.addEventListener("click", () => {
    fetch(`http://localhost/wiki/search?search-value=${searchInput.value}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(wikis => {
        console.log(wikis);
        wikisWrapper.innerHTML = "";
        wikis.forEach(wiki => {
            wikisWrapper.innerHTML += `
                                        <a href="show-wiki?wiki_id=${wiki.id}" class="w-full p-5 bg-['#555'] hover:bg-[#2a2a2a] flex items-center border border-gray-700 rounded-lg shadow">
                                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="public/assets/wiki.png" alt="img">
                                            <div class="w-full flex flex-col justify-between p-4 leading-normal">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${wiki.title}</h5>
                                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${wiki.description}</p>
                                                <div class="flex justify-between text-white">
                                                    <span>${wiki.read_time} min read</span>
                                                    <span>${wiki.created_at}</span>
                                                </div>
                                            </div>
                                        </a>
                                        `;
        });
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
});

window.onscroll = () => {
    if(window.pageYOffset > 580) {
        searchWrapper.style.visibility = "visible";
    } else {
        searchWrapper.style.visibility = "hidden";
    }
}