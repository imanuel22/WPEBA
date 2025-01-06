@extends('admin.partials.main')

@section('main')

<!-- Include Simple-DataTables Library -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>



<div id="toast-simple" class="flex items-center w-full max-w-xs p-4 space-x-4 rtl:space-x-reverse text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800" role="alert">
    <svg class="w-5 h-5 text-blue-600 dark:text-blue-500 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"/>
    </svg>
    <div class="ps-4 text-sm font-normal">Message sent successfully.</div>
</div>


<div class="mb-4">
    <button type="submit" data-modal-target="tambah" data-modal-toggle="tambah" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
        Tambah Data
    </button>
</div>
<div class="p-4 text-gray-200 rounded-lg bg-slate-700">
    <table id="selection-table">
        <thead>
            <tr>
                <th>
                    <span class="flex items-center">
                        Name
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th data-type="date" data-format="YYYY/DD/MM">
                    <span class="flex items-center">
                        Email
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Profile
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Aksi
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
            </tr>
        </thead>
    <tbody>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Flowbite</td>
            <td>2021/25/09</td>
            <td>269000</td>
            <td>
                <button type="button" data-modal-target="edit" data-modal-toggle="edit" class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    Edit
                </button>
                <button type="button" class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" onclick="return confirm('Apakah anda ingin menghapus akun ini?')">
                    Hapus
                </button>
            </td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">React</td>
            <td>2013/24/05</td>
            <td>4500000</td>
            <td>24%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Angular</td>
            <td>2010/20/09</td>
            <td>2800000</td>
            <td>17%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Vue</td>
            <td>2014/12/02</td>
            <td>3600000</td>
            <td>30%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Svelte</td>
            <td>2016/26/11</td>
            <td>1200000</td>
            <td>57%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Ember</td>
            <td>2011/08/12</td>
            <td>500000</td>
            <td>44%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Backbone</td>
            <td>2010/13/10</td>
            <td>300000</td>
            <td>9%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">jQuery</td>
            <td>2006/28/01</td>
            <td>6000000</td>
            <td>5%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Bootstrap</td>
            <td>2011/19/08</td>
            <td>1800000</td>
            <td>12%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Foundation</td>
            <td>2011/23/09</td>
            <td>700000</td>
            <td>8%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Bulma</td>
            <td>2016/24/10</td>
            <td>500000</td>
            <td>7%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Next.js</td>
            <td>2016/25/10</td>
            <td>2300000</td>
            <td>45%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Nuxt.js</td>
            <td>2016/16/10</td>
            <td>900000</td>
            <td>50%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Meteor</td>
            <td>2012/17/01</td>
            <td>1000000</td>
            <td>10%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Aurelia</td>
            <td>2015/08/07</td>
            <td>200000</td>
            <td>20%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Inferno</td>
            <td>2016/27/09</td>
            <td>100000</td>
            <td>35%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Preact</td>
            <td>2015/16/08</td>
            <td>600000</td>
            <td>28%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Lit</td>
            <td>2018/28/05</td>
            <td>400000</td>
            <td>60%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Alpine.js</td>
            <td>2019/02/11</td>
            <td>300000</td>
            <td>70%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Stimulus</td>
            <td>2018/06/03</td>
            <td>150000</td>
            <td>25%</td>
        </tr>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Solid</td>
            <td>2021/05/07</td>
            <td>250000</td>
            <td>80%</td>
        </tr>
    </tbody>
</table>
</div>
    {{-- Start Modal Tambah --}}
    <div id="tambah" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Akun
                    </h3>
                    <button type="button" class="end-2.5 text-yellow-400 bg-transparent hover:bg-yellow-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="#">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="name" name="name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nama" required />
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="email@gmail.com" required />
                        </div>
                        <div>
                            <label for="profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Profile</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                        </div>
                        <button class="text-white inline-flex w-full justify-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Tambah Akun
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Tambah --}}

    {{-- Start Modal Edit --}}
    <div id="edit" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Akun
                    </h3>
                    <button type="button" class="end-2.5 text-yellow-400 bg-transparent hover:bg-yellow-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="#">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="name" name="name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nama" required />
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="email@gmail.com" required />
                        </div>
                        <div>
                            <label for="profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Profile</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                        </div>
                        <button class="text-white inline-flex w-full justify-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Edit Akun
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Edit --}}




    <!-- Script Table -->
    <script>

    if (document.getElementById("selection-table") && typeof simpleDatatables.DataTable !== 'undefined') {

    let multiSelect = true;
    let rowNavigation = false;
    let table = null;

    const resetTable = function() {
        if (table) {
            table.destroy();
        }

        const options = {
            rowRender: (row, tr, _index) => {
                if (!tr.attributes) {
                    tr.attributes = {};
                }
                if (!tr.attributes.class) {
                    tr.attributes.class = "";
                }
                if (row.selected) {
                    tr.attributes.class += " selected";
                } else {
                    tr.attributes.class = tr.attributes.class.replace(" selected", "");
                }
                return tr;
            }
        };
        if (rowNavigation) {
            options.rowNavigation = true;
            options.tabIndex = 1;
        }

        table = new simpleDatatables.DataTable("#selection-table", options);

        // Mark all rows as unselected
        table.data.data.forEach(data => {
            data.selected = false;
        });

        table.on("datatable.selectrow", (rowIndex, event) => {
            event.preventDefault();
            const row = table.data.data[rowIndex];
            if (row.selected) {
                row.selected = false;
            } else {
                if (!multiSelect) {
                    table.data.data.forEach(data => {
                        data.selected = false;
                    });
                }
                row.selected = true;
            }
            table.update();
        });
    };

    // Row navigation makes no sense on mobile, so we deactivate it and hide the checkbox.
    const isMobile = window.matchMedia("(any-pointer:coarse)").matches;
    if (isMobile) {
        rowNavigation = false;
    }

    resetTable();
    }

    </script>

@endsection
