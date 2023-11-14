<template>
    <div class="contact">
        <h3>Contact</h3>
        <div class="row-contact">
            <Card v-for="item in data" :contact="item"></Card>
        </div>
    </div>
</template>

<script>
import Card from '@/components/Contact/Card.vue';
// export default {
//     components: {
//         Card
//     },
//     props:['data']
// }
</script>

<style>
.contact {
    margin-top: 80px;
}

.contact h3 {
    margin: auto;
    font-family: 'Raleway', sans-serif;
    font-weight: 900;
    font-size: 48px;
    line-height: 70px;
    color: darkblue;
    margin-bottom: 15px;
    text-align: center;
}
</style>