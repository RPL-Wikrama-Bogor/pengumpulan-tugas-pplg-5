<template>
  <div class="row-service">
    <card v-for="item in data" :title="item.title" :desc="item.desc" >
      <p>{{ item.date }}</p>
    </card>
    <!-- <card-service title="kedua" desc="lorem ipsum"></card-service> -->
  </div>
  <button class="btn-service">Detail</button>
  <MyBtn id="btn1" name="btn"></MyBtn>
  <MyBtn id="btn2" name="btn2"></MyBtn>
</template>
<script>
  import Card from '@/components/mycomponents/Card.vue' ;
  export default {
    components:{
      Card,
      'card-service' : Card 
    },
    data() {
      return {
        data: [
          {
            title: 'About Me' ,
            desc: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis quis eveniet doloremque?',
            date: '16 August 2006'
          },
          {
            title: 'About You' ,
            desc: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis quis eveniet doloremque?',
            date: '13 December 2006'
          }
        ]
      }
    }
  }
</script>
<style>
.row-service{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px ;
}
.btn-service-global{
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white ;
    background-color: #C8AE7D;
    padding: 10px 20px;
    border: none ;
    border-radius: 5px;
}
</style>