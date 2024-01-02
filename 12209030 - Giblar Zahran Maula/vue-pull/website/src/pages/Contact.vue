<template >
  <div class="container">
    <div class="row-contact">
        <div class="contact-img">
            <img src="@/assets/img/contact.svg" >
        </div>
        <div class="form-contact">
            <h2>contact</h2>
            <div class="input-form">
                <label for="">name</label>
                <input type="text" v-model="form.name" class="input" placeholder="enter name">
            </div>

            <div class="input-form">
                <label for="">email</label>
                <input type="email" v-model="form.email" class="input" placeholder="enter name">
            </div>

            <div class="input-form">
                <label for="">phone</label>
                <input type="text" v-model="form.phone" class="input" placeholder="enter name">
            </div>

            <div class="input-form">
                <label for="">message</label>
                <textarea  v-model="form.message" placeholder="enter message" cols="30" rows="10"></textarea>
            </div>
            <div class="input-form">
                <div>
                    <button @click="submit" class="btn-service">submit</button>
                </div>
            </div>
        </div>
        
    </div>
  </div>
</template>
<script>
import { Post } from '@/Api/index.js';
export default{
    data(){
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                message: '',
            }
        }
    },
    methods:{
       async submit(){
        const response = await Post('contact', this.form);
        if (response.status == 200) {
            this.form = {
                name: '',
                email: '',
                phone: '',
                message: '',
            }
            alert ('data berhasil');
        }
        }
        
    }
}
</script>

<style scoped>
.btn-service {
        margin-top: 10px;
        font-size: 16px;
        font-weight: 300;
        font-family: "Muli", sans-serif;
        color: #fff;
        background-color: #4c55c4;
        text-decoration: none;
        margin-top: 20px;
        padding: 15px 20px;
        border: none;
        border-radius: 5px;
    }
.row-contact {
display: flex;
margin-top: 10px;
align-items: center;
}
.contact-img {
width: 50%;
}
.form-contact {
width: 50%;
display: flex;
flex-direction: column;
}
.contact-img img {
width: 80%;
}
.input-form {
width: 80%;
position: relative;
display: flex;
margin: 8px 5px;
flex-direction: column;
}
.input-form label {
margin-bottom: 5px;
}
.input {
width: 100%;
padding: 12px 15px;
height: 20px;
font-size: 16px;
border: 1px solid #dddddd;
border-radius: 5px;
color: black;
box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
/* border: none; */
}
.input:focus {
outline: none;
}
</style>