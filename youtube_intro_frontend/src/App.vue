<template>
  <div class="d-flex align-items-center justify-content-center">
    <div class="card shadow-sm custom-card">
      <div class="card-header text-center bg-primary text-white">
        <h3>Generate a Catchy YouTube Intro</h3>
      </div>
      <div class="card-body">
        <IntroForm :onGenerateIntro="handleGenerateIntro" />
        <IntroResult :intro="intro" :error="error" />
      </div>
    </div>
  </div>
</template>
<script>
import IntroForm from "./components/IntroForm.vue";
import IntroResult from "./components/IntroResult.vue";

export default {
  components: {
    IntroForm,
    IntroResult,
  },
  data() {
    return {
      intro: null,
      error: null,
    };
  },
  methods: {
    handleGenerateIntro(intro, error) {
      this.intro = intro;
      this.error = error;
    },
  },
};
</script>

<style scoped>
/* Center the card with responsive width and min width */
.custom-card {
  width: 100%;
  max-width: 600px;
  min-width: 300px; /* Prevent card from shrinking too much */
  padding: 20px;
  border-radius: 10px;
}

/* Ensure consistent background color */
body {
  background-color: #f8f9fa;
  margin: 0;
}

.card {
  border-radius: 10px;
}

.card-header {
  border-radius: 10px 10px 0 0;
}

/* Adjust layout for smaller screens */
@media (max-height: 1080px), (max-width: 1040px) {
  .custom-card {
    max-width: 80%; /* Adjust the width for smaller screens */
  }
}
</style>

