<template>
    <admin-layout title="Students">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Students
            </h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2 justify-end">
                        <form class="flex space-x-4 shadow bg-white rounded-md m-2 p-2">
                            <div class="p-1 flex items-center">
                                <label for="address" class="block text-sm font-medium text-gray-700 mr-4">Email</label>
                                <div class="relative rounded-md shadow-sm">
                                    <input v-model="email_address" id="address" name="email_address" class="px-3 py-2 border border-gray-300 rounded" placeholder="Email Address" />
                                </div>
                            </div>
                            <div class="p-1">
                                <button type="button" @click="generateStudent"
                                        class="inline-flex items-center justify-center py-2 px-4 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-green-700 transition duration-150 ease-in-out disabled:opacity-50">
                                    <span>Generate</span>
                                </button>
                            </div>
                        </form>                    </div>

                    <div class="w-full mb-8 overflow-hidden bg-white rounded-lg shadow-lg">

                        <div class="p-2 m-2">

                        </div>
                        <div class=" py-2 px-2 flex justify-between">
                            <div class="flex-1">
                                <div class="relative">
                                    <div class="absolute flex items-center ml-2 h-full">
                                        <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z">
                                            </path>
                                        </svg>
                                    </div>

                                    <input v-model="search" type="text" placeholder="Search by name"
                                           class="px-8 py-4 w-full md:w-2/6 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm" />
                                </div>
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

                    <div class="w-full overflow-x-auto">

                        <Table>
                            <template #tableHead>

                                <TableHead>Full Name</TableHead>
                                <TableHead>Address</TableHead>
                                <TableHead>Manage</TableHead>

                            </template>

                            <TableRow v-for="student in students.data" :key="student.id">
                                <TableData>{{ student.fullName }}</TableData>
                                <TableData>{{ student.address }}</TableData>
                                <TableData>

                                    <div class="flex justify-around">
                                        <ButtonLink class="bg-yellow-500 hover:bg-yellow-700" :link="route('admin.student-attendance.index', student.id)">Attendance</ButtonLink>
                                        <ButtonLink class="bg-blue-500 hover:bg-blue-700" :link="route('admin.student-borrows.index', student.id)">Borrows</ButtonLink>
                                        <ButtonLink :link="route('admin.students.edit', student.id)">Edit</ButtonLink>
                                        <ButtonLink method="delete" as="button" @click="destroy(student.id)" type="button" class="bg-red-500 hover:bg-red-700" :link="route('admin.students.destroy', student.id)">Delete</ButtonLink>

                                    </div>
                                </TableData>

                            </TableRow>
                        </Table>

                        <div class="bg-white my-1 py-1">

                            <Pagination :links="students.links"/>


                        </div>
                    </div>
                </section>
            </div>
        </div>
    </admin-layout>

</template>

<script setup>

import AdminLayout from '../../Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Pagination from "../../Components/Pagination";
import { ref, watch, defineProps } from 'vue';
import { Inertia } from "@inertiajs/inertia";
import Table from "../../Components/Table";
import TableHead from "../../Components/TableHead";
import TableRow from "../../Components/TableRow";
import TableData from "../../Components/TableData";
import ButtonLink from "@/Components/ButtonLink";


const destroy = (id) => {


    if(confirm('Are you sure you want to delete ?')){
        Inertia.delete(route('admin.students.destroy', student.id))
    }
    return { destroy };

}

const props = defineProps(
    {
        students:Object,
        student:Object,
        student_attendance:Object,
        borrow:Object,
        filters:Object
    });


const search = ref(props.filters.search);
const perPage = ref(5);
const email_address = ref('');

watch(search, value => {
    Inertia.get('/admin/students', { search: value }, {preserveState: true, replace:true})
});

function generateStudent(){
    Inertia.post('/admin/students', {email_address: email_address.value}, {
        onFinish: () => (email_address.value = "")
    });

}

</script>

<style scoped>

</style>
