/* eslint-disable */

import { createRouter, createWebHistory } from "vue-router";

/**
 * importing middlewares
 */
//import pipeline         from '@/middleware/pipeline';
//import auth             from "@/middleware/auth";

/**
 * importing store
 */
//import store            from "*/store";

/**
 * importing views
 */

/* Error 404 */
//import NotFound         from "^/error/404";

import Home             from "^/home/Index.vue";

const routes = [

    // Home
    {
        path: '/',
        name: 'home',
        component: Home
    },
];

const router = createRouter({

    history: createWebHistory('/'),
    routes,
    linkActiveClass: "current",
    scrollBehavior(to, from, savedPosition) {

        // always scroll to top, when navigating to a new page
        return { top: 0 }
    }

});

router.beforeEach((to, from, next) => {

    if (!to.meta.middleware) {

        return next()
    }

    const middleware = to.meta.middleware

    const context = {

        to,
        from,
        store,
        next
    }

    return middleware[0]({

        ...context, next: pipeline(context, middleware, 1)
    })
})

export default router;