<template>
  <div>
    <input type="text" placeholder="masukan nama" v-model="formDataKelas.nama">
    <br>
    <input type="text" placeholder="masukan kelas" v-model="formDataKelas.kelas">
    <br>
    <button @click="tambahKelas">tambah siswa</button>
    <table>
      <tr>
        <th> Id</th>
        <th> Nama</th>
        <th> Kelas</th>
      </tr>
      <tr v-for="(murid, index) in dataKelas" :key="index">
        <td>{{ index + 1 }}</td>
        <td>{{ murid.nama }}</td>
        <td>{{ murid.kelas }}</td>
        <td><button @click="hapusDataKelas(murid.id)">hapus</button></td>
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
        nama : 'radit',
        kelas : '10'
      }],
      formDataKelas: {
        nama : '',
        kelas : ''
      }
    }
  },
  methods : {
    tambahKelas() {
      this.dataKelas.id = Date.now();
      this.dataKelas.push(this.formDataKelas);
      this.formDataKelas = {
        nama : '',
        kelas : ''
      }
    },
    hapusDataKelas(id){
      this.dataKelas = this.dataKelas.filter(item => item.id != id)
    }
  }
}

</script>

<style>
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.form {
  background: #f5f5f5;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
}

button:hover {
  background: #0056b3;
}

.data-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th, td {
  border: 1px solid #ccc;
  padding: 8px;
  text-align: left;
}

th {
  background: #f5f5f5;
  font-weight: bold;
}

button {
  background: #dc3545;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  cursor: pointer;
}

button:hover {
  background: #a01929;
}
</style>