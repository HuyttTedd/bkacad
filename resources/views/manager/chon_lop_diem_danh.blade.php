{{-- @if ()

@endif --}}

@if (!empty($arr))
    <h1>Chọn lớp và môn học:</h1>

<form action="/chon_lop_diem_danh" method="POST">
    @csrf
    <input type="hidden" name="lecturer_id" value="{{ $id_giang_vien }}">
    <select name="classSubject" id="">
    @foreach ($arr as $item => $val)
        <option value="{{ $val['class_id'].",".$val['subject_id'] }}">{{ $val['name'] }}</option>
    @endforeach
    </select>


    <input type="submit" value="Xác nhận">
</form>
@else

@endif
