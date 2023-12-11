<template>
  <div>
    <input type="text" placeholder="masukan nama siswa" v-model="formDataKelas.nama">
    <br>
    <input type="text" placeholder="masukan kelas siswa" v-model="formDataKelas.kelas">
    <br>
    <button @click="tambahKelas">Tambah Siswa</button>

    <table>
      <tr>
        <th> Id</th>
        <th> Nama</th>
        <th> Kelas</th>
        <th> aksi</th>
      </tr>
      <tr v-for="(murid, index) in dataKelas" :key="index">
        <td>{{ index + 1 }}</td>
        <td>{{ murid.nama }}</td>
        <td>{{ murid.kelas }}</td>
        <td><button @click="hapusDataKelas(murid.id)">Hapus</button></td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dataKelas: [{
        nama: 'radit',
        kelas: '10'
      }],
      formDataKelas: {
        nama: '',
        kelas: ''
      }
    }
  },

  methods: {
    tambahKelas(){
      this.formDataKelas.id = Date.now();

      this.dataKelas.push(this.formDataKelas);
      this.formDataKelas = {
        nama: '',
        kelas: ''
      }
    },

    hapusDataKelas(id){
      this.dataKelas = this.dataKelas.filter(item => item.id != id);
    }
  }
}
</script>
