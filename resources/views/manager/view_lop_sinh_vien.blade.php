
<div>Danh sách học sinh của sinh viên {{ $lop->name }} của khóa học {{ $lop->course->name }} - ngành {{ $lop->major->name }}:</div>
<div>Tổng số sinh viên: {{ $sinh_vien->count() }} sinh viên</div>
@if ($sinh_vien->isEmpty())
<h1>Không có sinh viên nào!</h1>

@else
    <table border="1">
    <tr>
        <th>Mã sinh viên</th>
        <th>Tên sinh viên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Số điện thoại</th>
        <th>Email</th>
    </tr>


@foreach ($sinh_vien as $item)
    <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->gender }}</td>
    <td>{{ $item->dob }}</td>
    <td>{{ $item->phone }}</td>
    <td>{{ $item->email }}</td>

    <td><a href="/sinh_vien/{{ $item->id }}/update">Chỉnh sửa sinh viên</a></td>
    </tr>
@endforeach

    </table>
@endif

{{-- <div>
    <a href="/import_sinh_vien/{{ $khoa_hoc->id }}/{{ $nganh->id }}/create">Thêm sinh viên vào các lớp bằng excel</a>
</div> --}}


