<template>
  <div>
    <div v-if="intro" class="alert alert-success mt-4">
      <h5>Generated Intro:</h5>
      <p>{{ intro }}</p>
    </div>
    <div v-if="error" class="alert alert-danger mt-4">
      {{ error }}
    </div>
  </div>
</template>

<script>
export default {
  props: {
    intro: String,
    error: String,
  },
};
</script>
