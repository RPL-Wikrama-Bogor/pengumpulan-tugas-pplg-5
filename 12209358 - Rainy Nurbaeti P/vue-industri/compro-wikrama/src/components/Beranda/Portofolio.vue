<template>
    <div class="portofolio">
        <h3>Portofolio kami</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore optio consequuntur illum, delectus, praesentium deserunt a iusto aspernatur, consequatur facilis quae explicabo nisi quisquam facere obcaecati culpa. Fugit, qui id!</p>
     <div class="row-portofolio">
       <card-portofolio v-for="item in data" :portofolio="item"></card-portofolio>
     </div>
    </div>

</template>
<script>
import Card from '@/components/Portofolio/Card.vue';
 export default{
    components:{
        Card
 }
}
</script>
<style>
.portofolio{
    margin-top: 80px;
}
.portofolio h3{
    margin: auto;
    font-family: 'Raleway',sans-serif;
    font-weight: 900;
    font-size: 48px;
    line-height: 70px;
    color: darkblue;
    margin-bottom: 15px;
    text-align: center;
}
/* .portofolio p{
    font-weight: 900;
    font-size: 14px;
    line-height: 20px;
    color: rgb(70, 68, 65);
    max-width: 680px;
    margin-top: 14px;
    margin-bottom: 25px;
} */
.portofolio p span{
    color: blueviolet;
}
.row-portofolio{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-gap: 10px;
}
@media screen and (max-width: 600px){
    .row-portofolio{
        display: grid;
        grid-template-columns: repeat(1,1fr);
        grid-gap: 10px;
    }
    
}
</style>