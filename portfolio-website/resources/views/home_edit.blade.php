
@extends('partials.edit-layout')

@section('title', 'Edit Home')

@section('content')


    <div class="form-wrapper">
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form action="{{ route('home.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h2 class="form-heading">Home Page Settings</h2>

            <div class="form-group">
                <label for="welcome_heading">Welcome Heading</label>
                <input type="text" id="welcome_heading" name="welcome_heading" 
                    value="{{ old('welcome_heading', $setting->welcome_heading ?? '') }}" 
                    placeholder="Enter welcome heading" />
            </div>

            <div class="form-group">
                <label for="welcome_text">Welcome Text</label>
                <textarea id="welcome_text" name="welcome_text" placeholder="Enter welcome text">{{ old('welcome_text', $setting->welcome_text ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="about_text">About Text</label>
                <textarea id="about_text" name="about_text" placeholder="Enter about text">{{ old('about_text', $setting->about_text ?? '') }}</textarea>
            </div>

            <button type="submit" class="submit-btn">Save Settings</button>
        </form>
    </div>
@endsection

