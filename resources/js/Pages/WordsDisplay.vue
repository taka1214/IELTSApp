<template>
  <div
    v-for="word in words"
    :key="word.id"
    class="shadow-myShadow rounded-sm px-1 py-2 my-3"
    @click="showDetail(word)"
  >
    <ShowWord :word="word" />
  </div>
  <ModalShowDetail v-if="showModal" :word="selectedWord" :close="closeModal" />
</template>

<script>
import axios from "axios";
import ShowWord from "./ShowWord.vue";
import ModalShowDetail from "./ModalShowDetail.vue";

export default {
  components: {
    ShowWord,
    ModalShowDetail,
  },
  props: {
    level: String,
  },
  data() {
    return {
      words: [],
      selectedWord: {},
      showModal: false,
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
    showDetail(word) {
      axios
        .get(`/word/detail/${word.id}`)
        .then((response) => {
          this.selectedWord = response.data;
          this.showModal = true;
        })
        .catch((error) => {
          console.error("There was an issue fetching the word details:", error);
        });
    },
    closeModal() {
      this.showModal = false;
    },
  },
};
</script>
