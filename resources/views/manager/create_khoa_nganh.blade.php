<h1>Thêm ngành cho khóa học "{{ strtoupper($khoa_hoc->name) }}":</h1>
@if ($nganh->isEmpty())
<h1>Không có ngành học để thêm!</h1>

@else
    <table border="1">
    <tr>
        <th>Mã ngành học</th>
        <th>Tên ngành học</th>
        <th></th>
    </tr>


@foreach ($nganh as $item)
    <tr>
    <form action="/khoa/nganh" method="POST" onsubmit="return confirm('Xác nhận thêm khóa học này vào ngành --{{ strtoupper($khoa_hoc->name) }}--?')">
            @csrf
        <input type="hidden" value="{{ $item->id }}" name="major_id">
        <input type="hidden" value="{{ $khoa_hoc->id }}" name="course_id">
        <input type="hidden" value="{{ $khoa_hoc->name }}" name="course_name">
        <input type="hidden" value="{{ $item->name }}" name="major_name">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <th><input type="submit" value="Thêm ngành"></th>
        </form>
    </tr>
@endforeach
    </table>
@endif

