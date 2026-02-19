

/* importing core */
import { createApp }    from 'vue'
import axios            from 'axios'

/* importing App */
import App              from './App.vue'

/* importing Globals */
//import globalComponents from './globalComponents'
//import globalDirectives from './globalDirectives'
//import globalFilters    from './globalFilters'

/* importing others */
//import config           from "§/configurator";
//import i18n             from "#/translator"
//import plugins          from "@/plugins/plugins";
import router           from ">/router";
//import scripts          from "js/scripts";
import store            from "*/store";

/* importing mixins */


/* importing vendors */


/* importing bootstrap */
//import 'bootstrap/dist/js/bootstrap';

require("*/subscriber")

/**
 * Setting defaults for Axios
 */
//axios.defaults.baseURL = config['api']['base_url']
axios.defaults.baseURL = "/api"

/* initialising our App */
const app= createApp(App)

    //app.use(globalComponents)
    //app.use(globalDirectives)

    //app.config.globalProperties.$filter = globalFilters

    //app.use(i18n)
    //app.use(plugins)
    app.use(router)
    //app.use(scripts)
    app.use(store)

    app.mount('#app')