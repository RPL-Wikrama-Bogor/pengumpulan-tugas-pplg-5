<template>
    <div class="aha">
    <div class="about">
    <h1>Welcome in a first page!!</h1>
    <p>This is a view from <span style="color: mediumaquamarine;">About</span></p>
    </div>
    </div>
</template>

<script setup>
</script>

<style>
 body {
    height: 100vh;
    width: auto;
  }
  .about {
    display: grid;
    align-items: center;
    padding: 20px;
    justify-content: center;
    font-size: 20px;
    height: auto;
    width: 25%;
  }


.aha {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>