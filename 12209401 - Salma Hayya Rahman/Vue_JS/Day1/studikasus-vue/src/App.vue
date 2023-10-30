
<template>
  <body>
  <div class="card">
    <label class="label">Masukan nama</label>
    <input type="text" v-model="formDataKelas.nama" class="input"><br>
    <label class="label">Masukan kelas</label>
    <input type="text" v-model="formDataKelas.kelas" class="input">
    <br>
    <button @click="tambah" class="button">Tambah</button><br>

    <table>
      <tr>
        <th> ID </th>
        <th> Nama </th>
        <th> Kelas </th>
        <th> Aksi </th>
      </tr>
      <tr v-for="(murid, index) in dataKelas" :key="index">
        <td>{{ index + 1 }}</td>
        <td>{{ murid.nama }}</td>
        <td>{{ murid.kelas }}</td>
        <td><button @click="hapusData(murid.id)" class="btnde">hapus</button></td>
      </tr>
    </table>
  </div>
</body>
</template>
<script>
export default {
  data() {
    return {
      dataKelas: [{
        id: Date.now(),
        nama: 'Aurora' ,
        kelas: '10'
      }],
      formDataKelas:{
        nama: '',
        kelas: ''
      }
    }
  },
  methods: {
    tambah() {
      this.formDataKelas.id = Date.now();

      this.dataKelas.push(this.formDataKelas) ;
      this.formDataKelas = {
        nama: '',
        kelas: ''
      }
    },
    hapusData(id){
      this.dataKelas = this.dataKelas.filter(item => item.id != id) ;
    }
  }
}
</script>

<style>
.card{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 30rem;
  height: 30rem;
  margin-right: -15rem;
  border-radius: 5px;
  background-color: #B4B4B3;
}
.label{
  margin-left: -8.7rem;
}
.input{
  height: 2rem;
  width: 15rem;
  border: none;
  border-radius: 5px;
  background-color: #F1EFEF;
}
.button{
  margin-bottom: 1rem;
  height: 2rem;
  width: 5rem;
  background-color: #F1EFEF;
  border: 2px solid #CCC8AA;
  border-radius: 5px;
}
.btnde{
  color:white;
  background-color: red;
  border: none;
  border-radius: 4px;
  height: 1.5rem;
}
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
  padding: 5px 15px;
}
th{
  background-color: #D0D4CA;
}
</style>