<template>
  <div class="row-service">
  <Card v-for="item in data" :title=" item.title " :description=" item.description">
  <p>{{ item.date }}</p>
  </Card>
  <!-- <card-service title="Card 2" description="This the Card two"></card-service> -->
</div>
<button class="btn-service">Detail</button>
<MyBtn id="btn1" name="btn"></MyBtn>
<MyBtn id="btn2" name="btn"></MyBtn>
</template>

<script>

import Card from '@/components/myComponents/Card.vue';

export default {
  components: {
    Card,
    'card-service' : Card
  },
  data() {
    return {
      data : [
        {
          title : 'Card 1',
          description : 'Description 1',
          date : '31 Oktober 2023'
        },
        {
          title : 'Card 2',
          description : 'Description 2',
          date : '1 November 2023'
        }
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