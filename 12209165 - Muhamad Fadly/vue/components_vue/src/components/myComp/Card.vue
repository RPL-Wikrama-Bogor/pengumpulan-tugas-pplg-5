<template>
    <div class="card-service">
        <h4>
            {{ title }}
        </h4>
        <p :style="{ color : 'red' }">{{ description }}</p>
        <slot></slot>   
            <button class="btn-service">TEKAN</button> 
            <button class="btn-service-global">Ashoy</button>
        </div>
    </template>
<script>
export default {
    props: ['title', 'description']
}
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

* {
  font-family: 'Courier New', Courier, monospace;
}

.btn-service {
  border-radius: 5px;
  font-weight: 400;
  background: linear-gradient(to right, rgb(243, 244, 227) 50%, rgb(89, 86, 86) 50%);
  background-size: 200% 100%;
  background-position: left bottom;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
  padding: 15px 20px;
  font-size: 16px;
  margin-top: 50px;
  margin-left: 10px;
  margin-right: 30px;
}

.btn-service:hover {
  background-position: right bottom;
  color: white;
}
.card-service {
    text-align: start;
    min-height: 306px;
    padding: 30px 30px 0 30px;
    box-shadow: 0px 30px 30px rgba(23, 20, 20, 0.5);
    border-radius: 60px 0px 0px 0px;
    background: #0d0d0b;
    transition: all 0.5s ease;
    margin: 10px 10px;
}

.card-service h4{
    font-family: 'Courier New', Courier, monospace;
    font-size: 18px;
    line-height: 30px;
    color: whitesmoke;
}

.card-service p{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-weight: 400;
    color: whitesmoke;
    margin: 0 0 10px 0;
}
</style>