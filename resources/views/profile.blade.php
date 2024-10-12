<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile and Repositories</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container card shadow pt-4">
        <!-- User Profile Section -->
        <div class="row mb-4">
            <div class="col-md-3 text-center">
                <div class="profile-image">
                    <img src="{{ $user->avatar }}" alt="{{ $user->nickname }}'s Profile Image" class="img-fluid rounded-circle border border-secondary">
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-info">
                    <h1>{{ $user->nickname }}</h1>
                    <p>{{ $user->user['bio'] ?? 'No bio available' }}</p>
                    <p><strong>Public Repositories:</strong> {{ $user->user['public_repos'] }}</p>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" onkeyup="searchRepos()" placeholder="Search repositories...">
        </div>

        <!-- Repositories Table Section -->
        <div class="repository-table m-4 table-responsive">
            <h2 class="h5">Repositories</h2>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Stars</th>
                        <th>Forks</th>
                        <th>Language</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($repos as $repo)
                        <tr>
                            <td><a href="{{ $repo['html_url'] }}" target="_blank" class="text-primary text-decoration-none">{{ str_replace("-", " ", $repo['name']); }}</a></td>
                            <td>{{ $repo['description'] ?? 'No description' }}</td>
                            <td>{{ $repo['stargazers_count'] }}</td>
                            <td>{{ $repo['forks_count'] }}</td>
                            <td>{{ $repo['language'] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
