
<template>
  <ul>
    <li>
      <router-link :to="{
        name: 'Home'
      }" style="text-decoration: none;">home</router-link>

    </li>
    <li>
      <router-link :to="{
        name:'About'
      }" style="text-decoration: none;">about</router-link>
    </li>
  </ul>

  <router-view></router-view>
</template>
<style>

</style>