<template>
  <p>-------------Templating---------------</p>
  Nama : {{ name }}
  <br>
  Absen : {{ angka }}
  <div v-html="kelas"></div>
  <p>-------------Data Binding---------------</p>
  <button @click="mengurangi">-</button>
  <span>{{ count }}</span>
  <button @click="menambah">+</button>+
  
  <br><br>
  <button :disabled="tombol">kirim</button>
  <h1 v-bind="property">z</h1>
  <input :type="typeInput" @keydown.enter="sayHello('saya hafidz')">
  <br><br>
  <p>-------------Data Binding---------------</p>
  {{ count == 0? count+1 : count+2  }}
  <p>------------- V - If ---------------</p>
  <div v-if="show">submit</div>
  <div v-show="show">submit</div>
  <div v-if="banding == 0">
    hai ini if
  </div>
  <div v-else-if="banding == 1">
    hai ini else if
  </div>
  <div v-else>
    hai ini else
  </div>
  <p>------------- computed dan method ---------------</p>
  <input :type="typeInput">
  <button @click="showPassword">show password</button>
  <br>
  <!-- <button @click="counterNumber">{{ counterButton }}</button>
  <button @click="countComputed"> Computed {{ numberComputed }} </button> -->
  <p>------------- class dan style ---------------</p>
  <ul>
    <li :class="{
      active:isActive,
      fs40px:isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">Ubah warna</button>
  <p>------------- list rendering ---------------</p>
<ul>
  <li v-for="(items,index) in daftarKelas">{{ items }} {{ index+1 }}</li>
</ul>
<p>------------- v model ---------------</p>
<input type="text" v-model="inputKelas">
{{ inputKelas }}
</template>

<script>
export default{
  data(){
    return{
      inputKelas : '',
      daftarKelas : ['RPL 1', 'RPL 2', 'RPL 3'],
      typeInput : 'password',
      counterButton : 0,
      numberComputed : 0,
      show : true ,
      count : 0,
      name : 'hafidz',
      angka : 2,
      kelas : '<h1>Hai</hai>',
      tombol : false,
      banding : 0,
      property : {
          id : 1,
          class : 'color'
      },
      typeInput : 'password',
      isActive : true
    }
  },
  methods: {
    sayHello(nama){
      alert(`hallo ${nama}`)
    },
    mengurangi(){
      this.count--;
    },
    menambah(){
      this.count++;
    },
    counterNumber(){
      this.counterButton++
    },
    showPassword(){
      if (this.typeInput == 'password') {
        this.typeInput = 'text';
      } else {
        this.typeInput = 'password';
      }
    },
    ubahWarna() {
      if(this.isActive) {
        this.isActive = false;
      } else {
        this.isActive = true;
      }
    }
  },
  computed : {
    countComputed(){
      this.numberComputed ++
    }
  }
}

</script>

<style>

.color {
  color : red;
}
.fs40px {
  font-size: 40px;
}
.active {
  color : blue;
}
</style>