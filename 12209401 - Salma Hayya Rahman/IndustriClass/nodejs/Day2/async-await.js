function wait(ms){
    return new Promise((resolve) => {
        setTimeout(resolve, ms)
    })
}

async function main(){
    console.log("Mulai...")
    await wait(2000)
    console.log("Setalah menunggu 2 detik")
}

main()