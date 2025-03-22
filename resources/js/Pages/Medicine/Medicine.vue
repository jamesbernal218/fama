<template>
  <AuthenticatedLayout>
    <div class="my-5 flex flex-col justify-start items-end me-10">
      <GetButton route="addMedicine" title="Agregar Medicamento" />
    </div>

    <div class="p-6">
      <h1 class="text-2xl font-bold mb-4">Medicamentos</h1>
      <Table
        :columns="columns"
        :data="info.data"
        :routeEdit="'/medicine/edit'"
        :routeDelete="'/medicine/delete'"
      />
    </div>
  </AuthenticatedLayout>
</template>

<script>
import Table from "@/Components/Table/Table.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GetButton from "@/Components/Buttons/GetButton.vue";

export default {
  props: {
    info: Object,
    paginate: Number,
  },
  components: {
    Table,
    AuthenticatedLayout,
    GetButton,
  },
  data() {
    return {
      columns: [
        { label: "Nombre", key: "name" },
        { label: "Precio", key: "price" },
        { label: "Categoría", key: "category_id" },
        { label: "Proveedor", key: "supplier_id" },
      ],
    };
  },
  methods: {},
};
</script>
