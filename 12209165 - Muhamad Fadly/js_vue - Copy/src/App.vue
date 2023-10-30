<template>
  <p>------------tamplating-----------------</p>
   {{nama}}
   {{number}}
   <div v-html="kelas"></div>
   <p>------------badning-----------------</p>
   <button :disabled="nonaktif">button</button>
   <h1 v-bind="property">ubed</h1>
   <input :type="type">
   <br>
   <p>------------v-if-----------------</p>

   {{ count==0 ? count+10 : count+2 }}

   <div v-if="count == 1">
    numeber 1
   </div>
   <div v-else-if="count == 2">
   number 2
   </div>
   <div v-else>
    lebih dari 2
   </div>
   <p>------------method-----------------</p>

   <button @click="counterNumber">methodes{{ counterButton }}</button>
   <button @click="countComputed">computed{{ numberComputed }}</button>

   <p>------------show-----------------</p>
   <input :type="typeInput">
   <button @click="showPassword">show</button>
   
   <p>------------class & style-----------------</p>

   <ul>
    <li class="fs" :class="{active:isActive, fs40px: isActive}">
    (❁´◡`❁)
    <div class="love" style="margin-left: 20px;">
    '''❤️'''
  </div>
    </li>
   </ul>
   <button @click="ubahWarna">ubah warna</button>

   <p>------------listrendering-----------------</p>
   <ul>
    <li v-for="(item, index) in daftarKelas">{{ index+1 }} {{ item }}</li>
   </ul>
   <p>------------v-model----------------</p>
   <input type="text" v-model="inputKelas">
    {{ inputKelas}}
</template>

<script>
export default {
  data(){
    return{
      inputKelas:'',
      daftarKelas: ['rpl1','rpl2','rpl3'],
      typeInput: 'password',
      isActive: false,
      numberComputed:0,
      counterButton: 0,
      count: 10,
      nama: 'Ubed',
      number: 1,
      kelas: '<h1>pplg 5</h1>',
      nonaktif: true,
      property: {
        id: 1,
        class: 'color'
     },
     type: "text"
    }
  },
  methods: {
    counterNumber(){
      this.counterButton += 1;
    },
    showPassword() {
      if (this.typeInput == 'password') {
        this.typeInput = 'text';

    }else{
      this.typeInput= 'password';
    }

  },
  ubahWarna(){
    if (this.isActive) {
      this.isActive=false
    }else{
      this.isActive=true
    }
  }
},
  computed:{
    countComputed(){
      //computed berhenti sampe angka yang kita kasih di bawah
      this.numberComputed += 1000000;

    }
  },
 
  
}

</script>


<style>
  .color{
    color: red;
  }
  
  .fs{
    font-size: 2em;
  }
  .active{
    color: red;
  }
  .fs40px{
    font-size: 50px;
  }
  li{
    list-style: none;
  }
 


</style>















































<!-- <script setup>
import HelloWorld from './components/HelloWorld.vue'
import TheWelcome from './components/TheWelcome.vue'
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="You did it!" />
    </div>
  </header>

  <main>
    <TheWelcome />
  </main>
</template>

<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style> -->
