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
    },
    {
        path: '/search:search',
        name: 'search',
        component: () => import("@/components/searchComponent.vue"),
        props: true
    }

]
