async function Get(url){
    return fetch(url).then((res)=> res.json);
}
const nama = 'wikrama';
export {Get,nama};
