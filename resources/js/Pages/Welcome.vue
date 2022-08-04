<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import FrontLayout from "../Layouts/FrontLayout";
import Footer from "../Components/Footer";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="UTG-LIBRARY" />

<!--    <FrontLayout>-->

    <body>
    <div class=" ">
                    <img class="mr-6 mx-72 px-6" src="../../../public/images/UTG-Logo-removebg-preview.png">
        <h1 class="animate-character text-white mx-56"> WELCOME </h1>
<!--                    <div class=" mb-36 text-white text-5xl font-bold text-center">-->
<!--                        Welcome To The University Of The Gambia  Library Management System-->
<!--                    </div>-->


    </div>
    <div class="waviy mt-32">
        <span style="--i:1">G</span>
        <span style="--i:2">E</span>
        <span style="--i:3">T</span>
        <span style="--i:4">S</span>
        <span style="--i:5">T</span>
        <span style="--i:6">A</span>
        <span style="--i:7">R</span>
        <span style="--i:8">T</span>
        <span style="--i:9">E</span>
        <span style="--i:10">D</span>


    </div>


    </body>

<!--        <div class=" overscroll-none px-100 my-9 py-24">-->
<!--            <img class="mx-96 px-96" src="../../../public/images/UTG-Logo-removebg-preview.png">-->
<!--            <div class="animate-character my-30 text-green-900 text-7xl font-bold text-center">-->
<!--                Welcome To The University Of The Gambia  Library Management System-->
<!--            </div>-->

            <Link href="/login" type="button" class="content-center  px-96 text-white font-bold bg-green-700 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-lg py-3.5 mb-4 dark:bg-green-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</Link><br><br>
<!--            <Link href="/register" type="button" class="px-96 text-green-500 font-bold border-double border-4 border-green-600 hover:bg-green-700 hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-lg py-3.5 mb-46 dark:bg-gray-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</Link>-->
<Footer/>


<!--        </div>-->
<!--    </FrontLayout>-->

</template>


<style>
.animate-character
{
    text-transform: uppercase;
    background-image: linear-gradient(
        -225deg,
        #1f5715 0%,
        #4a7a10 29%,
        #d2ffa0 67%,
        #4a7a10 100%
    );
    background-size: auto auto;
    background-clip: border-box;
    background-size: 200% auto;
    color: #fff;
    background-clip: text;
    text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textclip 2s linear infinite;
    display: inline-block;
    font-size: 90px;
}

@keyframes textclip {
    to {
        background-position: 200% center;
    }
}

@import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap');
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
    background-color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
.waviy {
    position: relative;
    -webkit-box-reflect: below -20px linear-gradient(transparent, rgba(0,0,0,.2));
    font-size: 60px;
}
.waviy span {
    font-family: 'Alfa Slab One', cursive;
    position: relative;
    display: inline-block;
    color: #112302;
    text-transform: uppercase;
    animation: waviy 1s infinite;
    animation-delay: calc(.1s * var(--i));

}
@keyframes waviy {
    0%,40%,100% {
        transform: translateY(0)
    }
    20% {
        transform: translateY(-20px)
    }
}
</style>
