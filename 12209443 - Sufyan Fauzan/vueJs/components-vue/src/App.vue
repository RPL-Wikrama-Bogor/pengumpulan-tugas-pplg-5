<template>
  <div class="row-service">
    <!-- Card disamakan dengan yang ada di property -->
    <Card v-for="item in data" :title="item.title" :description="item.description">
      <p>
        {{ item.date }}
      </p>
    </Card>
    <!-- <card-service title="Title 2" description="ini description kedua"></card-service> -->
  </div>
  <!-- <button class="btn-service">Detail</button> -->
  <MyBtn id="btn1" name="btn" ></MyBtn>
  <MyBtn id="btn2" name="btn2" ></MyBtn>
</template>

<script>
import Card from '@/components/my-components/Card.vue';
export default {
  components: {
    Card,
    'card-service': Card
  }, data() {
    return {
      data: [
        {
          title: 'Card 1',
          description: 'Description 1',
          date: '11 January 2007'
        }, {
          title: 'Title 2',
          description: 'description 2',
          date: '1996'
        }
      ]
    }
  }
}
</script>

<style>
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

.btn-service-global:hover {
  background-color: gray;
  border-radius: 50px;
  transition: 0.6s;
  cursor: pointer;
}

.row-service {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}
</style>