import './bootstrap';
import { createApp } from 'vue';
import appComponent from '../components/appComponent.vue';
import router from './routes.js';

const app = createApp({});

app.component('appComponent', appComponent);
app.use(router);
app.mount('#app');
