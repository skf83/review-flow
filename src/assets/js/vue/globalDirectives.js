/* eslint-disable */

// importing
import ClickOutside from 'directives/click-outside-directive';
import Highlight    from 'directives/highlight-directive';

/**
 * You can register global directives here and use them as a plugin in your main Vue instance
 */
const GlobalDirectives = {

    install(Vue) {

        Vue.directive("click-outside", ClickOutside)

        Vue.directive("highlight", Highlight)

    }
};

export default GlobalDirectives;