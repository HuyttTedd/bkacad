<h1>Phân công cho khóa {{ $khoa_hoc->name }}, ngành {{ $nganh->name }}</h1>
<form action="/phan_cong" method="POST" onsubmit="return confirm('Xác nhận tạo khóa học này?')">
    @csrf
    <div>
        <div>Chọn môn:</div>
        <select name="subject_id" id="">
            @foreach ($nganh->subjects()->get() as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

    </div>

    <div>
        <div>Chọn giảng viên:</div>
        <select name="lecturer_id" id="">
            @foreach ($giang_vien as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

    </div>
    <div>
        <div>Chọn lớp:</div>
        <select name="class_id" id="">
            @foreach ($nganh->classes()->get() as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

    </div>
    <div>
        <input type="submit" value="Xác nhận">
    </div>
</form>
