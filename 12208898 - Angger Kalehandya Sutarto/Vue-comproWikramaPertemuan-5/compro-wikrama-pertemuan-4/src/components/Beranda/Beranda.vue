<template>
    <div>
        <div class="section_1">
            <div class="section1_content">
                <h1>{{ data.title }}</h1>
                <p>{{ data.description }}</p>
            </div>
            <div class="section1_img">
                <img :src="data.file" :alt="data.title">
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['data']
}
</script>
<style scoped>
/* section 1 */
.section_1 {
    padding: 20px 0;
    display: flex;
    align-items: center;
}

.section1_content {
    width: 50%;
    padding: 30px 0;
}

.section1_img {
    width: 50%;
}

.section1_img img {
    width: 100%;
}

.section1_content h1 {
    font-size: 48px;
}

.section1_content p {
    margin-bottom: 20px;
}

@media screen and (max-width: 600px) {
    .section_1 {
        flex-direction: column;
        padding: 20px 20px;

    }

    .section1_content {
        width: 100%;
        padding: 30px 0;
    }

    .section1_img {
        width: 100%;
    }
}

.btn-service {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    font-family: "Muli", sans-serif;
    color: #fff;
    background-color: #4c55c4;
    text-decoration: none;
    margin-top: 20px;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}
</style>