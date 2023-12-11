
<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <div class="wrap">
        <div class="card">
            <div class="img-wrap">
                <img :src="'/src/assets/img/' +image " alt="" srcset="">
            </div>
            <div class="text-wrap">
                <h2>{{ title }}</h2>
                <p>{{ desc }}</p>
                <div class="profil-wrap">
                <img :src="'/src/assets/img/' +profil " alt="" srcset="">
                </div>
                <h5>{{ name }}</h5>
                <small>{{ date }}</small>
                <i class="fa-solid fa-share-from-square"></i>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    // mengambil data dari luar atau file lain
    //nama props=> nama bind attribute di componentya tempat data dikirim
    props: [ 'title' , 'desc' , 'image' , 'name' , 'date' , 'profil'] ,
}
</script>

<style scoped>
.wrap{
    display: flex;
    flex-direction: column; 
    justify-content: center;
    align-items: center;
    margin-bottom: 15px;
    margin-top: 2rem;
}
.card{
    display: flex;
    width: 600px;
    height: auto;
    border-radius: 10px;
    border: none ;
    box-shadow: 10px 10px 30px rgb(0, 0, 0, 0.4);
}
.img-wrap{
    width: 35% ;
    height: auto ;
    position: relative;
}
.img-wrap img{
    width: 100%;
    height: 100%;
    border-radius: 10px 0px 0px 10px;
}
.text-wrap h2{
    margin-bottom: -1px;
}
.text-wrap{
    width: 65%;
    height: 100%;
    margin: 20px 0px 20px 20px;
}
.text-wrap h5{
    margin: -2.5rem 0rem 0rem 3rem;
}
.text-wrap small{
    margin: 0rem 0rem 0rem 3rem;
    color: grey;
}
.text-wrap i{
    margin: 0rem 0rem 0rem 12.5rem;
}
.profil-wrap{
    width: 10% ;
    height: 10% ;
}
.profil-wrap img{
    width: 100%;
    height: 100%;
    border-radius: 360px;
    margin: 1rem 0rem 0rem 0rem;
}

</style>