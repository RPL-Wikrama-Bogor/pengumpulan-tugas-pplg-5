<template>
<p>-------Templating-------</p>
{{ nama }}
<div v-html="rombel"></div>

<p>-------Data Binding-------</p>
<h1 v-bind="property">Masukan password</h1>
<input :type="type">

<p>-------Data Binding-------</p>
{{ count == 0 ? count + 1 : count + 2 }}
<br><br>
<button :disabled="nonaktif">Submit</button>

<p>-------Computed dan methods-------</p>
<input :type="typeInput">
<button @click="showPassword">Show Password</button>
<!-- <button @click="counterNumber">{{ counterButton }}</button>
<button @click="countComputed">Computed{{ numberComputed }}</button> -->

<p>-------Class dan Style-------</p>
<ul>
  <li :class="{
      active: isActive, 
      fs40px: isActive
              }">
    test
  </li>
</ul>
<button @click="ubahWarna">Ubah Warna</button>

<p>-------List Rendering-------</p>
<ul>
  <li v-for="(item,index) in daftarKelas">{{ item }} {{ index+1 }}</li>
</ul>

<p>-------V-model-------</p>
<input type="text" v-model="Inputkelas">
{{ Inputkelas }}
</template>

<script>
export default{
  data(){
    return{
      Inputkelas : '',
      daftarKelas : ['PPLG 2','PPLG 5'],
      typeInput : 'password',
      numberComputed : 0,
      counterButton : 0,
      count : 1,
      nama : 'Nama : Rafidz',
      rombel : '<h1>PPLG XI-5</h1>',
      nonaktif: false,
      property: {
        id: 1,
        class: 'color'
      },
      typeInput: 'password',
      isActive:true

    }
  },
  methods:{
    counterNumber(){
      this.counterButton ++
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
      } else {
        this.isActive = true;
      }
    }
  },
  computed:{
    countComputed(){
      this.numberComputed ++ 
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
  transition: all ease-in-out 1000ms; 
}
</style>