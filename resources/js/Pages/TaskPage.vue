<template>
    <AppLayout title="Task">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
<!-- Contenuto -->

<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-800">
            <tr>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                #
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                Nome della Task
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                Descrizione
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                Completata
              </th>
            </tr>
          </thead>
          <tbody>
            <template v-for="(item, index) in $attrs.tasks" :key="index">
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{index+1}}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ item.name }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{item.description}}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <div class="form-check">
                    
                <input @click="invia(item.id, item.completed)" v-if="item.completed" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain cursor-pointer" type="checkbox" :value="item.completed" id="flexCheckDefault" checked>
                <input v-else @click="invia(item.id, item.completed)" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain cursor-pointer" type="checkbox" :value="item.completed" id="flexCheckDefault">    
            </div>
              </td>
            </tr>
        </template>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<!-- Fine Contenuto -->
    </AppLayout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import 'tw-elements';
import { Inertia } from '@inertiajs/inertia';
export default {
    components: {
        AppLayout
    },
    props: {
        //
    },
    data() {
        return {
        
        }
    },
    methods: {
        invia(id, completed) {
            let data = {
                id: id,
                completed: completed,
                _method: 'PUT'
            }
            Inertia.post(route('tasks.statusUpdate'), data);
        }
    }
}
</script>
