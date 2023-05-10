

function msg(str){
     console.log(str);            
}

function add(n1,n2){
     console.log(n1+n2);
}
// 輸出
export default{
    msg:msg,
    add:add
  //匯出名稱:function名稱
};