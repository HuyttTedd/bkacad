<h1>Thêm môn cho ngành "{{ $name }}":</h1>
@if ($mon2->isEmpty())
<h1>Không có môn học để thêm!</h1>

@else
    <table border="1">
    <tr>
        <th>Mã môn học</th>
        <th>Tên môn học</th>
        <th>Số giờ học</th>
        <th>Loại thi</th>
        <th></th>
    </tr>


@foreach ($mon2 as $item)
    <tr>
    <form action="/mon/{{ $id_nganh }}" method="POST" onsubmit="return confirm('Xác nhận thêm môn học này vào ngành --{{ $name }}--?')">
            @csrf
        <input type="hidden" value="{{ $item->id }}" name="subject_id">
        <input type="hidden" value="{{ $id_nganh }}" name="major_id">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->time_total }}</td>
            <td>{{ $item->test_type }}</td>
            <th><input type="submit" value="Thêm môn"></th>
        </form>
    </tr>
@endforeach
    </table>
@endif

