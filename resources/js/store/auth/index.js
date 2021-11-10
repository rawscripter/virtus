import actions from "./actions";
import getters from "./getters";
import mutations from "./mutations";


const state ={
    isAuthenticated: localStorage.getItem("vue-authenticate.vueauth_access_token") !== null,
    authID:null
};

export default {
    namespaced: false,
    state,
    actions,
    getters,
    mutations,
};
