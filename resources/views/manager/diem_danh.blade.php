<h1>Điểm danh sinh viên lớp: {{ $class->name }} - Môn học: {{ $subject->name }}</h1>
<form action="/diem_danh" method="POST" onsubmit="return confirm('Xác nhận điểm danh lớp {{ $class->name }}?')">
    @csrf
    <input type="hidden" name="lecturer_id" value="{{ $id_giang_vien }}">
    <input type="hidden" name="subject_id" value="{{ $subject->id }}">
    <input type="hidden" name="class_id" value="{{ $class->id }}">
    <table class="table">
        <tr>
            <th>Tên sinh viên</th>
            <th colspan="4"></th>

        </tr>
@foreach ($student as $item)
        <tr>
            <td>{{ $item->name }} ({{ round($arr[$item->id]['sum'], 1) }}/{{ (int)$subject->time_total/4 }})</td>
            <th>Đi học <input type="radio" name="{{ $item->id }}" {{ old($item->id) == 0 ? 'checked' : '' }} value="0"></th>
            <th>Muộn <input type="radio" name="{{ $item->id }}" {{ old($item->id) == 1 ? 'checked' : '' }} value="1"></th>
            <th>Nghỉ <input type="radio" name="{{ $item->id }}" {{ old($item->id) == 2 ? 'checked' : '' }} value="2"></th>
            <th>Có phép <input type="radio" name="{{ $item->id }}" {{ old($item->id) == 3 ? 'checked' : '' }} value="3"></th>
        </tr>
    @endforeach

    </table>
        <div>
            <div>Nhập thời gian bắt đầu:</div>
            <div>
                <input type="number" name="start_hour" value="{{ old('start_hour') }}"> giờ
                @error('start_hour')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
            <input type="number" value="00" name="start_minute" value="{{ old('start_minute') }}"> phút
                @error('start_minute')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>Nhập thời gian kết thúc:</div>
            <div>
                <input type="number" name="end_hour" value="{{ old('end_hour') }}"> giờ
                @error('end_hour')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <input type="number" value="00" name="end_minute" value="{{ old('end_minute') }}"> phút
            @error('end_minute')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
    <input type="submit" name="" value="Xác nhận">
</form>
