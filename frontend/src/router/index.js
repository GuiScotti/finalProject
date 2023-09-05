import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "Home", //Nome da aba
    component: () => import("@/views/HomeView.vue"),
  },
  {
    path: "/about",
    name: "About",
    component: () => import("@/views/AboutView.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  document.title = to.name;
  next();
});

export default router;
