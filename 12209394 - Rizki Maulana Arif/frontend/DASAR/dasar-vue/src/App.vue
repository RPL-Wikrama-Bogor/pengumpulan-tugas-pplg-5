<template>
    <p>-----------------Template-----------------------</p>
    {{ nama }}
    {{ number }}
    <div v-html="kelas"></div>
    <p>-----------------data binding-----------------------</p>
    <button :disabled="nonaktif">Pencet Saya</button>
    <h1 v-bind="property">H 1</h1>
  
    <p>----------------- Data Binding -----------------------</p>
    {{ count == 0 ? count + 1 : count + 2 }}
    <p>----------------- v if-----------------------</p>
    <button v-if="show">Button</button>
    <button v-show="show">Submit</button>
    <div v-if="count == 1">Number 1</div>
  
    <div v-else-if="count == 2">Number 2</div>
  
    <div v-else>lebih dari 2</div>
    <p>------------ computed and method --------=-=-=-=-=-</p>
    <button @click="counternumber">method {{ counterbutton }}</button>
    <button @click="countComputed">Computed {{ numberComputed }}</button><br />
    <input :type="type" />
    <button @click="showPw">show password</button>
    <p>------------------class and binding style------------------</p>
    <ul>
      <li
        :class="{
          active: isActive,
          gede: gede,
          keren: keren,
        }"
      >
        Wk Garut
      </li>
    </ul>
    <button @click="ubahwarna">ubah warna</button>
    <button @click="ubahukuran">jadi gede</button>
    <button @click="ubahfont">jadi keren</button>
    <p>-----list rendering -----</p>
    <ul>
        <li v-for="( bua,index) in buah">{{index += 1}} {{ bua }}</li>
    </ul>
    <p>--------------------v-model-----------------------</p>
  <input type="text" v-model="Inputkelas">
  {{ Inputkelas }}

  </template>
  
  <script>
  export default {
    tata() {
      return {
        buah : ['mangga','apel','kucing','naga','kristen'],
        gede: false,
        isActive: false,
        keren : false,
        numberComputed: 0,
        counterbutton: 0,
        show: true,
        count: 1,
        nama: "Simon",
        number: 1,
        kelas: "<h1> PPLG XI - 5 </h1>",
        nonaktif: false,
        property: {
          id: 1,
          class: "color",
        },
        type: "password",
      };
    },
    methods: {
      counternumber() {
        this.counterbutton += 1;
      },
      showPw() {
        if (this.type == "password") {
          this.type = "text";
        } else {
          this.type = "password";
        }
      },
      ubahwarna() {
        if (this.isActive) {
          this.isActive = false;
        } else {
          this.isActive = true;
        }
      },
      ubahukuran() {
        if (this.gede) {
          this.gede = false;
        } else {
          this.gede = true;
        }
      },
      ubahfont() {
        if (this.keren) {
          this.keren = false;
        } else {
          this.keren = true;
        }
      },
    },
    computed: {
      countComputed() {
        this.numberComputed += 6;
      },
    },
  };
  </script>
  
  <style>
  .color {
    color: red;
  }
  .active {
    color: lightgreen;
  }
  .gede {
    font-size: 70px;
  }
  .keren{
    font-family: cursive;
    font-weight:900;
  }
  </style>
  