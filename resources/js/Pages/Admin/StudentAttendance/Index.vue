<template>

    <admin-layout title="Student Attendance">
        <template #header>


        </template>

        <div class="my-35">
            <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="block mb-8">

                    <a href="/student-attendance/create" class="bg-blue-900 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Student Attendance</a>
                </div>



                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="overflow-y-auto h-96 ">

                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>
                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Time In
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Time Out
                                        </th>
                                        <!--                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">-->
                                        <!--                                                Roles-->
                                        <!--                                            </th>-->
                                        <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="student in student_attendances">
                                        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ student.id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ student.name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ student.time_in }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ student.time_out }}
                                        </td>

                                        <!--                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">-->
                                        <!--&lt;!&ndash;                                                @foreach ($user->roles as $role)&ndash;&gt;-->
                                        <!--                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">-->
                                        <!--&lt;!&ndash;                                                    {{ $role->title }}&ndash;&gt;-->
                                        <!--                                                </span>-->
                                        <!--&lt;!&ndash;                                                @endforeach&ndash;&gt;-->
                                        <!--                                            </td>-->

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button  class="bg-blue-700 mx-5 hover:bg-blue-900 text-white px-4 py-2 rounded-l-lg"><a href="{{ route('users.show', user.id) }}" class="text-white  mb-2 mr-2">View</a></button>
                                            <button  class="bg-green-700 mx-5 hover:bg-green-900 text-white px-4 py-2 rounded-l-lg"> <a href="{{ route('users.edit', user.id) }}" class="text-white mb-2 mr-2">Edit</a></button>
                                            <form class="inline-block mx-5" @submit.prevent="form.post(route('user.destroy'))" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button  class="bg-red-700 hover:bg-red-900 text-white px-4 py-2 rounded-l-lg">  <input type="submit" class="text-white hover:text-white mb-2 mr-1" value="Delete"></button>
                                            </form>
                                        </td>
                                        <!--                                            @endforeach-->
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
        student_attendances: Object
    },

    components: {
        AdminLayout
    },
    setup() {
        const form = useForm({

            id: '',


        })

    }}
</script>

<style>

th{
    font-weight: 900;
    font-family: SansSerif;


}

</style>
