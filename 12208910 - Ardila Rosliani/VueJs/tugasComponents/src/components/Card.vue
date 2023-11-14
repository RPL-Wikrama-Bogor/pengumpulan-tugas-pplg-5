<template>
    <div class="wrap">
        <div class="card">
            <div class="img-wrap">
                <img :src="'/src/assets/image/' + img" alt="">
            </div>
            <div class="text-wrap">
                <h3>{{ judul }}</h3>
                <p>{{ text }}</p>
                <div class="profile-wrap">
                    <img :src="'/src/assets/image/' + img" alt="">
                    <div class="text">
                        <h4>{{ nama }}</h4>
                        <p>{{ tanggal }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
    
<script>
export default {
    props: ['judul', 'text', 'img', 'nama', 'tanggal'],
}
</script>
    
<style scoped>
body{
    background-color: black;
}
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
    border-radius: 5px;
    display: flex;
    background-color: white;
    border-radius: 25px;
}

.img-wrap {
    width: 35%;
    height: auto;
    position: relative;
}

.text-wrap {
    width: 65%;
    height: 100%;
    padding: 10px 20px;
    font-family: Arial;
}

.text-wrap h3{
    color: rgb(57, 56, 56);
}

.text-wrap p{
    font-size: 13px;
    color: #717171;
}

.img-wrap img {
    width: 100%;
    height: 100%;
    border-radius: 15px 0 0 15px;
}

.profile-wrap{
    width: 300px;
    display: flex;
    padding-bottom: 5px;
}
.profile-wrap img{
    width: 15%;
    height: 15%;
    border-radius: 500px;
    padding-right: 5px;
}

.profile-wrap h4{
    margin: 0;
}

.profile-wrap p{
    font-size: 13px;
    color: #717171;
    margin: 0;
}
</style>