<template>
  <div>
    <center><h2>Isi Nama dan kelas</h2></center>
    <input type="text" placeholder="Masukan Nama" v-model="formData.nama" />
    <br />
    <input type="text" placeholder="Masukan Kelas" v-model="formData.kelas" />
    <br />
    <button @click="tambahKelas">Tambah Siswa</button>

    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Aksi</th>
        </tr> 
      </thead>
      <tbody>
        <tr v-for="(murid, index) in dataKelas" :key="index">
          <td>{{ index + 1 }}</td>
          <td>{{ murid.nama }}</td>
          <td>{{ murid.kelas }}</td>
          <td><button @click="hapusDataKelas(murid.nama)">Hapus</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  data() {
    return {
      dataKelas: [
        {
          nama: "Hirzi",
          kelas: "11",
        },
      ],
      formData: {
        nama: "",
        kelas: "",
      },
    };
  },

  methods: {
    tambahKelas() {
      this.formData.id = Date.now();
      this.dataKelas.push(this.formData);
      this.formData = {
        nama: "",
        kelas: "",
      };
    },
    hapusDataKelas(nama) {
      this.dataKelas = this.dataKelas.filter((item) => item.nama !== nama);
    },
  },
};
</script>

<style>
/* Style for the input fields and button */
input[type="text"] {
  width: 100%;
  padding: 10px;
  margin: 5px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

/* Style for the table */
table {
  width: 100%;
  border-collapse: collapse;
}

th,
td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

button[data-action="hapus"] {
  background-color: #ff5555;
}

button[data-action="hapus"]:hover {
  background-color: #cc0000;
}
</style>
