<template>
    <div class="card-service">
      <slot></slot>
      <h4>
        {{ title }}
      </h4>
        <p>{{ description }}</p>
        <slot></slot>
      <button class="btn-service">Detail</button>
      <MyBtn></MyBtn>
    </div>
</template>

<script>
export default{
    props: ['title', 'description']
}
</script>

<style scoped>

.btn-service{
    margin-top: 15px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: rgb(255, 81, 122);
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}
.card-service{
    text-align: start;
    min-height: 306px;
    padding: 30px 30px 0px 30px;
    box-shadow: 0px 10px 10px rgba(0,0,0,0.8);
    border-radius: 60px 0px 0px 0px;
    background: white(122,122,122);
    transition: all 0.5s ease;
    margin: 10px 10px;
}

.card-service h4{
    font-size: 10px;
    line-height: 30px;
    color: black;
}

.card-service p{
    font-weight: 400;
    color: grey;
    margin: 0px 0px 10px 0px;
}
</style>