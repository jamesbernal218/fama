<template>
  <button
    :disabled="isLoading"
    @click="submit"
    type="button"
    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
  >
    <svg
      class="h-5 w-5 text-slate-500"
      viewBox="0 0 24 24"
      stroke-width="2"
      stroke="currentColor"
      fill="none"
      stroke-linecap="round"
      stroke-linejoin="round"
    >
      <path stroke="none" d="M0 0h24v24H0z" />
      <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
      <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
      <line x1="16" y1="5" x2="19" y2="8" />
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
    id: {
      type: Number,
    },
    title: {
      type: String,
      default: "Editar",
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

      this.form.put(route(this.route, this.id), {
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
