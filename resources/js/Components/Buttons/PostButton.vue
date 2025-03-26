<template>
  <button
    :disabled="isLoading"
    @click="submit"
    type="button"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke-width="1.5"
      stroke="currentColor"
      class="size-6"
    >
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
    </svg>

    {{ title }}
  </button>
</template>

<script>
export default {
  props: {
    form: {
      type: Object,
      required: true,
    },
    route: {
      type: String,
    },
    title: {
      type: String,
      default: "Agregar",
    },
  },
  data() {
    return {
      isLoading: false,
    };
  },
  methods: {
    submit() {
      this.isLoading = true;
      console.log(this.route);

      this.form.post(route(this.route), {
        onSuccess: () => {
          this.isLoading = false;
          setTimeout(() => {
            window.location.reload();
          }, 1000);
        },
        onError: () => {
          this.isLoading = false;
        },
      });
    },
  },
};
</script>
