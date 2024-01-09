   
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <?php include '../../Includes/aside.php'; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                
        <section class="bg-[#222] py-16">
            <div class="max-w-screen-xl mx-auto px-6 flex">

                <div class="wikis-wrapper basis-2/3 flex flex-col gap-5 pt-7">
                
                    <a href="#" class="w-full p-5 bg-[#2d2d2d] hover:bg-[#2a2a2a] flex items-center border border-gray-700 rounded-lg shadow">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="public/assets/wiki.png" alt="img">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                            <div class="flex justify-between text-white">
                                <span>7 min read</span>
                                <span>Dec 15,2023</span>
                            </div>
                        </div>
                    </a>
                
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

                <!-- <div class="categories-wrapper px-6 basis-1/3">
                    <div class="sticky top-20 pt-7 ps-6">
                        <h3 class="text-2xl font-bold mb-6 dark:text-white">Discover more of what matters to you</h3>
                        <?php foreach($categories as $category) : ?>
                            <a href="#" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><?= $category['name'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div> -->

            </div>
        </section>

            </div>

        </div>

    </div>

    </body>
    </html>