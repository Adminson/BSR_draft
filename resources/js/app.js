/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
require("vue-multiselect/dist/vue-multiselect.min.css");
window.Vue = require("vue");
// import TurboLinks from "turbolinks";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// TurboLinks.start();

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component(
    "rod-create",
    require("./modules/rod/RodCreate.vue").default
);

Vue.component(
    "meeting-create",
    require("./modules/meeting/MeetingCreate.vue").default
);

Vue.component(
    "counter-create",
    require("./modules/counter/CounterCreate.vue").default
);
Vue.component(
    "counter-edit",
    require("./modules/counter/CounterEdit.vue").default
);
Vue.component(
    "meeting-edit",
    require("./modules/meeting/MeetingEdit.vue").default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
// document.addEventListener("turbolinks:load", () => {
//     var element = document.getElementById("app");
//     if (element != null) {
//         const app = new Vue({
//             el: element
//         });
//     }
// });