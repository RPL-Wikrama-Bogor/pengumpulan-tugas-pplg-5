<template>
  <!-- harus ada template agar bisa berjalan -->
  <p>-----------tempalting-----------</p>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"> </div>
  <!-- setiap apa apa yang di awali dengan "v" itu adalah directive js  -->
  
  <p>-----------data binding-----------</p>
  <button :disabled="nonaktif">button</button>
  <!-- jika nonaktifnya true maka akan di disable begitupun sebaliknya -->
  <h1 v-bind="property">Anime</h1>
  <input :type="typeInput">
  <p>-----------data binding-----------</p>
  {{ count == 0 ? count + 1 : count + 2 }}
  <!-- ternari, mempersingkat perkondisian -->
  <p>-----------v-if-----------</p>
  <button v-if="show">submit</button>
  <button v-show="show">kirim</button>

  <div v-if="count == 1">
  number 1
  </div>
  <div v-else-if="count == 2">
  number 2
  </div>
  <div v-else>
    melebih dari 2
  </div>
  <p>-----------computed dan methods-----------</p>
  <p>method</p>
  <button @click="counterNumber">{{ counterButton }}</button>
  <p>computed</p>
  <button @click="countCompeted">{{ numberComputed }}</button>
  <p>-----------computed dan methods-----------</p>
  <input :type="pass">
  <button @click="showPassword">Show password</button>
  <p>-----------class and style-----------</p>
  <ul>
    <li :class="{active:isActive, fs40px: isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>
  <p>-----------list rendering-----------</p>
  <ol>
    <li v-for="(item, index) in daftarKelas">{{ index+1 }}{{ item }}</li>
  </ol>
  <p>-----------v model-----------</p>
  <!-- untuk mengirim data -->
  <input type="text" name="" id="" v-model="inputKelas">
  <br>
  {{ inputKelas }}

</template>

<script>
// data property
export default {
  data() {
    return {
      inputKelas: '',
      daftarKelas:['RPL 1', 'RPL 2', 'RPL 3'],
      pass: 'password',
      numberComputed: 0,
      counterButton:0,
      show: true,
      count: 1,
      nama: 'Abyan',
      number: 1,
      kelas: '<h1>kelas 11</h1>',
      nonaktif: true,
      property: {
        id: 1,
        class: 'color'
      },
      typeInput: 'text',
      isActive : true,
    }
  },

  methods: {
    counterNumber(){
      this.counterButton += 1;
    },

    showPassword(){
      if(this.pass =='password'){
        this.pass ='text';
      }else{
        this.pass = 'password';
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
  
  
  computed:{
    countCompeted(){
      this.numberComputed +=1 ;
    }
  },
}
</script>

<style>
.color {
  color: red;
}

.fs40px {
  font-size: 40px;
}

.active{
  color: blue;
  list-style: none;
}
</style>