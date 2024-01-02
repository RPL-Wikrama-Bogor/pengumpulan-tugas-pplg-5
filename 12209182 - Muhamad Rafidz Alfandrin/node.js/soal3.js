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

const newProducts = [
    {
        name: 'kulkas',
        price: 200,
    },
    {
        name: 'TV',
        price: 300,
    },
];
    const _mergedProducts = products.concat(newProducts)
    let angka = 0;
    _mergedProducts.forEach((_mergedProducts) => angka += _mergedProducts.price)
    let hasil = angka/5
    console.log(_mergedProducts)