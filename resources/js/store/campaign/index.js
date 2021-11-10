import actions from './actions';
import getters from './getters';
import mutations from './mutations';

const state = {
    activeContact:null,
    address:null,
    markets: null,
    marketsLoaded: null,
    campaign:null,
    campaigns:null,
    campaignTypes:null,
    campaignContact:null,
    campaignContacts:null,
    campaignLoaded:null,
    campaignTypeLoaded:null,
    recentLeads:null,
    owners: null
};

export default {
    namespaced: false,
    state,
    actions,
    getters,
    mutations,
};
