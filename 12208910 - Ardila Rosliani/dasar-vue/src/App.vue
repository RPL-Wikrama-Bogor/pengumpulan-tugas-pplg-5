<template>
  <p>-------------templating---------------</p>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"></div>


  <p>-------------data binding-------------</p>
  <button :disabled="nonaktif">button</button>
  <h1 v-bind="property">zae </h1>
  <input :type="typeInput">


  <p>-------------data binding-------------</p>
  {{ count == 0 ? count + 1: count + 2 }}  


  <p>-------------v-if-------------</p>
  <button v-if="show">Submit</button>
  <button v-show="show">Submit</button>

  <div v-if="count == 1">
    number 1
  </div>
  <div v-else-if="count == 2">
    number 2
  </div>
  <div v-else="count">
    lebih dari 2
  </div>


  <p>-------------complited dan method-------------</p>
  <button @click="counterNumber">methods {{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button>
  <br> <br>
  <input :type="typeInput">
  <button @click="showPassword">show password</button>
  

  <p>-------------class dan style-------------</p>
  <ul>
  <li class="fs" :class="{active:isActive, fs40px:isActive}">
    test
  </li>
</ul>
<button @click="ubahWarna">ubah warna</button>


<p>-------------List Rendering-------------</p>
<ul>
  <li v-for="(item, index) in daftarKelas">{{ index+1 }}.{{ item }}</li>
</ul>


<p>-------------v-model-------------</p>
<input type="text" v-model="inputKelas">{{ inputKelas }}



</template>

<script>
  export default{
    data(){
      return {
        inputKelas: '',
        daftarKelas:['RPL 1', 'RPL 2', 'RPL 3'],
        typeInput: 'password',
        counterButton: 0,
        numberComputed: 0,
        show: false,
        count: 1,
        nama: 'Ardila',
        number: '1',
        kelas: '<h1> Kelas 11</h1>',
        nonaktif: false,
        property: {
          id: 1,
          class: 'color'
        },
        typeInput: 'password',
        isActive:true
      }
    },
    methods: {
    counterNumber(){
      this.counterButton += 1;
      // alert(this.counterButton)
    },
    showPassword(){
      if(this.typeInput == 'password'){
        this.typeInput = 'text';
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
      },
    computed: {
      countComputed(){
        this.numberComputed += 1;
      }
    }
  }
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