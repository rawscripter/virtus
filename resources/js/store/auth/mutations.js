export default {
    isAuthenticated: (state, payload) =>{
        state.isAuthenticated = payload.isAuthenticated;
    },

    AUTH_ID: (state, authID) =>{
        state.authID = authID;
    }
};
