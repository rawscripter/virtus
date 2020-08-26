import actions from './actions';
import getters from './getters';
import mutations from './mutations';

const state = {
    user:null,
    users:null
};

export default {
    namespaced: false,
    state,
    actions,
    getters,
    mutations,
};
