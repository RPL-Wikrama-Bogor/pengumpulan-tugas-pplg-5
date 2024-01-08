
<template>
  <p>------------templating-------------</p>
  <p>{{ nama }}</p>
  <p>{{ nis }}</p>
  <div v-html="kelas"></div>
  <p>------------data binding-----------</p>
  <button :disabled="nonaktif" >button</button>
  <h1 v-bind="property">ah</h1>
  <input :type="type">
 
  {{ count==0? count + 1 : count + 2 }}
  <br>
  <br>
  <br>
<button v-if="show">boooooooooood</button>
<div v-if="count== 1">
  satu
</div>
<div v-else-if="count == 2">

dua
</div>

<div v-else>
tiga
</div>
<p>-------------------------------</p>
<input :type="typeInput">
<button @click="showPassword">show password</button>
<p>-------------------------------</p>
<ul>
  <li  :class="{active:isActive}">
    test
  </li>
</ul>
<button @click="ubahWarna">ubah warna</button>
<!-- <button @click="counterNumber">{{ counterButton }}</button>
<button @click="counterComputed">computed {{ numberComputed }}</button> -->

<p>-------rendering-----------</p>
<ul>
  <li v-for="(item,index) in daftarKelas">{{ index++ }}. {{ item }}</li>
 
</ul>
<p>------------v model--------------</p>
<input type="text" v-model="inputKelas">
{{ inputKelas }}
</template>
<script>
export default{
  data() {
    return {
     inputKelas:'',
      daftarKelas:['rpl 1', 'rpl 2', 'rpl 3'],
      typeInput:'password',
      numberComputed:0,
      counterButton:0,
      show:true,
      count:0,
      nama: 'Asep',
      nis:12209040,
      kelas:'<h1>asep</h1>',
      nonaktif:true,
      property:{
        id: 1,
        class:'color'
      },
      type:'password',
      isActive:true
    }
  },

  methods:{
    counterNumber(){
   this.counterButton += 1;
    },
    showPassword(){
      if(this.typeInput=='password'){
        this.typeInput='text';

      }else{
        this.typeInput ='password';
      }
    },
    ubahWarna(){
      if(this.isActive){
        this.isActive =false;
      }else{
        this.isActive = true;
      }
    }
},

computed:{
  counterComputed(){
    this.numberComputed += 1;
  }
}
}

</script>
<style>


input{
  border-radius: 5px;
  background-color: #cecece;
  border: none;
}

.color{
  color:red;
}
.fs{
font-size: 3rem;
}
.active{
  color: white;
}
</style>