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
      <form @submit.prevent="form.post(route('borrow.index'))">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">


              <div class="col-span-6 sm:col-span-3">
                <label for="book-copy" class="block text-sm font-medium text-gray-700">Book Copy</label>
                <select required v-model="form.book_copy" id="book-copy" name="book_copy" autocomplete="bookcopy" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option>potter 21</option>
                  <option>potter 2</option>
                  <option>potter 3</option>
                </select>
              </div>

               <div class="col-span-6 sm:col-span-3">
                <label for="library" class="block text-sm font-medium text-gray-700">Library</label>
                <select required v-model="form.library" id="library" name="library" autocomplete="library" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option>Kanifing</option>
                  <option>Brikama</option>
                  <option>Banjul</option>
                </select>
              </div>

               <div class="col-span-6 sm:col-span-3">
                <label for="student" class="block text-sm font-medium text-gray-700">Student</label>
                <select required v-model="form.student" id="student" name="student" autocomplete="student" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option>Malik</option>
                  <option>Malik</option>
                  <option>Malik</option>
                </select>
              </div>

               <div class="col-span-6 sm:col-span-3">
                <label for="staff" class="block text-sm font-medium text-gray-700">Staff</label>
                <select required v-model="form.staff" id="staff" name="staff" autocomplete="staff" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option>Malik</option>
                  <option>Malik</option>
                  <option>Malik</option>
                </select>
              </div>

               <div class="col-span-6 sm:col-span-3">
                <label for="date-borrowed" class="block text-sm font-medium text-gray-700">Date Borrowed</label>
                <input required v-model="form.date_borrowed" type="date" name="date_borrowed" id="date-borrowed" autocomplete="date-borrowed" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="date-expected" class="block text-sm font-medium text-gray-700">Date Expected</label>
                <input required v-model="form.date_expected" type="date" name="date_expected" id="date-expected" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="date-returned" class="block text-sm font-medium text-gray-700">Date Returned</label>
                <input required v-model="form.date_returned" type="date" name="date_returned" id="date-returned" autocomplete="date-returned" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
import {useForm} from "@inertiajs/inertia-vue3";

export default {

    components: {
        AdminLayout
    },

    setup() {
        const form = useForm({

            library: '',
            book_copy: '',
            student: '',
            staff: '',
            date_borrowed: '',
            date_expected: '',
            date_returned: '',

        })

        return {form}
    }
}
</script>

<style>

</style>

