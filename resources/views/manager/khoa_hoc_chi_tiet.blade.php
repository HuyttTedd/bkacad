<h1>Danh sách ngành học của {{ strtoupper($khoa_hoc->name) }}</h1>
@if ($nganh->isEmpty())
    <h1>Khóa học {{ strtoupper($khoa_hoc->name) }} chưa có ngành!</h1>

@else
<table border="1">
    <tr>
        <th>Mã ngành học</th>
        <th>Tên ngành học</th>
    </tr>

    @foreach ($nganh as $item)
    <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
    </tr>
    @endforeach
</table>

@endif

<div>
<a href="/khoa/nganh/{{ $khoa_hoc->id }}/create">Thêm ngành</a>
</div>
