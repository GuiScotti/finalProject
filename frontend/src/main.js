import { createApp } from 'vue'
import App from './App.vue'
import { library } from '@fortawesome/fontawesome-svg-core';
import { faInstagram, faTiktok } from '@fortawesome/free-brands-svg-icons';
import { faFileAlt } from '@fortawesome/free-solid-svg-icons';
import { faCircleCheck } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import router from './router'
import store from "./store";

library.add(faInstagram, faTiktok, faFileAlt, faCircleCheck);

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";

const app = createApp(App)

app.use(router)
app.use(store)

.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app')

