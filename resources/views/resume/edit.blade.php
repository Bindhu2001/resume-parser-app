<!DOCTYPE html>
<html>
<head>
    <title>Edit Resume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card p-4 shadow">
        <h2 class="mb-4">Edit Resume</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('resume.update', $resume->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $resume->name }}" class="form-control" placeholder="Name">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" value="{{ $resume->email }}" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ $resume->phone }}" class="form-control" placeholder="Phone">
            </div>
            <div class="mb-3">
                <label>Skills</label>
                <textarea name="skills" class="form-control" placeholder="Skills">{{ $resume->skills }}</textarea>
            </div>
            <div class="mb-3">
                <label>Experience</label>
                <textarea name="experience" class="form-control" placeholder="Experience">{{ $resume->experience }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
</body>
</html>
