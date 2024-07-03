import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: () => import('../views/Login.vue'),
      meta: {
        title: 'login'
      }
    },
    {
      path: '/Register',
      name: 'register',
      component: () => import('../views/Register.vue'),
      meta: {
        title: 'Register'
      }
    }
  ]
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title;
  next();
});

export default router
