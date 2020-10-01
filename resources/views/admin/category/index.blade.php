@extends('admin.layouts.template')

@yield('stylesheet')


@section('content')

<style>


</style>



          <div class="row">
            <div class="col-md-12">
              <a href="{{ url('admin/category/create') }}" class="btn btn-success btn-fw" style="float:right"><i class="icon-plus"></i>เพิ่ม หมวดหมู่</a>
              <br /><br />
            </div>

                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">หมวดหมู่ ทั้งหมด</h4>

                      <div class="table-responsive">

                        <table class="table">
                    <thead>
                      <tr>
                        <th>ชื่อหมวดหมู่</th>

                        <th>จำนวนข้อสอบ</th>
                        <th>ยอดเข้าชม</th>
                        <th>สร้างวันที่</th>
                        <th>ดำเนินการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($objs)
                      @foreach($objs as $u)
                      <tr>
                        <td>
                          {{ $u->cat_name }}
                        </td>
                        <td>
                          {{ $u->option }}
                        </td>
                        <td>{{ $u->cat_view }}</td>
                        <td>
                          {{ $u->created_at }}
                        </td>
                        
                        <td>
                          <a href="{{ url('admin/category/'.$u->id) }}" class="btn btn-outline-success btn-sm">ดูข้อสอบ</a>
                          <a href="{{ url('admin/category/'.$u->id.'/edit') }}" class="btn btn-outline-primary btn-sm">แก้ไข</a>
                          <a href="{{ url('del/cat_id/'.$u->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">ลบ</a>
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


</script>

@stop('scripts')
