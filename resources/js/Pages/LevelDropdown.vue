<template>
  <Dropdown>
    <template #trigger>
      <button class="shadow-myShadow border-none rounded pl-2 pr-2 py-3 text-xs">
        {{ selected }} <span class="pl-2 text-xs">▼</span>
      </button>
    </template>

    <template #content>
      <div>
        <div v-for="levelOption in levelOptions" :key="levelOption" @click="changeLevel(levelOption)" class="text-xs my-2">
          {{ levelOption }}
        </div>
      </div>
    </template>
  </Dropdown>
</template>

<script>
import Dropdown from '@/Components/Dropdown.vue';
export default {
  props: {
    initialLevel: String,
  },
  components: {
    Dropdown,
  },
  data() {
    return {
      selected: this.initialLevel,
      levelOptions: ["Elementary 5.5~", "Pre-intermediate 6.0~", "Intermediate 6.5~", "Upper-intermediate 7.0~"]
    };
  },
  methods: {
    changeLevel(level) {
      this.selected = level;
      this.$emit('changed', this.selected);
    },
  },
};
</script>
