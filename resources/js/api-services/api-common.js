import axios from 'axios'

export const HTTP = axios.create({
  baseURL: '/api/v1/',
  headers:{
    Authorization: 'Bearer ' + localStorage.getItem('vue-authenticate.vueauth_access_token'),
    Accept:  'application/json',
    'Content-Type': 'application/json;charset=UTF-8',
    "Access-Control-Allow-Origin": "*",
  }
});

export const HTTPCallRail = axios.create({
  baseURL: 'https://api.callrail.com/v3/a/313-852-204',
  headers:{
    Authorization: 'Token token=a006f4b34d4c3c5423d691751249adfe',
    Accept:  'application/json',
    'Content-Type': 'application/json;charset=UTF-8',
    "Access-Control-Allow-Origin": "*",
  }
});


//a006f4b34d4c3c5423d691751249adfe
