<template>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"></div>
  <button :disabled="nonaktif">button</button>
  <p>----------data binding-------------</p>
  <h1 v-bind="property">zae</h1>
  <input :type="typeInput">
  <p>-----------data binding-------------</p>
  {{ count ==0 ?count +1 :count +2  }}
  <button v-if="show">submit</button>
  <button  v-show="show">submit</button>
  <div v-if="count==1">number 1</div>
  <div v-else-if="count==2">number 2</div>
  <div v-else>lebih dari 2 </div>
  <p>---------------computed and method----------</p>
  <button @click="counterNumber"> methods {{ counterbutton}}</button>
  <button @click="countComputed"> Computed {{ numberComputed}}</button>
  <p>--------------------show password----------</p>
  <input :type="typeInput">
  <button @click="showPassword">show password</button>
  <p>-----------class dan style----------------</p>
  <ul >
    <li class="fs" :class="{active:isActive,fs40px:isActive }">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>
  <p>-----------------list rendering------------------</p>
  <ul>
    <li v-for="(item,index) in daftarkelas">{{index+1}}.{{item}}</li>
  </ul>
  <p>---------------v model--------</p>
  <input type="text" v-model="inputkelas">{{   inputkelas }}
</template>

<script>
export default{
  data(){
    return{
      inputkelas:'',
      daftarkelas:['RPL1','RPL2','RPL3'],
      typeInput: 'password',
      counterbutton : 0,
      numberComputed : 0,
      show:false,
      count:3,
        nama : 'zaenal',
        number : 1,
        kelas : '<h1>KELAS 11</h1>',
          nonaktif :true,
        property : { 
          id : 1,
          class : 'color'
        },
        typeInput : 'password',
        isActive:true

  }
  },
  methods: {
    counterNumber(){
      this.counterbutton += 1;
    },
    showPassword(){
      if(this.typeInput== 'password'){
        this.typeInput ='text';
      }else{
        this.typeInput = 'password';
        
      }
    },
    ubahWarna(){
      if(this.isActive){
       this.isActive = false;
      }else{
        this.isActive = true;
      }
    }
  },
  Computed:{
    countComputed(){
      this.numberComputed += 6;
    }
  }
}
</script>
<style>
.color{
  color:red;
}
.fs40px{
font-size: 40px ;
}
.active{
  color:blue;
}
</style>