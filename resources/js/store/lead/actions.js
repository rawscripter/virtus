import Client from '../../api-services/api-client';

export default {

    status (context, data){
        Client.post('/leads/type/status', data).then(function (response){
            context.commit('STATUS_TYPE', response.data);

        }.bind(this))
            .catch(function(response){
                context.commit('STATUS_TYPE', false);
            });
    },

    stage (context, data){
        Client.post('/leads/type/stage', data).then(function (response){
            context.commit('STAGE_TYPE', response.data);

        }.bind(this))
            .catch(function(response){
                context.commit('STAGE_TYPE', false);
            });
    },

    temperature (context, data){
        Client.post('/leads/type/followUp', data).then(function (response){
            context.commit('TEMPERATURE_TYPE', response.data);

        }.bind(this))
            .catch(function(response){
                context.commit('TEMPERATURE_TYPE', false);
            });
    },

    followUp (context, data){
        Client.post('/leads/type/followUp', data).then(function (response){
            context.commit('FOLLOW_UP_TYPE', response.data);

        }.bind(this))
            .catch(function(response){
                context.commit('FOLLOW_UP_TYPE', false);
            });
    },

    occupancy (context, data){
        Client.post('/leads/type/occupancy', data).then(function (response){
            context.commit('OCCUPANCY_TYPE', response.data);

        }.bind(this))
            .catch(function(response){
                context.commit('OCCUPANCY_TYPE', false);
            });
    },

    offerMade (context, data){
        Client.post('/leads/type/offerMade', data).then(function (response){
            context.commit('OFFER_MADE_TYPE', response.data);

        }.bind(this))
            .catch(function(response){
                context.commit('OFFER_MADE_TYPE', false);
            });
    },

    offerAccepted (context, data) {
        /*
          Make the request to the POST /single-file URL
        */
        Client.post( '/leads/type/offerAccepted', data
        ).then(function(response){
            context.commit('OFFER_ACCEPTED_TYPE', response.data);
        }.bind(this))
            .catch(function(response){
                context.commit('OFFER_ACCEPTED_TYPE', false);
            });
    }

};
