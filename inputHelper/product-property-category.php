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
// 禮盒---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
let keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
let product_id = ["4", "1", "8", "2", "5", "7", "3"]; //example
let category_id = ["12", "12", "12", "12", "12", "12", "12"]; //example
//
// 宣告 目標網址
let url = "http://localhost:8080/project/api/product/product-property-category-post.php"; //example

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 禮盒---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["4", "1", "8", "2", "5", "7", "3"]; //example
category_id = ["1", "3", "3", "3", "5", "5", "8"]; //example
//
// 宣告 目標網址

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 千層蛋糕---------------------------------------------------------------------------------

// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["6", "9", "10", "12", "11", "19", "13","14"]; //example
category_id = ["4", "4", "4", "4", "4", "4", "4", "4"]; //example
//

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 千層蛋糕---------------------------------------------------------------------------------

// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["6", "9", "10", "12", "11", "19", "13","14"]; //example
category_id = ["5", "5", "5", "5", "5", "5", "5", "5"]; //example
//

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 生乳捲---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["15", "18", "16", "17", "20", "21", "24", "22", "23",
    "25", "27", "26", "28", "30", "29", "31", "32", "33",
    "34", "35", "37"
]; //example
category_id = ["11", "11", "11", "11", "11", "11", "11", "11", "11", "11", "11", "11", "11", "11", "11",
    "11", "11", "11", "11", "11", "11"
]; //example

//

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 派---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["36", "38", "39", "40", "41", "42", "43", "45", "44", "46", "47",
    "48", "49", "58", "50", "51", "52", "53", "54", "55", "56", "57"
]; //example
category_id = ["2", "2", "2", "2", "2", "2", "2", "2", "2", "2", "2", "2", "2",
    "2", "2", "2", "2", "2", "2", "2", "2", "2"
]; //example
//

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 馬卡龍---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["59", "60", "61", "62", "63", "64", "65", "66", "67",
    "68", "74", "69", "70", "72", "71", "73", "75"
]; //example
category_id = ["13", "13", "13", "13", "13", "13", "13", "13", "13", "13", "13", "13", "13", "13", "13", "13",
    "13"
]; //example
//

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 戚風蛋糕---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["76", "77", "78", "79", "80", "81", "82", "83",
    "84", "85", "86", "87", "88", "89", "90", "91",
    "92", "93", "94", "95", "96", "97", "98",
    "99", "104", "101"
]; //example
category_id = ["6", "6", "6", "6", "6", "6", "6", "6", "6", "6", "6", "6", "6",
    "6", "6", "6", "6", "6", "6", "6", "6", "6", "6", "6", "6", "6"
]; //example
//

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 戚風蛋糕---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["76", "77", "78", "79", "80", "81", "82", "83",
    "84", "85", "86", "87", "88", "89", "90", "91",
    "92", "93", "94", "95", "96", "97", "98",
    "99", "104", "101"
]; //example
category_id = ["5", "5", "5", "5", "5", "5", "5", "5", "5", "5", "5", "5", "5",
    "5", "5", "5", "5", "5", "5", "5", "5", "5", "5", "5", "5", "5"
]; //example
//

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 蛋糕---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["100", "102", "103", "105", "106", "107", "110", "111", "108",
    "109",

    "112", "113", "114", "115", "117", "116", "118", "119", "120", "121",

    "122", "123", "127", "124", "126", "125", "128", "129", "130", "131",

    "134", "132", "133", "135", "136", "147", "137", "138", "139", "140",

    "141", "144", "143", "142", "146", "148", "145", "149", "150", "151",

    "156", "155", "154", "152", "153", "157", "158", "164", "160", "166",

    "159", "162", "161", "165", "163", "168", "167", "170", "169", "171"
]; //example
category_id = ["5", "5", "5", "5", "5", "5", "5", "5", "5", "5",
    "5", "5", "5", "5", "5", "5", "5", "5", "5", "5",
    "5", "5", "5", "5", "5", "5", "5", "5", "5", "5",
    "5", "5", "5", "5", "5", "5", "5", "5", "5", "5",
    "5", "5", "5", "5", "5", "5", "5", "5", "5", "5",
    "5", "5", "5", "5", "5", "5", "5", "5", "5", "5",
    "5", "5", "5", "5", "5", "5", "5", "5", "5", "5"
]; //example

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 蛋糕捲---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["175", "172", "173", "174"]; //example
category_id = ["9", "9", "9", "9"]; //example
//

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 塔---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["176", "184", "177", "179", "178", "180", "182", "181", "183", "185",
    "186", "187", "188", "189", "190", "191"
]; //example
category_id = ["1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1",
    "1", "1", "1"
]; //example
//

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 餅乾---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
product_id = ["192", "193", "194", "202", "198", "195", "196", "197", "199", "201",

    "200", "205", "204", "203", "207", "206", "208", "209", "211", "210",

    "213", "214", "212", "215", "216", "218", "217", "220", "219", "222",

    "221", "231", "223", "224", "225", "226", "227", "229", "233", "228",

    "232", "230", "234", "235", "237", "236", "239", "238", "240", "241",

    "242", "243", "244", "246", "245", "248", "247", "249", "250", "251",

    "253", "252", "254"
]; //example
category_id = ["3", "3", "3", "3", "3", "3", "3", "3", "3", "3",
    "3", "3", "3", "3", "3", "3", "3", "3", "3", "3",
    "3", "3", "3", "3", "3", "3", "3", "3", "3", "3",
    "3", "3", "3", "3", "3", "3", "3", "3", "3", "3",
    "3", "3", "3", "3", "3", "3", "3", "3", "3", "3",
    "3", "3", "3", "3", "3", "3", "3", "3", "3", "3",
    "3", "3", "3"
]; //example

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
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
                    `\n\n POST資料: \n ${JSON.stringify(body)} \n回應: \n ${JSON.stringify(res)}\n
                    ----------------------`
            },
            error: function(err) {
                info.innerText +=
                    `\n\n POST資料: \n ${JSON.stringify(body)} \n回應:  \n ${JSON.stringify(err)}\n
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