<template>
  <div class="row-service">
<card v-for="item in data" :title="item.title" :description="item.description">
  <p>{{ item.date }}</p>
</card>


</div>
<button class="btn-service">Detail</button>
<MyBtn id="btn1" name="btn1"></MyBtn>
<MyBtn id="btn2" name="btn2"></MyBtn>

</template>

<script>
import card from '@/components/my-components/card.vue';

export default {
  components: {
    card,
    'card-service': card
  },
  data() {
    return {
      data: [
        {
          title : 'Muhamad',
          description : '1',
          date : '31 oktober'
        }, 
        {
          title: 'Rafidz',
          description : '2',
          date : '1 November'
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
  grid-gap: 10px
}

.btn-service-global {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: red;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}
</style>