<template>
  <div class="row-service">
    <card v-for="item in data" :title="item.title" :description="item.description">
    <p>{{ item.date }}</p>
    </card>
    <!-- <card-service title="title 2" description="ini deskripsi ke2"></card-service> -->
    <myBtn id="btn1" name="btn"></myBtn>
    <myBtn id="btn2" name="btn2"></myBtn>
  </div>
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
          title: 'title 1',
          description: 'description abyan',
          date: '31 oktober 2023'
        },
        {
          title: 'title 2',
          description: 'description 2', 
          date: '1 november 2023'
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
  background-color: greenyellow;
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
}
</style>