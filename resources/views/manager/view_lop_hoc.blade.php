<div>Danh sách lớp học:</div>

@if ($class->isEmpty())
<h1>Không có lớp học nào!</h1>

@else
    <table border="1">
    <tr>
        <th>Mã lớp học</th>
        <th>Tên lớp học</th>
        <th colspan="2"></th>
    </tr>


@foreach ($class as $item)
    <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td><a href="/sinh_vien">Danh sách sinh viên</a></td>
    </tr>
@endforeach
    </table>
@endif

<div>
    <a href="/class/create">Thêm lớp</a>
</div>

