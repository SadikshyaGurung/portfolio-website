@extends('partials.layout')
@section('title', 'Edit Home')
@section('content')
    @if(session('success'))
    <p class="success">{{ session('success') }}</p> @endif

    <form action="{{ route('home.update') }}" method="POST">
        @csrf
        <label>Welcome Heading</label>
        <input type="text" name="welcome_heading" value="{{ old('welcome_heading', $settings->welcome_heading) }}">

        <label>Welcome Text</label>
        <textarea name="welcome_text">{{ old('welcome_text', $settings->welcome_text) }}</textarea>

        <h3>Featured Projects</h3>
        <div id="projects">
            @foreach(old('projects', $settings->featured_projects ?? []) as $i => $proj)
                <div class="project-block">
                    <input name="projects[{{ $i }}][title]" placeholder="Title" value="{{ $proj['title'] }}">
                    <input name="projects[{{ $i }}][image_url]" placeholder="Image URL" value="{{ $proj['image_url'] }}">
                    <textarea name="projects[{{ $i }}][description]"
                        placeholder="Description">{{ $proj['description'] }}</textarea>
                    <button type="button" onclick="this.parentElement.remove()">Remove</button>
                </div>
            @endforeach
        </div>
        <button type="button" onclick="addProject()">Add Project</button>

        <label>About Text</label>
        <textarea name="about_text">{{ old('about_text', $settings->about_text) }}</textarea>

        <button type="submit">Save</button>
    </form>

    <script>
        function addProject() {
            const idx = document.querySelectorAll('.project-block').length;
            document.getElementById('projects').insertAdjacentHTML('beforeend', `
                <div class="project-block">
                    <input name="projects[${idx}][title]" placeholder="Title">
                    <input name="projects[${idx}][image_url]" placeholder="Image URL">
                    <textarea name="projects[${idx}][description]" placeholder="Description"></textarea>
                    <button type="button" onclick="this.parentElement.remove()">Remove</button>
                </div>`);
        }
    </script>
@endsection