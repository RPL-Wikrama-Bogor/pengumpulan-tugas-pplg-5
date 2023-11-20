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
      throw new Error("Terjadi Kesalahan pada server");
    }
    return await response.json();
  } catch (error) {
    throw new Error("Terjadi Kesalahan", error.message);
  }
}

document
  .getElementById("addBook")
  .addEventListener("submit", async function () {
    const formData = new FormData(this);
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });
    try {
      const result = await postData(url, data);
    } catch (error) {
      console.error(error.message);
    }
  });
