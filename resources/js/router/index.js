import { createRouter,createWebHashHistory } from "vue-router";
import Login from "../auth/Login.vue";
import Dashboard from "../dashboard/admin_panel.vue";

const routes=[
    {
        path: "/",
        name: "Login",
        component: Login,
    },
    {
        path:"/dashboard",
        name: "Dashboard",
        component: Dashboard,
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router;