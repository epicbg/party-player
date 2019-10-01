import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './views/Home'
import Playlist from './views/Playlist'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/playlist/:key',
            name: 'playlist',
            component: Playlist
        }
    ],
});