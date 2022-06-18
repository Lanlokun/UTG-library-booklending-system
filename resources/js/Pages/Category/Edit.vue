<template>

    <admin-layout title="Edit Books">
        <template #header>
            <div class="py-50 px-500">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Create
                </h2>


            </div>

        </template>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="mt-1 md:mt-9 md:col-span-9">
                    <form @submit.prevent="form.put(route('admin.categories.update', category.id))">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>

                                        <input required v-model="form.name" type="text" name="name" id="name" autocomplete="name"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                        <div class="error" v-if="errors.name">{{ errors.name }}</div>


                                    </div>

                                    <div class="col-span-6">
                                        <label for="parent" class="block text-sm font-medium text-gray-700"> Parent </label>

                                        <input required v-model="form.parent" type="text" name="parent" id="parent" autocomplete="parent" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                        <div class="error" v-if="errors.parent">{{ errors.parent }}</div>

                                    </div>



                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <a :href="route('admin.categories.index')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none mx-5 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>

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
import  AdminLayout  from '@/Layouts/AdminLayout.vue'
import { Inertia } from '@inertiajs/inertia'

import  {useForm} from "@inertiajs/inertia-vue3"

export default {

    props: {
        category: Object,
        errors: Object,
    },

    components: {
        AdminLayout
    },

    setup(props){
        const form = useForm( {

            name: props.category.name,
            parent: props.category.parent,

        })

        return { form }
    }
}
</script>

<style>

.error {
    color: red;
}

</style>

