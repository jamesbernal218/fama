<template>
  <form class="max-w-sm mx-auto">
    <label
      for="countries"
      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
      >Select an option</label
    >
    <select
      id="countries"
      v-model="selectedOption"
      @change="$emit('update:modelValue', selectedOption)"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    >
      <option v-for="option in options" :key="option.id" :value="option.id">
        {{ option.name }}
      </option>
    </select>
  </form>
</template>

<script>
export default {
  props: {
    apiEndpoint: {
      type: String,
      required: true,
    },
  },
  modelValue: {
    type: [String, Number], // Puede ser string o número
    default: "",
  },
  data() {
    return {
      options: [], // Array para los datos
      selectedOption: "", // Opción seleccionada
    };
  },
  created() {
    this.fetchOptions(); // Al cargar el componente, obtener los datos
  },
  watch: {
    // Si el `modelValue` cambia desde afuera, actualizar el `selectedOption`
    modelValue(newValue) {
      this.selectedOption = newValue;
    },
  },
  methods: {
    // Función para obtener las opciones de la API
    async fetchOptions() {
      try {
        const response = await axios.get(this.apiEndpoint); // Realiza la petición a tu API
        this.options = response.data; // Asigna la respuesta a la variable `options`
      } catch (error) {
        console.error("Error fetching options:", error);
      }
    },
  },
};
</script>
