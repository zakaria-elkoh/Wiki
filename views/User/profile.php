
    <section class="bg-[#222] py-28">
        <div class="max-w-screen-xl mx-auto px-6 flex">

            <div class="wikis-wrapper basis-2/3 flex flex-col gap-5 pt-7">
                <?php foreach($wikis as $wiki) : ?>
                  <div class="relative">
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
                        <a href="create?id=<?= $wiki['id']; ?>"  class="text-blue-700 cursor-pointer absolute right-0 top-2 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">edit</a>
                  </div>
                <?php endforeach; ?>
            </div>

            <div class="categories-wrapper px-6 basis-1/3">
                <div class="sticky top-24 pt-7 ps-6">                
                  <!-- <button data-popover-target="popover-user-profile" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">User profile</button> -->
                  <div class="text-white bg-[#333] rounded-2xl p-6 shadow-zinc-800">
                      <div class="p-3 flex flex-col items-center">
                          <div class="flex items-center justify-between mb-2">
                              <a href="#">
                                  <img class="w-16 h-16 rounded-full" src="public/assets/profile-img.png" alt="Jese Leos">
                              </a>
                          </div>
                          <p class="mt-5 mb-3 text-lg font-normal">
                              <a href="#" class="hover:underline">@<?= $_SESSION['user_name'] ?></a>
                          </p>
                          <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                              <a href="#"><?= $_SESSION['first_name'] ?> <?= $_SESSION['last_name'] ?></a>
                          </p>
                          <a href="logout" class="text-white mt-8 bg-red-700 focus:outline-none hover:bg-red-800 focus:ring-4 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2">Log Out</a>
                          <!-- <ul class="flex text-sm">
                              <li class="me-2">
                                  <a href="#" class="hover:underline">
                                      <span class="font-semibold text-gray-900 dark:text-white">799</span>
                                      <span>Following</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="hover:underline">
                                      <span class="font-semibold text-gray-900 dark:text-white">3,758</span>
                                      <span>Followers</span>
                                  </a>
                              </li>
                          </ul> -->
                      </div>
                      <div data-popper-arrow></div>
                  </div>
                </div>
            </div>

        </div>
    </section>

    <script src="public/js/app.js"></script>

</body>
</html>