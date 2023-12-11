<template>
  <div class="row-service">
    <Card v-for="item in data" :title="item.title" :description="item.description">
      <p>{{ item.date }}</p>
    </Card>
  </div>
  <button class="btn--service">Detail</button>
  <MyBtn id="btn1" name="btn"></MyBtn>
  <MyBtn id="btn2" name="btn"></MyBtn>
</template>

<script>
import Card from '@/components/my-components/Card.vue';
export default {
  components: {
    Card,
    'card-service': Card
  },

  data() {
    return {
      data: [
        {
          title: 'Title 1',
          description: 'Description 1',
          date: '31 Oktober 2023'
        }, {
          title: 'Title 2',
          description: 'Description 2',
          date: '31 Oktober 2023'
        }
      ]
    }
  }
}
</script>

<style>
body {
  background-color: #EDEDED;
}

.row-service {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px
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
  transition: 0.6s;
}
</style>