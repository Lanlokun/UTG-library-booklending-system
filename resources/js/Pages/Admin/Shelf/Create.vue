<template>

    <admin-layout title="Student-Attendance">
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
        {{form.error}}
      <form @submit.prevent="form.post(route('shelf.store'))">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">

            <div class="col-span-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input required v-model="form.name" type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>


              <div class="col-span-6 sm:col-span-3">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select required v-model="form.category_id" id="category" name="category" autocomplete="book" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option v-for="category in categories" :key= "category.id" :value="category.id"> {{category.name}}</option>

                </select>
              </div>

             <div class="col-span-6">
                <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                <input required v-model="form.capacity" type="text" name="capacity" id="capacity" autocomplete="capacity" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
        categories: Object
    },

    components: {
        AdminLayout
    },

    setup() {
        const form = useForm({

            name: '',
            category_id: '',
            capacity: ''


        })

        return {form}
    }
}
</script>

<style>

</style>

