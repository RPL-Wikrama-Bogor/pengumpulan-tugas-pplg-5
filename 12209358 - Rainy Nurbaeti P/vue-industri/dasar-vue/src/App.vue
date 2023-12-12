<template>
  <p>--------------------templating--------------------</p>
  {{ nama }}
  {{ number }}
  <!-- kelas adalah nama property -->
  <div v-html="kelas"></div>
  <p>-------------------data binding------------------</p>
  <button :disabled="nonaktif">button </button>
  <!-- yang diawali oleh v- itu adalah directive (data langsung berubah jika data properti juga berubah) -->
  <h1 v-bind="property">Rainy</h1>
  <input :type="type">
  <p>-------------------data binding------------------</p>
  {{ count == 0 ? count + 1 : count + 2 }}
  <p>-----------------------v-if----------------------</p>
  <button v-if="show">submit</button>
  <button v-show="show">sumbit</button>
  
  <div v-if="count == 1">
    number 1
  </div>
  <div v-else-if="count == 2">
    number 2
  </div>
  <div v-else="count">
    number 3
  </div>
  <p>-----------------computed & method---------------</p>
  <button @click="counterNumber">method {{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button>
  
  <!-- data dinding -->
  <br> <br>
  <input :type="typeInput">
  <button @click="showPassword">show password</button>
  <p>-------------------class & style-----------------</p>
  <ul>
    <li :class="{ active:isActive,
    fs40px:isActive}">icang</li>
  
  </ul>
  <button @click="ubahWarna">ubah warna</button>
  <p>-------------------class & style-----------------</p>
  <ul>
    <li v-for="(item,index) in daftarKelas"> {{ index+1 }}{{ item }}</li>
  </ul>
    <p>-------------------class & style-----------------</p>
    <input type="text" v-model="inputkelas">{{ inputkelas }} 
 
  </template>
  
  <script>
  export default{
    data(){
      return {
        kelas:'',
        daftarKelas:['rpl1','rpl2','rpl3'],

        typeInput: 'password',
        counterButton: 0,
        numberComputed: 0,
        show: true,
        count: 9,
        nama: 'RainyNBP', 
        number: 1,
        kelas: '<h1>kelas 11</h1>',
        nonaktif: true,
        property: {
          id : 1,
          class: 'color',
        },
        type: 'password',
        isActive: true,
      }
    },
    methods: {
      counterNumber(){
        this.counterButton += 1;
      },
      showPassword(){
        if(this.typeInput=='password'){
          this.typeInput = 'text';
        } else {
          this.typeInput = 'password';
        }
      },
      ubahWarna(){
        if(this.isActive){
          this.isActive = false;
        }else{
          this.isActive = true;
        }
      },
    },
    computed: {
      countComputed(){
        this.numberComputed += 6;
      }
    }
  }
  </script>
  
  <style>
  .color{
    color: rgb(168, 100, 227);
  }
  .fs40px{
    font-size: 40px;
  }
  .active{
    color: rgb(224, 6, 97);
  }
  </style>