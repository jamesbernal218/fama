<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-20">
    <table
      class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
    >
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
      >
        <tr>
          <th v-for="column in columns" :key="column.key" class="px-6 py-3">
            {{ column.label }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in data"
          :key="item.id"
          class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900 dark:even:bg-gray-800 border-b dark:border-gray-700 border-gray-200"
        >
          <td v-for="column in columns" :key="column.key" class="px-6 py-4">
            {{ item[column.key] }}
          </td>

          <td class="px-6 py-4 flex gap-2">
            <a
              :href="`${routeEdit}/${item.id}`"
              class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
            >
              Editar
            </a>
            <a
              :href="`${routeDelete}/${item.id}`"
              class="font-medium text-red-600 dark:text-red-500 hover:underline"
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
      required: true,
    },
    routeDelete: {
      type: String,
      required: true,
    },
  },
};
</script>
