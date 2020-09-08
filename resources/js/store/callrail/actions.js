import Client from '../../api-services/callrail-client';

export default {
  getCallRailActivity({commit}, data){
    return new Promise((resolve, reject) => {
      Client.get('/calls.json?page=' + data.currentPage +'&per_page=' + data.perPage)
        .then(resp =>{
          commit('CALL_ACTIVITY', resp.data)
          resolve(resp.data)
        })
        .catch(err => {
          console.log(err)
          commit('message_error')
          reject(err)
        })
    })
  },

  getCallRailText({commit}, data){
    return new Promise((resolve, reject) => {
      console.log('about to make call' +  data.perPage)
      Client.get('/text-messages.json?page='+ data.currentPage +'&per_page=' + data.perPage)
        .then(resp =>{
          console.log(resp)
          commit('TEXT_ACTIVITY', resp.data)
          resolve(resp.data)
        })
        .catch(err => {
          console.log(err)
          commit('message_error')
          reject(err)
        })
    })
  },
}
