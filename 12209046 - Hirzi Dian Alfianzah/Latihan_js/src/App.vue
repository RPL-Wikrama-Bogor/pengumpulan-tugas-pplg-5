<template>
  <p>-----------------------Tamplating-----------------------</p>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"></div>

  <p>-----------------------data binding-----------------------</p>
  <button :disabled="nonaktif">Button</button>
  <h1 v-bind="property">Hirzi</h1>
  <input type="text" />

  <p>-----------------------Javascript Expressions-----------------------</p>
  {{ count == 0 ? count + 1 : count + 2 }}

  <p>-----------------------V-if & V-show------------------------</p>
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

  <p>-----------------------Computed dan methods-----------------------</p>
  <input :type="typeInput" />
  <button @click="showPassword">Show Password</button>
  <br /><br />
  <button @click="counterNumber">methods {{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button>

  <p>-----------------------class dan style-----------------------</p>
  <ul>
    <li class="fs" :class="{ active: isActive, fs40px: isActive }">(❁´◡`❁)</li>
  </ul>
  <button @click="ubahWarna">Ubah Warna</button>

  <p>-----------------------List Rendering-----------------------</p>
<ul>
  <li v-for="(item, index) in daftarKelas">{{ index +1 }} {{ item }}</li>
</ul>

<p>-----------------------V-Model-----------------------</p>
  <input type="text" v-model="Inputkelas">{{ Inputkelas }}
</template>

<script>
export default {
  data() {
    return {
      Inputkelas: '',
      daftarKelas:['RPL 1', 'RPL 2', 'RPL 3'],
      typeInput: "password",
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count: 3,
      nama: "Hirzi",
      number: 1,
      kelas: "<h1>kelas</h1>",
      nonaktif: false,
      property: {
        id: 1,
        class: "color",
      },
      type: "text",
      isActive: true,
    };
  },
  //Methods bisa ci click sebanyak banyaknya
  methods: {
    counterNumber() {
      this.counterButton += 1;
    },

    showPassword() {
      if (this.typeInput == "password") {
        this.typeInput = "text";
      } else {
        this.typeInput = "password";
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
  //Computed hanya bisa di clik sesuai dengan yang sudah ada
  computed: {
    countComputed() {
      this.numberComputed += 1;
    },
  },
};
</script>

<style>
.color {
  color: red;
}

.fs {
  font-size: 20px;
}

.fs40px {
  font-size: 40px;
}

.active {
  color: red;
}
</style>
