const elementBooks = document.getElementById("getBooks");
async function getBooks() {
  const api = await fetch(`${url}/book`);
  const { data } = await api.json();
  console.log(data);

  data.forEach((data) => {
    const newElement = document.createElement("div");
    newElement.innerHTML = `Id : ${data.id},
    Nama Buku : ${data.name}, Publisher : ${data.publisher},
    Year : ${data.year}, Page - Count : ${data.page_count}`;
    elementBooks.appendChild(newElement);
  });
}
getBooks();