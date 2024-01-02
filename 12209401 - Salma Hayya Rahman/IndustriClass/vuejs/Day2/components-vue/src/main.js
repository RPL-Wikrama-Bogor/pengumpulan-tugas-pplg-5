import { createApp } from 'vue' ;
import App from './App.vue' ;

import Btn from '@/components/mycomponents/Button.vue' ;

const app = createApp(App) ;

app.component("MyBtn" , Btn) ;
app.mount('#app') ;
