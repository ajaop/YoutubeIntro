<template>
  <div>
    <form @submit.prevent="submitScript">
      <div class="mb-3">
        <label for="videoFile" class="form-label">Upload Video File</label>
        <input
          type="file"
          accept="video/*"
          class="form-control"
          id="videoFile"
          @change="handleFileUpload"
          required
        />
      </div>
      <button type="submit" class="btn btn-primary w-100" :disabled="loading">
        <span v-if="loading" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
        Generate Intro
      </button>
    </form>
  </div>
</template>


<script>
import axios from 'axios';

export default {
  props: {
    onGenerateIntro: Function,
  },
  data() {
    return {
      videoFile: null,
      loading: false,
    };
  },
  methods: {
    handleFileUpload(event) {
      this.videoFile = event.target.files[0];
    },
    async submitScript() {
      if (!this.videoFile) {
        alert("Please upload a video file.");
        return;
      }

      this.loading = true;
      try {
        // Prepare form data
        const formData = new FormData();
        formData.append("video", this.videoFile);

        // Send POST request with video file
        const response = await axios.post('http://localhost:8000/api/generate-intro', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        });

        if (response.status !== 200) throw new Error("Failed to generate intro.");

        this.onGenerateIntro(response.data.intro, null);
      } catch (error) {
        this.onGenerateIntro(null, error.response?.data.error ? error.response.data.error : error.message);
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
