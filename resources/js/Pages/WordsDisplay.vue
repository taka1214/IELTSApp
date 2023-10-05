<template>
  <div v-for="word in words" :key="word.id" class="shadow-myShadow rounded-sm px-1 py-2 my-3">
    <p class="italic font-bold">{{ word.english }}<span class="text-sm text-gray-500">[{{ word.phonetic_symbol }}]</span></p>
    <!-- <p>{{ word.phonetic_symbol }}</p> -->
    <!-- <p>{{ word.japanese }}</p> -->
    <!-- <p>{{ word.japanese2 }}</p> -->
    <p class="italic text-sm">{{ word.english_sentence }}</p>
    <!-- <p>{{ word.japanese_sentence }}</p> -->
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: {
    level: String,
  },
  data() {
    return {
      words: [],
    };
  },
  mounted() {
    this.getAll(this.level);
  },
  watch: {
    level(newLevel, oldLevel) {
      if (newLevel !== oldLevel) {
        this.getAll(newLevel);
      }
    },
  },
  methods: {
    getAll(level) {
      axios
        .get("/word/index", {
          params: {
            level: level,
          },
        })
        .then((response) => {
          this.words = response.data;
        });
    },
  },
};
</script>