<template>
    <div class="wrap">
        <div class="card">
            <div class="content-wrap">
                <div class="img-wrap">
                    <img src="@/assets/img/kucing2.jpg" alt="" srcset="">
                </div>
                <div class="text-wrap">
                    <h3>{{ title }}</h3>
                    <div v-html="text"></div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        // mengambil data dari luar atau file lain

        props: ['title', 'text', 'img'],
    }
</script>

<style scoped>
.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 25px;
}

.card {
    width: 600px;
    height: auto;
    padding: 10px;
    border-radius: 7px;
    border: 4px solid cyan;
}

.content-wrap {
    display: flex;
    align-items: center;
}

.img-wrap {
    width: 40%;
    height: 100%;
}

.text-wrap {
    width: 60%;
    height: fit-content;
    padding: 10px 10px 0 10px;
}

.img-wrap img {
    width: 100%;
    height: 100%;
}
</style>

