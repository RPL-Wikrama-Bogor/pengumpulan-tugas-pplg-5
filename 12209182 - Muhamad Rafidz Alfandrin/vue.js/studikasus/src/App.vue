<template>
<div>
  <input type="text" placeholder="Masukan Nama" v-model="formDataKelas.nama">
  <br>
  <input type="text" placeholder="Masukan Kelas" v-model="formDataKelas.kelas">
  <br>
  <button @click="tambahKelas">Tambah Siswa</button>

  <table>
    <tr>
      <th>Id</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Aksi</th>
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
      dataKelas : [{
        id : Date.now(),
        nama : 'Rafidz',
        kelas : '11'
      }],
      formDataKelas : {
        nama : '',
        kelas : ''
      }
    }
  },
  methods: {
    tambahKelas() {
      this.formDataKelas.id = Date.now();
      this.dataKelas.push(this.formDataKelas);
      this.formDataKelas = {
        nama : '',
        kelas : ''
      }
    },
    hapusDataKelas(id) {
      this.dataKelas = this.dataKelas.filter(item => item.id != id);
    }
  }
}
</script>

<style>
input, button {
  margin: 5px;
  padding: 5px;
}

button {
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}
</style>