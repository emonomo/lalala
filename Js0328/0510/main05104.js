//使用模組的檔案主程式

// 1a. 匯入預設模組檔 ，math名稱是自命名的
import math from './lib05104.js';
// 1b. 使用
math.add(3,5);
math.multiply(8,9);
console.log(math.city);
console.log(math.city[1]);

// 2a. 匯入非預設模組檔
import { add, multiply, city } from './lib05104.js';
// 2b. 使用
console.log(add);
add(3,11);
multiply(7,10);
console.log(city[0]);
