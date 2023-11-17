<template>
    <div class="service">
        <h3>Layanan kami</h3>
        <div class="row-service">
            <Card></Card>
            <Card></Card>
            <Card></Card>
            <Card></Card>
        </div>
    </div>
</template>
<script>
import Card from '@/components/Service/Card.vue';
export default{
    components:{
        Card
    }
}
</script>
<style>
.service {
    margin-top: 80px;
}

.service h3 {
    font-weight: 900;
    font-size: 48px;
    line-height: 35px;
    color: #042181;
    margin-bottom: 30px;
    text-align: center;
}

.row-service {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

@media screen and (max-width: 600px) {
    .row-service {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }
}

</style>