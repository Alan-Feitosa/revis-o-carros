import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router'
import App from './view/App.vue';
import routes from './routers/router';
import VueAxios from 'vue-axios';
import axios from 'axios';

const router = VueRouter.createRouter({
  history: VueRouter.createWebHistory(),
  base: import.meta.env.VITE_API_URL,
  routes,
})

router.beforeEach((to, from, next) => {
  const middleware = to.meta.middleware;
  const context = { to, next, router };

  if (!middleware) return next();
   
  middleware[0]({
    ...context,
    next: middlewarePipeline(context, middleware, 1),
  });
})

const app = createApp(App);
app
  .use(router)
  .use(VueAxios, axios)
  .mount('#app')

export default {}