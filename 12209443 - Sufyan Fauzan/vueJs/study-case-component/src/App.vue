<template>
  <!-- item.title ada titik untuk memanggil objek -->
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image"
    :name="item.name" :date="item.date" :profile="item.profile">
    <!-- kodingan yg ada di tengah component bakal masuk ke slot -->
    <small> created by : </small>
  </Card>
</template>
<script>
// panggil file
import Card from '@/components/Card.vue'
export default {
  // component apa saja yg akan ditampilkan
  components: {
    Card,
  },
  data() {
    return {
      cardContents: [
        {
          title: 'Boo',
          text: `<ul>
          <li>Boo adalah karakter fiksional dari film animasi Monster, Inc. yang pertama kali rilis pada November 2001. Animasi ini diproduksi oleh Pixar Animation Studios dan didistribusikan oleh Walt Disney Pictures.</li>
          <li>Animasi Monster, Inc. sendiri punya cerita lucu yang super seru. Selain itu, karakter Boo yang menggemaskan pun sukses mencuri perhatian penonton.</li>
          </ul>`,
          image: 'foto2.jpeg',
          name: 'Sufyan Fauzan',
          date: '8 January 2024',
          profile: 'profile.jpg',
        }, {
          title: 'Kobo Kanaeru',
          text: `<ul>
          <li>Salah satu vtuber besar yang dimiliki dunia dan berasal dari Indonesia, Kobo Kanaeru adalah vtuber dari agensi Hololive. Sejak kemunculannya, Kobo banyak membuka peluang untuk komunitas vtuber dan mengenalkannya kepada penonton Indonesia.</li>
          </ul>`,
          image: 'kobo.jpeg',
          name: 'Basuki',
          date: '16 Mei 2007',
          profile: 'profile.jpg',
        }
      ]
    }
  }
}

</script>
<style></style>