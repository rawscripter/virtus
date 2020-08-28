export default {
    isAuthenticated: state => state.isAuthenticated,
    //isAuthenticated: localStorage.getItem("vue-authenticate.vueauth_access_token") !== null,
    AUTH_ID: state => state.authID
};
