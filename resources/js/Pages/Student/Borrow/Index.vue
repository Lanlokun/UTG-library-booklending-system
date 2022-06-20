<template>
    <admin-layout title="Dashboard">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Borrowed Books
            </h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2 justify-end">
                        <Link :href="route('admin.student-borrows.create', student.id)" class="px-4 py-2 bg-green-600 hover:bg-green-800 text-white rounded-lg">Borrow Book </Link>
                    </div>

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

                                    <input v-model="search" type="text" placeholder="Search by book copy"
                                           class="px-8 py-4 w-full md:w-2/6 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="w-full overflow-x-auto">

                        <p class="text-red-800  " v-if="borrowStudentCount">
                            Has not returned {{borrowStudentCount}}
                            <span v-if="borrowStudentCount == 1">book</span>
                            <span v-else>books</span>
                        </p>
                        <p v-else class=" text-green-900"> Has returned all books</p>
                        <table class="w-full">
                            <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Book Copy</th>
                                <th class="px-4 py-3">Library</th>
                                <th class="px-4 py-3">Date Borrowed</th>
                                <th class="px-4 py-3">Date Expected</th>
                                <th class="px-4 py-3">Date Returned</th>
                                <th class="px-4 py-3">Manage</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            <tr v-for="borrow_student in borrow_students.data" :key="borrow_student.id" class="text-gray-700">
                                <td class="px-4 py-3 border"> {{borrow_student.book_copy.number}}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{borrow_student.library.name}}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{borrow_student.date_borrowed}}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{borrow_student.date_expected}}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">
                                     <span v-if="borrow_student.date_returned" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{borrow_student.date_returned}}
                                    </span>
                                    <span v-else class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Not Returned
                                    </span></td>
                                <td class="flex justify-around px-4 py-3 text-sm border">
                                        <Link :href="route('admin.student-borrows.edit', [student.id, borrow_student.id])" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 mx-3 rounded-lg">Edit</Link>
                                    <ButtonLink method="delete" as="button" type="button" class="bg-red-500 hover:bg-red-700" :link="route('admin.student-borrows.destroy', [student.id, borrow_student.id])">Delete</ButtonLink>
                                </td>
                            </tr>

                            </tbody>

                        </table>

                        <div class="bg-white my-1 py-1">

                            <Pagination :links="borrow_students.links"/>


                        </div>
                    </div>
                </section>
            </div>
        </div>
    </admin-layout>

</template>

<script setup>

import ButtonLink from "@/Components/ButtonLink";
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Pagination from "@/Components/Pagination";
import { ref, watch, defineProps } from 'vue';
import { Inertia } from "@inertiajs/inertia";


const props = defineProps(
    {
        book_copies:Object,
        libraries:Object,
        borrow_students:Object,
        borrow_student:Object,
        students:Object,
        student:Object,
        borrowStudentCount:Object,
        filters:Object,
    });


const search = ref(props.filters.search);
const perPage = ref(5);

watch(search, value => {
    Inertia.get(`/admin/students/${props.student.id}/student-borrows`, { search: value }, {preserveState: true, replace:true})

});

</script>

<style scoped>

</style>
