    const elmGetBooks = document.getElementById("getBooks")

    async function getBooks() {
        const api = await fetch(`${url}/book`)
        const {
            data
        } = await api.json()

        data.forEach(data => {
            const newElement = document.createElement("div")
            newElement.innerHTML = `Id: ${data.id},
                                        Nama buku : ${data.author},
                                        Publisher : ${data.publisher},
                                        Year : ${data.year},
                                        Page count : ${data.page_count}`

            elmGetBooks.appendChild(newElement)
        });
    }

getBooks()