<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Title from "@/Components/Forms/Title.vue";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <Title title="Agregar Medicamento" class="bg-general" />
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
          <div class="p-6 bg-white rounded-lg shadow-md border-l-4 border-blue-500">
            <h3 class="text-lg font-semibold text-gray-700">Total Medicamentos</h3>
            <p class="mt-2 text-3xl font-bold text-blue-600">1,250</p>
          </div>
          <div class="p-6 bg-white rounded-lg shadow-md border-l-4 border-green-500">
            <h3 class="text-lg font-semibold text-gray-700">Medicamentos en Stock</h3>
            <p class="mt-2 text-3xl font-bold text-green-600">980</p>
          </div>
          <div class="p-6 bg-white rounded-lg shadow-md border-l-4 border-yellow-500">
            <h3 class="text-lg font-semibold text-gray-700">Por Reabastecer</h3>
            <p class="mt-2 text-3xl font-bold text-yellow-600">120</p>
          </div>
          <div class="p-6 bg-white rounded-lg shadow-md border-l-4 border-red-500">
            <h3 class="text-lg font-semibold text-gray-700">Medicamentos Vencidos</h3>
            <p class="mt-2 text-3xl font-bold text-red-600">15</p>
          </div>
        </div>

        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">Lista de Medicamentos</h3>
          <table class="w-full border-collapse border border-gray-300">
            <thead>
              <tr class="bg-gray-200 text-gray-700">
                <th class="p-3 border">Nombre</th>
                <th class="p-3 border">Cantidad</th>
                <th class="p-3 border">Fecha de Vencimiento</th>
                <th class="p-3 border">Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-gray-700">
                <td class="p-3 border">Paracetamol</td>
                <td class="p-3 border">500</td>
                <td class="p-3 border">12/2025</td>
                <td class="p-3 border text-green-600">Disponible</td>
              </tr>
              <tr class="text-gray-700">
                <td class="p-3 border">Ibuprofeno</td>
                <td class="p-3 border">300</td>
                <td class="p-3 border">08/2024</td>
                <td class="p-3 border text-yellow-600">Próximo a Vencer</td>
              </tr>
              <tr class="text-gray-700">
                <td class="p-3 border">Amoxicilina</td>
                <td class="p-3 border">150</td>
                <td class="p-3 border">03/2026</td>
                <td class="p-3 border text-green-600">Disponible</td>
              </tr>
              <tr class="text-gray-700">
                <td class="p-3 border">Omeprazol</td>
                <td class="p-3 border">80</td>
                <td class="p-3 border">05/2024</td>
                <td class="p-3 border text-red-600">Vencido</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
