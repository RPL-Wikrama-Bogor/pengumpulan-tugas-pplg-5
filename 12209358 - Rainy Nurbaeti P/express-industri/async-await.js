// const { resolve } = require("path")

function wait(ms){
    return new Promise((resolve) => {
        setTimeout(resolve, ms)
    })
}

async function main(){
    console.log("Mulai...")
    await wait(2000)
    console.log("Ini hasil menunggu 2 menit")
}

main()