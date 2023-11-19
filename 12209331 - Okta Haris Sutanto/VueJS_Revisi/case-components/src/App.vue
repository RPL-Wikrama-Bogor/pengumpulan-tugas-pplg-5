<template>
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image">
    <small>created by: @vlykz_</small>
  </Card>
</template>

<script>
// panggil file
// tanda @ fungsinya untuk = mewakilkan src
import Card from "@/components/Card.vue";
export default {
  // component apa saja yang akan ditampilkan
  components: {
    // definisi component agar bisa digunakan di template
    Card,
  },
  // menampung variable
  data() {
    return {
      cardContents: [
        {
          title: "Cara Makan Mie :",
          text: `<ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, esse!</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                </ul>`,
          image: 'kuma.jpg',
        },
        {
          title: "Cara Seduh Mie :",
          text: `<ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, esse!</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                </ul>`,
          image: 'peter.jpeg',
        }
      ]
    }
  }
}
</script>

<style></style>
