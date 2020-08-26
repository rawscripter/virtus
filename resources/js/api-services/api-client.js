import {HTTP} from "./api-common";


export default {

  get(path) {
    return HTTP.get(path);
  },

  post(path, data) {
    return HTTP.post(path, data);
  },

  update(path, data) {
    return HTTP.put(path, data);
  },

  delete(path) {
    return HTTP.delete(path);
  }
};
