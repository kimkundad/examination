@extends('admin.layouts.template')

@yield('stylesheet')


@section('content')

<style>


</style>



          <div class="row">
            
            

                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">ผู้ใช้งานทั้งหมด</h4>

                      <div class="table-responsive">

                        <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ชื่อผู้ใช้งาน</th>
                        <th>อีเมล</th>
                        
                        <th>วันเริ่ม</th>
                        <th>ดำเนินการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($objs)
                      @foreach($objs as $u)
                      <tr id="{{$u->id}}" access_id="{{$u->id}}">

                        <td>
                        <img src="{{ url('img/avatar/'.$u->avatar) }}" class="img-lg rounded" style="height:50px; width:50px; border: 1px solid #e41919;" alt="profile image"> 
                        </td>
                        <td>
                        {{ $u->name }}
                        </td>

                        <td>
                          {{ $u->email }}
                        </td>
                        
                        <td>
                          {{ $u->created_at }}
                        </td>
                        <td>
                          <a href="{{ url('admin/users/'.$u->id.'/edit') }}" class="btn btn-outline-primary btn-sm">แก้ไข</a>
                          <a href="{{ url('admin/del_users/'.$u->id) }}" class="btn btn-outline-danger btn-sm">ลบ</a>
                        </td>
                      </tr>
                      @endforeach
                      @endif



                    </tbody>
                  </table>


                      </div>
                      {{ $objs->links() }}
                    </div>
                  </div>
                </div>


              </div>


@stop('content')



@section('scripts')



<script>

$(document).ready(function(){


	$("input.checkbox").change(function(event) {

	var course_id = $(this).closest('tr').attr('access_id');

	console.log('fea : '+course_id);
	$.ajax({
					type:'POST',
					url:'{{url('api/shop_status')}}',
					headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
					data: { "user_id" : course_id },
					success: function(data){
						if(data.data.success){


              $.toast({
                heading: 'Success',
                text: 'ระบบทำการแก้ไขข้อมูลให้แล้ว.',
                showHideTransition: 'slide',
                icon: 'success',
                loaderBg: '#f96868',
                position: 'top-right'
              })



						}
					}
			});
	});

  	});






</script>

@stop('scripts')
