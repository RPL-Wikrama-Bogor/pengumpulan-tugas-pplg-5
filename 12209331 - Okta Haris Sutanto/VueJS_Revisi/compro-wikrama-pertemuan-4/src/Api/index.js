const URL = "http://127.0.0.1:9000/api/";

async function Get(path) {
  return await fetch(`${URL}${path}`)
    .then((res) => res.json())
    .catch((error) => {
      console.error("Error in Get:", error);
      throw error; // Rethrow the error to handle it at the higher level
    });
}

async function Post(path, data) {
  return await fetch(`${URL}${path}`, {
    method: "POST", // Fix the typo here
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .catch((error) => {
      console.error("Error in Post:", error);
      throw error; // Rethrow the error to handle it at the higher level
    });
}

export { Get, Post };
