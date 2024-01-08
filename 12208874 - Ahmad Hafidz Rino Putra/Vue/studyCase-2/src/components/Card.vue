<template>
  <div class="wrap">
    <div class="card">
      <div class="img-wrap">
        <img :src="'/src/assets/img/' + image" />
      </div>
      <div class="text-wrap">
        <h3>{{ judul }}</h3>
        <slot></slot>
        <div v-html="desc"></div>
        <div class="name-container">
          <img
            :src="'/src/assets/img/' + img"
            style="border-radius: 25px; width: 30px"
          />
          <div class="name">
            {{ name }}
            <br />
            <div class="date">
              {{ date }}
              <i
                class="fa-solid fa-share-from-square "
                style="margin-left: 230px"
              ></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["judul", "desc", "image", "name", "img", "date"],
};
</script>

<style scoped>
.date {
  font-size: 12px;
  color: grey;
}
.wrap {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-bottom: 15px;
}

.card {
  width: 600px;
  height: auto;
  box-shadow: 10px 10px 30px;
  border-radius: 10px;
  display: flex;
}

.img-wrap {
  width: 35%;
  height: auto;
  position: relative;
}

.text-wrap {
  width: 65%;
  height: fit-content;
  padding: 10px;
}

.img-wrap img {
  width: 100%;
  height: 100%;
  border-radius: 10px 0px 0px 10px;
  /* position: absolute; */
}

.name-container {
  display: flex;
  align-items: center;
}

.name {
  margin-left: 10px;
}
</style>
