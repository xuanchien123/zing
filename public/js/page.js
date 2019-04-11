$(document).ready(function() {

    setTimeout(
      function(){$('.alert-tb').slideUp()},3000
      );


    $("#nn-select-sort").on('change', function() {
        alert( this.value );
    });
    $("#nnavatar").click(function(){
        $("#nnavatarfile").click();
    }); 
    $("#nnicon").click(function(){
        $("#nniconfile").click();
    });
    
    $(".nn-basic-single").select2({
      placeholder: "Chọn khách hàng",
      allowClear: true
    });
    $("#nn-select-provice").select2({
      placeholder: "Chọn tỉnh thành",
      allowClear: true
    });
    $('#dataTables-example').DataTable({
      "order": [[ 0, "desc" ]],
        "language": {
          "sProcessing":   "Đang xử lý...",
          "sLengthMenu":   "Xem _MENU_ mục",
          "sZeroRecords":  "Không tìm thấy kết quả nào phù hợp",
          "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
          "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
          "sInfoFiltered": "(được lọc từ _MAX_ mục)",
          "sInfoPostFix":  "",
          "sSearch":       "Tìm kiếm:",
          "sUrl":          "",
          "oPaginate": {
              "sFirst":    "Đầu",
              "sPrevious": "Trước",
              "sNext":     "Tiếp",
              "sLast":     "Cuối"
          }
        },
        responsive: true        
    });
    $('#dataTables-product-add').DataTable({
        responsive: true
    });
    $('#dataTables-customer').DataTable({
        responsive: true
    });

    $('#dataTables-product').DataTable({
        responsive: true
    });



    $(".nnedit").click(function(){
        
    });


});
function showimg(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#nnavatar')
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function showicon(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#nnicon')
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
