<template>
  <AuthenticatedLayout>
    <div class="py-2">
      <Title title="Editar Medicamento" class="bg-general" />
      <div
        class="max-w-8xl mx-auto sm:px-6 lg:px-8 overflow-hidden shadow-sm rounded-b-lg p-6 pb-5"
      >
        <div class="md:flex md:-mx pt-6">
          <div class="w-full px-2 md:mx-2 md:w-1/2">
            <InputField
              v-model="form.name"
              label="Nombre"
              id="name"
              placeholder="Nombre"
              required
            />
          </div>
          <div class="w-full px-2 md:mx-2 md:w-1/2">
            <InputField
              v-model="form.price"
              label="Precio"
              id="price"
              placeholder="Precio"
              required
            />
          </div>
        </div>
        <div class="md:flex md:-mx pt-6">
          <div class="md:flex md:-mx pt-6">
            <div class="w-full px-2 md:mx-2 md:w-1/2">
              <SelectComponent
                v-model="form.category_id"
                apiEndpoint="/categories/index"
              />
            </div>
            <div class="w-full px-2 md:mx-2 md:w-1/2">
              <SelectComponent v-model="form.supplier_id" apiEndpoint="/supplier/index" />
            </div>
          </div>
          <div class="w-full px-2 md:mx-2 md:w-1/2"></div>
        </div>
        <div class="my-5 flex flex-col justify-center items-center">
          <PutButton :form="form" route="editMedicine" :id="info.id" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PutButton from "@/Components/Buttons/PutButton.vue";
import InputField from "@/Components/Forms/InputField.vue";
import Title from "@/Components/Forms/Title.vue";
import SelectComponent from "@/Components/Forms/SelectComponent.vue";

export default {
  props: {
    errors: {
      type: Object,
    },
    info: {
      type: Array,
    },
  },
  components: {
    AuthenticatedLayout,
    PutButton,
    InputField,
    Title,
    SelectComponent,
  },
  data() {
    return {};
  },
  setup(props) {
    const form = useForm({
      name: props.info.name || "",
      price: props.info.price || "",
      category_id: props.info.category_id || 1,
      supplier_id: props.info.supplier_id || 1,
    });
    return { form };
  },
};
</script>
