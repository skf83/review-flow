/* eslint-disable */
import axios from "axios"

const ERROR_MESSAGE = 'ERROR_MESSAGE'

export default {

    namespaced: true,

    state : {
        
        users: [],
        error: {}
    },

    actions : {
        
        async fetchUsers({ commit }, token) {
            
            let response = await axios
                
                .get('/get/users', {
                    
                    headers: {
                        Authorization: "Bearer " + token
                    }
                })
                
                .then(function (response) {
                    
                    commit('saveUsers', response.data)
                    commit(ERROR_MESSAGE, null)
                    
                })
                
                .catch(function (error) {

                    commit("saveUsers", null)

                    if (error.response) {

                        // Request made and server responded
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);

                        commit(ERROR_MESSAGE, error.response)

                    } else if (error.request) {

                        // The request was made but no response was received
                        console.log(error.request);

                        commit(ERROR_MESSAGE, error.request)

                    } else {

                        // Something happened in setting up the request that triggered an Error
                        console.log('Error', error.message);

                        commit(ERROR_MESSAGE, error.message)
                    }
                })
        },
        
        
    },

    getters : {
        
        getUsers(state) {

            return state.users
        },

        error(state) {

            return state.error
        }
    },

    mutations : {

        [ERROR_MESSAGE]: function (state, payload) {
            state.error = payload
        },
        
        saveUsers(state, payload) {
            state.users = payload
        }
    }
}
