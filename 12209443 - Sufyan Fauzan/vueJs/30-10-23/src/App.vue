<template>
  <p>--------- Templating --------</p>
  <p>{{ nama }}</p>
  <p>{{ number }}</p>
  <div v-html="kelas"></div>
  <div v-html="ig"></div>
  <!-- v html = directive / agar eleman html tidak tampil  -->
  <br>
  <hr>
  <br>
  <p>--------- Data Binding --------</p>
  <button :disabled="nonakitf">button</button>
  
  <h1 v-bind="property">test</h1>
  <!-- memberi class dan id dari function -->
  
  <input :type="typeInput" v-model="nama">
  <br><br>
  {{ count == 0 ? count + 1 : count + 2 }}
  
  <br>
  <hr>
  <br>
  <p>--------- V IF --------</p>
  <button v-if="show">submit</button>
  <button v-show="show">Kirim</button>
  <div v-if="count == 1">number 1</div>
  <div v-else-if="count == 2">number 2</div>
  <div v-else>number 3</div>
  <p>---compoted and method------</p>
  <input :type="typeInput">
  <button @click="showPassword">show</button>
  <!-- <button @click="counterNumber">{{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button> -->
  <p>---class and style------</p>
  <ul>
    <li :class="{ active: isActive, fs40px: isActive }">
      test
    </li>
  </ul>

  <button @click="ubahWarna">ubah warna</button>

  <p>--------- List Rendering --------</p>
  <ul>
    <li v-for="(item, index) in daftarKelas">{{ index+1 }} {{ item }}</li>
  </ul>

  <p>--------- v-model --------</p>
  <input type="text" v-model="kelass">
  {{ kelass }}
</template>

<script>
export default {
  data() {
    return {
      kelass: '',
      daftarKelas:['PPLG 1', 'PPLG 2', 'PPLG 3'],
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count: 0,

      // templating     
      nama: 'moyy',
      number: 1,
      kelas: '<h3>Penggunaan v-html</h3>',
      ig: '<a href="instagram.com">ig basuki</a>',

      // data binding
      nonakitf: true, // method handler
      // memberikan id 1 dan class color
      property: {
        id: 1,
        class: 'color'
      },
      typeInput: 'password',
      isActive: true
    }
  },
  // objek method
  methods: {
    counterNumber() {
      this.counterButton += 1;

    },
    showPassword() {
      if (this.typeInput == 'password') {
        this.typeInput = 'text';
      } else {
        this.typeInput = 'password';
      }
    },
    ubahWarna() {
      if (this.isActive) {
        this.isActive = false;
      } else {
        this.isActive = true;
      }
    }
  },
  computed: {
    countComputed() {
      this.numberComputed += 5;
    }
  }
}

</script>

<style>
.color {
  color: blue;
}

.fs40px {
  font-size: 40px;
}

.active {
  list-style: none;
  color: green;
}
</style>