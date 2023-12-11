<template>
    <div class="wrap">
        <div class="card">
            <div class="img-wrap">
                <img :src="'/src/assets/img/' + img" alt="">
            </div>
            <div class="text-wrap">
                <h3>{{ judul }}</h3>
                <p>{{ text }}</p>
                <div class="profil-container">
                    <div class="profil-wrap">
                        <img :src="'/src/assets/img/' + profil" alt="">
                    </div>
                    <div class="profil-text">
                        <h6>{{ akun }}</h6>
                        <p>{{ date }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['judul', 'text', 'img', 'profil', 'akun', 'date'],
}
</script>

<style scoped>
.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.card {
    width: 600px;
    height: auto;
    border-radius: 5px;
    display: flex;
    margin: 10px 0;
    background-color: white;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
}
.img-wrap {
    width: 35%;
    height: auto;
    position: relative;
}
.text-wrap {
    width: 65%;
    height: 100%;
    font-family: 'Poppins', sans-serif;
    padding: 10px 35px;
}
.text-wrap h3 {
    font-size: 25px;
    margin-bottom: 2px;
}
.text-wrap p {
    font-size: 13px;
    margin-bottom: 20px;
}
.img-wrap img {
    width: 100%;
    height: 100%;
    border-radius: 5px 0px 0px 5px;
    /* position: absolute; */
}
.profil-wrap {
    width: 40px;
    height: 40px;
    position: relative;
    margin-right: 15px;
}
.profil-wrap img {
    width: 100%;
    height: 100%;
    position: absolute;
    border-radius: 50%;
    border: 1px solid;
}
.profil-container {
    display: flex;
}
.profil-text {
    flex-direction: column;
    margin-top: 6px;
}
.profil-container p {
    margin: 3px 0 0 0;
    font-size: 9px;
    color: grey;
}
.profil-container h6 {
    margin: 0;
}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
</style>