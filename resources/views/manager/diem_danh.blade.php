<form action="" method="POST">
    @csrf
    <table border="1">
        <tr>
            <th>Tên sinh viên</th>
            <th colspan="4"></th>

        </tr>
@foreach ($student as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <th>Đi học <input type="radio"></th>
            <th>Muộn <input type="radio"></th>
            <th>Nghỉ <input type="radio"></th>
            <th>Có phép <input type="radio"></th>
        </tr>
    @endforeach

    </table>

</form>
