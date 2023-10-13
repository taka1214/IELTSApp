<template>
  <div class="text-center">
    <div class="flex justify-center">
      <Link href="/dashboard">
        <h1 class="text-gray-700 text-4xl text-left italic font-black pt-10">
          <p>Vocabulary</p>
          <p>For</p>
          <p>IELTS</p>
        </h1>
      </Link>
    </div>
    <!-- 表示する単語 -->
    <div v-if="shuffledWord">
      <div class="w-5/6 max-w-lg p-4 mt-10 rounded text-center mx-auto">
        <div
          class="shadow-myShadow border-none rounded py-1 mx-auto mt-5 w-2/5 italic"
        >
          <p class="font-extrabold">{{ shuffledWord.english }}</p>
          <p class="font-extralight text-xs">
            {{ shuffledWord.phonetic_symbol }}
          </p>
        </div>
        <p class="pt-10 pb-5 underline italic">{{ shuffledWord.english_sentence }}</p>
        <div
          class="shadow-myShadow border-none rounded py-3 px-2 w-auto mt-5 text-left text-xs"
          @click="showMeaning"
        >
          <div v-if="showJapanese">
            <p class="mb-1">{{ shuffledWord.japanese }}</p>
            <p>{{ shuffledWord.japanese2 }}</p>
          </div>

          <div v-else class="text-center">TAP AND CHECK<br>THE VOCABULARY</div>
        </div>
        <div
          class="shadow-myShadow border-none rounded py-3 px-2 w-auto mt-8 text-left text-xs"
          @click="showSentence"
        >
          <div v-if="showSentences">
            <p class="text-sm mb-2">{{ shuffledWord.english_sentence }}</p>
            <p>{{ shuffledWord.japanese_sentence }}</p>
          </div>
          <div v-else class="text-center">TAP AND CHECK<br>THE EXAMPLE SENTENCE</div>
        </div>
      </div>
    </div>

    <button @click="showNextWord" class="underline my-10 text-sm">NEXT</button>
  </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
  components: {
    Link,
  },
  props: ["words"],
  data() {
    return {
      shuffledWords: [],
      currentIndex: 0,
      showJapanese: false,
      showSentences: false,
    };
  },

  computed: {
    shuffledWord() {
      return this.shuffledWords[this.currentIndex];
    },
  },

  created() {
    this.shuffledWords = this.shuffleArray(this.words);
  },

  methods: {
    shuffleArray(array) {
      let currentIndex = array.length,
        randomIndex;

      // シャッフルアルゴリズム (Fisher-Yates)
      while (currentIndex !== 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;

        [array[currentIndex], array[randomIndex]] = [
          array[randomIndex],
          array[currentIndex],
        ];
      }

      return array;
    },

    showNextWord() {
      if (this.currentIndex < this.shuffledWords.length - 1) {
        this.currentIndex++;
      } else {
        // 最後の単語に到達した場合、単語の一覧画面にリダイレクトします。
        // '/words' は一覧画面のルートを示しています。適切なルートに変更してください。
        Inertia.visit("/dashboard");
      }
    },

    showMeaning() {
      this.showJapanese = !this.showJapanese;
    },

    showSentence() {
      this.showSentences = !this.showSentences;
    },
  },
};
</script>
