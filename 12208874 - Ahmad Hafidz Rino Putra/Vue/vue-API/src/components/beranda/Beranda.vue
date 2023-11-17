<template>
  <div>
    <div class="section_1">
      <div class="section_content">
        <h1>{{ data.title }}</h1>
        <p>{{ data.description }}</p>
      </div>
      <div class="section_img">
        <img :src="data.file" alt="data.title">
      </div>
    </div>
  </div>
</template>

<script>

export default {
    props : ['data']
}

</script>
<style scoped>
.section_1 {
  padding: 20px 0;
  display: flex;
  align-items: center;
}

.section_content {
  width: 50%;
  padding: 30px 0;
}

.section_img {
  width: 50%;
}

.section_img img {
  width: 100%;
}

.section_content h1 {
  font-size: 48px;
}

.section_content p {
  margin-bottom: 20px;
}

@media screen and (max-width: 600px) {
  .section_1 {
    flex-direction: column;
    padding: 20px 20px;
  }

  .section_content {
    width: 100%;
    padding: 30px 0;
  }

  .section_img {
    width: 100%;
  }
}
</style>
