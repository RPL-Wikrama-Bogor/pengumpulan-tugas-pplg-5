<template>
    <div class="card-blog">
        <img src="@/assets/img/portfolio-1.jpg" alt="Portofolio">
        <div class="card-blog-description">
            <div class="time">
                Dec 1st 2022
            </div>
            <h4>Lorem ipsum dolor sit mat</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam libero, minima reprehenderit quam odio perspiciatis nemo sapiente eveniet fuga iusto, veritatis soluta voluptates itaque neque dicta at sequi. Consectetur, molestias!</p>
        </div>
    </div>
</template>

<style>
.card-blog{
    text-align: start;
    box-shadow: 0px 10px 30px palegreen;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
    display: flex;
    align-items: center;
}
    .card-blog img {
        max-width: 200px;
        height: 200px;
        object-fit: contain;
        padding: 0 0 20px 20px;
    }

    .card-blog-description .time{
        font-weight: 500;
        font-size: 12px;
        line-height: 17px;
        color: #4f556a;
    }
    .card-blog-description a{
        font-weight: 900;
        font-size: 48px;
        line-height: 70px;
        text-transform: capitalize;
        color: darkblue;
        cursor: pointer;
        text-decoration: none;
    }
    .card-blog h4{
        font-weight: 900;
        font-size: 24px;
        line-height: 28px;
        color: darkblue;
        margin-bottom: 0;
        margin-top: 5px;
    }
    .card-blog p{
        font-weight: 400;
        font-size: 16px;
        line-height: 22px;
        color: #4f556a;
        margin-top: 10px;
        margin-bottom: 5px;
    }
    @media screen and (max-width: 600px) {
    .row-blog {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }
    .card-blog{
        flex-direction: column;
        align-items: start;
    }
    .card-blog img{
        width: 100%;
        height: 260px;
        object-fit: contain;
    }
}
</style>