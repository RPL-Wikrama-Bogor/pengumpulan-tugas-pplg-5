<template>
    <ul>
        <li>
            <!-- kalo pake binding -->
            <router-link :to="{name : 'Home'}">Home</router-link>
            <!-- kalo ga pake binding, jadi lewat path -->
            <router-link to="/about">About</router-link>
            <!-- router link : a href di css -->
        </li>
    </ul>
    <!-- bakal berubah tergantung komponenya apa, isi codingan yg ada di file yg dipanggil -->
  <router-view></router-view>
</template>