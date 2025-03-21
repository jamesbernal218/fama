<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Medicinas</h2>
    </template>
    <div class="p-6">
      <h1 class="text-2xl font-bold mb-4">Medicines</h1>
      <Table
        :columns="columns"
        :data="info.data"
        :routeEdit="'/medicine/edit'"
        :routeDelete="'/medicine/delete'"
      />

      <div class="mt-4 flex justify-between">
        <button
          @click="changePage(info.prev_page_url)"
          :disabled="!info.prev_page_url"
          class="px-4 py-2 bg-gray-300 rounded disabled:opacity-50"
        >
          Previous
        </button>
        <button
          @click="changePage(info.next_page_url)"
          :disabled="!info.next_page_url"
          class="px-4 py-2 bg-blue-500 text-white rounded disabled:opacity-50"
        >
          Next
        </button>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import Table from "@/Components/Table/Table.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
  props: {
    info: Object,
    paginate: Number,
  },
  components: {
    Table,
    AuthenticatedLayout,
  },
  data() {
    return {
      columns: [
        { label: "Nombre", key: "name" },
        { label: "Precio", key: "price" },
        { label: "Categoría", key: "category_id" },
        { label: "Provedor", key: "supplier_id" },
      ],
    };
  },
  methods: {},
};
</script>
