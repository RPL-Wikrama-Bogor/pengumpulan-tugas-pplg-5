<template>
    <div class="card-service">
        <h4>
            {{ title }}
        </h4>
        <p>
            {{ description }}
        </p>
        <slot></slot>
        <button class="btn-service">Button</button>
        <myBtn></myBtn>
        <!-- <button class="btn-service-global">detail</button> -->
    </div>
    <!-- <myBtn></myBtn> -->
</template>

<style scoped>

    .btn-service{
        margin-top: 10px;
        font-size: 16px;
        font-weight: 400;
        color: white;
        background-color: #4c55c4;
        padding: 15px 20px;
        border: none;
        border-radius: 5px;
    }
    .card-service{
        text-align: start;
        min-height: 306px;
        padding: 30px 30px 0 30px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.06);
        border-radius: 60px 0px 0px 0px;
        background: white;
        transition: all 0.5s ease;
        margin: 10px 10px;
    }

    .card-service h4 {
        font-size: 18px;
        line-height: 30px;
        color: #343b4e;
    }

    .card-service p {
        font-weight: 400;
        color: #827f8d;
        margin: 0 0 10px 0;
    }


</style>

<script>
export default {
    props: ['title', 'description']
}
</script>