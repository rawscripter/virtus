export default {
  CALL_ACTIVITY: (state, getCallActivity) => {
    state.getCallActivity = getCallActivity
  },

  TEXT_ACTIVITY: (state, getTextActivity) => {
    state.getTextActivity = getTextActivity
  }
}
