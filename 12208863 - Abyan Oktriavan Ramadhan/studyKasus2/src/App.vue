<template>
  <div>
    <card v-for="(item, index) in cardContent" :key="index" :title="item.title" :text="item.text" :image="item.image" :tgl="item.tgl" :akun="item.akun" :pp="item.pp">
    <!-- lodingan yang ada di tengah component bakal masuk ke slot -->
    <small>create by: me</small>
    </card>
  </div>
</template>

<script>
// panggil file
import card from '@/components/card.vue';
export default {
  // componenet apa saja yang akan di tampilkan
  components: {
    // mendefinisikan component agar bisa digunakan di template
    card,
  },
  data(){
    return{
      cardContent: [
        {
          title: 'Barang ini adalah barang terbagus yang pernah saya bali dikarenakan nganu',
          text: `Jadi ini adalah deskripsi yang mendeskripsikan barang yang di ada di samping kiri di situ adalah gambar yang menarik `,
          image: 'ss.png',
          tgl: '20 April 2023',
          akun: 'Abyan Oktriavan Ramadhan',
          pp: 'profil.png',
        },
        {
          title: 'Ini adalah gambar orang yang sedang dadah tidak banyak komen dari saya tentang orang ini di karenakan begitu',
          text: `menurut saya koding itu cukup menyenangkan di karenakan sangat menyenangkan yess tepat sekali menyenangkan`,
          image: 'bronya.jpg',
          tgl: '20 Oktober 2023',
          akun: 'Mthxoc',
          pp: 'pp.png',
        }
      ]
    }
  }
}

</script>

<style>
</style>