<div>Danh sách ngành học:</div>

@if ($nganh->isEmpty())
<h1>Không có ngành học nào!</h1>

@else
    <table border="1">
    <tr>
        <th>Mã ngành</th>
        <th>Tên ngành</th>
        <th colspan="2"></th>
    </tr>


@foreach ($nganh as $item)
    <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td><a href="/nganh/{{ $item->id }}/mon">Chi tiết các môn học</a></td>
    <th><a href="/nganh/{{ $item->id }}/update" onclick="confirm('Xác nhận chỉnh sửa?')">Chỉnh sửa</a></th>
    </tr>
@endforeach
    </table>
@endif

<div>
    <a href="/nganh/create">Thêm ngành</a>
</div>

