<template>
    <div class="card-service">
        <h4>
            {{ title }}
        </h4>
        <slot></slot>
        <p> {{ description }}</p>
        <button class="btn-service">Detail</button>
        <Mybtn></Mybtn>
    </div>
</template>

<script>
export default {
    props: ['title', 'description']
}
</script>

<style scoped>
.btn-service {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: blue;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}

.card-service {
    text-align: start;
    min-height: 306px;
    padding: 30px 30px 0px 30px;
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.8);
    border-radius: 60px 0px 0px 0px;
    background: rgb(122, 122, 122);
    transition: all 0.5s ease;
    margin: 10px 10px;
}

.card-service h4 {
    font-size: 10px;
    line-height: 30px;
    color: blue;
}

.card-service p {
    font-weight: 400;
    color: red;
    margin: 0px 0px 10px 0px;
}
</style>