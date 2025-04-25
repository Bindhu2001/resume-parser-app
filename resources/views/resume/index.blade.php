<!DOCTYPE html>
<html>
<head>
    <title>Resume List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Resume List</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Skills</th>
                <th>Experience</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resumes as $resume)
                <tr>
                    <td>{{ $resume->name }}</td>
                    <td>{{ $resume->email }}</td>
                    <td>{{ $resume->phone }}</td>
                    <td>{{ Str::limit($resume->skills, 50) }}</td>
                    <td>{{ $resume->experience }}</td>
                    <td>
                        <a href="{{ route('resume.edit', $resume->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $resumes->links() }}
</div>
</body>
</html>
