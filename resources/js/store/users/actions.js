import Client from '../../api-services/api-client';

export default {
    getUser(context, data) {
        if(data!==null) {
            Client.get('/users/user?id=' + data.authID).then(function (response) {
                if (response.data) {
                    context.commit('USER', response.data.data);
                } else {
                    console.log("response data empty");
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    },

    getUsers(context, id) {
        Client.get('/users').then(function (response) {
            if(response.data) {
                context.commit('USERS', response.data.data);
            }else{
                console.log("response data empty");
            }
        }).catch(function (error) {
            console.log(error);
        });
    },
};
