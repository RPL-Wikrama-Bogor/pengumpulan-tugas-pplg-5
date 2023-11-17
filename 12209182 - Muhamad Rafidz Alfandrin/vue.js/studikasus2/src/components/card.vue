<template>
    <div class="wrap">
        <div class="card">
            <div class="img-wrap">
                <img :src="'src/assets/img/' + image">
            </div>
            <div class="text-wrap">
                <h3>{{ judul }}</h3>
                <slot></slot>
                <div v-html="text"></div>
                <div class="container">
                    <img src="'/src/assets/img' + imgP"
                    style="border-radius: 25px; width: 25px">
                    <div class="name">
                        {{ name }}
                        <br/>
                        <div class="date">
                            {{ date }}
                            <i class="fa-solid fa-share-from-square ">
                        </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</template>

<script>
    export default {
        props: ['judul', 'text', 'image', 'name', 'date' ],
    }
</script>

<style scoped>
.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 15px;
}

.card {
    width: 600px;
    height: 250px;
    border-radius: 10px 10px; 
    box-shadow: 10px 10px 30px;
    display: flex;
}

.img-wrap {
    width: 35%;
    height: 100%;
    position: relative;
}

.text-wrap {
    width: 65%;
    height: fit-content;
    padding: 10px;
}

.img-wrap img {
    width: 100%;
    height: 250px;
}
</style>