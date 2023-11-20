const buku = [{
    title: "soerya",
    author: "Ekanyud",
    genre: "Action",
    year: 2023
},
{
    title: "surya",
    author: "Ekanyudd",
    genre: "Actions",
    year: 2023
},
{
    title: "serya",
    author: "Ekanyut",
    genre: "Actionable",
    year: 2023
}];

let book = buku.filter((buku) => buku.genre === 'Actionable');
book.forEach((book) => console.log(book.title));

const products =[{
    name: "wahyu",
    price: 1000,
},
{
    name: "maul",
    price: 500,
},
{
    name: "udin",
    price: 300,
}
];

let hargaDiskon =products.map((products) => products.price * 0.9);
hargaDiskon = products.filter((products) => products.price = hargaDiskon(x++));
hargaDiskon.forEach((hargaDiskon) => console.log(`${hargaDiskon} setHarga $${hargaDiskon.price}`));

const newProduct = [{
    name: "kulkas",
    price: 200
},
{
    name: "Es Batu",
    price: 300
},
    
]