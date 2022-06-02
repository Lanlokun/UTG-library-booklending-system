<template>
    <admin-layout title="Dashboard">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Movie Attach
            </h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2">

                        <Link :href="route('admin.movies.index')" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 mx-3 rounded-lg">View Movies</Link>

                    </div>

                    <div class="w-full mb-8 sm:max-w-md overflow-hidden bg-white rounded-lg shadow-lg">

                        <div class="flex justify-between">
                            <div class="flex-1">

                            </div>
                            <!--                                <div class="flex">-->
                            <!--                                    <select v-model="perPage"-->
                            <!--                                            @onchange="getTags"-->
                            <!--                                            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">-->
                            <!--                                        <option value="5">5 Per Page</option>-->
                            <!--                                        <option value="10">10 Per Page</option>-->
                            <!--                                        <option value="15">15 Per Page</option>-->
                            <!--                                    </select>-->
                            <!--                                </div>-->
                        </div>
                    </div>

                    <div class="w-full mb-8 p-6 overflow-hidden bg-white rounded-lg shadow-lg">
                        <div class="flex space-x-2">
                            <div v-for="trailer in trailers">
                                <Link class="px-4 mx-3 my-3 py-2 bg-red-500 hover:bg-red-700 text-white" :href="route('admin.trailer_url.destroy', trailer.id)" method="delete" as="button" type="button"> {{trailer.name}} </Link>


                            </div>
                        </div>
                        <form @submit.prevent="submitTrailer">
                            <div>
                                <JetLabel for="name" value="Name" />
                                <JetInput
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.name">{{ form.errors.name }}</div>

                            </div>


                            <div class="mt-4">
                                <JetLabel for="embed_html" value="Embed" />
                                <textarea
                                    id="embed_html"
                                    v-model="form.embed_html"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                ></textarea>
                                <div class="text-sm text-red-400" v-if="form.errors.embed_html">{{ form.errors.embed_html }}</div>

                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Add Trailer
                                </JetButton>
                            </div>
                        </form>
                    </div>

                    <div class="w-full mb-8 p-6 overflow-hidden bg-white rounded-lg shadow-lg">
                        <div>
                            <multiselect v-model="value" :options="casts"></multiselect>
                        </div>
                    </div>

                    <div class="w-full mb-8 p-6 overflow-hidden bg-white rounded-lg shadow-lg">

                        Tags Form
                    </div>

                </section>
            </div>
        </div>
    </admin-layout>

</template>

<script setup>

import AdminLayout from '../../Layouts/AdminLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import Multiselect from '@vueform/multiselect'


const props = defineProps(
    {
        movie:Object,
        trailers: Array,
        casts: Array,
        tags: Array
    });


const value = ref ('');

const options = ['list ', 'of', 'options'];

const form = useForm({
    name: '',
    embed_html: ''
});

function submitTrailer()
{
    form.post(`/admin/movies/${props.movie.id}/add-trailer`, {
        onSuccess: () => form.reset(),
    });
}


</script>
<style src="@vueform/multiselect/themes/default.css"></style>

<style scoped>

</style>
