<template>
  <div
    class="relative overflow-x-auto shadow-lg rounded-lg border border-gray-200 dark:border-gray-700"
  >
    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
      <!-- Encabezado -->
      <thead
        class="text-xs uppercase bg-green-600 text-white dark:bg-gray-800 dark:text-gray-300"
      >
        <tr>
          <th v-for="column in columns" :key="column.key" class="px-6 py-4 text-center">
            {{ column.label }}
          </th>
          <th v-if="routeEdit || routeDelete" class="px-6 py-4 text-center">Acciones</th>
        </tr>
      </thead>

      <!-- Cuerpo de la tabla -->
      <tbody>
        <tr
          v-for="item in data"
          :key="item.id"
          class="odd:bg-green-50 even:bg-white dark:odd:bg-gray-900 dark:even:bg-gray-800 border-b dark:border-gray-700 hover:bg-green-100 dark:hover:bg-gray-700 transition"
        >
          <td v-for="column in columns" :key="column.key" class="px-6 py-4 text-center">
            {{ item[column.key] }}
          </td>

          <!-- Acciones -->
          <td v-if="routeEdit || routeDelete" class="px-6 py-4 flex justify-center gap-4">
            <a
              v-if="routeEdit"
              :href="`${routeEdit}/${item.id}`"
              class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-700 transition"
            >
              Editar
            </a>

            <a
              v-if="routeDelete"
              :href="`${routeDelete}/${item.id}`"
              class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-700 transition"
            >
              Eliminar
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    columns: {
      type: Array,
      required: true,
    },
    data: {
      type: Array,
      required: true,
    },
    routeEdit: {
      type: String,
    },
    routeDelete: {
      type: String,
    },
  },
};
</script>
