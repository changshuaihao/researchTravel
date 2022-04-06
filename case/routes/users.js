var express = require('express');
var router = express.Router();
const db=require('../db/db')
// console.log(db.query.toString())
/* GET users listing. */
//获取mylist表的数据
router.get('/mylist', function(req, res, next) {
  let sql="select * from mylist";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取courses表的数据
router.get('/courses', function(req, res, next) {
  let sql="select * from courses";
  var qq=[{name:''}]
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    // for (let i=0;result.length;i++){
    //   qq[i].name = result[i].courses_name
    // }
    res.send(result)
  })
});
//获取book表的数据
router.get('/book1', function(req, res, next) {
  let sql="select * from book1";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
router.get('/book2', function(req, res, next) {
  let sql="select * from book2";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
router.get('/book3', function(req, res, next) {
  let sql="select * from book3";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
router.get('/book4', function(req, res, next) {
  let sql="select * from book4";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
router.get('/book5', function(req, res, next) {
  let sql="select * from book5";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
router.get('/book6', function(req, res, next) {
  let sql="select * from book6";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
router.get('/book7', function(req, res, next) {
  let sql="select * from book7";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取curriculum表的数据，将表的数据导入到kecheng02页面中
router.get('/curriculum', function(req, res, next) {
  let sql="select * from curriculum";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取cart表的数据
router.get('/cart', function(req, res, next) {
  let sql="select * from cart";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});

//获取index表的数据
router.get('/index_i', function(req, res, next) {
  let sql="select * from index_i";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取jigou表的数据
router.get('/jigou', function(req, res, next) {
  let sql="select * from jigou";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取mycatalog表的数据
router.get('/mycatalog', function(req, res, next) {
  let sql="select * from mycatalog";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取pai_jidi表的数据
router.get('/pai_jidi', function(req, res, next) {
  let sql="select * from pai_jidi";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取pai_jigou表的数据
router.get('/pai_jigou', function(req, res, next) {
  let sql="select * from pai_jigou";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取pai_teacher表的数据
router.get('/pai_teacher', function(req, res, next) {
  let sql="select * from pai_teacher";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取ping表的数据
router.get('/ping', function(req, res, next) {
  let sql="select * from ping";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取route表的数据
router.get('/route', function(req, res, next) {
  let sql="select * from route";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取sidelights表的数据
router.get('/sidelights', function(req, res, next) {
  let sql="select * from sidelights";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取sidelights02表的数据
router.get('/sidelights02', function(req, res, next) {
  let sql="select * from sidelights02";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取teacher表的数据，teacher表对于index首页中的导师页面
router.get('/teacher', function(req, res, next) {
  let sql="select * from teacher";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取index_daoshi_name表的数据，对于index首页中的导师页面
router.get('/index_daoshi_name',function (req,res) {
  let sql="select * from index_daoshi_name";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
})
//获取首页中路线页面需要的数据，获取数据库表route_name的数据
router.get('/route_name',function (req,res) {
  let sql="select * from route_name";
  let route=[]
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错：'+err)
      return
    }
    for (let i=0;i<result.length-4;i++){
      route[i]=result[i]
    }
    res.send(route)
  })
})
router.get('/route_name2',function (req,res) {
  let sql="select * from route_name";
  let route=[]
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错：'+err)
      return
    }
    for (let i=4;i<result.length;i++){
      route[i-4]=result[i]
    }
    res.send(route)
  })
})
//获取route_juti表的数据，与首页路线相关
router.get('/route_juti',function (req,res) {
  let sql="select * from route_juti";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错：'+err)
      return
    }
    res.send(result)
  })
})
//获取tuijian表的数据，获取首页中的推荐页面
router.get('/tuijian', function(req, res, next) {
  let sql="select * from tuijian";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取records表的数据
router.get('/records', function(req, res, next) {
  let sql="select * from records";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//在index首页中，获取研学新闻的内容,获取数据库表index_news表的内容
router.get('/index_news',function (req,res) {
  let sql="select * from index_news";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
    }
    res.send(result)
  })
})
//在index首页中的基地介绍中，获取从化基地的数据，获取数据库表index_jidi_local的数据
router.get('/index_jidi_local',function (req,res) {
  let sql="select * from index_jidi_local";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
    }
    res.send(result)
  })
})
//在index首页中的基地介绍中，获取全部基地的数据，获取数据库表index_jidi_all的数据
router.get('/index_jidi_all',function (req,res) {
  let sql="select * from index_jidi_all";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
    }
    res.send(result)
  })
})
//获取travel表的数据
router.get('/travel', function(req, res, next) {
  let sql="select * from travel";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//将uniapp的旅行记录的数据传输到数据库
router.post('/travel',function (req,res) {
  let d=req.body
  console.log(d)
  const sql="insert into travel(input,follow,travel_img) values('"+d.form+"','"+d.follow+"','"+d.img+"')"
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    console.log('成功')
  })
})
//record中判断关注
router.post('/travelguanz',function (req,res) {
  let d=req.body
  let sql2="update travel set follow='"+d.follow.foll+"' where id="+d.follow.id
  db.query(sql2,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    console.log('成功')
  })
})
//follow的数据传递到数据库
router.post('/follow',function (req,res) {
  let f=req.body
  const sql="insert into guanzhu(id,time,input,travel_img) values('"+f.follow.id+"','"+f.follow.time+"','"+f.follow.input+"','"+f.follow.travel_img+"')"
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    console.log('成功')
  })
})
//获取guanzhu表的数据
router.get('/guanzhu', function(req, res, next) {
  let sql="select * from guanzhu";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    res.send(result)
  })
});
//获取取消关注的id
router.post('/quxiao',function (req,res) {
  let id=req.body.quxiao
  console.log(id)
  let follow='关注'
  console.log(follow)
  let sql="delete from guanzhu where id="+id;
  // let sql2="update travel set follow='"+d.follow.foll+"' where id="+d.follow.id
  let sql2="update travel set follow='"+follow+"' where id="+id
  db.query(sql,function (err,result) {
    if (err){
      console.log('删除失败：'+err)
      return
    }
    db.query(sql2,function (err,result) {
      if (err){
        console.log('查询出错:'+err)
        return
      }
      console.log('成功')
    })
  })
})
//获取到微信登录的头像和昵称
router.post('/login',function (req,res) {
  // console.log(req.body)
  let username=req.body.user;
  let url=req.body.url;
  const sql="insert into login(username,url) values('"+username+"','"+url+"')"
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    console.log('成功')
  })
})
//将登录表login的数据导入到登录中
router.get('/login', function(req, res, next) {
  let sql="select * from login";
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    let x=result.length-1
    console.log(x)
    res.send(result[x])
  })
});
//将课程的数据上传到数据库中
router.post('/kecheng',function (req,res) {
  let url=req.body.kecheng.url;
  let name=req.body.kecheng.name;
  let price=parseInt(req.body.kecheng.price);
  let time=req.body.kecheng.time;
  let gou=req.body.kecheng.gou;
    let sq="select * from kecheng";
    db.query(sq,function (err,result) {
        if (err){
            console.log('查询出错:'+err)
            return
        }
        let x=result.length
        let id=x+1
        const sql="insert into kecheng(id,url,name,time,price,gou) values('"+id+"','"+url+"','"+name+"','"+time+"','"+price+"','"+gou+"')"
        // const sql="insert into login(username,url) values('"+username+"','"+url+"')"
        db.query(sql,function (err,result) {
            if (err){
                console.log('查询出错:'+err)
                return
            }
            console.log('成功')
        })
    })
})
router.get('/kecheng', function(req, res, next) {
    let sql="select * from kecheng";
    db.query(sql,function (err,result) {
        if (err){
            console.log('查询出错:'+err)
            return
        }
        res.send(result)
    })
});
//修改kecheng02页面的购买改为已购买
router.post('/yigoumai',function (req,res) {
  let d=req.body.kecheng
  let id=req.body.kechengid
  console.log(req.body)
  let sql2="update curriculum set goumai='"+d+"' where id="+id
  db.query(sql2,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    console.log('成功')
  })
})
//退款页面中，删除kecheng表中的数据，并将curriculum中的已购买改为未购买
router.post('/tuikuang',function (req,res) {
  console.log(req.body.id)
  let sql="delete from kecheng where id="+req.body.id;
  let sql2="update curriculum set goumai='"+req.body.gou+"' where id="+req.body.id
  db.query(sql,function (err,result) {
    if (err){
      console.log('查询出错:'+err)
      return
    }
    db.query(sql2,function (err,result) {
      if (err){
        console.log('查询出错:'+err)
        return
      }
      console.log('成功')
    })
  })
})
module.exports = router;




