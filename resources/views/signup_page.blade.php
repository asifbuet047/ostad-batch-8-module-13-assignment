<!-- resources/views/signup.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: transparent;
            border-bottom: none;
        }

        .btn-custom {
            background-color: #4facfe;
            border: none;
        }

        .btn-custom:hover {
            background-color: #3b8dd0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <div class="card p-4">
                    <div class="card-header text-center">
                        <h3 class="fw-bold">Create an Account</h3>
                    </div>
                    <div class="card-body">
                        <div id="success-message" class="alert alert-success d-none"></div>
                        <div id="error-message" class="alert alert-danger d-none"></div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form id="signup_form" action="/signup" method="POST">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Asif" required>
                            </div>

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="asif12@gmail.com" required>
                                @error('password')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="********" required>
                            </div>
                            <!--Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="********" required>
                                @error('password_confirmation')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom text-white fw-bold">Sign Up</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center mt-3">
                        <small>Already have an account? <a href="/login">Login here</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/signup_script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
