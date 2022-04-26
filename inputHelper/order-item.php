<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會塞資料的小精靈</title>
    <style>
    body {
        width: 50vw;
        word-wrap: break-word;
        line-height: 1.5rem;
        margin: 3rem auto;
    }
    </style>
</head>

<body>
    <p id="info"></p>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
// 宣告 欲送出的 [key]
let keys = ["product", "order_info", "class", "counter", "memo", "valid"]; //example
//
// 宣告 欲送出的 [value]
let productValue = []; //example
let order_infoValue = []; //example
let classValue = []; //example
let counterValue = []; //example
let memoValue = []; //example
let memoList = ['加辣不加蒜', '九層塔多一點', '不要胡椒粉', '加梅粉', '', '', '']; //example
let validValue = []; //example
let zero = [];
//
// 宣告 目標網址
let url = "http://localhost:8080/project/api/order_item/post.php"; //example

randomNum(productValue, 100, 200);
randomNum(classValue, 100, 5);
randomNum(zero, 100, 0);
productValue = [...productValue, ...zero];
classValue = [...zero, ...classValue];
randomNum(order_infoValue, 200, 20);
randomNum(counterValue, 200, 5);
randomContent(memoValue, 200, 7);
randomContent(validValue, 200, 1);


function randomNum(arr, range, max) {
    for (let i = 0; i < range; i++) {
        arr.push(Math.ceil(Math.random() * max));
    }
    return arr;
}

function randomContent(arr, range, max) {
    for (let i = 0; i < range; i++) {
        arr.push(memoList[Math.floor(Math.random() * max)]);
    }
    return arr;
}
try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, productValue, order_infoValue, classValue, counterValue, memoValue,
        validValue) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};







function multiInput(url, keys, ...arrs) {
    let size = arrs[0].length;
    info.innerText = "小精靈開示了 : "
    if (url == "http://localhost:8080/myPostApi.php") {
        throw "改一下變數麻";
    }
    arrs.forEach(arr => {
        if (arr.length != size) {
            info.innerText += `\n\n 標準長度是 ${size}\n第 ${arrs.indexOf(arr)+1} 個陣列長度是 ${arr.length} `;
            throw "長度怪怪的ㄛ";
        }
    })
    for (let i = 0; i < arrs[0].length; i++) {
        let body = {};
        for (let j = 0; j < keys.length; j++) {
            let arr = arrs[j]
            body[keys[j]] = arr[i];
        }
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: body,
            success: function(res) {
                info.innerText +=
                    `\n\n POST資料: \n ${JSON.stringify(body)} \n回應: \n ${JSON.stringify(res.responseText)}\n
                    ----------------------`
            },
            error: function(err) {
                info.innerText +=
                    `\n\n POST資料: \n ${JSON.stringify(body)} \n回應:  \n ${JSON.stringify(err.responseText)}\n
                    ----------------------`
            },
        });
    }
}

function sayError(e) {
    info.innerText += "\n";
    info.innerText += e;

}
</script>

</html>