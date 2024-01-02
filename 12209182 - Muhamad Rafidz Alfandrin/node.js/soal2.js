const products = [
    {
        name: "Laptop",
        price: 1000,
    },
    {
        name: "Smartphone",
        price: 500,
    },
    {
        name: "Tablet",
        price: 300,
    },
];

let hargaDiskon = products.filter((products) => products.price *= 0.9)
hargaDiskon.forEach((hargaDiskon) => console.log(hargaDiskon.name + ' seharga ' + hargaDiskon.price))


