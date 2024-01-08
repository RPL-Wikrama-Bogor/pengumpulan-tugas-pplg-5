<template>
  <Card v-for="(item, index) in cardContents" :key="index" :title="item.title" :text="item.text" :img="item.img"></Card>
</template>

<script>
// panggilan file
import Card from "@/components/Card.vue";

export default {
  // component apa saja yang akan ditampilkan
  components: {
    // definisi component agar bisa di gunakan di template
    Card,
  },
  data() {
    return {
      cardContents: [
        {
          title: "How to Drink Water: ",
          text: `<ol>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, vel.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, vel.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, vel.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, vel.</li>
                </ol>`,
          img: 'kucing2.jpg'
        },
        {
          title: "How to Eat For Pemula: ",
          text: `<ol>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, vel.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, vel.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, vel.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, vel.</li>
                </ol>`,
                img: 'randomAngger.jpg'
        },
      ],
    };
  },
};
</script>

<style></style>
