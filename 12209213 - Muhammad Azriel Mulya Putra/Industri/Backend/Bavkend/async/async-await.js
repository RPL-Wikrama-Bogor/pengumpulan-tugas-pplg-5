function wait(ms) {
    return new Promise((resolve) => {
        setTimeout(resolve, ms);
    })
}
async function main(){
    console.log('mulai...')

    await wait(2000);
    
    console.log('setelah menunggu 2 detik');
}


main();