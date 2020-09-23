import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";


import alerts from "./modules/alerts-module";

import auth from "./auth";
import callrail from "./callrail";
import users from "./users";
import campaigns from "./campaign";
import lead from "./lead";



Vue.use(Vuex);

export default new Vuex.Store(
    {
        plugins:[
            createPersistedState({storage: window.sessionStorage}),
        ],
        modules: {
            auth,
            alerts,
            campaigns,
            users,
            callrail,
            lead
        }
    }
);
