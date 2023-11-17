<template>
  <div class="row-service">
    <Card v-for="item in data" :title="item.title" :description="item.description">
     <p>{{ item.date }}</p>
    </Card>

    
  </div>
  <button class="btn-service" >detail</button>
  <myBtn id="btn1" name="btn"></myBtn>
  <myBtn id="btn2" name="btn2"></myBtn>
</template>
<script>
import card from '@/components/myComponent/card.vue';
import Card from './components/myComponent/card.vue';

export default {
  components: {
    card,
    "card-service": card,
    Card
  },
  data() {
    return {
      data: [
        {
          title: 'title 1',
          description: 'description 2',
          date:'21 january'
        }, {
          title: 'maman ',
          description: 'sucipto enak',
          date:'22 march enak waw 23212',
          img:'@/assets/img/nos.jpg'

        }
      ]
    }
  }
}
</script>
<style>
html{
  background-color: #ededed;
}
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
  background-color: #00c86e;
  border: none;
  border-radius: 10px;
  padding: 10px;
}

.btn-service-global:hover {
  background-color: #008c4d;
  width: 4.2rem;
}
</style>