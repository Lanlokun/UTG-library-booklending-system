<template>
    <admin-layout title="Dashboard">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Staff Attendance
            </h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2">

                        <Link :href="route('admin.staff-attendance.index', staff.id)" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 mx-3 rounded-lg">View Staff Attendance </Link>

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

                        <form @submit.prevent="submitStaffAttendance">
                            <div class="col-span-6 sm:col-span-3">

                                <label for="library_id" class="block text-sm font-medium text-gray-700">Library</label>
                                <select required v-model="form.library_id" id="library_id" name="library" autocomplete="book" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option v-for="library in libraries" :key= "library.id" :value="library.id"> {{library.name}}</option>
                                </select>

<!--                                <div class = "error" v-if="errors.library_id">{{ errors.library_id }}</div>-->

                            </div>




                            <div class="mt-4">
                                <JetLabel for="time_in" value="TimeIn" />
                                <JetInput
                                    id="time_in"
                                    v-model="form.time_in"
                                    type="time"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.time_in">{{ form.errors.time_in }}</div>

                            </div>

                            <div class="mt-4">
                                <JetLabel for="time_out" value="TimeOut" />
                                <JetInput
                                    id="time_out"
                                    v-model="form.time_out"
                                    type="time"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.time_out">{{ form.errors.time_out }}</div>

                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <a :href="route('admin.staff-borrows.index', staff.id)" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none mx-5 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>


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
        staff: Object,
        library:Object,
        libraries:Object,
        staff_attendance: Object
    });

const form = useForm({
    library_id: props.staff_attendance.library_id,
    time_in: props.staff_attendance.time_in,
    time_out: props.staff_attendance.time_out,

})

function submitStaffAttendance()
{
    form.put(`/admin/staffs/${props.staff.id}/staff-attendance/${props.staff_attendance.id}`)
}


</script>

<style scoped>

</style>
