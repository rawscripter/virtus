export default {
    STATUS_TYPE: (state,type) =>{
        state.statusType = type;
    },

    STAGE_TYPE: (state,type) =>{
        state.stageType = type;
    },


    TEMPERATURE_TYPE: (state,type) =>{
        state.temperatureType = type;
    },


    FOLLOW_UP_TYPE: (state,type) =>{
        state.followUpType = type;
    },


    OCCUPANCY_TYPE: (state,type) =>{
        state.occupancyType = type;
    },


    OFFER_MADE_TYPE: (state,type) =>{
        state.offerMadeType = type;
    },


    OFFER_ACCEPTED_TYPE: (state,type) =>{
        state.offerAcceptedType = type;
    },
};
