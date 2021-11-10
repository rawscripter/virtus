import Client from '../../api-services/api-client';

export default {
  jvInquiry({commit}, jvInquiry){
    console.log('in jv')
    console.log(jvInquiry)
    return new Promise((resolve, reject) => {
      Client.post('/inquiry/jv/create', jvInquiry)
        .then(resp => {
          commit('MESSAGES_SAVED', resp.data)
          resolve(resp)
        })
        .catch(err => { console.log(err)
          commit('message_error')
          reject(err)
        })
    })
  },

  offerInquiry({commit}, offerInquiry){
    return new Promise((resolve, reject) => {
      Client.post('/inquiry/offer/create', offerInquiry)
        .then(resp => {
          commit('MESSAGES_SAVED', resp.data)
          resolve(resp)
        })
        .catch(err => { console.log(err)
          commit('message_error')
          reject(err)
        })
    })
  },

  generalInquiry({commit}, generalInquiry){
    return new Promise((resolve, reject) => {
      Client.post('/inquiry/contact/create', generalInquiry)
        .then(resp => {
          commit('MESSAGES_SAVED', resp.data)
          resolve(resp)
        })
        .catch(err => { console.log(err)
          commit('message_error')
          reject(err)
        })
    })
  },

  getJVMessages({commit}){
    return new Promise((resolve, reject) => {
      Client.get('/inquiry/jv')
        .then(resp =>{
          console.log(resp)
          commit('JV_MESSAGES', resp.data.data)
        })
        .catch(err => {
          console.log(err)
          commit('message_error')
          reject(err)
        })
    })
  },

  getGeneralMessages({commit}){
    return new Promise((resolve, reject) => {
      Client.get('/inquiry/contact')
        .then(resp =>{
          console.log(resp)
          commit('GENERAL_MESSAGES', resp.data.data)
        })
        .catch(err => {
          console.log(err)
          commit('message_error')
          reject(err)
        })
    })
  },

  getOfferMessages({commit}){
    return new Promise((resolve, reject) => {
      Client.get('/inquiry/offer')
        .then(resp =>{
          console.log(resp)
          commit('OFFER_MESSAGES', resp.data.data)
        })
        .catch(err => {
          console.log(err)
          commit('message_error')
          reject(err)
        })
    })
  }
}
