import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

//Define Router
const router = new Router({
    mode :'history',
    routes:[
        {
            path:'/',
            name: 'findjob',
            component:()=>import('./views/Findjob.vue')
        },
   

    ]
});

export default router