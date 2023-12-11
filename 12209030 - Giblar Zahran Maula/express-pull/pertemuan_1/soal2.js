const products =  [
    {
        name: "laptop",
        price: 1000
    },
    {
        name: "motor",
        price: 2100
    },
    {
        name: "perahu",
        price: 3400
    },
    {
        name: "dan naga",
        price: 2300
    },
];

const newProducts =[
    {
        name:"kulkas",
        price:300,
    },
    {
        name:"TV",
        price:300,
    }
]

function tambahDiskon(products) {
    const diskon = products.map(produk => {
        const hargaDiskon = produk.price * 0.9; 
        return { name: produk.name, price: hargaDiskon };
    });
    return diskon;
}

const diskon = tambahDiskon(products);
diskon.forEach(produk => {
    console.log(`${produk.name}, Harga  ${produk.price}`);
});


function hitungProduk(products, newProducts) {
    const semuaPoduk = products.concat(newProducts); // Menggabungkan kedua array
    const totalHarga = semuaPoduk.reduce((acc, product) => acc + product.price, 0); // Menjumlahkan semua harga
    const rataHarga = totalHarga / semuaPoduk.length; // Menghitung rata-rata harga
    return rataHarga;
}

const rataHarga = hitungProduk(products, newProducts);
console.log("Rata-rata harga produk:", rataHarga);

