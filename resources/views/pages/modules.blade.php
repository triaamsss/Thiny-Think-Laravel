<h1>Daftar Module TinyThink</h1>

<hr>

@foreach($modules as $module)

    <div style="padding:20px; border:1px solid #ddd; margin-bottom:20px;">

        <h2>{{ $module->title }}</h2>

        <p>{{ $module->description }}</p>

        <a href="/modules/{{ $module->slug }}">
            Buka Module
        </a>

    </div>

@endforeach