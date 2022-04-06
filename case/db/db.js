const mysql=require('mysql')
const pool=mysql.createPool({
    host:'127.0.0.1',
    user:'root',
    password:'123456',
    database:'yanxue'
})
function query(sql,callback) {
    pool.getConnection(function (err,connection) {
        if (err){
            console.log('数据库服务器链接出错:'+err)
            return;
        }
        connection.query(sql,function (err,result) {
            if (err){
                console.log('数据库查询出错：'+err)
                return;
            }
            callback(err,result)
            connection.release()
        })
    })
}
module.exports.query=query;