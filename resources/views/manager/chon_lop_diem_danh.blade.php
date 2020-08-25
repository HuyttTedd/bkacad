

@if (!empty($arr))
    <h1>Chọn lớp và môn học:</h1>

<form action="/chon_lop_diem_danh" method="POST">
    @csrf
    <select name="classSubject" id="">
    @foreach ($arr as $item => $val)
        <option value="{{ $val['class_id'].",".$val['subject_id'] }}">{{ $val['name'] }}</option>
    @endforeach
    </select>

    <input type="submit" value="Xác nhận">
</form>
@else

@endif
