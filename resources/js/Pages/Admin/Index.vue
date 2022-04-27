<template>

    <admin-layout title="Dashboard">
        <template #header>




        </template>


        <!-- Jumbotron -->
        <div class="p-6 shadow-lg rounded-lg bg-white-100 text-gray-700">
            <h2 class="font-bold text-3xl mb-5">DASHBOARD</h2>
            <p>
                Welcome to the University of The Gambia's Library Management System
            </p>
            <hr class="my-6 border-gray-300" />
            <p>
                It uses utility classes for typography and spacing to space content out within the larger
                container.
            </p>
           <a href="/borrow/create"> <button
                type="button"
                class="inline-block px-6 py-2.5 mt-4 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
            >
               Borrow Book
            </button> </a>


            <div class="float-left flex justify-center">
                <div class="mb-3 xl:w-96 mx-5 my-3">
                    <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                        <input type="search" class="form-control relative flex-auto min-w-0 block w-half px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Find book" aria-label="Search" aria-describedby="button-addon3">
                        <button class="btn inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" type="button" id="button-addon3">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
        <div class="flex justify-center my-40">
            <div class="block p-6 mx-10 rounded-lg shadow-lg bg-lime-600 max-w-sm">
                <h5 class="text-white text-xl leading-tight font-medium mb-2">Book Logs</h5>
                <p class="text-white text-base mb-4">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                </p>
                <button type="button" class=" inline-block px-6 py-2.5 bg-white text-dark font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:text-white hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-white-800 active:shadow-lg transition duration-150 ease-in-out">View</button>
            </div>
            <div class="block mx-10 p-6 rounded-lg shadow-lg bg-sky-700 max-w-sm">
                <h5 class="text-white text-xl leading-tight font-medium mb-2">Attendance Logs</h5>
                <p class="text-white text-base mb-4">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                </p>
                <button type="button" class=" inline-block px-6 py-2.5 bg-white text-dark font-medium text-xs leading-tight uppercase rounded shadow-md hover:text-white hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">View</button>
            </div>

            <div class="block p-6 mx-10 rounded-lg shadow-lg bg-amber-700 max-w-sm">
                <h5 class="text-white text-xl leading-tight font-medium mb-2">User Logs</h5>
                <p class="text-white text-base mb-4">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                </p>
                <button type="button" class=" inline-block px-6 py-2.5 bg-white text-dark font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:text-white hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">View</button>


            </div>

        </div>



        <a href="../post/create">   <button type="button" class=" float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 px-10 py-10 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center top-2 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
           <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
        </button></a>

    </admin-layout>


</template>

<script setup>

import  AdminLayout from '../../Layouts/AdminLayout';
</script>

<style>

</style>
