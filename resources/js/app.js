import Vue from 'vue'
import router from './router.js'
import App from './App.vue'
import vuetify from './plugins/vuetify.js' // path to vuetify export
import './bootstrap.js'




const app = new Vue({
    el: '#app',
    router,
    vuetify,
    components:{
        App
    },
});
// require('./bootstrap');

// window.Vue = require('vue').default;



// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
