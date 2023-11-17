<template>
  <div>
    <card
      v-for="(item, index) in cardContents"
      :key="index"
      :judul="item.title"
      :desc="item.desc"
      :image="item.image"
      :img="item.img"
      :name="item.name"
      :date="item.date"
    >
    </card>
  </div>
</template>

<script>
// Panggilan file
import Card from "@/components/Card.vue";
export default {
  components: {
    Card,
  },
  data() {
    return {
      cardContents: [
        {
          title: " TOKYO ",
          name: "Ahmad Hafidz",
          desc: `
            <p>  Lorem ipsum dolor sit amet consectetur adipisicing elit. In ab beatae possimus ut magni veniam enim sed porro, ducimus fugiat, accusamus repellat quam? Nam, beatae, run batae trun base.</p>`,
          image: "tokyo.jpg",
          img: "foto.jpg",
          date: "13 - 12 - 2006",
        },
        {
          title: "EVEREST",
          name: "Ahmad Hafidz",
          desc: `
            <p>  Lorem ipsum dolor sit amet consectetur adipisicing elit. In ab beatae possimus ut magni veniam enim sed porro, ducimus fugiat, accusamus repellat quam? Nam, beatae, run batae trun base.</p>`,
          image: "gnng.jpg",
          img: "foto.jpg",
          date: "13 - 12 - 2006",
        },
      ],
    };
  },
};
</script>

<style></style>
