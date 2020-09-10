import actions from './actions';
import getters from './getters';
import mutations from './mutations';

const state = {
    activeContact:null,
    campaign:null,
    campaigns:null,
    campaignTypes:null,
    campaignContact:null,
    campaignContacts:null,
    campaignLoaded:null,
    campaignTypeLoaded:null,
    recentLeads:null
};

export default {
    namespaced: false,
    state,
    actions,
    getters,
    mutations,
};
