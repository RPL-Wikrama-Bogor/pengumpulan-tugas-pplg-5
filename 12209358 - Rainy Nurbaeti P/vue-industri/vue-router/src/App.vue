<template>
  <ul>
    <li>
      <router-link :to="{ name: 'Home'}">Home</router-link>
      <router-link to="/about">About</router-link>
    </li>
  </ul>
  <router-view></router-view>
</template>