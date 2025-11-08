import { createRouter, createWebHistory, RouteRecordRaw } from '@ionic/vue-router';
import TabsPage from '@/views/TabsPage.vue';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    redirect: '/login',
  },
  {
    path: '/login',
    component: () => import('@/components/Login.vue'),
  },
  {
    path: '/UserTable',
    component: () => import('@/components/UserTable.vue'),
  },
  {
    path: '/tabs/',
    component: TabsPage,
    children: [
      { path: '', redirect: '/tabs/tab1' },
      { path: 'tab1', component: () => import('@/views/Tab1Page.vue') },
      { path: 'tab2', component: () => import('@/views/Tab2Page.vue') },
      { path: 'tab3', component: () => import('@/views/Tab3Page.vue') },
      { path: 'tab4', component: () => import('@/views/Tab4Page.vue') },
      { path: 'detail', component: () => import('@/views/DetailPage.vue') },
    ],
  },
  {
    path: '/detail/:id',
    name: 'Detail',
    component: () => import('@/views/DetailPage.vue'),
    props: true,
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

// 🔒 Route Guard — redirect ke login jika belum ada token valid
router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('auth_token');
  if (to.path.startsWith('/tabs') && token !== '12345ABCDE') {
    next('/login');
  } else {
    next();
  }
});

export default router;