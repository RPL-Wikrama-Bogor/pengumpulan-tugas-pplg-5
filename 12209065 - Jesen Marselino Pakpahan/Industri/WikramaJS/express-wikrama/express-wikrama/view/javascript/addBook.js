async function postData(url = "", data = {}) {
    try {
        url = `${url}/book`;
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        });

        if (!response.ok) {
            throw new Error("Terjadi kesalahan pada server");
        }

        return await response.json();
    } catch (error) {
        throw new Error(`Terjadi kesalahan: ${error.message}`);
    }
}

document.getElementById("addBook").addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const data = {};

    formData.forEach((value, key) => {
        data[key] = value;
    });

    try {
        const result = await postData(url, data);
        console.log("Book added successfully:", result);

    } catch (error) {
        console.log(error.message);
    }

    if (data != 'success') {
        alert("berhasil menambahkan data")
    } else {
        alert("gagal menambahkan data")
    }
});