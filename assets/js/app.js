
import '../css/global.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
import Vue from 'vue'
import { BootstrapVue } from 'bootstrap-vue'
import App from './App.vue'
import router from './router'

Vue.use(BootstrapVue)

new Vue({
    router,
    render: h => h(App),
}).$mount('#app')