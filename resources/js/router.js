import { createRouter, createWebHistory } from 'vue-router';
import WordDisplay from './Pages/WordsDisplay.vue'
import ShowWord from './Pages/ShowWord.vue'

const routes = [
  {
    path: '/',
    name: 'word-display',
    component: WordDisplay
  },
  {
    path: '/word/:id',
    name: 'ShowWord',
    component: ShowWord,
  },
  // {
  //   path: '/word/test',
  //   name: 'ShowWord',
  //   component: ShowWord,
  // }
]


const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;