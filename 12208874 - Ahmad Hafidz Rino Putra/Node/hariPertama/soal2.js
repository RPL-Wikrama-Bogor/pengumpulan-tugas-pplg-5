const products = [
    {
        name: 'laptop',
        price: 1000
    },
    {
        name: 'smartphone',
        price: 500
    },
    {
        name: 'tablet',
        price: 300
    }
]

let hargaDiskon = products.filter((products) => products.price *= 0.9)
hargaDiskon.forEach((hargaDiskon) => console.log(hargaDiskon.name + ' seharga ' + hargaDiskon.price))