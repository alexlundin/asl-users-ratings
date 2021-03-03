import Vue from 'vue'
import Vuex from 'vuex'
import Router from 'vue-router'
import store from './store/index'
import VueRouter from 'vue-router'
import App from "./App";

Vue.use( Vuex )
Vue.use( Router )

const routes = []

const router = new VueRouter({
    routes,
})

new Vue({
    el: '#asl-ratings-root',
    store,
    router,
    render: h => h( App )
})