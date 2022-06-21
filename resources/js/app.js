// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

require('./bootstrap');

import { createApp } from 'vue';

// import router from './router'

import UnlockMessageForm from './components/forms/UnlockMessageForm.vue'
import MessageActionsForm from './components/forms/MessageActionsForm.vue'

import HelloWorld from './components/HelloWorld.vue';


const app = createApp({
    data() {
      return {
        menuIsOpen: false
      }
    }
  })
  app.component('hello-world', HelloWorld)
  app.component('unlock-message-form', UnlockMessageForm)
  app.component('message-actions-form', MessageActionsForm)

  app.mount('#app')
