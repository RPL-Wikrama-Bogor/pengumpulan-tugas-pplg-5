<template>
    <div class="card-blog">
        <img src="@/assets/img/portfolio-1.jpg" alt="blog">
        <div class="card-blog-description">
            <div class="time">
                Dec 1st 2022
            </div>
            <h4>Lorem ipsum dolor sit amet.</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>
</template>
<style>
.card-blog {
    text-align: start;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
    display: flex;
    align-items: center;
}

.card-blog img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    padding: 0 0 20px 20px;
}

.card-blog-description {
    padding: 0 20px 0 20px;
}

.card-blog-description .time {
    font-weight: 500;
    font-size: 12px;
    line-height: 17px;
    color: #4F556A;
}

.card-blog-description a {
    font-weight: 900;
    font-size: 15px;
    line-height: 18px;
    text-transform: capitalize;
    color: #042181;
    cursor: pointer;
    text-decoration: none;
}

.card-blog h4 {
    font-weight: 900;
    font-size: 24px;
    line-height: 28px;
    color: #042181;
    margin-bottom: 0px;
    margin-top: 5px;
}

.card-blog p {
    font-weight: 400;
    font-size: 16px;
    line-height: 22px;
    color: #4F556A;
    margin-top: 10px;
    margin-bottom: 5px;
}

@media screen and (max-width: 600px) {
    .row-blog {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }

    .card-blog {
        flex-direction: column;
        align-items: start;
    }

    .card-blog img {
        width: 100%;
        height: 260px;
        object-fit: contain;
    }
}
</style>