
    <nav class="bg-[#222] border-b z-50 border-gray-600 fixed top-0 left-0 w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-6">
            <!-- the logo -->
            <a href="home" class="flex items-center grow space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Wiki" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Wiki</span>
            </a>
            <!-- the search wrapper -->
            <?php if($_SERVER['REQUEST_URI'] == '/wiki/home' or $_SERVER['REQUEST_URI'] == '/wiki/') : ?>
                <div class="search-wrapper grow max-w-md invisible">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="search-input block w-full p-3.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required>
                        <button type="submit" class="search-btn text-white absolute end-2.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </div>
            <?php endif; ?>
                
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <!-- the links -->
            <div class="hidden grow w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium text-center flex flex-col justify-end px-4 py-10 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <li>
                        <a href="home" class="<?= ($_SERVER['REQUEST_URI'] == '/wiki/home' or $_SERVER['REQUEST_URI'] == '/wiki/')? 'text-blue-500' : 'text-white';?> block py-2 px-3 bg-blue-700 rounded md:bg-transparent md:p-0 " >Home</a>
                    </li>
                    <li>
                        <a href="create" class="<?= ($_SERVER['REQUEST_URI'] === '/wiki/create') ? 'text-blue-500' : 'text-white' ; ?> block mb-8 md:mb-0 py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Write</a>
                    </li>
                    <?php if(empty($_SESSION['user_id'])) : ?>
                        <li>
                            <a href="signin" class="<?= ($_SERVER['REQUEST_URI'] === '/wiki/signin') ? 'text-blue-500' : 'text-white' ; ?> block py-2 px-3 rounded md:border-0 md:p-0">Sign In</a>
                        </li>
                        <li>
                            <a href="signup" class="text-white bg-blue-700 focus:outline-none hover:bg-blue-800 focus:ring-4 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2">Get Started</a>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="logout" class="text-white bg-red-700 focus:outline-none hover:bg-red-800 focus:ring-4 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2">Log Out</a>
                            <?php if($_SESSION['user_role_id'] != 1)  : ?>
                                <a href="profile" class="text-white bg-gray-700 focus:outline-none hover:bg-gray-800 focus:ring-4 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2">P</a>
                            <?php else : ?>
                                <a href="admin/dashboard" class="text-white bg-gray-700 focus:outline-none hover:bg-gray-800 focus:ring-4 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2">Dashboard</a>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>