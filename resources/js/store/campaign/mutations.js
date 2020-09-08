export default {
    CAMPAIGN_TYPES: (state, campaignTypes) => {
        state.campaignTypes = campaignTypes
    },

    SET_CAMPAIGN_CONTACTS: (state, campaignContacts) => {
        state.campaignContacts = campaignContacts
    },

    SET_CAMPAIGN_CONTACT: (state, campaignContact) => {
        state.campaignContact = campaignContact
    },

    SET_ACTIVE_CONTACT: (state, activeContact) =>{
      state.activeContact =  activeContact
    },
    //load states
    CAMPAIGN_LOADED: (state, campaignLoaded) => {
        state.campaignLoaded = campaignLoaded
    },

    CAMPAIGN_TYPE_LOADED: (state, campaignLoaded) => {
        state.campaignTypeLoaded = campaignLoaded
    },
    RECENT_LEADS: (state, recentLeads) =>{
        state.recentLeads = recentLeads
    }
}
