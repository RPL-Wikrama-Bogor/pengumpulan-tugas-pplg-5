<template>
    <div class="card-contact">
        <img src="@/assets/img/contact.svg" alt="Contact">
    </div>
</template>

<script>
// export default{
//     props: ['blog']
// }
</script>

<style>
    .card-blog{
        text-align: start;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
        background: white;
        transition: all 0.5s ease;
        margin: 10px 10px;
        display: flex;
        align-items: center;
    }
    .card-blog img {
        max-width: 200px;
        height: 200px;
        object-fit: contain;
        padding: 0 0 20px 20px;
    }
    
    @media screen and (max-width: 600px) {
    .card-blog{
        flex-direction: column;
        align-items: start;
    }
    .card-blog img{
        width: 100%;
        height: 260px;
        object-fit: contain;
    }
} 
</style>
