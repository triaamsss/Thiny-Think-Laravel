<div class="sidebar">

    <div class="logo" style="text-align:center;">
        <img
            src="{{ asset('assets/images/logo-tinythink.png') }}"
            style="
                width:110px;
                background:white;
                padding:10px;
                border-radius:20px;
            "
        >
    </div>

    <div class="menu-title">MAIN</div>

    <a href="/admin"
       class="{{ request()->is('admin') ? 'active' : '' }}">
        Dashboard
    </a>

    <div class="menu-title">MENU PEMBELAJARAN</div>

    <a href="/admin/modules"
       class="{{ request()->is('admin/modules*') ? 'active' : '' }}">
        Huruf Abjad
    </a>

    <a href="/admin/pencocokkan-abjad">
        Pencocokan Huruf
    </a>

    <a href="{{ route('admin.hijaiyah.dashboard') }}"
    class="{{ request()->is('admin/hijaiyah') ? 'active' : '' }}">
        Huruf Hijaiyah
    </a>

    <a href="{{ route('admin.hijaiyah.scores') }}"
       class="{{ request()->is('admin/hijaiyah/scores*') ? 'active' : '' }}"
       style="padding-left:28px;font-size:13px;">
        ↳ Nilai Siswa
    </a>

    <a href="/admin/doa-harian"
       class="{{ request()->is('admin/doa-harian*') ? 'active' : '' }}">
        Doa Harian
    </a>

    <a href="/admin/hadist"
       class="{{ request()->is('admin/hadist*') ? 'active' : '' }}">
        Hadist
    </a>

    <a href="/admin/surat-pendek">
        Surat Pendek
    </a>

    <a href="{{ route('admin.kosa-kata.index') }}"
        class="{{ request()->is('admin/kosa-kata*') ? 'active' : '' }}">
        Kosa Kata
    </a>

    <div class="menu-title">WEBSITE</div>

    <a href="/">
        Lihat Website
    </a>

</div>