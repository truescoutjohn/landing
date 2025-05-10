//@ts-ignore
import { createRouter, createWebHistory } from 'vue-router';
import Home from '@js/pages/Home/Index.vue';
import About from '@js/pages/About/Index.vue';
import Services from '@js/pages/Services/Index.vue';
import ServiceSingle from '@js/pages/Services/Single.vue';

const routes = [{ path: '/', name: 'Home', component: Home }];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
