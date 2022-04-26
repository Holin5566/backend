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
let keys = ["user", "coupon", "delivery", "receipent", "address", "pay", "status", "valid", "deadline"]; //example
//
// 宣告 欲送出的 [value]
let userValue = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18',
    '19', '20'
]; //example
let couponValue = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; //example
let deliveryValue = ['mail', 'store', 'mail', 'store', 'mail', 'store', 'mail', 'store', 'mail', 'mail', 'mail',
    'store', 'mail', 'store', 'mail', 'store', 'mail', 'store', 'mail', 'mail'
]; //example
let receipentValue = ["陳冠廷", "陳冠宇", "陳宗翰", "陳家豪", "陳彥廷", "陳承翰", "陳柏翰", "陳宇軒", "陳家瑋", "陳冠霖", "陳雅婷", "陳雅筑",
    "陳怡君", "陳佳穎", "陳怡萱", "陳宜庭", "陳郁婷", "陳怡婷", "陳詩涵", "陳鈺婷",
]; //example
let addressValue = ['台北', '台中', '屏東', '嘉義', '彰化', '新竹', '雲林', '高雄', '台南', '花蓮', '宜蘭', '桃園', '苗栗', '台東', '澎湖', '金門',
    '新北', '南投', '基隆', '連江'
]; //example
let payValue = ['cash', 'credit card', 'cash', 'credit card', 'cash', 'credit card', 'cash', 'credit card', 'cash',
    'credit card', 'cash', 'credit card', 'cash', 'credit card', 'cash', 'credit card', 'cash', 'credit card',
    'cash', 'credit card'
]; //example
let statusValue = ['received', 'received', 'received', 'received', 'received', 'received', 'received', 'received',
    'received', 'received', 'received', 'received', 'received', 'received', 'received', 'received', 'received',
    'received', 'received', 'received'
]; //example
let validValue = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]; //example
let deadlineValue = ['1', '9', '8', '7', '6', '5', '3', '2', '1', '5', '1', '9', '8', '7', '6', '5', '3', '2', '1',
'5']; //example
//
// 宣告 目標網址
let url = "http://localhost:8080/project/api/order_info/post.php"; //example


try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, userValue, couponValue, deliveryValue, receipentValue, addressValue, payValue, statusValue,
        validValue, deadlineValue) //keys 順序對應 value 的放入順序
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