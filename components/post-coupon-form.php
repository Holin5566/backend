<!-- 表單 -->
<form action="../api/coupon/post.php" method="POST">
    <!-- 普通欄位 -->
    <div class="mb-3">
        <label for="inpit1" class="form-label">name</label>
        <!-- label for 的功能 點標題字就可以到那格的輸入空格中 -->
        <input type="text" class="form-control border-2 rounded-3" name="name" id="name" placeholder="輸入">
    </div>
    <div class="mb-3">
        <label for="inpit1" class="form-label">code</label>
        <input type="text" class="form-control border-2 rounded-3" name="code" id="code" placeholder="輸入">
    </div>
    <div class="mb-3">
        <label for="discount" class="form-label">discount折扣</label>
        <input type="text" class="form-control border-2 rounded-3" name="discount" id="discount" placeholder="%記得換算">
    </div>

    <div class="mb-2">
        <label for="inpit1">expiry</label>
        <div class="row">
            <div class="col">
                開始 <input type="date" name="date1" class="m-2 p-1 border-1 rounded-3">
                <br>

                <div class="col">
                    結束 <input type="date" name="date2" class="m-2 p-1 border-1 rounded-3">
                </div>

                <div class="mb-3">
                    <label for="inpit1" class="form-label">litmited</label>
                    <input type="text" class="form-control border-2" name="limited" id="limited" placeholder="輸入">
                </div>
            </div>


            <!-- 送出按鈕 -->
            <div class="text-center">
                <button type="submit" class="btn btn-secondary btn-lg ">submit</button>
            </div>
        </div>
</form>