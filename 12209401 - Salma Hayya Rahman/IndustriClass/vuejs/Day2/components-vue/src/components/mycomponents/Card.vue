<template>
    <div class="card-service">
        <!-- <img src="@/assets/img/beach.jpg" alt="service"> -->
        <h4>{{ title }}</h4>
        <p>{{ desc }}</p>
        <slot></slot>
        <button class="btn-service">Details</button>
        <!-- <MyBtn></MyBtn> -->
    </div>
</template>
<script>
    export default{
       props: ['title' , 'desc' ]
    }
</script>
<style scoped>
.card-service{
    text-align: start;
    min-height: 360px;
    padding: 30px 30px 0px 30px;
    box-shadow: 0px 10px 30px #FFF2D8;
    border-radius: 60px 5px 5px 5px;
    background: #EAD7BB;
    transition: all 0.5s ease;
    margin: 10px 10px;
}
.card-service h4{
    font-size: 30px;
    line-height: 30px;
    color: #555843;
}
.card-service p{
    font-weight: 400;
    color: #3A4D39;
    margin: 0 0 10px 0;
}
.btn-service{
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white ;
    background-color: #BCA37F;
    padding: 10px 20px;
    border: none ;
    border-radius: 5px;
}
</style>
