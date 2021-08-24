require('./bootstrap'); 

import { createApp } from 'vue';
import Axios from 'axios';
import ContactAdd from './components/ContactAdd.vue';
import Project from './components/Project.vue';

const app = createApp({});
app.component('contactadd', ContactAdd)
app.component('project', Project)
    .mount('#app');

app.use(Axios);