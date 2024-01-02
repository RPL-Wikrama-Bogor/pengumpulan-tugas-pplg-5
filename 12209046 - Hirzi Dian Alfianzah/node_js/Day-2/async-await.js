function wait(ms) {
  return new Promise((resolve) => {
    setTimeout(resolve, ms);
  });
}

async function main() {
  console.log("mulai...");
  await wait(200);
  console.log("Setelah menunggu 2 detik");
}

main();
