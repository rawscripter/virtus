import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";

import auth from "./auth";
import callraIl from "./callrail";
import users from "./users";
import campaigns from "./campaign";
import alerts from "./modules/alerts-module";



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
            callraIl
        }
    }
);
