<template>
    <admin-layout title="Dashboard">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Book Copy
            </h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2">

                        <Link :href="route('admin.book-copies.index', book.id)" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 mx-3 rounded-lg">View Book Copies </Link>

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

                        <form @submit.prevent="submitBookCopy">


                            <div class="mt-4">
                                <JetLabel for="number" value="Book Number" />
                                <JetInput
                                    id="number"
                                    v-model="form.number"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.number">{{ form.errors.number }}</div>

                            </div>

                            <div class="col-span-6 sm:col-span-3">

                                <label for="library" class="block text-sm font-medium text-gray-700">Library</label>
                                <select required v-model="form.library_id" id="library" name="library" autocomplete="book" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option v-for="library in libraries" :key= "library.id" :value="library.id"> {{library.name}}</option>
                                </select>

                                <div class = "error" v-if="errors.library_id">{{ errors.library_id }}</div>

                            </div>

                            <div class="col-span-6 sm:col-span-3">

                                <label for="shelf" class="block text-sm font-medium text-gray-700">Shelf</label>
                                <select required v-model="form.shelf_id" id="shelf" name="shelf" autocomplete="book" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option v-for="shelf in shelves" :key= "shelf.id" :value="shelf.id"> {{shelf.name}}</option>
                                </select>

                                <div class = "error" v-if="errors.shelf_id">{{ errors.library_id }}</div>

                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a :href="route('admin.book-copies.index', book.id)" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none mx-5 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>

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

import AdminLayout from '../../../Layouts/AdminLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetLabel from '@/Jetstream/Label.vue'



const props = defineProps(
    {

        library:Object,
        libraries:Object,
        shelves:Object,
        shelf:Object,
        book_copy:Object,
        book:Object,
        errors:Object
    });

const form = useForm({
    number: props.book_copy.number,
    library_id: props.book_copy.library_id,
    shelf_id: props.book_copy.shelf_id,
})

function submitBookCopy()
{
    form.put(`/admin/books/${props.book.id}/book-copies/${props.book_copy.id}`)
}


</script>

<style scoped>

</style>
