<template>
  <div class="container">
    <div class="row-contact">
      <div class="contact-img">
        <img src="@/assets/img/contact.svg" alt="">
      </div>
      <div class="form-contact">
        <h2>Contact</h2>
        <div class="input-form">
          <label for="">Name</label>
          <input type="text" v-model="formContact.name" class="input" placeholder="Enter Your Name Here">
        </div>
        <div class="input-form">
          <label for="">Email</label>
          <input type="text" v-model="formContact.email" class="input" placeholder="Enter Your Email Here">
        </div>
        <div class="input-form">
          <label for="">Phone</label>
          <input type="number" v-model="formContact.phone" class="input" placeholder="Enter Your Number Phone">
        </div>
        <div class="input-form">
          <label for="">Message</label>
          <textarea v-model="formContact.message" cols="30" rows="30" type="text" class="input"
            placeholder="Enter Message"></textarea>
        </div>
        <div class="input-form">
        <div v-if="isLoading">Loading berhasil...</div>
        <div v-else>
          <button @click="submit" class="btn-service">Submit</button>
        </div>
      </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Post } from '@/Api/index.js';
export default {
  data() {
    return {
      formContact: {
        name: "",
        email: "",
        phone: "",
        message: "",
      },
      isLoading: false,
    }
  },
  methods: {
    async submit() {
      this.isLoading = true;
      const response = await Post('contact', this.formContact);
      if (response.status == 200) {
        this.formContact = {
          name: '',
          email: '',
          phone: '',
          message: ''
        }
        alert('data berhasil di tambahkan');
      }
      this.isLoading = false;
    }
  }
}
</script>

<style scoped>
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

.btn-service {
  margin-top: 10px;
  font-size: 16px;
  font-weight: 400;
  color: white;
  background-color: #4c55c4;
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
  transition: 0.6s;
}

.btn-service:hover {
  background-color: gray;
  transition: 0.6s;
  cursor: pointer;
}
</style>