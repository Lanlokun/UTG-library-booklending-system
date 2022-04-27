<template>

    <admin-layout title="Users">
        <template #header>
            <div class="py-50 px-500">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Edit
                </h2>


            </div>

        </template>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="mt-1 md:mt-9 md:col-span-9">
                    <form @submit.prevent="form.put(route('user.update', user.id))">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700"> Full Name</label>
                                        <input required v-model="form.name" type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div v-if="errors.name">{{ errors.name }}</div>

                                    </div>

                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                        <input required v-model="form.email" type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div v-if="errors.email">{{ errors.password }}</div>

                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="password" class="block text-sm font-medium text-gray-700">Password </label>
                                        <input required v-model="form.password" type="password" name="password" id="password" autocomplete="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div v-if="errors.password">{{ errors.password }}</div>

                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="tel" class="block text-sm font-medium text-gray-700">Telephone </label>
                                        <input required v-model="form.tel" type="text" name="tel" id="tel" autocomplete="tel" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div v-if="errors.tel">{{ errors.tel }}</div>

                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                                        <select  v-model="form.roles"  id="roles" name="roles" autocomplete="roles" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option>Admin</option>
                                            <option>User</option>
                                            <option>Staff</option>
                                        </select>

                                        <div v-if="errors.roles">{{ errors.roles }}</div>

                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>

                                <Link :href="route('user.index')"  class="bg-green-700 mx-5 hover:bg-green-900 text-white px-4 py-2 rounded-l-lg ">Cancel </Link>

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
        user: Object,
        errors: Object
    },

    components: {
        AdminLayout
    },

    setup(props) {
        const form = useForm({

            // id: props.user.id,
            name: props.user.name,
            email: props.user.email,
            password: props.user.password,
            tel: props.user.tel,
            roles: props.user.roles


        })

        return {form}
    }
}
</script>

<style>



</style>

