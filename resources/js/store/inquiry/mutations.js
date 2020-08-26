export default {
    MESSAGE_SAVED: (state, messageSaved) => {
        state.MessageSaved = messageSaved
    },
    JV_MESSAGES: (state, jvMessages) => {
        state.jvMessages = jvMessages
    },
    GENERAL_MESSAGES: (state, generalMessages) => {
        state.generalMessages = generalMessages
    },

    OFFER_MESSAGES: (state, offerMessages) => {
        state.offerMessages = offerMessages
    },
    JV_DELETED_MESSAGES: (state, jvDeletedMessages) => {
        state.jvDeletedMessages = jvDeletedMessages
    }
}
