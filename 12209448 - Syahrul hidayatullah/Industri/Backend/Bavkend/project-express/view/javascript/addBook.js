async function postData(url = "",data = {}){
    try {
        url = `${url}/book`
   const respose = await fetch(url,{
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify(data)
   })
   if(!respose.ok){
    throw new Error("terjadi kesalahan pada server")
   }
   return await respose.json()

    }catch (error) {
        throw new Error("terjadi kesalahan",error.message)

    }
}


document.getElementById("addBook").addEventListener("submit",
async function(e){
    e.preventDefault()
    const formData = new FormData(this)
    const data = {
    }
    formData.forEach((value,key) => {
        data[key] = value
    })
    try{
        const result = await postData(url,data)
    }catch (error) {
        console.log(error.message)
    }
})