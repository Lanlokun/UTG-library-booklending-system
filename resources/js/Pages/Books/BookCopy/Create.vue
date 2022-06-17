<template>

    <admin-layout title="Users">
        <template #header>
            <div class="py-50 px-500">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Create Book Copy
                </h2>

            </div>

        </template>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="mt-1 md:mt-9 md:col-span-9">
                    <form @submit.prevent="form.post(route('admin.book-copies.store', book.id))">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="number" class="block text-sm font-medium text-gray-700"> Book Number</label>
                                        <input required v-model="form.number" type="text" name="number" id="number" autocomplete="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div class="errors" v-if="errors.number">{{ errors.number }}</div>

                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="library" class="block text-sm font-medium text-gray-700">Library</label>

                                        <div class="error" v-if="errors.library">{{ errors.library }}</div>

                                        <select required v-model="form.library_id" id="library" name="library" autocomplete="library" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option v-for="library in libraries" :key="library.id" :value="library.id">{{ library.name }}</option>
                                        </select>


                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="shelf" class="block text-sm font-medium text-gray-700">Shelf</label>

                                        <div class="error" v-if="errors.shelf">{{ errors.shelf }}</div>

                                        <select required v-model="form.shelf_id" id="shelf" name="shelf" autocomplete="shelf" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option v-for="shelf in shelves" :key="shelf.id" :value="shelf.id">{{ shelf.name }}</option>
                                        </select>


                                    </div>


                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <!--                                                                <a href="/user" class="inline-flex justify-center py-2 px-4 mr-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none mx-5 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back</a>-->

                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </admin-layout>
</template>

<script>

import  AdminLayout from '@/Layouts/AdminLayout';

import  {useForm} from "@inertiajs/inertia-vue3"

export default {

    props: {
        errors: Object,
        libraries:Object,
        books:Object,
        book:Object,
        shelves:Object

    },

    components: {
        AdminLayout
    },

    setup() {
        const form = useForm({

            number: '',
            book_id: '',
            library_id:'',
            shelf_id:''

        })

        return {form}
    }
}
</script>

<style>

.errors {
    color: red;
}

</style>

