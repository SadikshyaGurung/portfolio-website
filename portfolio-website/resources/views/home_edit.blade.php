<link rel="stylesheet" href="{{ asset('css/home-edit.css') }}">
@extends('partials.layout')

@section('title', 'Edit Home')

@section('content')
    <div class="form-wrapper">
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form action="{{ route('home.update') }}" method="POST">
            @csrf

            <label>Welcome Heading</label>
            <input type="text" name="welcome_heading" value="{{ old('welcome_heading', $settings->welcome_heading) }}">

            <label>Welcome Text</label>
            <textarea name="welcome_text">{{ old('welcome_text', $settings->welcome_text) }}</textarea>

            <h3>Featured Projects</h3>

            <table class="projects-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image URL</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="projects">
                    @foreach(old('projects', $settings->featured_projects ?? []) as $i => $proj)
                        <tr class="project-row">
                            <td>
                                <input type="text" name="projects[{{ $i }}][title]" value="{{ $proj['title'] }}"
                                    placeholder="Title" />
                            </td>
                            <td>
                                <input type="text" name="projects[{{ $i }}][image_url]" value="{{ $proj['image_url'] }}"
                                    placeholder="Image URL" />
                            </td>
                            <td>
                                <textarea name="projects[{{ $i }}][description]"
                                    placeholder="Description">{{ $proj['description'] }}</textarea>
                            </td>
                            <td>
                                <button type="button" onclick="this.closest('tr').remove()" class="remove-btn">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="button" onclick="addProject()" class="add-btn">Add Project</button>

            <label>About Text</label>
            <textarea name="about_text">{{ old('about_text', $settings->about_text) }}</textarea>

            <button type="submit">Save</button>
        </form>
    </div>

    <script>
        function addProject() {
            const tbody = document.getElementById('projects');
            const idx = tbody.querySelectorAll('tr').length;
            const newRow = document.createElement('tr');
            newRow.classList.add('project-row');
            newRow.innerHTML = `
                                    <td><input type="text" name="projects[${idx}][title]" placeholder="Title" /></td>
                                    <td><input type="text" name="projects[${idx}][image_url]" placeholder="Image URL" /></td>
                                    <td><textarea name="projects[${idx}][description]" placeholder="Description"></textarea></td>
                                    <td><button type="button" onclick="this.closest('tr').remove()" class="remove-btn">Remove</button></td>
                                `;
            tbody.appendChild(newRow);
        }
    </script>
@endsection