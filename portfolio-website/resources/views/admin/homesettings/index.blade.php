@extends('admin.layout') {{-- Make sure you have this layout file --}}

@section('content')
    <h1>Edit Homepage Settings</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ url('admin/homesettings') }}">
        @csrf

        <div>
            <label>Heading:</label>
            <input type="text" name="welcome_heading" value="{{ old('welcome_heading', $setting->welcome_heading ?? '') }}">
        </div>

        <div>
            <label>Welcome Text:</label>
            <textarea name="welcome_text">{{ old('welcome_text', $setting->welcome_text ?? '') }}</textarea>
        </div>

        <div>
            <label>About Text:</label>
            <textarea name="about_text">{{ old('about_text', $setting->about_text ?? '') }}</textarea>
        </div>

        <div>
            <label>Featured Projects (JSON):</label>
            <textarea
                name="featured_projects">{{ old('featured_projects', json_encode($setting->featured_projects ?? [])) }}</textarea>
        </div>

        <button type="submit">Save</button>
    </form>
@endsection