async function Get(url) {
    return fetch(url).then((res) => res.json());
}

async function Post(path, data) {
    return await fetch(`${URL}${path}`, {
        method: "POST"
    })
}

export { Get };