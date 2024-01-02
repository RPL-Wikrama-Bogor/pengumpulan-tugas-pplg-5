<template>

  <div class="row-service">
    <Card v-for="item in data" :title=item.title :description=item.description>
      <p>{{item.date}}</p>
    </Card>
  </div>

  <!-- <button class="btn-service">Detail</button> -->
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
    return{
      data: [
        {
          title: 'pe halow',
          description: 'blablabla',
          date: '31 Oct 2023'
        }, {
          title: 'INI YG KEDUA',
          description: 'blablabla part 2',
          date: '1 Nov 2023'
        }
      ]
    }
}
}
</script>

<style>
.btn-service-global{
    margin-top: 15px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: rgb(68, 236, 68);
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}
.row-service{
  display: grid;
  grid-template-columns: repeat(3,1fr);
  grid-gap: 10px;
}
</style>