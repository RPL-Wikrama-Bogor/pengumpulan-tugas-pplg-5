// yang pertama kali di jalankan adalah file ini
import { createApp } from 'vue'
import App from './App.vue'

// apk vue akan pertama kali jalankan createApp() ketika buka di browser
// #berasal dari id yang ada di index.html
createApp(App).mount('#app')
