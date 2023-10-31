<template>

  <p>----------------templeting------------------</p>
  <p>{{ nama }}</p>
  <p>{{ nis }}</p>
  <div v-html="rombel"></div>
  <p>----------------data binding----------------</p>
  <button :disabled="nonaktif">button</button>
  <h1 v-bind="property">Azhril</h1>
  <input :type="type">
  <p>----------------data binding----------------</p>
  {{ count==0? count +1 : count +2 }}
  <p>--------------------v-if-----------------------</p>

  <button v-if="show">Submit</button>
  <br><br>
  <button v-show="show">Submit</button>
  <br><br>

  <div v-if="count"></div>

  <div v-if="count == 1"> number 1 </div>

  <div v-else-if="count == 2"> number 2 </div>
  
  <div v-else="count == 3"> lebih dari 2 </div>


  
  <p>--------------------competed dan method-----------------------</p>
  <button @click="counterNumber">{{ counterButton }}</button>
  <br><br>
  <button @click="countComputed"> Computed : {{ numberComputed }}</button>
  <br><br>
  <input :type="typeInput">
  <button @click="showPassword">show password</button>
  <p>--------------------------------------------------------------</p>




  <p>--------------------class dan style-----------------------</p>
  <ul>
    <li class="fs" :class="{active:isActive, fs40px:isActive }">
      doly
    </li>
  </ul>
  <button @click="ubahwarna">Ubah Warna</button>
  <p>--------------------------------------------------------------</p>




  <p>--------------------list rendering-----------------------</p>
  <ul>
    <li v-for="(item,index) in daftarRombel"> {{ index++ }}. {{ item }} </li>
  </ul>
  <p>--------------------------------------------------------------</p>

  <p>--------------------v-model-----------------------</p>

  <input type="text" v-model="inputRombel">
  {{ inputRombel }}

</template>

<script>
export default{
  data(){
    return{
      inputRombel:'',
      daftarRombel:['PPLG XI-4', 'PPLG XI-5', 'PPLG XI-6'],
      typeInput: 'password',
      counterButton : 0 ,
      numberComputed : 0 ,
      show: true,
      count: 0,
      nama : 'Nama : DexT',
      nis : 'Nis : 12209210',
      rombel : '<p>Rombel : PPLG XI-5 </p>',
      nonaktif : false,
      property: {
        id: 1,
        class: 'color'
      },
      type:'password',
      isActive:true
    }
  },
  methods: {
    counterNumber() {
      this.counterButton += 1;
    },
    showPassword() {
    if(this.typeInput=='password'){
      this.typeInput = 'text';
    } else{
      this.typeInput = 'password';
    }
    }, 
    ubahwarna() {
    if(this.isActive){
      this.isActive = false;
    }else {
      this.isActive = true;
    }
    }
    },
    computed:{
      countComputed(){
        this.numberComputed += 6;
    }
  },
}
</script>

<style>
.color{
color: red;
}

.fs40px{
  font-size: 20px;
}

.active{
  color: blue;
}

</style>