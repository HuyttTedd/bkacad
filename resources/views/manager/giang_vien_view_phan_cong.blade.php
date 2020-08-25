<h1>Danh sách bạn được phân công:</h1>

<table border="1">
    <tr>
        <th>Lớp học</th>
        <th>Môn học</th>
    </tr>
@foreach ($arr as $item => $val)
    <tr>
        <td>{{ $val[0] }}</td>
        <td>{{ $val[1] }}</td>
    </tr>
@endforeach

</table>

