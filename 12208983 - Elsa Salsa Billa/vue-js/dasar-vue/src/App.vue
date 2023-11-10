<template>
  <!-- template buat naro html nya -->
  <p>-------------templating-----------</p>
  {{ nama }}
  {{ number }}
  <!-- untuk menampilkan variabel -->
  <div v-html="kelas"></div>
  <!-- v- : binding (dinamis) bisa diganti jadi titik dua(:) -->
  <!-- bukan teks biasa tapi ngambil variabel -->
  <p>-------------data binding-----------</p>
  <button :disabled="nonaktif">button</button>
  <h1 v-bind="property">SMK Wikrama</h1>
  <input :type="typeInput">
  <!-- bukan type nya tapi manggil variable -->
  <p>-------------data binding-----------</p>
  <!-- ternari -->
  <!-- if count==0 + 1
        else + 2 -->
  {{ count == 0 ? count + 1 : count + 2 }}
 <!-- kalo kondisinya cuman nampilin teks berarti pake ternari
      tapi kalo selain teks pakenya binding -->

      <!-- jika lebih dari 1
      count== 0 ? count + 1? count== 1? count + 2? : ? : -->
  <p>-------------v-if-----------</p>

  <button v-if="show">submit</button>
  <button v-show="show">submit</button>
  <!-- show : hidden -->

  <!-- CONTOH BINDING -->
  <div v-if="count==1">
    number 1
  </div>
  <div v-else-if="count==2">
    number 2
  </div>
  <div v-else>
    lebih dari 2
  </div>
  <p>-------------computed and methods-----------</p>
  <input :type="typeInput">
  <button @click="showPasssword">show password</button>


  <!-- <button @click="counterNumber">Method {{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button> -->
  <p>-------------class and style-----------</p>

  <ul>
    <!-- kalo lebih dari 1 variabel, binding nya pake kurung kurawal -->
    <li :class="{active:isActive, fs40px:isActive}">
      <!-- tipe data nya harus bolean -->
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>
  <!-- @click = onclick -->
  <p>-------------list rendering-----------</p>
  <ul>
    <li v-for="(item,index) in daftarKelas">{{ index+1 }}{{ item }}</li>
    <!-- item = 1, daftarKelas = banyak -->
    <!-- yg wajib ada itu item -->
  </ul>

  <p>-------------v-model-----------</p>
  <input type="text" v-model="Inputkelas">{{ Inputkelas }}
  <!-- v-model : name -->

</template>

<script>
//script buat naro js nya
export default{
  data(){
    return{
      //RETURN UNTUK MENGEMBALIKAN DATA AGAR BISA DIGUNAKAN
      Inputkelas: ' ',
      daftarKelas:['RPL 1', 'RPL 2', 'RPL 3'],
      typeInput: 'password',
      counterButton: 0,
      numberComputed:0,
      show:true,
      count: 2,
      nama: 'elsa',
      number: 3,
      kelas:'<h1>kelas 11</h1>',
      nonaktif:true,
      property:{
        //tipe data object
        id:1,
        class:'color'
      },
      typeInput: 'password',
      isActive:true
    }
  },
  methods:{
    //function nya bisa dipanggil berkali-kali
    counterNumber(){
      this.counterButton += 1;
    },
    showPasssword(){
      if(this.typeInput=='password'){
        this.typeInput = 'text';
      } else{
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
    //functionnya cuman bisa dipanggil sekali
    countComputed(){
      this.numberComputed += 1;
    }
  }
}
</script>

<style>
.color{
  color:rgb(57, 172, 178);
}
.fs40px{
  font-size: 40px;
}
.active{
  color:brown;
}
</style>