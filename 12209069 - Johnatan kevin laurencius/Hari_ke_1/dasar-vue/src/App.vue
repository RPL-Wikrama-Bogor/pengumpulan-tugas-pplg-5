<template>
  <p>----------------templating---------------</p>
  <p>{{ nama }}</p>
  <p>{{ number }}</p>
  <div v-html="rayon"></div>
  <p>----------------data binding--------------</p>
  <button :disabled="nonaktif"></button>
  <h1 v-bind="property">zae</h1>
  <input :type="type">
  <p>----------------data binding--------------</p>
  {{ count == 0 ? count = 1 : count + 2 }}
  <p>--------------------v-if-------------------</p>  
  <button v-if="show">submit</button>
  <button v-show="show">submit</button>

  <div v-if="count == 1">
    number 1
  </div>
  <div v-else-if="count == 2">
    number 2
  </div>
  <div v-else="count">
    lebih dari 2
  </div>
  <p>--------------------computed & method-------------------</p> 
  <!-- <button @click="counterNumber">methods {{ counterButton }}</button>
  <button @click="countComputed">computed {{ numberComputed }}</button> -->
  <input :type="typeInput">
  <button @click="showPassword">Show Password</button>
  <p>--------------------class & style-------------------</p>
  <ul>
    <li :class="{active:isActive, fs40px:isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">Ubah Warna</button>
  <p>--------------------rendering-------------------</p>
  <ul>
    <li v-for="(item,index) in daftarKelas">{{ index + 1 }} {{ item }}</li>
  </ul>
  <p>--------------------v-model-------------------</p>
  <input type="text" v-model="inputKelas">
  {{ inputKelas }}
</template>

<script>
export default{
  data(){
    return {
      inputKelas: '',
      daftarKelas: ['RPL 1', 'RPL 2', 'RPL 3'],
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 0,
      show:true,
      count: 3,
      nama:'Rusdi',
      number: '12209598',
      rayon: '<h1>Wikrama 3</h1>',
      nonaktif:false,
      property: {
        id: 1,
        class: 'color'
      },
      type: 'password',
      isActive: true
    }
  },
  methods:{
    counterNumber(){
      this.counterButton += 1;
    },
    showPassword(){
      if(this.typeInput == 'password'){
        this.typeInput = 'text';
      }else{
        this.typeInput = 'password';
      }
    },
    ubahWarna(){
      if(this.isActive == true){
        this.isActive = false;
      }else{
        this.isActive = true;
      }
    }
  },
  computed:{
    countComputed(){
      this.numberComputed += 1;
    }
  }
}
</script>

<style>
.color {
  color: red;
}
.active{
  color: blue;
  transition: all ease-in-out 250ms;
}
.fs40px{
  font-size: 40px;
}
</style>