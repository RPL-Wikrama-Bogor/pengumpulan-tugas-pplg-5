<template>
  <div class="wrap">
    <div class="card">
      <div class="img-wrap">
        <img :src="'/src/assets/img/' + image" alt="" srcset="">
      </div>
      <div class="text-wrap">
        <div class="description">
          <h1>{{ judul }}</h1>
          <div v-html="text"></div>
        </div>
        <slot></slot>
        <br>
        <br>
        <div class="about">
          <img :src="'/src/assets/img/' + profile" alt="">
          <div class="container">
            <p>{{ name }}</p>
            <p v-bind="property">{{ date }}</p>
          </div>
        </div>
        <div class="container2"> <i class="fa-solid fa-share"></i></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      property: {
        class: 'color'
      },
    }
  },
  // mengambil data
  props: ['judul', 'text', 'image', 'name', 'date', 'profile'],
}
</script>

<style scoped>
.wrap {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 25px;
}

.card {
  display: flex;
  width: 800px;
  height: auto;
  border-radius: 5px;
  border: 1px solid black;
}

.img-wrap {
  width: 40%;
  height: auto;
  position: relative;
}

.img-wrap img {
  width: 100%;
  height: 100%;
  /* position: absolute; */
}

.text-wrap {
  width: 60%;
  height: 100%;
  padding: 20px;
}

.about {
  display: flex;
  align-items: center;
  padding: 5px;
}

.about img {
  width: 50px;
  height: auto;
  margin-right: 10px;
  border-radius: 50%;
}

p {
  margin: 0;
  padding: 3px;
}

.color {
  color: gray;
  font-size: 12px;
}

.container2 {
  float: right;
}
</style>