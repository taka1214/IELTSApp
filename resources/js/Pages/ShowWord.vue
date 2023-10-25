<template>
  <div v-if="word">
    <p class="italic font-bold">{{ word.english }}<span class="text-sm text-gray-500"> [{{ word.phonetic_symbol }}]</span></p>
    <p class="italic text-sm">{{ word.english_sentence }}</p>
  </div>
</template>

<script>
export default {
  props: ['word'],
  created() {
    
  },
  methods: {
   
  }
};
</script>
