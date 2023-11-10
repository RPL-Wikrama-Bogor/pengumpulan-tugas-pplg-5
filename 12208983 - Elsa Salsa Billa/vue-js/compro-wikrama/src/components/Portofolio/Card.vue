<template>
    <div class="card-portofolio">
        <img :src="portofolio.file" alt="portofolio">
        <div class="card-portofolio-description">
            <h4>{{portofolio.title}}</h4>
            <p><span>Klient: </span>{{ portofolio.name }}</p>
        </div>
    </div>
</template>
<script>
export default {
    props:['portofolio']
}
</script>
<style scoped>
.card-portofolio {
    text-align: start;
    min-height: 306px;
    /* padding: 30px 30px 0 30px; */
    padding: 0;
    box-shadow: 0px 10px 30px #879bb5;
    border-radius: 0px 60px 0px 0px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
}
.card-portofolio img {
    max-width: 100%;
    height: auto;
    border-radius: 0px 60px 0px 0px;
}
.card-portofolio-description {
    padding: 0 20px 20px 20px;
}
.card-portofolio h4{
    margin-top: 10px;
    font-weight: 900;
    font-size: 20px;
    line-height: 35px;
    margin-bottom: 0;
    color: #27374b;
}
</style>