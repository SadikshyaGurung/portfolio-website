<!DOCTYPE html>
<html lang="en">
<head>
    <title>Personal Details</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
  <aside>
    <div class="sidebar">
      <h2 class="home">Admin Panel</h2>
      <ul>
        <li id="dashboard"><a href="{{ route('admin') }}"> 🏠 Dashboard</a></li>
        <li id="home-edit"><a href="home/edit"> &#x1F4C8; Home Page Settings</a></li>
        <li id="projects"><a href="projectdash"> &#x1F4C8; Projects</a></li>
        <li id="skills"><a href="skilldash">&#x1F4BB; Skills</a></li>

        <li id="contacts"><a href="contactdash">&#x1F4E7; Contacts</a></li>
        <li><a href="{{ route('personal') }}">👤 Personal Details</a></li>

      </ul>
      <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
      </form>
    </div>
  </aside>

  <main>
    <h1>Personal Details</h1>
<form action="{{ route('personal') }}" method="POST">
    @csrf
    <!-- Add method spoofing if needed -->
    <!-- @method('POST') or @method('PUT') if your route expects PUT -->

    <input type="text" name="name" value="{{ old('name', $personalDetail->name ?? '') }}" placeholder="Name" required>
    <input type="date" name="dob" value="{{ old('dob', $personalDetail->dob ?? '') }}" placeholder="Date of Birth">
    <input type="email" name="email" value="{{ old('email', $personalDetail->email ?? '') }}" placeholder="Email" required>
    <input type="text" name="phone" value="{{ old('phone', $personalDetail->phone ?? '') }}" placeholder="Phone">
    <input type="text" name="address" value="{{ old('address', $personalDetail->address ?? '') }}" placeholder="Address">

    <button type="submit">Save</button>
</form>

<!-- Display errors if any -->
@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  </main>
</body>
</html>
