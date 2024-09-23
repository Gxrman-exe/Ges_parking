<script setup>
import { defineProps, ref, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { gsap } from "gsap";

const props = defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});


</script>

<template>
     <div class="flex items-center justify-center h-screen">
    <h1 class="text-4xl font-bold">
      <span v-html="animatedText"></span>
    </h1>
  </div>
</template>

<script>
export default {
  data() {
    return {
      fullText: "GESPARKING",
      animatedText: "",
      index: 0,
    };
  },
  mounted() {
    this.writeText();
  },
  methods: {
    writeText() {
      if (this.index < this.fullText.length) {
        this.animatedText += this.fullText.charAt(this.index);
        this.index++;
        setTimeout(this.writeText, 200); // Ajusta la velocidad aquí
      }
    },
  },
};
</script>






