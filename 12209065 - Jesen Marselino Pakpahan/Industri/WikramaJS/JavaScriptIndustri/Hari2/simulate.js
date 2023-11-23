function simulateFileUpload(file, delay) {
    return new Promise((resolve, reject) =>{
        const interval = setInterval(() => {
            file.uploadedBytes = file.uploadedBytes || 0;
            file.uploadedBytes += 10;

            const progress = (file.uploadedBytes / file.totalBytes) * 100;

            console.log(`Uploading ${file.name} - Progress: ${progress.toFixed(2)}%`);

            if (file.uploadedBytes >= file.totalBytes) {
                clearInterval(interval);
                resolve(file);
            }
        }, 100);
    });
}

function simulateMultipleUploads(files){
    const uploadPromises = files.map((file, index) => {
        const delay = (index + 1) * 1000;

        return simulateFileUpload(file,delay);
    });

    return Promise.all(uploadPromises);
}

const filesToUpload = [
    {name: 'file1.txt', totalBytes: 100},
    {name: 'file2.jpg', totalBytes: 150},
    {name: 'file3.pdf', totalBytes: 200},
];
simulateMultipleUploads(filesToUpload)
  .then((uploadedFiles) => {
    console.log('All files uploaded successfully:', uploadedFiles);
  })
  .catch((error) => {
    console.error('Error occurred during file uploads:', error);
  });