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
        hello
    </FrontLayout>

</template>
