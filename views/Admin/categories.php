
    <?php include '../../Includes/aside.php'; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                
                <!-- form for adding a new  -->
                <form class="my-10 mx-auto max-w-md" action="" method="POST">    
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Category</label>
                    <div class="relative">
                        <input type="search" name="new_category" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add category..." required>
                        <button type="submit" name="add" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">add</button>
                    </div>
                </form>
                
                <!-- table to show the details of the categories  -->
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Category Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category Name
                            </th>
                            <th scope="col" class="py-3">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($categories as $category) : ?>
                            <tr class="odd:bg-white text-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $category['id'] ?>
                                </th>
                                <th id="category-<?= $category['id'] ?>"  class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $category['name'] ?>
                                </th>
                                <td class="py-4 flex gap-4">
                                    <a href="?id=<?= $category['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                    <button id="<?= $category['id'] ?>"  class="editBtn font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    
                </table>

            </div>

        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="../public/js/categories.js"></script>
