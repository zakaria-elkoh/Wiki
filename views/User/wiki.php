

        <section class="py-10 px-16 bg-[#333] dark:text-white max-w-screen-lg mx-auto mt-28 mb-10 rounded-3xl" action="create" method="POST">
            <div class="categories-wrapper px-6 basis-1/3">
                <div class="sticky top-24 pt-7 ps-6">    
                  <div class="text-white bg-[#333] rounded-2xl p-6 shadow-zinc-800">
                      <div class="p-3">
                          <div class="flex gap-3 mb-2">
                              <a href="#">
                                  <img class="w-16 h-16 rounded-full" src="public/assets/profile-img.png" alt="Jese Leos">
                              </a>
                              <p class="text-lg font-normal">
                                  <a href="#" class="hover:underline block">@<?= $wiki['user_name'] ?></a>
                                  <a href="#"><?= $wiki['first_name'] ?> <?= $wiki['last_name'] ?></a>
                              </p>
                          </div>
                      </div>
                      <div data-popper-arrow></div>
                  </div>
                </div>
            </div>

            <h2 class="text-4xl font-extrabold mb-5"><?= $wiki['title']; ?></h2>
            <p><?= $wiki['content']; ?></p>
            <div class="mt-5">
                <?php 
                    $tagsArray = explode(',', $wiki['tags']);
                ?>
                <?php foreach ($tagsArray as $tag) : ?>
                        <button type="button" class="py-1.5 px-3  text-sm font-medium text-white bg-[#444] rounded-full">
                            #<?= $tag ?>
                        </button>
                <?php endforeach; ?>
            </div>
        </section>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>