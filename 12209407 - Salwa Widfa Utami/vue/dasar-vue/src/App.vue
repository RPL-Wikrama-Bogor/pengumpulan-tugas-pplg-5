<template>
  <p>--------------------templating--------------------</p>
  {{ nama }}
  {{ number }}
  <!-- kelas adalah nama property -->
  <div v-html="kelas"></div>
  <p>-------------------data binding------------------</p>
  <button :disabled="nonaktif">button </button>
  <!-- yang diawali oleh v- itu adalah directive (data langsung berubah jika data properti juga berubah) -->
  <h1 v-bind="property">awa</h1>
  <input :type="type">
  <p>-------------------data binding------------------</p>
  {{ count == 0 ? count + 1 : count + 2 }}
  <p>-----------------------v-if----------------------</p>
  <button v-if="show">submit</button>
  <button v-show="show">sumbit</button> <br> <br>
  
  //
  <div v-if="count == 1">
    number 1
  </div>
  <div v-else-if="count == 2">
    number 2
  </div>
  <div v-else="count">
    number 3
  </div>

  <!-- {{ }} untuk memanggil variabel yg ad di data -->
  <p>-----------------computed & method---------------</p>
  <button @click="counterNumber">method {{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button>
  
  <!-- data binding -->
  <br> <br>
  <input :type="typeInput">
  <button @click="showPassword">show password</button>
  <p>-------------------class & style-----------------</p>
  <ul>
    <!-- binding menggunakan {} var ny lebih dari satu, tdk menggunakan berarti hanya 1 -->
    <!-- yg muncul akan class yg aktif saja "active" jika bernilai true, jika false tdk akan muncul-->
    <li class="fs" :class="{active:isActive,fs40px:isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>
  <p>-------------------list rendering-----------------</p>
  <ul>
    <!-- index untuk mengambil hasil looping -->
    <!-- item untuk menggambil perdata dalam array -->
    <!-- yg wajib anda item, jika index gd gpp -->
    <!-- in di js berarti as di php -->
    <li v-for="(item, index) in daftarKelas"> {{ index+1 }}. {{ item }}</li>
  </ul>
  
  <p>-------------------v-model-----------------</p>
  <input type="text" v-model="Inputkelas">{{ Inputkelas }}
  
  </template>
  
  <script>
  export default{
    data(){
      return {
        Inputkelas: ' ',
        daftarKelas:['RPL 1', 'RPL 2', 'RPL 3'],
        typeInput: 'password',
        counterButton: 0,
        numberComputed: 0,
        show: true,
        count: 9,
        nama: 'Salwa', 
        number: 1,
        kelas: '<h1>kelas 11</h1>',
        nonaktif: true,
        //object
        property: {
          id : 1,
          class: 'color',
        },
        type: 'password',
        isActive: false,
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
    color: red;
  }
  .fs40px{
    font-size: 40px;
  }
  .active{
    color: blue;
  }
  </style>