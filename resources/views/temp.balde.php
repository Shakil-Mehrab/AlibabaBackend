 <fragment>
    <!-- <div class="p-4">
      <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
        <img
          class="w-full"
          src="https://tailwindcss.com/img/card-top.jpg"
          alt="Sunset in the mountains"
        >
        <div class="px-6 py-4 pb-2">
          <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
          <p
            class="text-gray-700 text-base"
          >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
        </div>
        <div class="px-6 py-4">
          <span class="badge mr-2">#photography</span>
          <span class="badge mr-2">#travel</span>
          <span class="badge">#winter</span>
        </div>
      </div>
    </div> -->
    <div>
      <div class="px-4 mt-10">
        <client-only>
          <carousel
            class="home-slider"
            :per-page="2"
            :autoplay="true"
            :autoplayTimeout="5000"
            :loop="true"
            :navigationEnabled="true"
          >
            <slide v-for="n in 5" :key="n.id">
              <div class="mx-1 relative">
                <img
                  class="img-responsive"
                  src="http://quanticalabs.com/Pressroom/Template/images/slider/image_01.jpg"
                  :alt="n"
                />

                <div class="absolute bottom-0 w-1/3 bg-black opacity-75 mb-20 ml-20 p-4">
                  <ul class="flex py-2">
                    <li class="px-2 bg-red-700 text-white text-xs uppercase text-semibold"><a href="">WORLD</a></li>
                    <li class="px-2 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                  </ul>
                  <h1 class="text-xl text-white">High Altitudes May Aid Weight Control</h1>
                  <p class="text-xs text-white">
                    Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.
                  </p>
                </div>
              </div>
            </slide>
          </carousel>
        </client-only>
      </div>
    </div>
    <div class="container mx-auto">
      <div class="px-4 mt-10">
        <client-only>
          <carousel
            class="home-slider"
            :per-page="4"
            :autoplay="true"
            :autoplayTimeout="5000"
            :loop="true"
            :navigationEnabled="true"
          >
            <slide v-for="n in 5" :key="n.id">
              <div class="mx-1">
                <!-- <img
                  class="img-responsive"
                  src="http://quanticalabs.com/Pressroom/Template/images/slider/image_01.jpg"
                  :alt="n"
                /> -->

                <div class="p-4">
                  <ul class="flex py-2">
                    <li class="px-2 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                  </ul>
                  <h1 class="text-xl">High Altitudes May Aid Weight Control</h1>
                  <p class="text-xs">
                    Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.
                  </p>
                </div>
              </div>
            </slide>
          </carousel>
        </client-only>
      </div>
    </div>
    <div class="container mx-auto bg-white">
      <div class="row sm:flex flex-wrap">
          <div class="w-full sm:w-8/12">

            <!-- latest post  -->
            <section>
              <div class="div_heading mt-16">Latest Posts</div>
              <ul class="xs:flex flex-wrap">
                <li v-for="n in 3" :key="n" class="px-4 mt-10 xs:w-1/2">
                  <a href="" class="relative">
                    <img src="http://quanticalabs.com/Pressroom/Template/images/samples/330x242/image_01.jpg" alt=""
                    class="w-full img_hover_effect transition ease-in-out duration-1000">
                  </a>
                  <div class="flex justify-between py-4 ">
                    <h2>
                      <a href="" class="text-xl mr-4 hover:text-red-700">
                        সাঈদীর বিরুদ্ধে ১০ বছর সাঈদীর বিরুদ্ধে ১০ বছর পর বাদীর সাক্ষ্যগ্রহণ
                      </a>
                    </h2>
                    <div class="w-20 mt-0 relative items-center">
                      <a href="" title="12 comments">
                      <span class="z-50 absolute right-0 mr-2 mt-1 font-semibold text-customcolor-300">12</span>
                      <span class="absolute right-0 z-40">
                        <svg class="w-10 inline-block text-background-100 hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                      </span>
                      </a>
                    </div>
                  </div>
                  <ul class="flex py-2">
                    <li class="p-2 bg-red-700 text-white text-sm uppercase text-semibold"><a href="">WORLD</a></li>
                    <li class="p-2 border text-gray-600 text-sm">10:11 PM, Feb 02</li>
                  </ul>
                  <p class="py-2 mb-4 text-sm text-gray-600">
                    যুদ্ধাপরাধী দেলাওয়ার হোসাইন সাঈদীর বিরুদ্ধে আয়কর ফাঁকির মামলায় ১০ বছর পর বাদী মাছুমা খাতুনের সাক্ষ্য নিয়েছে আদালত।
                  </p>
                  <a href="" class=" hover:bg-red-700 py-1 mt-6">
                    <svg class="w-6 inline-block bg-red-700 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="uppercase text-sm font-semibold hover:text-white p-2">Read More</span>
                  </a>
                </li>
                <li class="px-4 mt-10 last:hidden xs:w-1/2">
                  <a href="" class="relative">
                    <img src="http://quanticalabs.com/Pressroom/Template/images/samples/330x242/image_01.jpg" alt=""
                    class="w-full img_hover_effect transition ease-in-out duration-1000">
                    <span class="absolute top-0 w-10 h-10 bg-black text-white bg-opacity-75 text-center p-2">
                      <i class="fas fa-play"></i>
                    </span>
                  </a>
                  <div class="flex justify-between py-4 ">
                    <h2>
                      <a href="" class="text-xl mr-4 hover:text-red-700">
                        সাঈদীর বিরুদ্ধে ১০ বছর সাঈদীর বিরুদ্ধে ১০ বছর পর বাদীর সাক্ষ্যগ্রহণ
                      </a>
                    </h2>
                    <div class="w-16 mt-0 relative items-center">
                      <a href="" title="12 comments">
                      <span class="z-50 absolute right-0 mr-2 mt-1 font-semibold text-customcolor-300">12</span>
                      <span class="absolute right-0 z-40">
                        <svg class="w-10 inline-block text-background-100 hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                      </span>
                      </a>
                    </div>
                  </div>
                  <ul class="flex py-2">
                    <li class="p-2 bg-red-700 text-white text-sm uppercase text-semibold"><a href="">WORLD</a></li>
                    <li class="p-2 border text-gray-600 text-sm">10:11 PM, Feb 02</li>
                  </ul>
                  <p class="py-2 mb-4 text-sm text-gray-600">
                    যুদ্ধাপরাধী দেলাওয়ার হোসাইন সাঈদীর বিরুদ্ধে আয়কর ফাঁকির মামলায় ১০ বছর পর বাদী মাছুমা খাতুনের সাক্ষ্য নিয়েছে আদালত।
                  </p>
                  <a href="" class=" hover:bg-red-700 py-1 mt-6">
                    <svg class="w-6 inline-block bg-red-700 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="uppercase text-sm font-semibold hover:text-white p-2">Read More</span>
                  </a>
                </li>
              </ul>
            </section>
            <!-- post carousel  -->
            <section>
              <div class="div_heading mt-16">Post Carousel</div>
              <div class="px-4 mt-10">
                <client-only>
                  <carousel
                    class="home-slider"
                    :per-page="3"
                    :autoplay="true"
                    :autoplayTimeout="5000"
                    :loop="true"
                    :navigationEnabled="true"
                  >
                    <slide v-for="n in 5" :key="n.id">
                      <div class="mx-1">
                        <img
                          class="img-responsive"
                          src="https://picsum.photos/600/300"
                          alt="Awesome Image"
                        />
                        <div>
                          <h1>High Altitudes May Aid Weight Control</h1>
                          <ul class="flex py-2">
                            <li class="px-2 bg-red-700 text-white text-xs uppercase text-semibold"><a href="">WORLD</a></li>
                            <li class="px-2 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                          </ul>
                        </div>
                      </div>
                    </slide>
                  </carousel>
                </client-only>
              </div>
            </section>
            <!-- latest health -->
            <section>
              <div class="div_heading mt-16">Latest From Health</div>
              <ul class="xs:flex flex-wrap">
                <li class="px-4 mt-10 xs:w-1/2">
                  <a href="" class="relative">
                    <img src="http://quanticalabs.com/Pressroom/Template/images/samples/330x242/image_01.jpg" alt=""
                    class="w-full img_hover_effect transition ease-in-out duration-1000">
                  </a>
                  <div class="flex justify-between py-4 ">
                    <h2>
                      <a href="" class="text-xl mr-4 hover:text-red-700">
                        সাঈদীর বিরুদ্ধে ১০ বছর সাঈদীর বিরুদ্ধে ১০ বছর পর বাদীর সাক্ষ্যগ্রহণ
                      </a>
                    </h2>
                    <div class="w-20 mt-0 relative items-center">
                      <a href="" title="12 comments">
                      <span class="z-50 absolute right-0 mr-2 mt-1 font-semibold text-customcolor-300">12</span>
                      <span class="absolute right-0 z-40">
                        <svg class="w-10 inline-block text-background-100 hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                      </span>
                      </a>
                    </div>
                  </div>
                  <ul class="flex py-2">
                    <li class="p-2 bg-red-700 text-white text-sm uppercase text-semibold"><a href="">WORLD</a></li>
                    <li class="p-2 border text-gray-600 text-sm">10:11 PM, Feb 02</li>
                  </ul>
                  <p class="py-2 mb-4 text-sm text-gray-600">
                    যুদ্ধাপরাধী দেলাওয়ার হোসাইন সাঈদীর বিরুদ্ধে আয়কর ফাঁকির মামলায় ১০ বছর পর বাদী মাছুমা খাতুনের সাক্ষ্য নিয়েছে আদালত।
                  </p>
                  <a href="" class=" hover:bg-red-700 py-1 mt-6">
                    <svg class="w-6 inline-block bg-red-700 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="uppercase text-sm font-semibold hover:text-white p-2">Read More</span>
                  </a>
                </li>
                <li class="px-4 mt-10 xs:w-1/2">
                  <ul>
                    <li class="flex mb-5" v-for="n in 5" :key="n">
                      <a href="" class="relative w-1/2">
                        <img src="http://quanticalabs.com/Pressroom/Template/images/samples/330x242/image_01.jpg" alt=""
                        class="w-full img_hover_effect">
                        <span class="absolute top-0 w-10 h-10 bg-black text-white bg-opacity-75 text-center p-2">
                          <i class="fas fa-play"></i>
                        </span>
                      </a>
                      <div class="ml-2 w-1/2">
                        <h2>
                          <a href="" class="text-base mr-4 hover:text-red-700">
                            সাঈদীর বিরুদ্ধে ১০ বছর পর বাদীর সাক্ষ্যগ্রহণ
                          </a>
                        </h2>
                        <div class="hidden lg:block">
                          <ul class="flex py-2">
                            <li class="px-1 bg-red-700 text-white text-xs uppercase text-semibold"><a href="">WORLD</a></li>
                            <li class="px-1 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="text-sm uppercase font-semibold p-2 border text-center hover:bg-red-700 hover:text-white">
                      <a href="">More from headth</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </section>
            <!-- top posts  -->
            <section>
              <div class="div_heading mt-16">Post Carousel</div>
              <div class="text-base py-2 border-b mx-4">
                <a href="" class="mr-4 py-2" :class="{'border-b-2 border-red-700':most_recent}" @click.prevent="activeMostRecent()">Most Recent</a>
                <a href="" class="mx-4 py-2" :class="{'border-b-2 border-red-700':most_read}" @click.prevent="activeMostRead()">Most Read</a>
                <a href="" class="mx-4 py-2" :class="{'border-b-2 border-red-700':most_commented}" @click.prevent="activeMostCommented()">Most Commented</a>
              </div>
              <div class="mx-4 mt-10" v-if="most_recent">
                <client-only>
                  <carousel
                    class="home-slider"
                    :per-page="3"
                    :autoplay="true"
                    :autoplayTimeout="5000"
                    :loop="true"
                    :navigationEnabled="true"
                  >
                    <slide v-for="n in 5" :key="n.id">
                      <div class="mx-1">
                        <img
                          class="img-responsive"
                          src="https://picsum.photos/600/300"
                          alt="Awesome Image"
                        />
                        <div>
                          <h1>High Altitudes May Aid Weight Control</h1>
                          <ul class="flex py-2">
                            <li class="px-2 bg-red-700 text-white text-xs uppercase text-semibold"><a href="">WORLD</a></li>
                            <li class="px-2 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                          </ul>
                        </div>
                      </div>
                    </slide>
                  </carousel>
                </client-only>
              </div>
              <br>
              <ul class="flex" v-if="most_read">
                <li v-for="n in 3" :key="n" class="px-4 mt-10">
                  <a href="" class="relative">
                    <img src="http://quanticalabs.com/Pressroom/Template/images/samples/330x242/image_01.jpg" alt=""
                    class="w-full img_hover_effect transition ease-in-out duration-1000">
                  </a>
                  <div class="flex justify-between py-4 ">
                    <h2>
                      <a href="" class="text-base mr-4 hover:text-red-700">
                        সাঈদীর বিরুদ্ধে ১০ বছর সাঈদীর বিরুদ্ধে ১০ বছর পর বাদীর সাক্ষ্যগ্রহণ
                      </a>
                    </h2>
                    <div class="w-20 mt-0 relative items-center">
                      <a href="" title="12 comments">
                      <span class="z-50 absolute right-0 mr-2 mt-1 font-semibold text-customcolor-300">12</span>
                      <span class="absolute right-0 z-40">
                        <svg class="w-10 inline-block text-background-100 hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                      </span>
                      </a>
                    </div>
                  </div>
                  <ul class="flex py-2">
                    <li class="p-1 bg-red-700 text-white text-sm uppercase text-semibold"><a href="">WORLD</a></li>
                    <li class="p-1 border text-gray-600 text-sm">10:11 PM, Feb 02</li>
                  </ul>
                </li>
              </ul>
              <br>
              <ul class="flex" v-if="most_commented">
                <li v-for="n in 3" :key="n" class="px-4 mt-10">
                  <a href="" class="relative">
                    <img src="http://quanticalabs.com/Pressroom/Template/images/samples/330x242/image_01.jpg" alt=""
                    class="w-full img_hover_effect transition ease-in-out duration-1000">
                  </a>
                  <div class="flex justify-between py-4 ">
                    <h2>
                      <a href="" class="text-base mr-4 hover:text-red-700">
                        সাঈদীর বিরুদ্ধে ১০ বছর সাঈদীর বিরুদ্ধে ১০ বছর পর বাদীর সাক্ষ্যগ্রহণ
                      </a>
                    </h2>
                    <div class="w-20 mt-0 relative items-center">
                      <a href="" title="12 comments">
                      <span class="z-50 absolute right-0 mr-2 mt-1 font-semibold text-customcolor-300">12</span>
                      <span class="absolute right-0 z-40">
                        <svg class="w-10 inline-block text-background-100 hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                      </span>
                      </a>
                    </div>
                  </div>
                  <ul class="flex py-2">
                    <li class="p-1 bg-red-700 text-white text-sm uppercase text-semibold"><a href="">WORLD</a></li>
                    <li class="p-1 border text-gray-600 text-sm">10:11 PM, Feb 02</li>
                  </ul>
                </li>
              </ul>

            </section>
            <!-- category -->
            <section>
              <div class="flex">
                <ul class="w-1/2" v-for="n in 2" :key="n">
                  <div class="div_heading mt-16">Latest From Health</div>
                  <li class="px-4 mt-10">
                    <a href="" class="relative">
                      <img src="http://quanticalabs.com/Pressroom/Template/images/samples/330x242/image_01.jpg" alt=""
                      class="w-full img_hover_effect transition ease-in-out duration-1000">
                    </a>
                    <div class="flex justify-between py-4 ">
                      <h2>
                        <a href="" class="text-xl mr-4 hover:text-red-700">
                          সাঈদীর বিরুদ্ধে ১০ বছর সাঈদীর বিরুদ্ধে ১০ বছর পর বাদীর সাক্ষ্যগ্রহণ
                        </a>
                      </h2>
                      <div class="w-20 mt-0 relative items-center">
                        <a href="" title="12 comments">
                        <span class="z-50 absolute right-0 mr-2 mt-1 font-semibold text-customcolor-300">12</span>
                        <span class="absolute right-0 z-40">
                          <svg class="w-10 inline-block text-background-100 hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                          </svg>
                        </span>
                        </a>
                      </div>
                    </div>
                    <ul class="flex py-2">
                      <li class="p-2 bg-red-700 text-white text-sm uppercase text-semibold"><a href="">WORLD</a></li>
                      <li class="p-2 border text-gray-600 text-sm">10:11 PM, Feb 02</li>
                    </ul>
                    <p class="py-2 mb-4 text-sm text-gray-600">
                      যুদ্ধাপরাধী দেলাওয়ার হোসাইন সাঈদীর বিরুদ্ধে আয়কর ফাঁকির মামলায় ১০ বছর পর বাদী মাছুমা খাতুনের সাক্ষ্য নিয়েছে আদালত।
                    </p>
                    <a href="" class=" hover:bg-red-700 py-1 mt-6">
                      <svg class="w-6 inline-block bg-red-700 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                      <span class="uppercase text-sm font-semibold hover:text-white p-2">Read More</span>
                    </a>
                  </li>
                  <li class="px-4 mt-10">
                    <ul>
                      <li class="flex mb-5" v-for="n in 2" :key="n">
                        <a href="" class="relative w-1/2">
                          <img src="http://quanticalabs.com/Pressroom/Template/images/samples/330x242/image_01.jpg" alt=""
                          class="w-full img_hover_effect">
                          <span class="absolute top-0 w-10 h-10 bg-black text-white bg-opacity-75 text-center p-2">
                            <i class="fas fa-play"></i>
                          </span>
                        </a>
                        <div class="ml-2 w-1/2">
                          <h2>
                            <a href="" class="text-base mr-4 hover:text-red-700">
                              সাঈদীর বিরুদ্ধে ১০ বছর পর বাদীর সাক্ষ্যগ্রহণ
                            </a>
                          </h2>
                          <div class="hidden lg:block">
                            <ul class="flex py-2">
                              <li class="px-1 bg-red-700 text-white text-xs uppercase text-semibold"><a href="">WORLD</a></li>
                              <li class="px-1 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li class="text-sm uppercase font-semibold p-2 border text-center hover:bg-red-700 hover:text-white">
                        <a href="">More from headth</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </section>
          </div>
          <div class="w-full sm:w-4/12 pb-5">
            <!-- recomemded  -->
            <div class="" v-for="n in 2" :key="n">
              <div class="div_heading mt-16">Recent Post</div>
              <div class="">
                <ul>
                  <li class="mt-10 px-4 flex items-center sm:block" v-for="n in 3" :key="n">
                    <a href="" class="w-32 h-20">
                      <img src="http://quanticalabs.com/Pressroom/Template/images/samples/510x187/image_12.jpg" class="w-full img_hover_effect h-full object-cover object-center" alt="dsfvd">
                    </a>
                    <div class="ml-2">
                      <h5 class="py-2">
                        <a href="" class="text-sm sm:text-base mr-4 hover:text-red-700">
                          নির্বাচন কমিশনের পদত্যাগ দাবিতে বামজোটের বিক্ষোভ
                        </a>
                      </h5>
                      <ul class="flex py-2">
                        <li class="px-2 bg-red-700 text-white text-xs uppercase text-semibold"><a href="">WORLD</a></li>
                        <li class="px-2 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- most read and commented  -->
            <div class>
              <div class="mt-16 mx-4 flex justify-between cursor-pointer">
                <spaan class="py-2 px-2 w-1/2 hover:bg-red-700 hover:text-white text-center border" :class="{
                  'bg-red-700 text-white':rightSideMostRead}" @click.prevent="activeRightSideMostRead()">
                  Most Read
                </spaan>
                <spaan class="py-2 px-2 w-1/2 hover:bg-red-700 hover:text-white text-center border" :class="{
                  'bg-red-700 text-white':rightSideMostCommented}" @click.prevent="activeRightSideMostCommented()">
                  Most Commented
                </spaan>
              </div>

              <div class="">
                <ul v-if="rightSideMostRead">
                  <li class="mt-8 px-4 flex items-center sm:block" v-for="n in 3" :key="n">
                    <a href="" class="w-32 h-20">
                      <img src="http://quanticalabs.com/Pressroom/Template/images/samples/510x187/image_12.jpg" class="w-full img_hover_effect h-full object-cover object-center" alt="dsfvd">
                    </a>
                    <div class="ml-2">
                      <h5 class="py-2">
                        <a href="" class="text-sm sm:text-base mr-4 hover:text-red-700">
                          নির্বাচন কমিশনের পদত্যাগ দাবিতে বামজোটের বিক্ষোভ
                        </a>
                      </h5>
                      <ul class="flex py-2">
                        <li class="px-2 bg-red-700 text-white text-xs uppercase text-semibold"><a href="">WORLD</a></li>
                        <li class="px-2 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                      </ul>
                    </div>
                  </li>
                </ul>
                <ul v-if="rightSideMostCommented">
                  <li class="mt-8 px-4 flex items-center sm:block" v-for="n in 3" :key="n">
                    <a href="" class="w-32 h-20">
                      <img src="http://quanticalabs.com/Pressroom/Template/images/samples/510x187/image_12.jpg" class="w-full img_hover_effect h-full object-cover object-center" alt="dsfvd">
                    </a>
                    <div class="ml-2">
                      <h5 class="py-2">
                        <a href="" class="text-sm sm:text-base mr-4 hover:text-red-700">
                          নির্বাচন কমিশনের পদত্যাগ দাবিতে বামজোটের বিক্ষোভ c
                        </a>
                      </h5>
                      <ul class="flex py-2">
                        <li class="px-2 bg-red-700 text-white text-xs uppercase text-semibold"><a href="">WORLD</a></li>
                        <li class="px-2 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- top authors  -->
            <div class="pb-10">
              <div class="div_heading mt-16">Top Authors</div>
              <div class="">
                <ul class="sm:flex flex-wrap justify-start">
                  <li class="mt-8 px-4 flex items-center sm:block lg:w-1/2" v-for="n in 4" :key="n">
                    <a href="w-1/2 sm:full" class="">
                      <img src="http://quanticalabs.com/Pressroom/Template/images/samples/510x187/image_12.jpg" class="w-full img_hover_effect h-full object-cover object-center" alt="dsfvd">
                    </a>
                    <div class="ml-2">
                      <h5 class="py-2">
                        <a href="" class="text-sm sm:text-base mr-4 hover:text-red-700">
                          নির্বাচন কমিশনের
                        </a>
                      </h5>
                      <ul class="flex py-2">
                        <li class="px-2 border text-gray-600 text-xs">Editor</li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
              <!-- science -->
            <div class="mt-10">
              <div class="div_heading mt-16">Science</div>
              <div class="">
                <ul>
                  <li class="mt-8 px-4 flex items-center sm:block" v-for="n in 3" :key="n">
                    <a href="" class="w-32 h-20">
                      <img src="http://quanticalabs.com/Pressroom/Template/images/samples/510x187/image_12.jpg" class="w-full img_hover_effect h-full object-cover object-center" alt="dsfvd">
                    </a>
                    <div class="ml-2">
                      <h5 class="py-2">
                        <a href="" class="text-sm sm:text-base mr-4 hover:text-red-700">
                          নির্বাচন কমিশনের পদত্যাগ দাবিতে বামজোটের বিক্ষোভ
                        </a>
                      </h5>
                      <ul class="flex py-2">
                        <li class="px-2 bg-red-700 text-white text-xs uppercase text-semibold"><a href="">WORLD</a></li>
                        <li class="px-2 border text-gray-600 text-xs">10:11 PM, Feb 02</li>
                      </ul>
                    </div>
                  </li>
                  <li class="text-sm uppercase font-semibold p-2 border text-center hover:bg-red-700 hover:text-white mx-4">
                      <a href="">More from headth</a>
                    </li>
                </ul>
              </div>

            </div>
          </div>

      </div>
    </div>
  </fragment>