import actions from './actions';
import getters from './getters';
import mutations from './mutations';

const state = {
  contactMessages:{},
  jvMessages: {},
  jvDeletedMessages: {},
};

export default {
  namespaced: false,
  state,
  actions,
  getters,
  mutations,
};
