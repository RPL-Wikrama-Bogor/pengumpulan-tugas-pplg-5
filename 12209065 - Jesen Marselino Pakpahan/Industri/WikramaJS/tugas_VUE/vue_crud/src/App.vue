<template>
  <div>
    <input type="text" placeholder="Masukkan Nama" v-model="formDataKelas.nama">
    <br>
    <input type="text" placeholder="Masukkan Kelas" v-model="formDataKelas.kelas">
    <br>
    <button @click="tambahKelas">Tambah Siswa</button>

    <table>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(murid, index) in datakelas" :key="index">
        <td>{{ index+1 }}</td>
        <td>{{ murid.nama }}</td>
        <td>{{ murid.kelas }}</td>
        <td><button @click="hapusDataKelas(murid.id)">Hapus Data</button></td>
      </tr>
    </table>
  </div>
</template>
<script>
export default {
  data() {
    return {
      datakelas: [{
        nama : 'Louis',
        kelas: '16'
      }],
      formDataKelas:{
        nama: '',
        kelas: ''
      }
    }
  },
  methods: {
    tambahKelas() {
      this.formDataKelas.id = Date.now();

      this.datakelas.push(this.formDataKelas);
      this.formDataKelas = {
        nama: '',
        kelas: '' 
      }
    },
    hapusDataKelas(id){
      this.datakelas = this.datakelas.filter(item => item.id != id);
    }
  }
}
</script>