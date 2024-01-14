export default[
    {
        path: '/',
        name: 'home',
        component: () => import("@/components/mainComponent.vue")
    },
    {
        path: '/create',
        name: 'create',
        component: () => import("@/components/createComponent.vue")
    }
]
