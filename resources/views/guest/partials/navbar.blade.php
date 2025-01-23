    <div class="navbar">
        <nav class="fixed top-0 z-20 w-full border-gray-200 bg-LightBlue dark:bg-transparent start-0 dark:border-gray-600">
            <div class="flex">
                <div class="flex flex-auto items-center justify-between max-w-screen-xl p-4 mx-auto">
                    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap text-charcoal dark:text-lime-500">WEBPBA</span>
                    </a>
                    <div class="items-center justify-center hidden w-full md:flex md:w-auto " id="navbar-sticky">
                        <ul
                            class="flex flex-col p-4 mt-4 font-medium rounded-lg md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                            <li>
                                <a href="/"
                                    class="block px-3 py-2 rounded text-charcoal hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-charcoal dark:hover:bg-lime-700 dark:hover:text-lime-700 md:dark:hover:bg-transparent">HOME</a>
                            </li>
                            <li>
                                <a href="/events"
                                    class="block px-3 py-2 rounded text-charcoal hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-charcoal dark:hover:bg-lime-700 dark:hover:text-lime-700 md:dark:hover:bg-transparent">EVENT</a>
                            </li>
                            @if (!session('id'))
                                <li>
                                    <a href="/login"
                                        class="block px-3 py-2 rounded text-charcoal hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-charcoal dark:hover:bg-lime-700 dark:hover:text-lime-700 md:dark:hover:bg-transparent">LOGIN</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="flex justify-end">
                        <form class="max-w-md mx-auto">   
                            <label for="default-search" class="mb-2 text-sm font-medium text-charcoal sr-only dark:text-lime-500">Search</label>
                            <div class="relative">
                                <button type="submit" class="absolute start-4 bottom-5 focus:outline-none font-medium rounded-lg text-sm px-4 pb-3 ">
                                    <div class="absolute inset-y-0 start-0 flex items-center justify-start pointer-events-none">
                                        <svg class="w-4 h-4 text-charcoal" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                </button>
                                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-charcoal border border-charcoal rounded-full  bg-transparent" placeholder="Search" required />
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="flex items-center justify-center">
                        <div class="flex items-center justify-center ms-3">
                             
                            @if (session('id'))
                                
                            <div>
                                <button type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{ session('profile') ?? 'https://flowbite.com/docs/images/people/profile-picture-5.jpg' }}"
                                        alt="{{ session('name') }}">
                                </button>
                            </div>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        {{ session('name') }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                        {{ session('email') }}
                                    </p>
                                </div>  
                                <ul class="py-1" role="none">
                                    <li>
                                        <a href="/dashprofile/"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role=   "menuitem">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" data-modal-target="editModal" data-modal-toggle="editModal"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Edit</a>
                                    </li>
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                type="submit">Sign out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endif
                               
                        </div>
                    </div>
            </div>
            
        </nav>
    </div>
