<template>
    <div class="wrap">
        <div class="card">
            <div class="img-wrap">
                <img :src="'src/assets/img/' + image" alt="">
            </div>
            <div class="text">
                <div class="text-wrap">
                    <h3>{{ title }} </h3>
                    <div></div>
                    <p>
                        {{ text }}
                    </p>
                    <!-- <slot></slot> -->
                </div>
                <div class="foot-card">
                    <img :src="'src/assets/img/' + pp" alt="">
                    <div class="nama-foot">
                        <div class="akun">
                            <p id="akun"> {{ akun }}</p>
                            <p id="desc">{{ tgl }}</p>
                        </div>
                        <div class="back">
                            <a href="#"> 
                                <img id="icon" src="src/assets/img/back.png" alt="" href="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { isCoreComponent } from '@vue/compiler-core';

export default{
    //mengambil data dari liar atau file lain
    props: ["title", "text", "image", "tgl", "akun", "pp"],
    components: { isCoreComponent }
}
</script>

<style scoped>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,200&display=swap');

*{
font-family: 'Poppins', sans-serif;
font-weight: 400;
}
.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.card {
    width: 800px;
    height: auto;
    border-radius: 5px;
    display: flex;
    margin-bottom: 20px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
}

.img-wrap{
    width: 35%;
    position: relative;
}

.text{
    width: 80%;
    height: 100%;
    padding: 20px 0 20px 50px; 
}
.text-wrap{
    width: 80%;
    height: 100%;
    
}

.text .text-wrap h3 {
    font-weight: bold; 
}

.img-wrap img{
    width: 100%;
    height: 100%;
    
}

.foot-card{
    display: flex;
    width: 90%;
    align-items: center;
    max-width: 90%;
}

.foot-card img{
    width: 15%;
    height: 50%;
    border-radius: 100%;
}

.akun {
    width: 80%;
}

.nama-foot {
    margin-left: 10px;
    display: flex;
    position: relative;
}

#desc {
    margin-top: -15px;
    color: darkgray;
}

#akun{
    font-weight: bold;
}

#icon {
    float: right;
    bottom: 20px;
  /* position: absolute;
  right: -80%; 
  top: 25%; */
      
}

</style>