<template>
  <Card v-for="(item, index) in cardContent" :key="index" :judul="item.judul" :text="item.text" :img="item.img" :nama="item.nama" :tanggal="item.tanggal">
    <small>created by: saya</small>
  </Card>
</template>

<script>
// memanggil file
import Card from '@/components/Card.vue';
export default {
  // components apa saja yang ditampilkan
  components: {
    //mendefinisikan componen agar bisa digunakan di template
    Card,
  },
  data() {
    return {
      cardContent: [
        {
          judul: 'Shift the overall look and feel by adding these wonderful touches to furniture in your home',
          text: `Ever been in a room and felt like something was minssing? Perhaps it felt slightly bare and uninviting.`,
          img: 'gambar1.jpg',
          nama: 'Michelle Appletond',
          tanggal: '1 November 2023',

        },
        {
          judul: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
          text: `Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam voluptas fugit odio quibusdam culpa eos`,
          img: 'gambar2.jpg',
          nama: 'Michelle Appletond',
          tanggal: '1 November 2023',
        }
      ]
    }
  }
}
</script>

<style>

</style>