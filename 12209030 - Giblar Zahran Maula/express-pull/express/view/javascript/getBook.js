const elmGetBooks = document.getElementById("bookTable")

async function getBooks(){  
  const api = await fetch(`${url}/book`)
  const {data} = await api.json()

  data.forEach(data => {
    const newRow = elmGetBooks.insertRow(-1);
    const idCell = newRow.insertCell(0);
    const nameCell = newRow.insertCell(1);
    const publisherCell = newRow.insertCell(2);
    const yearCell = newRow.insertCell(3);
    const pageCountCell = newRow.insertCell(4);

    idCell.innerHTML = data.id;
    nameCell.innerHTML = data.name;
    publisherCell.innerHTML = data.publisher;
    yearCell.innerHTML = data.year;
    pageCountCell.innerHTML = data.page_count;
  });
}

getBooks()