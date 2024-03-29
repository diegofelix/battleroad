import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import axios from "axios"
import { createPinia } from 'pinia'

// These configuration allows us to use the backend server
// on the same domain as the frontend
axios.defaults.baseURL = 'https://backend.battleroad.local'
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

const app = createApp(App)
const pinia = createPinia()
app.use(router)
app.use(pinia)
app.mount('#app')
