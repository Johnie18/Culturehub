<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Culture Hub' }}</title>

  <!-- Bootstrap + Google Font -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      background: url({{ asset ('images/bg.jpg') }});
      background-size: cover;
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .auth-card {
      width: 100%;
      max-width: 420px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      padding: 35px;
      animation: fadeInUp 0.5s ease;
    }
    @keyframes fadeInUp {
      from { transform: translateY(30px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    .form-control {
      border-radius: 8px;
      padding: 12px;
    }
    .btn {
      border-radius: 8px;
      padding: 12px;
      font-weight: 600;
    }
    a {
      text-decoration: none;
      color: #007bff;
    }
    a:hover {
      text-decoration: underline;
    }
    .alert {
      border-radius: 8px;
    }
  </style>
</head>
<body>

  <div class="auth-card">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
  </div>

  <!-- JS (Bootstrap + minor animation JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const alerts = document.querySelectorAll('.alert');
      alerts.forEach(a => setTimeout(() => a.remove(), 4000));
    });
  </script>
</body>
</html>
