<template>
  <div
    v-if="word"
    class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50"
    @click="closeModal"
  >
    <div class="bg-white w-5/6 max-w-lg p-4 rounded" @click.stop>
      <div
        class="shadow-myShadow border-none rounded py-1 mx-auto mt-5 w-2/5 text-center italic"
      >
        <p class="font-extrabold">{{ word.english }}</p>
        <p class="font-extralight text-xs">{{ word.phonetic_symbol }}</p>
      </div>
      <div
        class="shadow-myShadow border-none rounded py-3 px-2 w-auto mt-5 text-left text-xs"
      >
        <p>{{ word.japanese }}</p>
        <p>{{ word.japanese2 }}</p>
      </div>
      <div
        class="shadow-myShadow border-none rounded py-3 px-2 w-auto mt-5 text-left text-xs"
      >
        <p class="text-sm italic">{{ word.english_sentence }}</p>
        <p>{{ word.japanese_sentence }}</p>
      </div>

      <div class="text-center mt-10">
        <font-awesome-icon
          icon="check"
          class="fa-xl mx-8"
          :style="checkIconStyle"
          @click="checkClicked"
        />
        <font-awesome-icon
          icon="times"
          class="fa-xl mx-8"
          :style="timesIconStyle"
          @click="timesClicked"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      memorised: null,
    };
  },
  props: ["word", "close", "memorisedStatuses"],
  created() {
    // console.log(this.memorisedStatuses)
  },
  computed: {
    checkIconStyle() {
      return {
        color: this.memorised === 1 ? "rgb(0, 194, 0)" : "rgb(235, 236, 235)",
      };
    },
    timesIconStyle() {
      return {
        color: this.memorised === 2 ? "red" : "rgb(235, 236, 235)",
      };
    },
  },
  mounted() {
    this.memorised = this.word.memorised;
  },
  methods: {
    closeModal() {
      this.close();
    },
    setMemorisedStatus(status) {
      const wordId = this.word.id;
      axios
        .post("/update-memorised-status", {
          wordId: wordId,
          status: status,
        })
        .then((response) => {
          if (response.data.message === "Updated successfully") {
            this.memorisedStatuses[wordId] = status;
          }
        })
        .catch((error) => {
          console.error("Error updating memorised status:", error);
        });
    },
    checkClicked() {
      if (this.memorised !== 1) {
        this.updateMemorised(1);
      }
    },
    timesClicked() {
      if (this.memorised !== 2) {
        this.updateMemorised(2);
      }
    },
    updateMemorised(status) {
      this.memorised = status;
      axios
        .post("/update-memorised-status", {
          wordId: this.word.id, // 選択された単語のID
          status: status, // 新しいmemorisedの状態
        })
        .then((response) => {
          console.log(response.data.message);
          // 必要に応じて他の処理。例えば、ユーザーへの通知など
        })
        .catch((error) => {
          console.error("An error occurred while updating the status:", error);
        });
    },
  },
};
</script>