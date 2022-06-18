<template>
    <admin-layout title="Dashboard">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Borrowed Book
            </h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2">

                        <Link :href="route('admin.student-borrows.index', student.id)" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 mx-3 rounded-lg">View Student Borrows </Link>

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

                        <form @submit.prevent="submitStudentBorrow">

                            <div class="col-span-6 sm:col-span-3">

                                <label for="book_copy" class="block text-sm font-medium text-gray-700">Book Copy</label>
                                <select required v-model="form.book_copy_id" id="book_copy" name="book_copy" autocomplete="book_copy" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option v-for="book_copy in book_copies" :key= "book_copy.id" :value="book_copy.id"> {{book_copy.number}}</option>
                                </select>

                                <div class = "error" v-if="errors.book_copy_id">{{ errors.book_copy_id }}</div>

                            </div>


                            <div class="col-span-6 sm:col-span-3">

                                <label for="library" class="block text-sm font-medium text-gray-700">Library</label>
                                <select required v-model="form.library_id" id="library" name="library" autocomplete="book" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option v-for="library in libraries" :key= "library.id" :value="library.id"> {{library.name}}</option>
                                </select>

                                <div class = "error" v-if="errors.library_id">{{ errors.library_id }}</div>

                            </div>




                            <div class="mt-4">
                                <JetLabel for="date_borrowed" value="Date Borrowed" />
                                <JetInput
                                    id="date_borrowed"
                                    v-model="form.date_borrowed"
                                    type="date"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.date_borrowed">{{ form.errors.date_borrowed }}</div>

                            </div>

                            <div class="mt-4">
                                <JetLabel for="time_out" value="Date Expected" />
                                <JetInput
                                    id="date_expected"
                                    v-model="form.date_expected"
                                    type="date"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.date_expected">{{ form.errors.date_expected }}</div>

                            </div>

                            <div class="mt-4">
                                <JetLabel for="date_returned" value="Date Returned"/>
                                <JetInput
                                    id="date_returned"
                                    v-model="form.date_returned"
                                    type="date"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.date_returned">{{ form.errors.date_returned }}</div>

                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a :href="route('admin.student-borrows.index', student.id)" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none mx-5 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>

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
        student: Object,
        library:Object,
        libraries:Object,
        book_copy:Object,
        book_copies:Object,
        borrow_students:Object,
        borrow_student: Object,
        errors:Object
    });

const form = useForm({
    book_copy_id: props.borrow_student.book_copy_id,
    library_id: props.borrow_student.library_id,
    date_borrowed: props.borrow_student.date_borrowed,
    date_expected: props.borrow_student.date_expected,
    date_returned: props.borrow_student.date_returned,

})

function submitStudentBorrow()
{
    form.put(`/admin/students/${props.student.id}/student-borrows/${props.borrow_student.id}`)
}


</script>

<style scoped>

</style>
