import './bootstrap'


import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import router from './router'
import store from './store/store'

Vue.use(BootstrapVue)

const app = new Vue({
    router,
    store,
    el: '#app'
})