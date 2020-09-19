import Vue from "vue";
import router from "@/router";
import { VueAuthenticate } from "vue-authenticate";

import axios from "axios";
import VueAxios from "vue-axios";
Vue.use(VueAxios, axios);
const vueAuth = new VueAuthenticate(Vue.prototype.$http, {
    baseUrl: 'api/v1/',
    tokenName: "access_token",
    loginUrl: "users/user/login",
    registerUrl: "users/user/register"
});


export default {
    login(context, payload) {
        return vueAuth.login(payload.user, payload.requestOptions).then(response => {
            context.commit("isAuthenticated", {
                isAuthenticated: vueAuth.isAuthenticated()
            });
            if(response.data.access_token) {
                context.commit('AUTH_ID', {
                    authID: response.data.user.id
                });
                router.push({name: "Home"});
            }

        });
    },

    register(context, payload) {
        return vueAuth.register(payload.user, payload.requestOptions).then(response => {
            context.commit("isAuthenticated", {
                isAuthenticated: vueAuth.isAuthenticated()
            });
            router.push({name: "Home"});
        });
    },

    logout(context, payload) {
        return vueAuth.logout().then(response => {
            context.commit("isAuthenticated", {
                isAuthenticated: vueAuth.isAuthenticated()
            });
            context.commit('AUTH_ID', null);
            router.push({name: "Login"});
        });
    }
};
