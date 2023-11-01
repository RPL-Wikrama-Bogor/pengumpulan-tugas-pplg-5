<template>
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image">
    <small>created by: @sitamvan</small>
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
          title: "Wahyu :",
          text: `<ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, esse!</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                </ul>`,
          image: 'satir.jpeg',
        },
        {
          title: "Ucup :",
          text: `<ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, esse!</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                </ul>`,
          image: 'lah.jpeg',
        }
      ]
    }
  }
}
</script>

<style></style>
