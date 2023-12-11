<script setup>
import HelloWorld from './components/HelloWorld.vue'
import TheWelcome from './components/TheWelcome.vue'
</script>

<template>
  <p>-------------Templating---------------</p>
  {{ nama }}
  {{ number }}
  <div v-html="Kelas"></div>
  <button v-if="show" :disabled="nonaktif">button</button>
  <h1 v-bind="property">Louis</h1>
  <input :type="typeInput">
  <p>-------------binding---------------</p>
  {{ count == 0 ? count +1 : count + 2 }}
  <p>|----------------------v-if--------------------|</p>
  <button v-if="show">submit</button>
  <button v-show="show">submit</button>
  
  <div v-if="count == 1">
  Number 1 
  </div>
  
  <div v-else-if="count == 2">
  Number 2
  </div>
  
  <div v-else>
    lebih dari 2
  </div>


  <p>-------------method---------------</p>
  
  <button @click="counterNumber">Method {{ counterButton }}</button>
<button @click="countComputed">Computed {{ numberComputed }}</button>
<input :type="typeInput">
<button @click="showPassword">show password</button>



<p>-------------class---------------</p>

<ul>
  <li :class="{active: isActive, fs40px: isActive}">
    test
  </li>
</ul>
<button @click="ubahWarna">ubah warna</button>
<p>|----------------------bit Rendering--------------------|</p>
  <ul>
    <li v-for="(item, index) in daftarKelas">
      {{ item }} {{ index+1 }}
    </li>
    </ul>
  <p>|----------------------v-model--------------------|</p>
  <input type="text" v-model="Inputkelas">
  {{ Inputkelas }}
  </template>
  


<script>
export default {
  data(){
    return{
      Inputkelas: '',
      daftarKelas: ['PPLG ', 'PPLG ', 'PPLG '],
      counterButton: 0,
      numberComputed: 0,
      show: false,
      count: 0,
      nama: 'Louis',
      number: 13,
      kelas: '<h1>kelas 11</h1>',
      nonaktif: true,
      property: {
        id: 1,
        class: 'color'

      },
      typeInput: 'password',
      isActive: true
    }
  },
    methods: {
      counterNumber() {
      this.counterButton +=100;
    },
      showPassword(){
        if(this.typeInput == 'password'){
          this.typeInput = 'text';
       }else{
          this.typeInput ='password';
       } 
    },
    ubahWarna(){
      if(this.isActive){
        this.isActive = false;
      } else{
        this.isActive=true;
      }
    }
  },
    computed:{
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