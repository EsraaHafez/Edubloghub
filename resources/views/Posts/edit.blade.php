<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - EduBlogHub</title>
    <!-- Include JavaScript file in head with defer -->
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <a href="{{ asset('index') }}" class="navbar-brand"><i class="fa-brands fa-blogger"></i> EduBlogHub</a>
        <nav class="nav-links">
            <a href="{{ asset('index') }}" class="nav-link"><i class="fas fa-home"></i> Home</a>
            <a href="{{ asset('posts') }}" class="nav-link"><i class="fas fa-list"></i> Posts</a>
            <a href="{{ asset('new-post') }}" class="nav-link"><i class="fas fa-plus"></i> New Post</a>
            <a href="{{ asset('login') }}" class="nav-link"><i class="fas fa-user"></i> Login</a>
            <a href="{{ asset('register') }}" class="nav-link"><i class="fa-regular fa-id-card"></i> Register</a>

            <!-- Dropdown for Management -->
            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-building-columns"></i> Management</button>
                <div class="dropdown-content">
                    <a href="{{ asset('students') }}">Students</a>
                    <a href="{{ asset('teachers') }}">Teachers</a>
                    <a href="{{ asset('attendance') }}">Attendance</a>
                    <a href="{{ asset('timetable') }}">Timetable</a>
                    <a href="{{ asset('class') }}">Class</a>
                </div>
            </div>

            <!-- Dropdown for Reports -->
            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-file"></i> Reports</button>
                <div class="dropdown-content">
                    <a href="{{ asset('Teachers_Repoprts') }}">Teacher Reports</a>
                    <a href="{{ asset('Students_Reports') }}">Student Reports</a>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Edit Post Section -->
    <main class="form-container">
        <h2>Edit Post</h2>
        <form action="{{ route('posts.update', $post->PostID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT for updating data -->

            <div class="form-group">
                <label for="Post_title">Post Title:</label>
                <input type="text" id="Post_title" name="Post_title" value="{{ $post->Post_title }}" required>
                @error('Post_title')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Classification">Classification:</label>
                <select id="Classification" name="Classification" required>
                    <option value="Technology" {{ $post->Classification == 'Technology' ? 'selected' : '' }}>Technology</option>
                    <option value="Health" {{ $post->Classification == 'Health' ? 'selected' : '' }}>Health</option>
                    <option value="Sports" {{ $post->Classification == 'Sports' ? 'selected' : '' }}>Sports</option>
                    <option value="Art" {{ $post->Classification == 'Art' ? 'selected' : '' }}>Art</option>
                </select>
                @error('Classification')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_url">Update Image:</label>
                <input type="file" id="image_url" name="image_url" accept="image/*">
                <img src="{{ asset($post->image_url) }}" alt="Current Image" style="max-width: 100px;"> <!-- Display current image -->
                @error('image_url')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Post_content">Post Content:</label>
                <textarea id="Post_content" name="Post_content" rows="10" required>{{ $post->Post_content }}</textarea>
                @error('Post_content')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Update Post</button>
        </form>
    </main>

    <!-- Include JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script> 
        AOS.init();
    </script>
</body>
</html>  