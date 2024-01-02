<!-- wajib ada template jika tidak ada maka tidak akan jalan -->
<template>
  <p>- - - - - - - - - - - Templating- - - - - - - - - - - -</p>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"></div>

  <p>- - - - - - - - - - - Data Binding- - - - - - - - - - - -</p>
  <button :disabled="nonaktif">Submit</button>
  <h1 v-bind="propery">Kalenyyyy</h1>
  <input :type="type" />

  <p>- - - - - - - - - - - Javascript Expressions- - - - - - - - - - - -</p>
  {{ count == 0 ? count + 1 : count + 2 }}

  <p>- - - - - - - - - - - V-if & V-show- - - - - - - - - - - -</p>
  <button v-if="show">Submit</button>
  <button v-show="show">Submit 2</button>

  <div v-if="count == 1">
    number 1
  </div>
  <div v-else-if="count == 2">
    number 2
  </div>
  <div v-else>
    lebih dari 2
  </div>

  <p>- - - - - - - - - - - Computed dan Methods- - - - - - - - - - - -</p>
  <input :type="typeInput">
  <button @click="showPassword">Show Password</button>
  <!-- <button @click="counterNumber">Method {{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button> -->

  <p>- - - - - - - - - - - Class dan Style- - - - - - - - - - - -</p>
  <ul>
    <li :class="{ active:isActive, fs:isActive }">
      test
    </li>
  </ul>
  <button @click="changeColor">Ubah Warna</button>

  <p>- - - - - - - - - - - list Rendering - - - - - - - - - - - -</p>
  <ol>
    <li v-for="item in daftarKelas">{{ item }}</li>
  </ol>

  <p>- - - - - - - - - - - Form Binding - - - - - - - - - - - -</p>
  <input type="text" v-model="inputKelas">
  {{ inputKelas }}
</template>

<script>
export default {
  data() {
    return {
      inputKelas:'',
      daftarKelas: ['RPL 1', 'RPL 2', 'RPL 3'],
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count: 2,
      nama: "Tulus",
      number: 1,
      kelas: "<h1>Kelass 11</h1>",
      nonaktif: false,
      propery: {
        id: 1,
        class: "color",
      },
      type: "password",
      isActive: true
    };
  },
  methods: {
    counterNumber(){
      this.counterButton += 1;

    },
    showPassword() {
      if (this.typeInput == 'password') {
        this.typeInput = 'text';
      } else {
        this.typeInput = 'password';
      }
    },
    changeColor(){
      if (this.isActive) {
        this.isActive = false;
      } else {
        this.isActive = true;
      }
    }
  },
  computed:{
    countComputed() {
      this.numberComputed += 1;
    }
  }
}
</script>

<style>
.color {
  color: red;
}

.fs {
  font-size: 20px;
}

.active {
  color: cyan;
}
</style>
