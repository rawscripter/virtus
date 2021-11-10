export default {

    CAMPAIGNS: (state, campaigns) =>{
        state.campaigns = campaigns;
    },

    CAMPAIGN_TYPES: (state, campaignTypes) => {
        state.campaignTypes = campaignTypes;
    },

    OWNERS: (state, owners) => {
        state.owners = owners;
    },

    ADDRESSES: (state, addresses) => {
        state.addresses = addresses;
    },

    SET_CAMPAIGN_CONTACTS: (state, campaignContacts) => {
        state.campaignContacts = campaignContacts;
    },

    SET_CAMPAIGN_CONTACT: (state, campaignContact) => {
        state.campaignContact = campaignContact;
    },

    SET_ACTIVE_CONTACT: (state, activeContact) =>{
        state.activeContact =  activeContact;
    },
    //load states
    CAMPAIGN_LOADED: (state, campaignLoaded) => {
        state.campaignLoaded = campaignLoaded;
    },

    CAMPAIGN_TYPE_LOADED: (state, campaignLoaded) => {
        state.campaignTypeLoaded = campaignLoaded;
    },
    RECENT_LEADS: (state, recentLeads) =>{
        state.recentLeads = recentLeads;
    },

    MARKETS: (state, markets) =>{
        state.markets = markets;
    },
    MARKETS_LOADED: (state, marketsLoaded) =>{
        state.marketsLoaded = marketsLoaded;
    },


};
