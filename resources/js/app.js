
require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

import store from './store';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import routes from './routes';

let router = new VueRouter({ routes });

const app = new Vue({
    router,
    store,
    el: '#app',
    components: {
        'navigation': require('./components/utils/navigation.vue'),
        'team-modal': require('./components/utils/team-modal.vue'),
        'player-modal': require('./components/utils/player-modal.vue'),
        'new-player-modal': require('./components/utils/new-player-modal.vue')
    }
});

