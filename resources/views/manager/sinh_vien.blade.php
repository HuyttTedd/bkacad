<div>Danh sách sinh viên nhập học: (Tổng số: {{ $student->count() }} sinh viên)</div>

@if ($student->isEmpty())
<h1>Không có sinh viên nào nhập học!</h1>

@else
    <table border="1">
    <tr>
        <th>Mã sinh viên</th>
        <th>Tên sinh viên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th colspan="2">Chỉnh sửa thông tin</th>
    </tr>


@foreach ($student as $item)
    <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->gender }}</td>
    <td>{{ $item->dob }}</td>
    <td>{{ $item->phone }}</td>
    <td>{{ $item->email }}</td>
    <th><a href="/sinh_vien/{{ $item->id }}/update" onclick="confirm('Xác nhận chỉnh sửa sinh viên?')">Chỉnh sửa</a></th>
    </tr>
@endforeach
    </table>
<div>
    <a href="/nganh/create">Chốt danh sách sinh viên</a>
</div>

@endif

{{-- <div>
    <a href="/sinh_vien/create">Thêm sinh viên</a>
</div> --}}
