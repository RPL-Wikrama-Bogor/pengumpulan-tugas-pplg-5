<template>
    <div class="card-service">
        <h2>
            {{ title }}
        </h2>
        <p>{{ description }}</p>
            <slot></slot>
        <button class="btn-service">detail</button>
        <myBtn></myBtn>
        <img :src="img" alt="">

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
    background-color: #9a8cff;
    border: none;
    border-radius: 10px;
    padding: 10px;
}

.btn-service:hover {
    background-color: rgb(1, 52, 129);
}

.card-service {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    text-align: start;
    min-height: 306px;
    padding: 30px 30px 0 30px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
    border-radius: 60px 0px 0px 0px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
}

.card-service h2 {
    font-size: 18px;
    line-height: 30px;
    color: #000000;
}

.card-service p {
    font-weight: 400;
    color: #000000;
    margin: 0 0 10px 0;
}
</style>