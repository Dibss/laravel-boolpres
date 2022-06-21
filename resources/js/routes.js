import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

//init router
import HomePage from './components/pages/HomePage.vue';
import ContactPage from './components/pages/ContactPage.vue';
import NotFoundPage from './components/pages/NotFoundPage.vue';
import PostDetailPage from './components/pages/PostDetailPage.vue';

const router = new VueRouter({
  mode: 'history',
  linkExactActiveClass: 'active',
  routes: [
    { path: '/', component: HomePage, name: 'home' },
    { path: '/contacts', component: ContactPage, name: 'contact' },
    { path: '/posts/:slug', component: PostDetailPage, name: 'postDetail' },
    { path: '*', component: NotFoundPage, name: 'notFound' },
  ]
});

export default router;