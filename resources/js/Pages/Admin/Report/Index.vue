<template>

    <admin-layout title="Reports">
        <template #header>


        </template>

        <div class="my-35">
            <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="block mb-8">

                    <a href="/report/create" class="bg-blue-900 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Report</a>
                </div>



                <div class="flex flex-col">
                    <div class="-my-2 sm:-mx-24 lg:-mx-40">
                        <div class=" align-middle inline min-w-full sm:px-0 lg:px-0">
                            <div class=" p-0 mx-0 shadow border-b border-gray-200 sm:rounded-lg">
                                <div class="overflow-y-auto h-96 ">

                                <table class=" mx-0 px-0 min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>
                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>

                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            File
                                        </th>

                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="report in reports">
                                        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ report.id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ report.name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ report.date}}
                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ report.file_url }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <Link :href="route('report.show', report.id)" class="bg-blue-700 mx-5 hover:bg-blue-900 text-white px-4 py-2 rounded-l-lg">View </Link>
                                            <Link :href="route('report.edit', report.id)"  class="bg-green-700 mx-5 hover:bg-green-900 text-white px-4 py-2 rounded-l-lg ">Edit </Link>
                                            <form class="inline-block mx-5" @submit.prevent="form.post(route('book.destroy'))" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button  class="bg-red-700 hover:bg-red-900 text-white px-4 py-2 rounded-l-lg">  <input type="submit" class="text-white hover:text-white mb-2 mr-1" value="Delete"></button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>


                        <nav aria-label="Page navigation example">
                            <ul class="inline-flex float-right items-center -space-x-px">
                                <li>
                                    <a href="#" class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page" class="z-10 py-2 px-3 leading-tight text-blue-600 bg-blue-50 border border-blue-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Next</span>
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>

                </div>

            </div>
        </div>





    </admin-layout>
</template>

<script>

import  AdminLayout from '../../../Layouts/AdminLayout';

import {Link, useForm} from "@inertiajs/inertia-vue3";

export default {

    props: {
        reports: Object
    },

    components: {
        AdminLayout, Link
    },
    // setup() {
    //     const form = useForm({
    //
    //         id: '',
    //
    //
    //     })

}
</script>

<style>

th{
    font-weight: 900;
    font-family: SansSerif;


}

</style>
