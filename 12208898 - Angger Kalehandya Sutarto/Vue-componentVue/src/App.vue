<template>
  <div class="row-service">
    <card v-for="item in data" :title="item.title" :description="item.description">
      <p> {{ item.date }} </p>
    </card>
  </div>
  <MyBtn id="btn1" name="btn"></MyBtn>
  <MyBtn id="btn2" name="btn2"></MyBtn>
</template>

<script>
import card from "@/components/myComponents/card.vue";
export default {
  components: {
    card,
    "card-service": card,
  },
  data() {
    return {
      data: [
        {
          title: "title 1",
          description: "description 1",
          date: '2 November 2023'
        },
        {
          title: 'title 2',
          description: 'description 2',
          date: '6 November 2023'

        }
      ],
    };
  },
};
</script>

<style>
.row-service {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}

.btn-service-global {
  margin-top: 10px;
  font-size: 16px;
  font-weight: 400;
  background-color: rgb(145, 255, 0);
  color: #fff;
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
}
</style>
