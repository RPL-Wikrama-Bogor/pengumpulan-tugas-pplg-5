<template>
<div class="row-service">
  <Card v-for="item in data" :title="item.title" :description="item.description">
  <p>{{ item.date }}</p>
</Card>
</div>
<button class="btn-service">Detail</button>
<MyBtn id="btn1" name="btn"></MyBtn>
<MyBtn id="btn2" name="btn2"></MyBtn>
</template>
<script>
import Card from './components/myComp/Card.vue';
 export default{
  components:{
    Card,
    'card-service': Card
  },
  data(){
    return {
      data: [{
        title : 'title 1',
        description : 'description 1',
        date: '31 Oktober'
    }, {
      title: 'title 2',
      description : 'description2',
      date: '31 Oktober'
    }, {
      title: 'title 3',
      description : 'description3',
      date: '31 Oktober'
    } ]
    }
  }
}
</script>
<style>
.row-service{
  display: flex;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
.btn-service-global{
  border-radius: 5px;
  font-weight: 400;
  background: linear-gradient(to right, rgb(80, 79, 79) 50%, rgb(224, 225, 225) 50%);
  background-size: 200% 100%;
  background-position: left bottom;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
  padding: 15px 20px;
  font-size: 16px;
  color: white;
  margin-top: 10px;
  margin-right: 5px;
}
.btn-service-global:hover {
  background-position: right bottom;
  color: black;
}
</style>