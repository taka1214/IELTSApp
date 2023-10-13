<template>
  <div v-if="word">
    <!-- <p>{{ word.english }}</p>
    <p>{{ word.phonetic_symbol }}</p>
    <p>{{ word.japanese }}</p>
    <p>{{ word.japanese2 }}</p>
    <p>{{ word.english_sentence }}</p>
    <p>{{ word.japanese_sentence }}</p> -->
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
