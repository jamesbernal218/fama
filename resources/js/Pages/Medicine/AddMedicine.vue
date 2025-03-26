<template>
  <AuthenticatedLayout>
    <div class="py-2">
      <Title title="Agregar Medicamento" class="bg-general" />
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
          <div class="w-full px-2 md:mx-2 md:w-1/2">
            <SelectComponent v-model="form.category_id" apiEndpoint="/categories/index" />
          </div>
          <div class="w-full px-2 md:mx-2 md:w-1/2">
            <SelectComponent v-model="form.supplier_id" apiEndpoint="/supplier/index" />
          </div>
        </div>
        <div class="my-5 flex flex-col justify-center items-center">
          <PostButton :form="form" route="PostAddMedicine" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PostButton from "@/Components/Buttons/PostButton.vue";
import InputField from "@/Components/Forms/InputField.vue";
import SelectComponent from "@/Components/Forms/SelectComponent.vue";
import Title from "@/Components/Forms/Title.vue";

export default {
  props: {
    info: Object,
    paginate: Number,
  },
  components: {
    AuthenticatedLayout,
    PostButton,
    InputField,
    Title,
    SelectComponent,
  },
  data() {
    return {};
  },
  setup() {
    const form = useForm({
      name: "",
      price: "",
      category_id: null,
      supplier_id: null,
    });

    return { form };
  },
};
</script>
