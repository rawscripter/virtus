import {HTTPCallRail} from "./api-common";


export default {

  get(path) {
    return HTTPCallRail.get(path);
  },

  post(path, data) {
    return HTTPCallRail.post(path, data);
  },

  update(path, data) {
    return HTTPCallRail.put(path, data);
  },

  delete(path) {
    return HTTPCallRail.delete(path);
  }
};
