const elmGetBooks = document.getElementById("getBooks");

async function getBooks() {
  const api = await fetch(`${url}/book`);
  const { data } = await api.json();

  data.forEach((data) => {
    const newElement = document.createElement("div");
    newElement.innerHTML = `Id: ${data.id}, 
                            Nama Buku: ${data.name},
                            Author: ${data.author},
                            Year: ${data.year},
                            Page Count: ${data.page_count},
                            Publisher: ${data.publisher}`                         
                            ;
    elmGetBooks.appendChild(newElement);
  });
}
getBooks();
