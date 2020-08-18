<div>Danh sách môn học:</div>

@if ($mon->isEmpty())
<h1>Không có môn học nào!</h1>

@else
    <table border="1">
    <tr>
        <th>Mã môn học</th>
        <th>Tên môn học</th>
        <th>Số giờ học</th>
        <th>Loại thi</th>
        <th>Ngành học</th>
        <th></th>
    </tr>


@foreach ($mon as $item)
    <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->time_total }}</td>
    <td>{{ $item->test_type }}</td>
    <td></td>

    <td><a href="/mon/{{ $item->id }}/update">Chỉnh sửa</a></td>
    </tr>
@endforeach
    </table>
@endif

<div>
    <a href="/mon/create">Thêm môn</a>
</div>

