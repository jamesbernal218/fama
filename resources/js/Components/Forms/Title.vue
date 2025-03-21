<template>
  <div class="relative inline-block ml-4 mt-10">
    <span class="text-2xl md:text-3xl font-bold"> {{ title }} </span>
    <span
      class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-blue-600 via-green-500 to-green-400 rounded-full"
    ></span>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
  },
};
</script>
