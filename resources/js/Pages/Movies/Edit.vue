<template>
    <admin-layout title="Dashboard">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Movie Edit
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

                        <form @submit.prevent="submitMovie">
                            <div>
                                <JetLabel for="title" value="title" />
                                <JetInput
                                    id="title"
                                    v-model="form.title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="title"
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.title">{{ form.errors.title }}</div>

                            </div>

                            <div>
                                <JetLabel for="runtime" value="runtime" />
                                <JetInput
                                    id="runtime"
                                    v-model="form.runtime"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="runtime"
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.runtime">{{ form.errors.runtime }}</div>

                            </div>

                            <div>
                                <JetLabel for="lang" value="Language" />
                                <JetInput
                                    id="lang"
                                    v-model="form.lang"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="lang"
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.lang">{{ form.errors.lang }}</div>

                            </div>

                            <div>
                                <JetLabel for="video_format" value="Format" />
                                <JetInput
                                    id="video_format"
                                    v-model="form.video_format"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="video_format"
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.video_format">{{ form.errors.video_format }}</div>

                            </div>

                            <div>
                                <JetLabel for="rating" value="rating" />
                                <JetInput
                                    id="rating"
                                    v-model="form.rating"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="rating"
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.rating">{{ form.errors.rating }}</div>

                            </div>

                            <div class="mt-4">
                                <JetLabel for="poster_path" value="Poster" />
                                <JetInput
                                    id="poster_path"
                                    v-model="form.poster_path"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.poster_path">{{ form.errors.poster_path }}</div>

                            </div>

                            <div>
                                <JetLabel for="backdrop_path" value="Backdrop" />
                                <JetInput
                                    id="backdrop_path"
                                    v-model="form.backdrop_path"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="backdrop_path"
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.backdrop_path">{{ form.errors.backdrop_path }}</div>

                            </div>

                            <div>
                                <JetLabel for="overview" value="Overview" />
                                <JetInput
                                    id="overview"
                                    v-model="form.overview"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="overview"
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.overview">{{ form.errors.overview }}</div>

                            </div>

                            <div class="mt-4">
                                <label class="flex items-center">
                                    <jet-checkbox name="is_public" v-model:checked="form.is_public"/>
                                    <span class="ml-2 text-sm text-gray-600 ">Public</span>
                                </label>
                                <div class="text-sm text-red-400" v-if="form.errors.is_public">{{ form.errors.is_public}}</div>

                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Update
                                </JetButton>
                            </div>
                        </form>
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
import JetCheckbox from "@/Jetstream/Checkbox.vue";



const props = defineProps(
    {
        movie:Object,
    });

const form = useForm({
    title: props.movie.title,
    runtime: props.movie.runtime,
    lang: props.movie.lang,
    video_format: props.movie.video_format,
    rating: props.movie.rating,
    poster_path: props.movie.poster_path,
    backdrop_path: props.movie.backdrop_path,
    overview: props.movie.overview,
    is_public:props.movie.is_public


})

function submitMovie()
{
    form.put('/admin/movies/' + props.movie.id)
}


</script>

<style scoped>

</style>
