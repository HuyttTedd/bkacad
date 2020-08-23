<h1>Danh sách ngành học của {{ strtoupper($khoa_hoc->name) }}</h1>
<h1>Tình trạng: {{ $khoa_hoc->status }}</h1>
@if ($nganh->isEmpty())
    <h1>Khóa học {{ strtoupper($khoa_hoc->name) }} chưa có ngành!</h1>

@else
<table border="1">
    <tr>
        <th>Mã ngành học</th>
        <th>Tên ngành học</th>
        <th colspan="2"></th>
    </tr>

    @foreach ($nganh as $item)
    <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td><a href="/class/{{ $khoa_hoc->id }}/{{ $item->id }}">Chi tiết lớp học</a></td>
            <td><a href="">Danh sách sinh viên</a></td>
    </tr>
    @endforeach
</table>

@endif

<div>
    @if ($khoa_hoc->status == "Đang tuyển sinh!")
        <div>
            <a href="/khoa_hoc/{{ $khoa_hoc->id }}/nganh/create">Thêm ngành</a>
        </div>

        {{-- <div>
            <a href="/sinh_vien/khoa_hoc">Thêm sinh viên</a>
        </div> --}}
    @endif

</div>
