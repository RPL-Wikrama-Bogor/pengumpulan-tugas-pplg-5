<template>
    <p>------------Templating-------------</p>
    {{ nama }} {{ number }}
    <div v-html="kelas"></div>

    <p>------------Data binding-------------</p>
    <button :disabled="nonaktifkan">Button</button>
    <h1 v-bind="property">Bed</h1>
    <input :type="type">

    <p>------------Data binding-------------</p>
    {{ count == 0 ? count + 1 : count + 2 }}

    <p>------------v-if-------------</p>
    <button v-if="show">Subbmit</button>
    <button v-show="show">Submit</button>

    <div v-if="count==1">
      number 1
    </div>
    <div v-else-if="count==2">
      number 2
    </div>
    <div v-else>
      lebih dari 2
    </div>

    <p>------------Computed dan methods-------------</p>
    <input :type="typeInput">
    <button @click="showPassword">Show password</button>
    <br><br>
    <button @click="counterNumber" >Methods {{ counterButton }}</button>
    <br><br>
    <button @click="countComputed">Computed {{ numberComputed }}</button>

     <p>------------Class dan style-------------</p>
     <ul>
        <li class="fs" :class="{active:isActive, fs40px:isActive}">
          test
        </li>
     </ul>
     <button @click="ubahWarna">Ubah warna & ukuran</button>

     <p>------------List rendering-------------</p>
     <ul>
        <li v-for="(item, index) in daftarKelas">{{index+1}} {{ item }}</li>
     </ul>

     <p>------------v-model-------------</p>
     <input type="text" v-model="Inputkelas">
     {{ Inputkelas }}
</template>

<script>
    export default{
      data() {
        return {
          Inputkelas: '',
          daftarKelas: ['RPL 1', 'RPL 2', 'RPL 3'],
          typeInput: 'password',
          counterButton: 0,
          numberComputed: 0,
          show: false,
          count: 2,
          nama: 'Ubed',
          number: 1,
          kelas: '<h1>kelas 11</h1>',
          nonaktif: true,
          property: {
            id: 1,
            class: 'color'
          },
          type: 'password',
          isActive: true
        }
      },
      methods:{
        counterNumber() {
          this.counterButton += 1;
        },

        showPassword() {
          if(this.typeInput=='password') {
            this.typeInput = 'text';
          }else {
            this.typeInput = 'password';
          }
        },

        ubahWarna() {
          if(this.isActive) {
            this.isActive=false;
          }else {
            this.isActive=true;
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

    .fs40px {
      font-size: 40px;
    }

    .active {
      color: red;
    }
</style>