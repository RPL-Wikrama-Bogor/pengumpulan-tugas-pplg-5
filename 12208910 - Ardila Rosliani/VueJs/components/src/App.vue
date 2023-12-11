<template>
  <div class="row-service">
    <Card v-for=" item in data" :title="item.title" :description="item.description">
      <p>{{ item.date }}</p>
    </Card>

    <!-- <card-service title="title 2" description="ini descripsi"></card-service> -->
  </div>

  <button class="btn-service">Detail</button>
  <Mybtn id="btn1" name="btn1"></Mybtn>
  <Mybtn id="btn2" name="btn2"></Mybtn>

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
          title: 'title 1',
          description: 'desc 1',
          date: '31 Oktober'
        },
        {
          title: 'title 2',
          description: 'desc 2',
          date: '1 November'
        }
      ]
    }
  },
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
  background-color: rgb(162, 253, 51);
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
}
</style>