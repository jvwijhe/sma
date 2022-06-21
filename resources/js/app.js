// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

require('./bootstrap');

import { createApp } from 'vue';

// import router from './router'

import UnlockMessageForm from './components/forms/UnlockMessageForm.vue'
import HelloWorld from './components/HelloWorld.vue';


const app = createApp({
    data() {
      return {
        count: 0
      }
    }
  })
  app.component('hello-world', HelloWorld)
  app.component('unlock-message-form', UnlockMessageForm)

  app.mount('#app')
