//建立模組的檔案

//建立加法函式
let add = function(n1, n2){
    console.log(n1 + n2);
};
//建立乘法函式
let multiply = function(n1, n2){
    console.log(n1 * n2);
};

let city = ['台北','桃園'];

//建立math物件包裝加法和乘法兩個函式
let math = {
    add:add,
    multiply:multiply,
    city:city
};

//預設的輸出
export default math;
export { add, multiply,city } ;  //非預設的輸出  ，這兩種自己選要哪種方式輸出