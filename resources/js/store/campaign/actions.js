import Client from '../../api-services/api-client';

export default {



    getRecentlyUpdatedLeads(context) {
        console.log('ready');
        Client.get('/campaign/recent').then(function (response){
            console.log(response);
           if(response.data!=''){
               context.commit('RECENT_LEADS', response.data);
           } else {
               console.log('response data empty');
           }
        });
    },

    getCampaignById (context, id) {
        console.log(id);
        Client.get('/campaign/id?id='+id).then(function (response) {
            if(response.data!="") {
                context.commit('CAMPAIGN', response.data);
            }else{
                console.log("response data empty");
            }
        }).catch(function (error) {
            console.log(error);
        });
    },

    setActiveContact(context,payload){
        context.commit('SET_ACTIVE_CONTACT', payload);
    },

    searchContactByOwner (context,payload) {
        console.log('search');
        Client.get('campaign/contacts/search/owner?query='+payload.query + '&perPage=' + payload.perPage + '&page=' + payload.page).then(function (response) {
            console.log(response);
            if(response.data!="") {
                console.log(response.data);
                context.commit('SET_CAMPAIGN_CONTACTS', response.data);
            }else{
                console.log("response data empty");
            }
        }).catch(function (error) {
            console.log(error);
        });
    },


    searchContactByAddress (context,payload) {
        console.log('search');
        Client.get('campaign/contacts/search/address?query='+payload.query + '&perPage=' + payload.perPage + '&page=' + payload.page).then(function (response) {
            console.log(response);
            if(response.data!="") {
                console.log(response.data);
                context.commit('SET_CAMPAIGN_CONTACTS', response.data);
            }else{
                console.log("response data empty");
            }
        }).catch(function (error) {
            console.log(error);
        });
    },



    getCampaignContact(context, id) {

        Client.get('campaign/contact/search/id?id='+id).then(function (response) {
            if(response){
                console.log(response.data);
                context.commit('SET_CAMPAIGN_CONTACT', response.data);
            } else {
                console.log("response data empty");
            }
        }).catch(function (err) {
            console.log(err);
        });
    },
    getCampaignTypes (context) {
        Client.get('campaign/types/all').then(function (response) {
            if(response.data!="") {
                context.commit('CAMPAIGN_TYPES', response.data);
            }else{
                console.log("response data empty");
            }
        }).catch(function (error) {
            console.log(error);
        });
    },

    postCampaign(context, data) {
        /*
          Make the request to the POST /single-file URL
        */
        Client.post( 'campaign/create', data
        ).then(function(response){
            console.log(response);
            this.$router.push({name: 'campaigns'});
            context.commit('CAMPAIGN_LOADED', true);

        }.bind(this))
            .catch(function(response){
                console.log(response);
                context.commit('CAMPAIGN_LOADED', true);
            });
    },

    postCampaignType(context, data) {
        /*
          Make the request to the POST /single-file URL
        */
        console.log('in service'+ data);
        Client.post( 'campaign/type/create', data
        ).then(function(response){
            console.log(response);
            this.$router.push({name: 'admin'});
            context.commit('CAMPAIGN_TYPE_LOADED', true);

        }.bind(this))
            .catch(function(response){
                console.log(response);
                context.commit('CAMPAIGN_TYPE_LOADED', true);
            });
    },

};
