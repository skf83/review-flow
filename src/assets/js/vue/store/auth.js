/* eslint-disable */
import axios from "axios"

const ERROR_MESSAGE = 'ERROR_MESSAGE'

export default {

    namespaced: true,

    state : {
        
        token: null,
        error: {}
    },

    actions : {
        
        async fetchAuthToken({ commit, dispatch }, credentials) {
            
            let response = await axios
                
                .post('/auth/fetch-token', credentials)
                
                .then(function (response) {
                    
                    commit('saveAuthToken', response.data.token)
                    commit(ERROR_MESSAGE, null)
                    
                })
                
                .catch(function (error) {

                    commit("saveAuthToken", null)

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

        authenticated(state) {

            return state.token
        },

        error(state) {

            return state.error
        }
    },

    mutations : {

        [ERROR_MESSAGE]: function (state, payload) {
            state.error = payload
        },

        saveAuthToken(state, payload) {
            state.token = payload
        }
    }
}
