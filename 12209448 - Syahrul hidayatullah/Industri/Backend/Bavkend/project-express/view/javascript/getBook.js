 const elmGetBooks = document.getElementById("getBooks")

        async function getBooks() {
            const api = await fetch(`${url}/book`)
            const data = await api.json()
            const dat = (data.result)

            dat.forEach(dat => {
                const newElement = document.createElement("div")
                newElement.innerHTML = ` (${dat.id})
                Nama buku : ${dat.name} |
                publisher : ${dat.publisher} |
                year : ${dat.year} |
                Page count : ${dat.page_count}
                `
                elmGetBooks.appendChild(newElement)
            });
        }

        getBooks()