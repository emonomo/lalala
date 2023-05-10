
// 輸入(載入)
import all from './all.js';   //all這個名稱是自命名的
// 要注意有些js保留字不能當名稱
console.log(all);

let strMsg ='Hi';
all.msg(strMsg);  //要all. 才能呼叫
all.add(3,5);