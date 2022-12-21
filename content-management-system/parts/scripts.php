<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            // 在初始表格的左上有個可選擇的每頁列數的選單設定
            lengthChange: true,   // 呈現選單
            lengthMenu: [5, 10, 25, 50],   // 選單值設定
            pageLength: 10,   // 不用選單設定也可改用固定每頁列數

            searching: true,   // 搜索功能
            ordering: true,   // 開啟排序

            // 下列 2 個一起用，就可以設定列出全部資料、可滑動又固定尺寸的表格
            paging: false,   // 是否建立分頁
            scrollY: 400,   // 固定可以上下滑動的高度

            // [指定的列 , 排序方向] 。
            // 預設 [[0, 'asc']] ，asc 升冪排列、desc 降冪排列。
            order: [[1, 'asc'], [2, 'asc']],

            // 鎖定行
            columnDefs: [{
                targets: [3],
                // 禁止排序
                orderable: false,
            }]
        });
    });
    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "lengthMenu": "顯示 _MENU_ 項結果",
                "zeroRecords": "沒有符合的結果",
                "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
                "search": "搜尋:"
            }
        });
    });
</script>