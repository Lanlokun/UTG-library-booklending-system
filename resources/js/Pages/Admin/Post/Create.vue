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
      {{form.error}}
    <div class="mt-1 md:mt-9 md:col-span-9">
      <form @submit.prevent="form.post(route('post.store'))">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="title" class="block text-sm font-medium text-gray-700"> Title </label>
                <input required v-model="form.title" type="text" name="title" id="title" autocomplete="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <div v-if="errors.title">{{ errors.title }}</div>

              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
                <input required v-model="form.description" type="text" name="description" id="description" autocomplete="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <div v-if="errors.description">{{ errors.description }}</div>

              </div>


              <div class="col-span-6 sm:col-span-4">

                  <input type="file"  name="file" aria-invalid="file" @input="form.img = $event.target.files[0]" class=""  id="img">

                  <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                      {{ form.progress.percentage }}%
                  </progress>
                  <div v-if="errors.file">{{ errors.file }}</div>

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
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";


export default {

    props : {
        errors : Object
    },

    components: {
        AdminLayout,

    },

    setup() {
        const form = useForm({

            title: '',
            description: '',
            img: null

        })

        return {form}
    }
}
</script>

<style>

</style>

