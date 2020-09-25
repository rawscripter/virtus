import actions from './actions';
import getters from './getters';
import mutations from "./mutations";

const state = {
    leadStatuses: null,
    statusType: null,
    stageType:null,
    temperatureType:null,
    followUpType:null,
    occupancyType:null,
    offerMadeType:null,
    offerAcceptedType:null,
    communicationType: null
};

export default {
    namespaced: false,
    state,
    actions,
    getters,
    mutations
};
