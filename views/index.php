
    <header class="bg-[#333] text-white pt-20">
        <div class="max-w-screen-xl py-40 px-6 mx-auto">
            <div class="text">
                <h1 class="font-serif font-bold text-6xl">Stay Curious.</h1> 
                <p class="my-9 text-xl text-gray-300">Discover stories, thinking, and expertise from <br>  writers on any topic.</p>
                <a href="#" class="text-white bg-blue-700 focus:outline-none hover:bg-blue-800 focus:ring-4 font-medium rounded-full text-lg px-8 py-3 me-2 mb-2">Become a writer</a>
            </div>
        </div>
    </header>

    <section class="bg-[#222] py-16">
        <div class="max-w-screen-xl mx-auto px-6 flex">

            <div class="wikis-wrapper basis-2/3 flex flex-col gap-5 pt-7">
                <?php foreach($wikis as $wiki) : ?>
                    <a href="show-wiki?wiki_id=<?= $wiki['id']; ?>" class="w-full p-5 bg-['#555'] hover:bg-[#2a2a2a] flex items-center border border-gray-700 rounded-lg shadow">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="public/assets/wiki.png" alt="img">
                        <div class="w-full flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $wiki['title']; ?></h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $wiki['description']; ?></p>
                            <div class="flex justify-between text-white">
                                <span><?= $wiki['read_time']; ?> min read</span>
                                <span><?= $wiki['created_at']; ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="categories-wrapper px-6 basis-1/3">
                <div class="sticky top-20 pt-7 ps-6">
                    <h3 class="text-2xl font-bold mb-6 dark:text-white">Discover more of what matters to you</h3>
                    <?php foreach($categories as $category) : ?>
                        <button type="button" class="category text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><?= $category['name'] ?></button>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>

    <script src="public/js/app.js"></script>

</body>
</html>