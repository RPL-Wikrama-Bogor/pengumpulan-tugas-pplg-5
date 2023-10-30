<template>
  <p>----------templating----------</p>
  {{ nama }}
  {{ age }}
  <div v-html="kelas"></div>
  <p>----------templating----------</p>
  
  <button :disabled="nonaktif">button</button>
  <h1 v-bind="property">sal</h1>
  <input :type="type">

  <p>----------data binding----------</p>
  {{ count == 0 ? count + 1 : count + 2 }}

  <p>----------v-if----------</p>
  <button v-if="show">submit</button> 
  <button v-show="show">submit</button>

  <div v-if="count == 1">number 1</div>
  <div v-else-if="count == 2">number 2</div>
  <div v-else="">lebih dari 2</div>

  <p>----------computed dan methods----------</p>
  <input :type="typeInput">
  <button @click="showPassword">show password</button>

  <!-- <button @click="counterNumber">{{ counterButton }}</button>
  <button @click="counterComputed">Computed {{ numberComputed }}</button> -->

  <p>----------class dan style----------</p>
  <ul>
    <li :class="{active:isActive , fs40px:isActive}">
        test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>

  <p>----------list rendering----------</p>
  <ul>
    <li v-for="(item,index) in daftarKelas"> {{ index+1 }}{{ item }}</li>
  </ul>
  <p>------------- v model ---------------</p>
<input type="text" v-model="inputKelas">{{ inputKelas }}
</template>
<script>
  export default{
    data(){
      return{
        daftarKelas: ['RPL-1' , 'RPL-2' , 'RPL-3'] ,
        inputKelas : '',
        counterButton: 0,
        numberComputed: 0 , 
        show : false,
        count: 10 ,
        nama: 'Salma Hayya Rahman',
        age: 17 ,
        kelas: '<h5>KELAS XI</h5>',
        nonaktif: false ,
        property: {
          id : 1 ,
          class: 'color'
        },
        typeInput: 'password',
        isActive: true
      }
    },
    methods:{
      counterNumber(){
        this.counterButton += 1 ;
      },
      showPassword(){
        if(this.typeInput == 'password'){
          this.typeInput = 'text' ;
        }else{
          this.typeInput = 'password' ;
        }
      },
      ubahWarna(){
        if(this.isActive){
          this.isActive = false;
        }else{
          this.isActive = true ;
        }
      }
    },
    computed:{
      counterComputed(){
        this.numberComputed += 1 ;
      }
    }
  }
</script>
<style>
.color{
  color: blue ;
}
.fs40px{
  font-size: 40px;
}
.active{
  color: greenyellow;
}
</style>