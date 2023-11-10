// contoh fungsi asinkron
function wait(ms) {
    return new Promise((resolve)=> {
        setTimeout(resolve, ms)
    })
}
async function main() {
    console.log("Mulai...")
    // menunggu 2 detik
    await wait(2000)
    console.log("Setelah menunggu 2 detik.")
}

// memanggil fungsi asinkron
main()
main()
