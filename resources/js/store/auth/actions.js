import Vue from "vue";
import router from "@/router";
import { VueAuthenticate } from "vue-authenticate";

import axios from "axios";
import VueAxios from "vue-axios";
Vue.use(VueAxios, axios);
const vueAuth = new VueAuthenticate(Vue.prototype.$http, {
    baseUrl: 'http://virtus.test/api/v1/',
    tokenName: "access_token",
    loginUrl: "users/user/login",
    registerUrl: "users/user/register"
});


export default {
    login(context, payload) {
        return vueAuth.login(payload.user, payload.requestOptions).then(response => {
         let tokenData= response.data.data
            if (tokenData.access_token) {
              localStorage.setItem('access_token', tokenData.access_token)
                context.commit("isAuthenticated", {
                    isAuthenticated: true
                });
                context.commit('AUTH_ID', tokenData.user.id)
            }
            router.push({name: "Home"});
        });
    },

    register(context, payload) {
        console.log(payload)
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
            context.commit('AUTH_ID', null)
            router.push({name: "Login"});
        });
    }
}
