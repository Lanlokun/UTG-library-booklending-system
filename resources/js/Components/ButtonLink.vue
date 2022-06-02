<template>
    <Link :href="link" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 mx-3 rounded-lg"><slot /></Link>

</template>

<script setup>

import {defineProps} from "vue";

import {Link} from "@inertiajs/inertia-vue3";

defineProps({
    link: {
        type:String,
        required:true
    }
})

</script>

<style scoped>

</style>
