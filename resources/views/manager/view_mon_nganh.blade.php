<h1>Danh sách môn học của ngành {{ $name }}:</h1>

@if ($mon->isEmpty())
<h1>Không có môn học nào!</h1>

@else
    <table border="1">
    <tr>
        <th>Mã môn học</th>
        <th>Tên môn học</th>
        <th>Số giờ học</th>
        <th>Loại thi</th>
    </tr>


@foreach ($mon as $item)
    <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->time_total }}</td>
    <td>{{ $item->test_type }}</td>
    </tr>
@endforeach
    </table>
@endif

<div>
<a href="/mon/add/{{ $id_nganh }}">Thêm môn</a>
</div>
