<template>
  <div class="container">
    <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :foto="item.image" :pp="item.profile" :nama="item.nama" :tanggal="item.tanggal" :image="item.share"><small></small></Card>
  </div>
</template>

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
          title: 'Kartu pengenal',
          text: `
                <p style="text-align: left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p style="text-align: left">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                `,
          image: 'me.jpg',
          profile: '23.jpg',
          nama: 'Muhammad Khairul',
          tanggal: '31-Oktober-2023',
          share: 'share.png'
        },
        {
          title: 'Kartu pengenal',
          text: `
                <p style="text-align: left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p style="text-align: left">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                `,
          image: 'mee.jpg',
          profile: '23.jpg',
          nama: 'Muhammad Kholqi',
          tanggal: '14-Mei-2023',
          share: 'share.png'
        }
      ]
    }
  }
}
</script>

<style></style>