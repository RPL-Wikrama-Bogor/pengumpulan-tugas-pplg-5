<template>
    <div class="card-service">
        <!-- <img src="@/assets/img/buah.jpg" alt=""> -->
        <h4>
            {{ title }}
        </h4>
        <p>{{ description}}</p>
        <slot></slot>
            <button class="btn-service">Detail</button>
            <!-- <MyBtn></MyBtn> -->
            
    </div> 
</template>
<script>
export default {
    props:['title', 'description']
}
</script>
<style scoped>
    .btn-service{
        margin-top: 10px;
        font-size: 16px;
        font-weight: 400;
        color: white;
        background-color: #8cb0e3;
        padding: 15px 20px;
        border: none;
        border-radius: 5px;
    }
    .card-service{
        text-align: start;
        min-height: 250px;
        padding: 30px 30px 0 30px;
        box-shadow: 0px 10px 30px rgb(111, 145, 169);
        border-radius: 60px 0px 60px 0px;
        background: white;
        transition: all 0.5s ease;
        margin: 10px 10px;
    }

    .card-service h4{
        font-size: 18px;
        line-height: 30px;
        color: rgb(180, 127, 127);
    }

    .card-service p{
        font-weight: 400;
        color: rgb(120, 160, 182);
        margin: 0 0 10px 0;
    }
</style>
