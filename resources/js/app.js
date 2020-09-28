import App from './App.vue';
import router from './router/index';
import store from './store/index';
import Vue from 'vue';
import moment from 'vue-moment';
import Chartist from "chartist";
import VueAxios from "vue-axios";
import DashboardPlugin from "./material-dashboard";
import VueGoodWizard from 'vue-good-wizard';

import axios from "axios";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// plugin setup
Vue.use(DashboardPlugin);
Vue.use(VueAxios, axios);

Vue.use(moment);
Vue.use(VueGoodWizard);
Vue.config.productionTip = false;

// global library setup
Vue.prototype.$Chartist = Chartist;




/* eslint-disable no-new */
const app = new Vue({
    router: router,
    store: store,
    el: "#app",
    render: h => h(App),
});

store.$app = app;
