const book = [
    {
        title: "Harry potter and the sorcerer's stone",
        author: "J.k. Rowling",
        genre: "Fantasy",
        year: 1997    
    },
    {
        title: "to kill a mockingbird",
        author: "Harper lee",
        genre: "Fiction",
        year: 1960  
    },
    {
        title: "The great gatsby",
        author: "F.scott Fitzgerald",
        genre: "Fiction",
        year: 1925    
    },
];

    let fictionBook = book.filter((book) => book.genre == 'Fiction')
    fictionBook.forEach((fictionBook) => console.log(fictionBook.title))


    