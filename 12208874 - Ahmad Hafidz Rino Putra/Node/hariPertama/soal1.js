const books = [
  {
    title: "Harry Potter",
    author: "J.K Rowling",
    genre: "Fantasy",
    year: 1997,
  },
  {
    title: "MockingBird",
    author: "Harper",
    genre: "Fiction",
    year: 1960,
  },
  {
    title: "The Great Gatsby",
    author: "Scott",
    genre: "Fiction",
    year: 1925,
  },
];

let genre = books.filter((books) => books.genre == "Fiction");
genre.forEach((genre) => console.log(genre.title));
