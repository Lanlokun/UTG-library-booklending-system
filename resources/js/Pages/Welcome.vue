<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import FrontLayout from "../Layouts/FrontLayout";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <FrontLayout>

        <div class=" overscroll-none px-100 my-9 py-24">
            <img class="mx-96 px-96" src="../../../public/images/UTG-Logo-removebg-preview.png">
            <div class="my-30 text-green-900 text-7xl font-bold text-center">
                Welcome To The University Of The Gambia
            </div>
            <div class="my-20 text-green-900 text-5xl font-bold text-center">
                Library Management System
            </div>

            <Link href="/login" type="button" class="content-center mx-96 px-36 text-white font-bold bg-green-700 hover:bg-green-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg py-3.5 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">GET STARTED</Link>



        </div>
    </FrontLayout>

</template>
