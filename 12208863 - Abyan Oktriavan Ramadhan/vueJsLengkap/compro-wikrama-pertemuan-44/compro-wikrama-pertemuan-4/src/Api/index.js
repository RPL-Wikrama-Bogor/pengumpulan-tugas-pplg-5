async function Get(url) {
  return await fetch(url).then((res) => res.json());
}

export { Get };
