// const app = Vue .createApp({
//     data(){
//         return{
//             name:Pizza,
//             price:12,
//         };
//     }
// });


// inscription

// import { createApp } from "vue";
// import App from "./App.vue";

// createApp(App).mount("#app");

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

createApp(App).use(router).mount("#app");



// import { createApp } from "vue";
// import App from "./App.vue";
// import router from "./router/index.js";

// createApp(App).use(router).mount("#app");
