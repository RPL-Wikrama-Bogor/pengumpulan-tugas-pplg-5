//menyediakan 
const dbConfig = require('../config/db-confing')

const mysql = require('mysql2')
//createPool : menghubungkan project ke database hanya sekali di awal
const pool = mysql.createPool(dbConfig)

//kalau ada err,  err nya muncul di console
pool.on('error', (err) => {
    console.error(err)
})
//membuat format hasil API kalau http response status codenya-400an
const responAuthorNotFound = (res) =>  res.status(404).json({
   
    succes: false,
    message: 'Author Not found'
})
//membuat format hasil API kalau http response status codenya-200
const responseSuccess = (res, result ,massage) => res.status(200).json({
    success: true,
    massage:massage,
    data :result,
})
//membuat
const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author';
    //untuk menyambungkan ke konfigurasi  db sebelumnya
    //parameter 1: menangkap error
    //parameter 2: mencoba koneksi ke db nya
    pool.getConnection((err ,connection) => {
        //if tangpa {} bisa di gunakan ketika proses dalam if hanya satu
        // kalau pas proeses awal koneksi ketemu err, kode dibawah bakal di skip dan mengembalikan hasil response err-nya
        if(err) throw err
        //menjalankan perintah sql :parameter 3
        //parameter 1 : variabel yang isinya perintah sql
        //parameter 2 (optional): mengirim data(hayanya dijalankan untuk nambah/update)
        //parameter 3: function yang menangani hasil req sql nya : 2parameter . err(mengambil data err),results(mengambil data berhasil)
        connection.query(query, (err, results) =>{
            if (err) throw err
        //ketika berhasil ,format API disamakan dengan difunc responSuccess
            responseSuccess(res, results, 'Author successfully fetched')

        })
        //mhentikan koneksi kalau query nya udah selesai di jalankan
        connection.release()
    })
}

//menambah
const addAuthor = (req, res)=> {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
        
    }
    // ? = parameter yang perlu di isi 
    // ? di isi sama connection.query parameter ke 2
    const query = `INSERT INTO author SET ?;`
    
    pool.getConnection((err ,connection) => {
        if(err) throw err
        connection.query(query, [data], (err, results) =>{
            if (err) throw err
            responseSuccess(res, results,'Author added Successfully')
        })
        connection.release()
    })
    }

//cari
    const getAuthor = (req, res) =>{
        const id = req.params.id;
        const query = `SELECT * FROM author WHERE id = ${id}`
        pool.getConnection((err ,connection) => {
            if(err) throw err
            connection.query(query, (err,results) =>{
                if (err) throw err

                if (results.length == 0){
                    responAuthorNotFound(res)
                    return
                }
                responseSuccess(res, results, "Author sucessfuly fethed")
                })
            connection.release()
        })
    }
//edit
const editAuthor = (req, res) =>{
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
        
    }
    const id = req.params.id;
    const query = `UPDATE author SET ? WHERE id=${id}`
        pool.getConnection((err ,connection) => {
            if(err) throw err
            connection.query(query, [data], (err, results) =>{
                if (err) throw err

                if(results.affectedRows == 0){
                    responAuthorNotFound(res)
                    return
                }
                responseSuccess(res, results,"Author successfuly updated")
            })
            connection.release()
        })
    }

//delete Author
const deleteAuthor = (req, res)=>{

    const id = req.params.id;
    const query = `DELETE FROM author WHERE id=${id}`
    pool.getConnection((err ,connection) => {
        if(err) throw err
        connection.query(query, (err, results) =>{
            if (err) throw err
            if(results.affectedRows == 0){
                responAuthorNotFound(res)
                return
            }
            responseSuccess(res, results, 'Author deleted successfully')
        })
        connection.release()
    })
    
}
  
//untuk meng exports
//kalau ga di export ga bisa di pake , wajib
module.exports = {
    getAuthors,
    addAuthor,
    getAuthor,
    editAuthor,
    deleteAuthor
    
}
