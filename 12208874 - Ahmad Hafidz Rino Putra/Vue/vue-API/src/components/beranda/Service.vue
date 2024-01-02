<template>
  <div class="service">
    <h3>Layanan Kami</h3>
    <div class="row-service">
      <Card v-for="item in data" :layanan="item" :key="item.id"></Card>
    </div>
  </div>
</template>
<script>
import Card from "@/components/service/Card.vue";
export default {
  components: {
    Card
  },
  props: ['data']
}
</script>

<style>
.service {
  margin-top: 80px;
}

.service h3 {
  font-weight: 900;
  font-size: 45px;
  line-height: 35px;
  color: #042181;
  margin-bottom: 30px;
  text-align: center;
}

.row-service {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}

@media screen and (max-width: 600px) {
  .row-service {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-gap: 10px;
  }
}
</style>