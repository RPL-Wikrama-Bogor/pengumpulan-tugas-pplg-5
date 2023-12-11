<template>
    <center>
    <div class="container">
        <div class="c-left">
            <img :src="'src/assets/img/' + foto" alt="">
        </div>
        <div class="c-right">
            <div class="right-top">
                <h2>{{ judul }}</h2>
                <div v-html="text"></div>
            </div>
            <div class="right-bottom">
                <div class="pp-left">
                    <div class="kanan">
                        <img :src="'src/assets/img/' + pp" alt="">
                    </div>
                    <div class="kiri">
                        <p class="nama">{{ nama }}</p>
                        <p>{{ tanggal }}</p>
                    </div>
                </div>
                <div class="pp-right">
                    <img :src="'src/assets/img/' + image" alt="">
                </div>
            </div>
        </div>
    </div>
    </center>
</template>

<script>
export default {
    props: ['judul', 'text', 'foto', 'pp', 'nama', 'tanggal', 'image'],
}
</script>

<style scoped>
    *{
        margin: 0;
        padding: 0;
    }

    .container {
        width: 1000px;
        height: auto;
        display: flex;
        justify-content: center;
        border: 2px solid #000;
        border-radius: 10px;
        margin-top: 40px;
    }

    .c-left img {
        width: 100%;
        height: 100%;
        border-bottom-left-radius: 8px;
        border-top-left-radius: 8px;
    }

    .c-right {
        width: 65%;
        height: 100%;
        padding: 100px;
    }

    .right-top h2 {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        text-align: left;
    }

    .right-bottom {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
    }

    .pp-left {
        display: flex;
    }

    .kanan img {
        width: 40px;
        border-radius: 50%;
    }

    .kiri p {
        text-align: left;
        margin-left: 20px;
        font-size: 13px;
    }

    .pp-right img {
        width: 20px;
    }

    .pp-right {
        background-color: yellow;
        padding: 10px;
        border-radius: 50%;
    }
</style>