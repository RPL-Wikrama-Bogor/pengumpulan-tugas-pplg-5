<template>
    <div class="card-portfolio">
        <img src="@/assets/img/portfolio-1.jpg" alt="portfolio">
        <div class="card-portfolio-description">
            <h4>
                Lorem ipsum dolor sit amet.
            </h4>
            <p><span>Klient :</span> radit</p>

        </div>
    </div>
</template>
<style scoped>
.card-portfolio {
    text-align: start;
    min-height: 306px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
    border-radius: 60px 0px 0px 0px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
}

.card-portfolio img {
    max-width: 100%;
    height: auto;
}

.card-portfolio-description {
    padding: 0 20px 20px 20px;
}

.card-portfolio h4 {
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    margin-bottom: 0;
    color: #042181;
}
</style>