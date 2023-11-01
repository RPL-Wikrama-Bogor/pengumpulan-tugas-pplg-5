<template>
  <div class="wrap">
        <div class="card">
            <div class="img-wrap">
            <img :src="'/src/assets/img/'+ image" alt="" srcset="">
        </div>
            <div class="text-wrap">
                <h3>{{judul}}</h3>
                <slot></slot>
                <div v-html="text"></div>
            </div>
        </div>
  </div>
</template>

<script>
export default {
    // mengambil data dari luar file
    props: ['judul', 'text', 'image'],
}
</script>

<style scooped>
.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.card {
    width: 600px;
    height: auto;
    border-radius: 5px;
    border: 2px solid black;
    display: flex;
    margin-top: 20px;
}
.img-wrap {
    width: 35%;
    height: auto;
    position: relative;
}
.text-wrap {
    width: 65%;
    height: 100%;
    padding: 10px;
}
.img-wrap img {
    width: 100%;
    height: 100%;
    /* position: absolute; */
}
</style>