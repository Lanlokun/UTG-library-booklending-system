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
      <form @submit.prevent="form.post(route('books.store'))">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">

              <div class="col-span-6 sm:col-span-3">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>

                  <input required v-model="form.title" type="text" name="title" id="title" autocomplete="title"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                  <div class="error" v-if="errors.title">{{ errors.title }}</div>


              </div>

               <div class="col-span-6">
                <label for="book-edition" class="block text-sm font-medium text-gray-700"> Edition </label>

                   <input required v-model="form.edition" type="text" name="edition" id="book-edition" autocomplete="edition" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                   <div class="error" v-if="errors.edition">{{ errors.edition }}</div>

              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                  <select required v-model="form.category_id" id="category" name="category" autocomplete="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                      <option v-for="category in categories" :key="category.id" :value="category.id"> {{ category.name }}</option>
                </select>

                  <div class="error"  v-if="errors.edition">{{ errors.edition }}</div>



              </div>


                 <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="publisher" class="block text-sm font-medium text-gray-700">Publisher</label>

                     <div class="error" v-if="errors.publisher">{{ errors.publisher }}</div>

                     <select required v-model="form.publisher_id" id="publisher" name="publisher" autocomplete="publisher" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option v-for="publisher in publishers" :key="publisher.id" :value="publisher.id">{{ publisher.name }}</option>
                </select>


                 </div>


              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="author1" class="block text-sm font-medium text-gray-700">Author 1</label>

                  <input required v-model="form.author_1" type="text" name="author1" id="author1" autocomplete="author1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                  <div class="error" v-if="errors.author1">{{ errors.author1 }}</div>

              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="author2" class="block text-sm font-medium text-gray-700">Author 2</label>

                  <input required v-model="form.author_2" type="text" name="author2" id="author2" autocomplete="author2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                  <div class="error" v-if="errors.author2">{{ errors.author2 }}</div>

              </div>

              <div class="col-span-2 sm:col-span-2">
                <label for="etla" class="block text-sm font-medium text-gray-700">ETLA </label>

                  <input required v-model="form.etla" type="text" name="etla" id="etla" autocomplete="etla" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                  <div class="error" v-if="errors.etla">{{ errors.etla }}</div>

              </div>

                <div class="col-span-2 sm:col-span-2">
                <label for="place_of_pub" class="block text-sm font-medium text-gray-700">Place Of Pub </label>

                    <input required v-model="form.place_of_pub" type="text" name="place_of_pub" id="place_of_pub" autocomplete="place_of_pub" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                    <div class="error"  v-if="errors.place_of_pub">{{ errors.place_of_pub }}</div>

              </div>

              <div class="col-span-4 sm:col-span-4">
                <label for="year" class="block text-sm font-medium text-gray-700">Year </label>


                  <input required v-model="form.year" type="text" name="year" id="year" autocomplete="year" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                  <div class="error" v-if="errors.year">{{ errors.year }}</div>

              </div>


              <div class="col-span-4 sm:col-span-4">

                <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN </label>

                  <input v-model="form.isbn" type="text" name="isbn" id="isbn" autocomplete="isbn" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                  <div class="error" v-if="errors.isbn">{{ errors.isbn }}</div>

              </div>

              <div class="col-span-4 sm:col-span-6">

                  <label for="class_no" class="block text-sm font-medium text-gray-700">Class No </label>
                <input v-model="form.class_no" type="text" name="class_no" id="class_no" autocomplete="class_no" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <div class="error"  v-if="errors.class_no">{{ errors.class_no }}</div>


              </div>

               <div class="col-span-4 sm:col-span-6">
                <label for="more_details" class="block text-sm font-medium text-gray-700">More Details  </label>

                   <input v-model="form.more_details" type="text" name="more_details" id="more_details" autocomplete="more_details" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                   <div v-if="errors.more_details">{{ errors.more_details }}</div>


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
import  AdminLayout  from '..//..//../Layouts/AdminLayout.vue'
// import { Inertia } from '@inertiajs/inertia'

import  {useForm} from "@inertiajs/inertia-vue3"

export default {

    props: {
        errors: Object,
        publishers: Object,
        categories: Object
    },

    components: {
        AdminLayout
    },

    setup(){
        const form = useForm( {

            title: '',
            edition: '',
            category_id: '',
            publisher_id: '',
            author_1: '',
            author_2: '',
            etla: '',
            place_of_pub: '',
            year: '',
            isbn: '',
            class_no: '',
            more_details: '',

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

