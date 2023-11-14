<template>
  <div class="card-service">
    <h4>{{ title }}</h4>
    <p>
      {{ description }}
    </p>
    <slot></slot>
    <div class="flex">
      <button class="btn-service">Detail</button>
      <MyBtn></MyBtn>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title", "description"],
};
</script>

<style scoped>
.flex {
    display: flex;
    grid-gap: 10px;
}

.card-service {
  text-align: start;
  min-height: 306px;
  padding: 30px 30px 0 30px;
  box-shadow: 0px 10px 30px rgb(0, 0, 0, 0.5);
  border-radius: 60px 0px 0px 0px;
  background-color: #fffbf5;
  transition: all 0.5s ease;
  margin: 10px 10px;
}

.card-service {
  font-size: 18px;
  line-height: 30px;
  color: #343b4e;
}

.card-service {
  font-weight: 400px;
  color: #827f8d;
  margin: 0 0 10pc 0;
}

.btn-service {
  margin-top: 10px;
  font-size: 16px;
  font-weight: 400;
  background-color: rgb(0, 195, 255);
  color: #fff;
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
}

.btn-service-global {
  margin-top: 10px;
  font-size: 16px;
  font-weight: 400;
  background-color: rgb(255, 0, 0);
  color: #fff;
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
}
</style>
