//fungsi asinkron

function wait(ms) {
    return new Promise((resolve, reject) => {
        setTimeout( resolve, ms);
    });
    
}

//fungsi asingkoron dengan async/await
async function main() {
    console.log('Mulai...');
    //delay
    await wait(2000);
    console.log('Selesai menunggu 2 detik');
}
//memangil fungsi asinkron
main();


