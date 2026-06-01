<h1>{{ $module->title }}</h1>

<p>{{ $module->description }}</p>

<hr>

<h2>Daftar Lessons</h2>

@foreach($module->lessons as $lesson)
    <div style="padding:20px; border:1px solid #ddd; margin-bottom:15px;">
        <h3>{{ $lesson->title }}</h3>
        <p>{{ $lesson->content }}</p>
    </div>
@endforeach