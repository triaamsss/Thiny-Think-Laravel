<h1>Edit Lesson</h1>

<form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Pilih Module</label><br>
    <select name="module_id" required>
        @foreach($modules as $module)
            <option value="{{ $module->id }}" {{ $lesson->module_id == $module->id ? 'selected' : '' }}>
                {{ $module->title }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Judul Lesson</label><br>
    <input type="text" name="title" value="{{ $lesson->title }}" required>

    <br><br>

    <label>Isi Materi</label><br>
    <textarea name="content" rows="8">{{ $lesson->content }}</textarea>

    <br><br>

    <button type="submit">Update Lesson</button>
</form>