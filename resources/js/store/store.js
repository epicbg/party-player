import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

// Modules
import playlist from './playlist'

export default new Vuex.Store({
    namespaced: true,
    modules: {
        playlist
    }
})