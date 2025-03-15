<script setup>
import { ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

// Importa los componentes de PrimeVue
import DataTable from "primevue/datatable";
import Column from "primevue/column";

// Datos de ejemplo
const products = ref([
  { code: "A001", name: "Paracetamol", category: "Analgésico", quantity: 50 },
  { code: "A002", name: "Ibuprofeno", category: "Antiinflamatorio", quantity: 30 },
  { code: "A003", name: "Omeprazol", category: "Gastroprotector", quantity: 20 },
]);
</script>

<template>
  <Head title="Medicinas" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Medicinas</h2>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-20">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3">Product name</th>
            <th scope="col" class="px-6 py-3">Color</th>
            <th scope="col" class="px-6 py-3">Category</th>
            <th scope="col" class="px-6 py-3">Price</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              Apple MacBook Pro 17"
            </th>
            <td class="px-6 py-4">Silver</td>
            <td class="px-6 py-4">Laptop</td>
            <td class="px-6 py-4">$2999</td>
            <td class="px-6 py-4">
              <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
            </td>
          </tr>
          <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              Microsoft Surface Pro
            </th>
            <td class="px-6 py-4">White</td>
            <td class="px-6 py-4">Laptop PC</td>
            <td class="px-6 py-4">$1999</td>
            <td class="px-6 py-4">
              <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
            </td>
          </tr>
          <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              Magic Mouse 2
            </th>
            <td class="px-6 py-4">Black</td>
            <td class="px-6 py-4">Accessories</td>
            <td class="px-6 py-4">$99</td>
            <td class="px-6 py-4">
              <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
            </td>
          </tr>
          <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              Google Pixel Phone
            </th>
            <td class="px-6 py-4">Gray</td>
            <td class="px-6 py-4">Phone</td>
            <td class="px-6 py-4">$799</td>
            <td class="px-6 py-4">
              <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
            </td>
          </tr>
          <tr>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              Apple Watch 5
            </th>
            <td class="px-6 py-4">Red</td>
            <td class="px-6 py-4">Wearables</td>
            <td class="px-6 py-4">$999</td>
            <td class="px-6 py-4">
              <a
                href="#"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                >Edit</a
              >
              <a href="#" class="font-medium text-red-600 hover:underline px-4"
                >Eliminar</a
              >
            </td>
          </tr>
        </tbody>
      </table>
      <div class="flex justify-center mt-4">
        <button
          type="button"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        >
          Agregar
        </button>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
