<template>
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :img="item.img" :profil="item.profil" :akun="item.akun" :date="item.date">
  </Card>
</template>

<style>
body {
  background-color: antiquewhite;
}
</style>

<script>
import Card from '@/components/Card.vue';
export default {
  components: {
    Card,
  },
  data() {
    return {
      cardContents: [
        {
          title: 'Kucing yang kebingungan',
          text: `ini adalah salah satu kucing yang kebingungan`,
          img: 'kucing.jpeg',
          profil: 'spiderman.jpeg',
          akun: 'Johnatan kevin L',
          date: '29 November 2023'
        },
        // {
        //   title: 'Cara Makan',
        //   text: `Ini adalah salah satu minuman yang sangat enak`,
        //   img: 'mangga.jpg',
        //   profil: 'spidergirl.jpeg',
        //   akun: 'Shima Mahiru',
        //   date: '12 September 2023'
        // }
      ]
    }
  }
}
</script>

<style></style>