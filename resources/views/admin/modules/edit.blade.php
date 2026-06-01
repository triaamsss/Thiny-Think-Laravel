<!DOCTYPE html>
<html>
<head>
    <title>Edit Module</title>
</head>
<body>

<h1>Edit Module</h1>

<form action="{{ route('admin.modules.update', $module->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>Judul Module</label>
        <br><br>

        <input type="text" name="title" value="{{ $module->title }}" required>
    </div>

    <br>

    <div>
        <label>Deskripsi</label>
        <br><br>

        <textarea name="description">{{ $module->description }}</textarea>
    </div>

    <br>

    <button type="submit">
        Update Module
    </button>

</form>

</body>
</html>