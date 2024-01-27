const routes = [
    {
      path: '/',
      name: 'home',
      meta: { title: 'Home Page' },
      component: () => import('@/view/Index.vue')
    }
  ]
  
export default routes;