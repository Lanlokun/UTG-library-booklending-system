<template>

    <admin-layout title="Users">
        <template #header>
            <div class="py-50 px-500">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Edit Visitor
                </h2>


            </div>

        </template>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="mt-1 md:mt-9 md:col-span-9">
                    <form @submit.prevent="form.put(route('admin.visitor.update', visitor.id))">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700"> Full Name</label>
                                        <input required v-model="form.name" type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div v-if="errors.name">{{ errors.name }}</div>

                                    </div>

                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                                        <input required v-model="form.number" type="text" name="number" id="number" autocomplete="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div v-if="errors.number">{{ errors.number }}</div>

                                    </div>

                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="from" class="block text-sm font-medium text-gray-700">From</label>
                                        <input required v-model="form.from" type="text" name="from" id="from" autocomplete="from" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div v-if="errors.from">{{ errors.from }}</div>

                                    </div>


                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

                                <a :href="route('admin.visitor.index')" class="inline-flex justify-center py-2 px-4 mr-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel  </a>

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

import  {Link, useForm} from "@inertiajs/inertia-vue3"

export default {

    props: {
        visitor: Object,
        errors: Object
    },

    components: {
        AdminLayout
    },

    setup(props) {
        const form = useForm({

            name: props.visitor.name,
            number: props.visitor.number,
            from: props.visitor.from,



        })

        return {form}
    }
}
</script>

<style>



</style>

