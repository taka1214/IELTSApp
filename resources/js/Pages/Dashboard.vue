<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import LevelDropdown from "./LevelDropdown.vue";
import WordsDisplay from "./WordsDisplay.vue";
</script>


<template>
  <Head title="Dashboard" />

  <div class="flex justify-center">
    <Link href="/dashboard">
      <h1 class="text-gray-700 text-4xl italic font-black pt-10">
        <p>Vocabulary</p>
        <p>For</p>
        <p>IELTS</p>
      </h1>
    </Link>
  </div>

  <div class="py-12 text-gray-700 container w-11/12 flex flex-col items-center justify-center mx-auto">
    <div class="flex justify-between w-full">
      <div>
        <LevelDropdown :initialLevel="selectedLevel" @changed="setLevel" />
      </div>
      <!-- flex added here -->
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col justify-between">
        <!-- flex-col added for vertical alignment -->
        <div class="flex">
          <!-- flex added for horizontal alignment -->
          <DropdownLink :href="route('profile.edit')" class="ml-1">PROFILE</DropdownLink>
          <DropdownLink :href="route('logout')" class="ml-1" method="post" as="button">
            LOGOUT
          </DropdownLink>
        </div>
        <DropdownLink :href="route('word.index')" class="ml-1">
          CHECK YOUR VOCAB
        </DropdownLink>
      </div>
    </div>
    <div class="w-full">
      <WordsDisplay :level="selectedLevel" />
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  components: {
    LevelDropdown,
    WordsDisplay,
  },
  data() {
    return {
      selectedLevel: "Elementary 5.5~",
    };
  },
  methods: {
    setLevel(level) {
      this.selectedLevel = level;
    },
  },
};
</script>