/* eslint-disable */

import { createStore }  from "vuex";

import VuexPersist      from "vuex-persist";

import auth     from "./auth";
import users    from "./users";

const vuexLocalStorage = new VuexPersist({
    storage: window.localStorage
});

export default createStore({

    plugins: [
        vuexLocalStorage.plugin
    ],

    modules: {

        auth,
        users
    }

});