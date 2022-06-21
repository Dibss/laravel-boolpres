import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

//init router

const router = new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', component: HomePage },
    { path: '/contacts', component: ContactPage }
  ]
})

export default router;