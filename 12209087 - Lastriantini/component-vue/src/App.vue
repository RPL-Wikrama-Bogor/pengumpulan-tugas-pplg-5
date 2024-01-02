<template>
  <div class="row-service">
    <card v-for="item in data" :title="item.title" :description="item.description">
    <p>{{ item.date }}</p>
    </card>
    <!-- <card-service title="title 2" description="description 2"></card-service> -->
  </div>
  <button class="btn-service">Detail</button>
  <button id="btn1" name="btn"></button>
  <button id="btn2" name="btn2"></button>
  <MyBtn></MyBtn>
</template>

<script>
import Card from '@/components/my-components/Card.vue';
export default {
  components: {
    Card,
    'card-service': Card,
  },
  data() {
    return {
      data: [
        {
          title: 'title 1',
          description: 'description 1',
          date: '31 oktober 2021',
        }, {
          title: 'title 2',
          description: 'description 2',
          date: '31 oktober 2021',
        },
      ]
    }
  }
}
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
  color: white;
  background-color: green;
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
}
</style>