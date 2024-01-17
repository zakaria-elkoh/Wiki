      
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <?php include '../../Includes/aside.php'; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="grid grid-cols-2 gap-5">
                <!-- statistic of the wikis -->
                <div class="bg-[#333] p-6 text-white rounded-2xl text-center">
                    <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight"><?= $total_wikis; ?></h1>
                    <span>Wikis</span>
                    <a href="wikis" class="block text-right mt-6 hover:underline">See All Wikies</a>
                </div>
                <!-- statistic of the users -->
                <div class="bg-[#333] p-6 text-white rounded-2xl text-center">
                    <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight"><?= $total_users; ?></h1>
                    <span>User</span>
                    <a href="users" class="block text-right mt-6 hover:underline">See All Users</a>
                </div>

            </div>
            <div class="grid grid-cols-2 mt-5 gap-5">
                <!-- statistic of the tags -->
                <div class="bg-[#333] p-6 text-white rounded-2xl text-center">
                    <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight"><?= $total_tags; ?></h1>
                    <span>Tags</span>
                    <a href="#" class="block text-right mt-6 hover:underline">See All Tags</a>
                </div>
                <!-- statistic of the categories -->
                <div class="bg-[#333] p-6 text-white rounded-2xl text-center">
                    <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight"><?= $total_categories; ?></h1>
                    <span>Categories</span>
                    <a href="#" class="block text-right mt-6 hover:underline">See All Categories</a>
                </div>
            </div>

        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>