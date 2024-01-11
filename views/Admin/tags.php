
<?php include '../../Includes/aside.php'; ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        
            <form class="my-10 mx-auto max-w-md" action="" method="POST">    
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" name="new_tag" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add tag..." required>
                    <button type="submit" name="add" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">add</button>
                </div>
            </form>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tag Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tag Name
                        </th>
                        <th scope="col" class="py-3">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($tags as $tag) : ?>
                        <tr class="odd:bg-white text-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $tag['id'] ?>
                            </th>
                            <th id="tag-<?= $tag['id'] ?>"  class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $tag['name'] ?>
                            </th>
                            <td class="py-4">
                                <a href="?id=<?= $tag['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                <button id="<?= $tag['id'] ?>"  class="editBtn font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
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



</script>
