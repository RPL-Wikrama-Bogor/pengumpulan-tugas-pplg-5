<template>
  <ul>
    <li>
      <router-link :to="{ name: 'Home' }">Home</router-link>
    </li>
    <li>
      <router-link :to="{ name: 'About' }">About</router-link>
    </li>
  </ul>
  <router-view></router-view>
  <!-- berisi kodingan yang akan dituju, misal about maka about ada disitu -->
</template>