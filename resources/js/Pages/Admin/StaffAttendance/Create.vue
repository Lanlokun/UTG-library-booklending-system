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
      <form @submit.prevent="form.post(route('staff-attendance.index'))">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">

              <div class="col-span-6 sm:col-span-3">
                <label for="library" class="block text-sm font-medium text-gray-700">Library</label>
                <select required v-model="form.library_id" id="library" name="library" autocomplete="library" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option v-for="library in libraries" :key="library.id" :value="library.id">{{ library.name }}</option>
                </select>
                  <div v-if="errors.library_id">{{ errors.library_id }}</div>

              </div>

               <div class="col-span-6 sm:col-span-3">
                <label for="staff" class="block text-sm font-medium text-gray-700">Staff</label>
                <select required v-model="form.staff_id" id="staff" name="staff" autocomplete="staff" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option v-for="staff in staffs" :key="staff.id" :value="staff.id">{{ staff.name }}</option>
                </select>

                   <div v-if="errors.staff_id">{{ errors.staff_id }}</div>

               </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="time-in" class="block text-sm font-medium text-gray-700">Time In </label>
                <input required v-model="form.time_in" type="time" name="time-in" id="time-in" autocomplete="time-in" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <div v-if="errors.time_in">{{ errors.time_in }}</div>

              </div>

                 <div class="col-span-6 sm:col-span-3">
                <label for="time-out" class="block text-sm font-medium text-gray-700">Time Out </label>
                <input required v-model="form.time_out" type="time" name="time-out" id="time-out" autocomplete="time-out" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                     <div v-if="errors.time_out">{{ errors.time_out }}</div>

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

    props : {
        libraries: Object,
        staffs: Object,
        errors: Object
    },

    components: {
        AdminLayout
    },

    setup() {
        const form = useForm({

            library_id: '',
            staff_id: '',
            time_in: '',
            time_out: '',

        })

        return {form}
    }
}
</script>

<style>

</style>

