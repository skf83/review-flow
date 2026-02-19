/* eslint-disable */

/**
 *
 */


// importing Prime-Vue
import Button   from 'primevue/button';
import Dialog   from 'primevue/dialog';
import Dropdown from 'primevue/dropdown';
import Toast    from 'primevue/toast';

// importing button
// import FacebookButton from "~/globals/button/FacebookButton";
// import GithubButton from "~/globals/button/GithubButton";
// import GoogleButton from "~/globals/button/GoogleButton";
// import LinkedInButton from "~/globals/button/LinkedInButton";
// import TwitterButton from "~/globals/button/TwitterButton";

// importing spinners
import RingSpinner from "~/globals/spinners/RingSpinner";
import RippleSpinner from "~/globals/spinners/RippleSpinner";
import RollerSpinner from "~/globals/spinners/RollerSpinner";

// importing other assets

/**
 * Register global components here and use them as a plugin in main Vue instance
 */
const GlobalComponents = {

    install(Vue) {

        //Vue.component("prime-button", Button)
        //Vue.component("prime-dialog", Dialog)
        //Vue.component("prime-dropdown", Dropdown)
        //Vue.component("prime-toast", Toast)

        // Vue.component("FacebookButton", FacebookButton)
        // Vue.component("GithubButton", GithubButton)
        // Vue.component("GoogleButton", GoogleButton)
        // Vue.component("LinkedInButton", LinkedInButton)
        // Vue.component("TwitterButton", TwitterButton)
        
        Vue.component("ring-spinner", RingSpinner)
        Vue.component("ripple-spinner", RippleSpinner)
        Vue.component("roller-spinner", RollerSpinner)

    }
};

export default GlobalComponents;
