import {createRouter , createWebHistory} from 'vue-router';
import routes from './routesIndex.js';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
