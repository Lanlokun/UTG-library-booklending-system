<template>
    <admin-layout title="Update Student">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Students
            </h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2">

                        <Link :href="route('admin.students.index')" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 mx-3 rounded-lg">View Students</Link>

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

                        <form @submit.prevent="submitStudent">
                            <div>
                                <JetLabel for="fullname" value="FUll Name" />
                                <JetInput
                                    id="fullname"
                                    v-model="form.fullName"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="fullname"
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.fullname">{{ form.errors.fullname  }}</div>

                            </div>


                            <div class="mt-4">
                                <JetLabel for="address" value="Email" />
                                <JetInput
                                    id="email"
                                    v-model="form.address"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <div class="text-sm text-red-400" v-if="form.errors.address">{{ form.errors.address }}</div>

                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a :href="route('admin.students.index')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none mx-5 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>

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

import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';



const props = defineProps(
    {
        student:Object,

    });

const form = useForm({
    fullName: props.student.fullName,
    address: props.student.address,

})

function submitStudent()
{
    form.put('/admin/students/' + props.student.id)
}


</script>

<style scoped>

</style>

