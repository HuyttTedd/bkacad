<h1>Danh sách khóa học:</h1>
@if ($khoa_hoc->isEmpty())
<h1>Không có khóa học nào!</h1>

@else
<table border="1">
    <tr>
        <th>Tên khóa học</th>
        <th colspan="2"></th>
    </tr>

    @foreach ($khoa_hoc as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td><a href="/khoa_hoc/{{ $item->id }}/update">Sửa</a></td>
        <td><a href="/khoa_hoc/{{ $item->id }}">Chi tiết các ngành</a></td>
    </tr>
    @endforeach
</table>
@endif

<div>
    <a href="/khoa_hoc/create">Thêm khóa học</a>
</div>
