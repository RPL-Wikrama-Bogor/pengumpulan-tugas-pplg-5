function wait(ms){
    return new Promise((resolve) => {
        setTimeout(resolve, ms)
    })
}

async function main(){
    console.log("Mulai..")
    await wait(2000)
    console.log("Setelah menunggu")
}

main()