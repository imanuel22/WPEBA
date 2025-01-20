    <div class="navbar">
        <nav
            class="fixed top-0 z-20 w-full bg-LightBlue border-gray-200 dark:bg-transparent start-0 dark:border-gray-600">
            <div class="flex items-center justify-between max-w-screen-xl p-4 mx-auto">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap text-charcoal dark:text-lime-500">WEBPBA</span>
                </a>
                <div class="items-center justify-center hidden w-full md:flex md:w-auto " id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 mt-4 font-medium rounded-lg md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                        <li>
                            <a href="/landing"
                                class="block px-3 py-2 rounded text-charcoal hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-charcoal dark:hover:bg-lime-700 dark:hover:text-lime-700 md:dark:hover:bg-transparent">HOME</a>
                        </li>
                        <li>
                            <a href="/events"
                                class="block px-3 py-2 rounded text-charcoal hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-charcoal dark:hover:bg-lime-700 dark:hover:text-lime-700 md:dark:hover:bg-transparent">EVENT</a>
                        </li>
                        <li>
                            <a href="/login"
                                class="block px-3 py-2 rounded text-charcoal hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-charcoal dark:hover:bg-lime-700 dark:hover:text-lime-700 md:dark:hover:bg-transparent">LOGIN</a>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-end">
                    <form class="max-w-md mx-auto">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium sr-only text-charcoal dark:text-charcoal">Search</label>
                        <div class="relative">
                            <button type="submit"
                                class="absolute px-4 pb-3 text-sm font-medium rounded-lg start-4 bottom-5 focus:outline-none ">
                                <div
                                    class="absolute inset-y-0 flex items-center justify-start pointer-events-none start-0">
                                    <svg class="w-4 h-4 text-charcoal dark:text-charcoal" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                            </button>
                            <input type="search" id="default-search"
                                class="block w-full p-4 text-sm bg-transparent border rounded-full ps-10 text-charcoal border-lime-500 dark:border-lime-500 dark:placeholder-gray-400 dark:text-lime-700"
                                placeholder="Search" required />
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
