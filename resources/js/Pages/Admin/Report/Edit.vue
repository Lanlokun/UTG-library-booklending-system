<template>

    <admin-layout title="Edit Report">
        <template #header>
            <div class="py-50 px-500">


            </div>

        </template>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="mt-1 md:mt-9 md:col-span-9">
                    <form @submit.prevent="form.put(route('report.update', report.id))">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Report Name</label>
                                        <input required v-model="form.name" type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div class="errors" v-if="errors.name">{{ errors.name }}</div>


                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                        <input required v-model="form.date" type="date" name="date" id="date" autocomplete="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div class="errors" v-if="errors.date">{{ errors.date }}</div>


                                    </div>

                                    <div class="col-span-4 sm:col-span-4">
                                        <label for="file_url" class="block text-sm font-medium text-gray-700">File</label>
                                        <input required type="file" name="file_url" id="file_url" @input="form.file_url = $event.target.files[0]" autocomplete="file" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div class="errors" v-if="errors.file_url">{{ errors.file_url }}</div>


                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
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

import  AdminLayout from '../../../Layouts/AdminLayout';

import  {useForm} from "@inertiajs/inertia-vue3"

export default {

    props: {
        errors: Object,
        report: Object
    },

    components: {
        AdminLayout
    },

    setup(props) {
        const form = useForm({

            name: props.report.name,
            date: props.report.date,
            // file_url: props.report.file_url,

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

