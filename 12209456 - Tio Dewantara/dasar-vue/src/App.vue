<template>
  <p>------------templating------------</p>
{{ nama }}
{{ number }}
<div v-html="kelas"></div>

<button :disabled="nonaktif">button</button>
<h1 v-bind="property">Tio</h1>
<input :type="typeInput">
<p>----------data binding------------</p>
<!-- {{ count +1 }} -->
{{ count == 0 ? count + 1 : count + 2  }}
<p>---------------v-if------------------</p>
<button v-if="show">submmit</button>
<button v-show="show">submmit</button>
<div v-if="count == 1">
</div>
<div v-else-if="count == 2">
</div> 
 <div v-else>

  lebih dari 2
  </div>

  <p>---------------compoted dan methods------------------</p>


  <input :type="typeInput">
  <button @click="showPassword"> show password</button>


  <!-- <button @click="counterNumber">methods{{ counterbotton }}</button>
  <button @click="countComputed">Computed{{ numberComputed }}</button> -->

  <p>---------------class dan style------------------</p>
  <ul>
    <li :class="{active :isActive, fs40px :isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>

<p>---------------list rendering------------------</p>
<ul>
  <li v-for="(item,index) in daftarKelas">{{index+1}}{{item}}</li>
</ul>
<p>---------------v-model------------------</p>
<input type="text" v-model="InputKelas"><br>
{{ InputKelas }}

</template>
<script>
export default{
  data(){
    return{
      InputKelas : '',
      daftarKelas :['RPL 1','RPL 2','RPL 3'],
      typeInput :'password',
      counterbotton: 0,
      numberComputed :0,
      show :false,
      count: 3,
      nama: 'tio',
      number :1,
      kelas :'<h1>kelas 11</h1>',
      nonaktif :false,
      property:{
        id: 1,
        class: 'color'
      },typeInput :'password',
      isActive :true
    }
      
    }, methods: {
      counterNumber(){
        // alert(this.counterBotton)
        this.counterbotton += 1;
  },
  showPassword(){
    // alert('show')
    if(this.typeInput == 'password'){
      this.typeInput ='text';
    }else{
      this.typeInput = 'password';
    }
  },
  ubahWarna(){
    if(this.isActive){
      this.isActive = false;
    }else {
      this.isActive = true;
    }
     
  }

 },
 computed :{
  countComputed(){
    this.numberComputed +=6; 
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
color: green;
}
</style>