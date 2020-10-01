@extends('admin.layouts.template')

@yield('stylesheet')


@section('content')

<style>


</style>



          <div class="row">
            <div class="col-md-12">
              <a href="{{ url('admin/example/create') }}" class="btn btn-success btn-fw" style="float:right"><i class="icon-plus"></i>เพิ่ม แบบฝึกหัด</a>
              <br /><br />
            </div>

                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">แบบฝึกหัด {{ $obj->cat_name }}</h4>

                      <div class="table-responsive">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>แบบฝึกหัด</th>

                        <th>หมวดหมู่</th>
                        <th>จำนวนข้อ</th>
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
                          {{ $u->ex_name }}
                        </td>
                        <td>
                          {{ $u->cat_name }}
                        </td>
                        <td>
                          {{ $u->ex_total }}
                        </td>
                        <td>{{ $u->ex_view }}</td>
                        <td>
                          {{ $u->created_ats }}
                        </td>
                        
                        <td>
                        <a href="{{ url('admin/example/'.$u->ids.'/show') }}" class="btn btn-outline-success btn-sm">ข้อสอบ</a>
                          <a href="{{ url('admin/edit_example/'.$u->ids.'/edit') }}" class="btn btn-outline-primary btn-sm">แก้ไข</a>
                          <a href="{{ url('del/example/'.$u->ids) }}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">ลบ</a>
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
