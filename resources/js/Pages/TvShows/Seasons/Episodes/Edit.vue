<template>
    <admin-layout title="Dashboard">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Episode Edit
            </h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2">

                        <Link :href="route('admin.episodes.index', [tvShow.id, season.id])" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 mx-3 rounded-lg">View season </Link>

                    </div>

                    <div class="w-full mb-8 sm:max-w-md overflow-hidden bg-white rounded-lg shadow-lg">

                        <div class="flex justify-between">
                            <div class="flex-1">

                            </div>

                        </div>
                    </div>

                    <div class="w-full mb-8 p-6 overflow-hidden bg-white rounded-lg shadow-lg">

                        <form @submit.prevent="submitEpisode">
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
                                <JetLabel for="overview" value="Overview" />
                                <JetInput
                                    id="overview"
                                    v-model="form.overview"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.is_public">{{ form.errors.is_public }}</div>
                            </div>
                                <div class="mt-4">
                                    <label class="flex items-center">
                                        <JetCheckbox v-model:checked="form.is_public" name="is_public" />
                                        <span class="ml-2 text-sm text-gray-600">isPublic </span>
                                    </label>
                                    <div class="text-sm text-red-400" v-if="form.errors.is_public">{{ form.errors.is_public }}</div>

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

import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';



const props = defineProps(
    {
        tvShow: Object,
        season: Object,
        episode: Object,
    });

const form = useForm({
    name: props.episode.name,
    slug: props.episode.overview,
    is_public: props.episode.is_public ? true : false,

})

function submitEpisode()
{
    form.put(`/admin/tv-shows/${props.tvShow.id}/seasons/${props.season.id}/episodes/${props.episode.id}`)
}


</script>

<style scoped>

</style>
