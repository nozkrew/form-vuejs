import Vue from 'vue'
import VueRouter from 'vue-router'
import Form from './views/Form.vue'
import Index from './views/Index.vue'
import Result from './views/Result.vue'

Vue.use(VueRouter)

export default new VueRouter({
    mode:'history',
    routes:[
        { path: '/', name: 'main', component: Index},
        { path: '/quiz', name: 'quiz', component: Form},
        { path: '/result/:id(\\d+)', name: 'result', component: Result},
        { path: '/*', redirect: '/'}
    ]
})