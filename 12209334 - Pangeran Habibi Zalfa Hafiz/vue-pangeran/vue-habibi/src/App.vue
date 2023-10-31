computed:{
  countComputed(){
    this.numberComputed+=1;
  }
  <template>
    <div>
      <p>------------templating-------------</p>
      <p>{{ nama }}</p>
      <p>{{ nis }}</p>
      <div v-html="kelas"></div>
      <p>------------data binding-----------</p>
  
      <button :disabled="nonaktif">button</button>
      <h1 :id="property.id" :class="property.class">hai rojak</h1>
      <input :type="type" />
      {{ count === 0 ? count + 1 : count + 2 }}
      <br /><br /><br />
      <button v-if="show">submit</button>
  
      <div v-if="count === 1">satu</div>
      <div v-else-if="count === 2">dua</div>
      <div v-else>tiga</div>
      
      <p>--------------------------------------</p>
      <input :type="typeInput" />
      <button @click="showPassword">show Password</button>
      <p>--------------------------------------</p>
  
      <ul>
        <li class="fs" :class="{ active: isActive }">test</li>
      </ul>
      <button @click="ubahWarna">ubah warna</button>
      <p>-----------------list rendering---------------</p>
      <ul>
        <li v-for="(item,index) in daftarKelas">{{index++}} {{item}}</li>   
      </ul>;
  
      <p>--------------------v-model--------------------</p>
      <input type="text" v-model="inputKelas">
      {{ inputKelas }}

      <br/>
      <button @click="counterNumber">{{ counterButton }}</button>
      <button @click="countComputed">Computed {{ numberComputed }}</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        inputKelas:'',
        daftarKelas:['RPL 1','RPL 2','RPL 3'],
        typeInput: 'password',
        counterButton: 0,
        numberComputed: 0,
        show: true,
        count: 0,
        nama: 'Pangeran Habibi',
        nis: 12209334,
        kelas: '<h1>asep</h1>',
        nonaktif: true,
        property: {
          id: 1,
          class: 'color',
        },
        type: 'password',
        isActive: false,
      };
    },
    methods: {
      counterNumber() {
        this.counterButton += 1;
      },
      showPassword() {
        this.typeInput = this.typeInput === 'password' ? 'text' : 'password';
      },
      ubahWarna() {
        this.isActive = !this.isActive;
      },
    },
    computed:{
      countComputed(){
        this.numberComputed+=1;
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
    color: blue;
  }
  </style>
  