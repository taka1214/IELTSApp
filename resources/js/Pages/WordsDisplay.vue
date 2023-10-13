<template>
  <div>
    <div v-for="word in words" :key="word.id" 
         class="shadow-myShadow rounded-sm px-1 py-2 my-3"
         @click="showDetail(word)"
    >
      <ShowWord :word="word" />
    </div>

    <!-- モーダルの追加 -->
    <ModalShowDetail v-if="showModal" :word="selectedWord" :close="closeModal" />
  </div>
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
      showModal: false // モーダルの表示/非表示を制御するための変数
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
      this.selectedWord = word;
      this.showModal = true; // モーダルを表示
    },
    closeModal() {
      this.showModal = false; // モーダルを非表示
    }
  },
};
</script>
