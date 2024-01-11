   
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
            <div class="max-w-screen-xl mx-auto flex">

                <!-- <div class="wikis-wrapper basis-2/3 flex flex-col gap-5 pt-7">
                
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
                </div> -->

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                read time (min)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                category
                            </th>
                            <th scope="col" class="px-3 py-3">
                                created_at
                            </th>
                            <th scope="col" class="py-3">
                                User
                            </th>
                            <th scope="col" class="py-3">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($wikis as $wiki) : ?>
                            <tr class="odd:bg-white text-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $wiki['id'] ?>
                                </th>
                                <th class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $wiki['title'] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $wiki['description'] ?>
                                </td>
                                <!-- <td class="px-6 py-4">
                                    <?= $wiki['content'] ?>
                                </td> -->
                                <td class="px-6 py-4">
                                    <?= $wiki['read_time'] ?>
                                </td>
                                <td class="px-6 py-4">
                                        <?= $wiki['categorie_id']; ?>
                                </td>
                                <td class="px-6 py-4">
                                        <?= $wiki['created_at']; ?>
                                </td>
                                <td class="px-6 py-4">
                                        <?= $wiki['user_id']; ?>
                                </td>
                                <td class="py-4">
                                    <!-- <a href="?id=<?= $wiki['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a> -->
                                    <select id=<?= $wiki['id'] ?>  class="statu block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                        <option value="Show" selected>Show</option>
                                        <option value="Archive">Archive</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </section>

            </div>

        </div>

    </div>

    <script>
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
                fetch(`http://localhost/wiki/update-statu`, {
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
    </script>

    </body>
    </html>