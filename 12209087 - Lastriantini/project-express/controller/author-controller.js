const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
// const jwt = require('jsonwebtoken')
// createPool :  menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig)

// kalau ada error, errornya di munculin di console
pool.on('error', (err)=> {
    console.error(err)
})
// membuat format hasil API kalai hhtp response statur code nya 400 an
const responseAuthorNotfound = (res) => res.status(404).json({
    sucsess: false,
    massage: 'Author Not Found',
})
//  membuat formah hasil API kalau http response status code nya 200 aja, gabisa lebih
const responseSuccess = (res, result, message) => res.status(200).json({
    // isi yang ada disini sama dengan format di postman
    sucsess: true,
    message: message,
    data: result
})

// req : request data masuk, res: response
const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;';

    // untuk menyambungkan ke configurasi yang dijalankan tadi, dari package nya akan mendaptkan 2 connection(err dan result)
    // paramereter 1 : menamngkap err, paramerer 2: mencoba koneksi ke db nya
    pool.getConnection((err, connection) => {
        // if satu bari sbida dimanapun, asalkan hanya ada 1 perintah/proses
        // kalo pas proses awal koneksi ketemu err, kode dibaawh bakal di skip dan mengembalikan hasil response err nya
        if (err) throw err; 
        // menjalankan perintah sql, paramerternya ada 3
        // parameter 1 : variable yang isiny aperintah sql
        // parameter 2 (opsional) : mengirim data (hanya dijalankan untuk tampah/update)
        // parameter3: rungtion yang menangani hasil reqs sql nya : 2 parameter (mengambil sata err, mengambil data hasil)
        connection.query(query,(err,results) => {
            if (err) throw err;
            // ketika berhasil, format api nya di samakan degnan di function responseSuccess
            responseSuccess(res,results, 'author successfully fetched');
        });
        // menghentikan koneksi kalau query nya udah selesai dijalankan.    
        connection.release()
    });
};

// get Author
const getAuthor = (req, res) => {
    const id = req.params.id;

    const query = `SELECT * FROM author WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, results) => {
            if (err) throw err;

            if(results.length == 0) {
                responseAuthorNotfound(res);
                return;
            }
            responseSuccess(res, results, 'Author successfully fetched');
        });
        connection.release();
    });
};

// add Author
const addAuthor = (req, res) => {
    const data= {
        // sebelum : disamail yang di db, setelah .body disamain kayak di postman
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };
    // ? tanda tanya nya sifatnya sebagai parameter yang harus diisi
    // ? diisi sama connection.query parameter ke 2
    const query = "INSERT INTO author SET ?;";

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            responseSuccess(res, results, 'Author successfully added');
        });
        
        connection.release();
    });
};

const editAuthor = (req, res) => {
    const data= {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };

    const id = req.params.id

    const query = `UPDATE author SET ? WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if(err) throw err

            if(results.affectedRows == 0){
                responseAuthorNotfound(res);
                return;
            }
            responseSuccess(res, results, 'Author successfully updated');
        });
        connection.release();
    });
};

const deleteAuthor = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if(err) throw err

            if(results.affectedRows == 0) {
                responseAuthorNotfound(res);
                return;
            }
            responseSuccess(res, results, 'Author successfully deleted')
        });
        connection.release();
    });
};
// kalo gak di export gabisa dipake, wajib
module.exports = {
    getAuthors, getAuthor, addAuthor, editAuthor, deleteAuthor
}