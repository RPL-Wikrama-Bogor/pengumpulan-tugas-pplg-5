<template>
    <div class="card-portofolio">
        <img src="@/assets/img/portfolio-1.jpg" alt="portofolio">
        <div class="card-portofolio-description">
            <h4>
                 {{Portofolio.title}} 
            </h4>
            <p><span>klien:</span>{{ portofolio.name }}</p>
        </div>
    </div>
</template>
<style  scoped>
.card-portofolio{
    text-align: start;
    min-height: 306px;
    box-shadow: 0px 10px 30px rgb(201, 155, 109);
    border-radius: 60px 0px 0px 0px;
    background: rgb(255, 253, 253);
    transition: all 0.5s ease;
}
.card-portofolio img{
    max-width: 100%;
    height: auto;
}
.card-portofolio-description {
    padding: 0 20px 20px 20px;

}
.card-portofolio h4{
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    margin-bottom: 0;
    color: rgb(9, 9, 10); 
}
</style>