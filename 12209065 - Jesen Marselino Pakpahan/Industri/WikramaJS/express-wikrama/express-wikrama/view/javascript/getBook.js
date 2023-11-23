const elmGetBooks = document.getElementById("getBooks");

async function getBooks() {
    try {
        const response = await fetch(`${url}/book`);
        const data = await response.json();

        console.log(data); // Add this line to inspect the data structure

        data.forEach(book => {
            const newElement = document.createElement("div");
            newElement.innerHTML = `
                (id: ${book.id})
                Nama: ${book.nama} |
                Penulis: ${book.penulis} |
                Penerbit: ${book.penerbit} |
                Tahun: ${book.tahun} | 
                Halaman: ${book.halaman}
            `;
            elmGetBooks.appendChild(newElement);
        });

    } catch (error) {
        console.log(error);
    }
}

getBooks();