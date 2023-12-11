async function Get(url) {
  return await fetch(url).then(res.json);
}

export { Get };
