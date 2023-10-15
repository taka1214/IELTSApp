<template>
  <div v-if="word" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50" @click="closeModal">
    <div class="bg-white w-5/6 max-w-lg p-4 rounded" @click.stop>
      <div class="shadow-myShadow border-none rounded py-1 mx-auto mt-5 w-2/5 text-center italic">
        <p class="font-extrabold">{{ word.english }}</p>
        <p class="font-extralight text-xs">{{ word.phonetic_symbol }}</p>
      </div>
      <div class="shadow-myShadow border-none rounded py-3 px-2 w-auto mt-5 text-left text-xs">
        <p>{{ word.japanese }}</p>
        <p>{{ word.japanese2 }}</p>
      </div>
      <div class="shadow-myShadow border-none rounded py-3 px-2 w-auto mt-5 text-left text-xs">
        <p class="text-sm">{{ word.english_sentence }}</p>
        <p>{{ word.japanese_sentence }}</p>
      </div>
    </div>
  </div>
  <div class="flex justify-center mt-5">
    <!-- 覚えている場合 -->
    <div v-if="word.memorised === 1" class="mx-2">
      <div class="bg-red-500 w-6 h-6 rounded-full"></div> <!-- 赤マル -->
      <div class="border-b-2 border-white w-6 h-6"></div> <!-- 白塗りのバツ -->
    </div>
    
    <!-- 覚えていない場合 -->
    <div v-else-if="word.memorised === 2" class="mx-2">
      <div class="border-2 border-white w-6 h-6 rounded-full"></div> <!-- 白マル -->
      <div class="border-b-2 border-red-500 w-6 h-6"></div> <!-- 赤塗りのバツ -->
    </div>
  </div>
</template>

<script>
export default {
  props: ['word', 'close'],
  methods: {
    closeModal() {
      this.close();
    }
  }
};
</script>