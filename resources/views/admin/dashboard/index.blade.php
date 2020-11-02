@extends('admin.layouts.template')

@yield('stylesheet')

@section('content')

<style>


</style>



          <div class="row">

                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">ออเดอร์สั่งซื้อข้อสอบ</h4>

                      <div class="table-responsive">

                      <table class="table" id="order-listing">
                        <thead>
                          <tr>
                            <th>ข้อสอบ</th>

                            <th>ราคาข้อสอบ</th>
                            <th>ชื่อนักเรียน</th>
                            <th>เบอร์ติดต่อ</th>
                            <th>วันที่</th>
                            <th>สถานะ</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="myData">

                        </tbody>
                      </table>


                      </div>

                      
                    </div>
                  </div>
                </div>


              </div>


@stop('content')



@section('scripts')



<script>
$(document).ready(function(){
          var data = $.getJSON( "{{url('/admin_order')}}", function( data ) {
            console.log(data);
 
            });
             
            $('#order-listing').DataTable({
                 "ajax" : "{{url('/admin_order')}}",
                 columns : [
                  { "data" : "ex_name"},
                  { "data" : "price"},
                  { "data" : "name"},
                  { "data" : "phone"},
                  { "data" : "created_at"},
                  {data: "status1" , render : function ( data, type, row, meta ) {
                    if(data === 0){
                      return type === 'display'  ?
                      '<a href="#" >รอการชำระเงิน</a>' : data;
                    }else if(data === 1){
                      return type === 'display'  ?
                      '<a href="#" >รอการตรวจสอบ</a>' : data;
                    }else{
                      return type === 'display'  ?
                      '<a href="#" >ชำระเงินแล้ว</a>' : data;
                    }
                  }
                  },
                  {data: "id" , render : function ( data, type, row, meta ) {
                    return type === 'display'  ?
                      '<a href="../admin/api_edit_order/'+ data +'" class="btn btn-outline-primary btn-sm">แก้ไข</a>' :
                      data;
                  }},
                 ]
            });
 
        });
/*
var tbody = $("<tbody />"),tr;
$.ajax({
      url: "{{url('/admin_order')}}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      type: 'GET',
      dataType: 'json',
      success: function (data) {
      //  console.log(data.data.status)
          if(data.success == true){

            var len = data.data.length;
            console.log(len)
            var txt = "";
            if(len > 0){
                    for(var i=0;i<len;i++){
                            txt += "<tr><td>"+data.data[i].ex_name+"</td>"+
                            "<td>"+data.data[i].price+"</td>"+
                            "<td>"+data.data[i].name+"</td>"+
                            "<td>"+data.data[i].phone+"</td>"+
                            "<td>"+data.data[i].email+"</td>"+
                            "<td>"+data.data[i].created_at+"</td>"+
                            "<td>"+data.data[i].name+"</td></tr>"
                            ;
                    }
                    console.log(txt)
                    if(txt != ""){
                      $("#myData").append(txt);
                    }
                }
          }else{
            swal("มีบางอย่างผิดพลาด");
          }
      },
      error: function () {
      }
  }); */


</script>

@stop('scripts')
