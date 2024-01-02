<template>
  <p>------------templating-------------</p>
  <p>{{ nama }}</p>
  <p>{{ nis }}</p>
  <div v-html="kelas"></div>
  <p>------------data binding-----------</p>
  <button :disabled="nonaktif" >button</button>
  <h1 v-bind="property">hai rojak</h1>
  <input :type="type">
 
  {{ count==0? count + 1 : count + 2 }}
  <br>
  <br>
  <br>
<button v-if="show">submit</button>
  <div v-if="count== 1">
    satu
  </div>
  <div v-else-if="count == 2">
    dua
  </div>
  <div v-else>
    tiga
  </div>
<p>---------------------------------</p>
<ul>
 <li class="fs">
  test
 </li>

</ul>
<input :type="typeInput">
<button @click="showPassword">show Password</button>
<p>----------------class dan
  style------------</p>
  <ul>
    <li class="fs" :class="{ active:isActive }">
    </li>
    <button @click="ubahWarna">ubah Warna</button>
    <p>--------------list rendering-----------</p>
  </ul>
  <p>-----------------v model-------------</p>
  <input type="text" v-model="Inputkelas">
  {{ Inputkelas }}
  <li v-for="(item,index) in daftarkelas">(index++){{item}}</li>
<br>

<button @click="counterNumber">{{ counterButton }}</button>
<button @click="countComputed"> Computed {{ numberComputed }}</button>
</template>

<script>
export default{
  data() {
    return {
      Inputkelas:'',
      daftarKelas:['RPL 1','RPL 2','RPL 3'],
      typeInput: 'password',
      counterButton:0,
      numberComputed:0,
      show:true,
      count:0,
      nama: 'Rizky Dwiansyah',
      nis:12209334,
      kelas:'<h1>uhuy</h1>',
      nonaktif:true,
      property:{
        id: 1,
        class:'color'
      },
      type:'password'
    }
  },
  methods:{
    counterNumber(){
      this.counterButton+=1;
    },
    showPassword(){
      if(this.typeInput=='password'){
        this.typeInput='text';
      }else{
        this.typeInput='password';
      }
    }
  },
  ubahWarna(){
   this.isActive=this.isActive+=1;
    },
  computed:{
    countComputed(){
      this.numberComputed+=1;
      return this.numberComputed+=1;
    },
  }
}
</script>
<style>
.color{
  color:red;
}
.fs{
font-size: 20px;
}
.active{
  color: blue;
}

</style>