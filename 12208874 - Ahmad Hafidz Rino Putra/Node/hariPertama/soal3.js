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


const newProducts = [
    {
        name: 'Kulkas',
        price: 200,
    },
    {
        name: 'TV',
        price: 300
    }
]

const gabunganProduk = products.concat(newProducts)
gabunganProduk.forEach((gabunganProduk) => console.log(gabunganProduk.name) )
let angka = 0;
gabunganProduk.forEach((gabunganProduk) => angka += gabunganProduk.price )
let hasil = angka/5
console.log(`Total Harga Produk : ${hasil}`)
