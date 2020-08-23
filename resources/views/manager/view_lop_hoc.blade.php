<div>Danh sách lớp học của khóa học {{ $khoa_hoc->name }} - ngành {{ $nganh->name }}:</div>
<div>Tổng số lớp: {{ $class->count() }} lớp</div>
@if ($class->isEmpty())
<h1>Không có lớp học nào!</h1>

@else
    <table border="1">
    <tr>
        <th>Mã lớp học</th>
        <th>Tên lớp học</th>
        <th>Sỹ số học sinh</th>
        <th></th>
    </tr>


@foreach ($class as $item)
    <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td></td>
    <td><a href="/class/{{ $item->id }}/sinh_vien">Danh sách sinh viên</a></td>
    </tr>
@endforeach

    </table>
@endif

<div>
    <a href="/import_sinh_vien/{{ $khoa_hoc->id }}/{{ $nganh->id }}/create">Thêm sinh viên vào các lớp bằng excel</a>
</div>
{{-- <div>
    <a href="/import_sinh_vien/{id_lop}">Thêm tất cả sinh viên vào các lớp</a>
</div> --}}

