<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
        }
        p {
            color: #666;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome!</h1>
        <p>Hello, <strong>{{ $name }}</strong>!</p>
    </div>
</body>
</html>
<x-layout>
    <x-slot:heading>
        <div class="welcome-wrapper">
            <span class="welcome-label">Welcome</span>
            <h1 class="welcome-name">{{ $name }}</h1>
            <p class="welcome-sub">to <span class="app-name">Jco</span></p>
        </div>
    </x-slot:heading>

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400&display=swap');

    .welcome-wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
        padding: 3rem 0 2rem;
        animation: fadeUp 0.6s ease both;
    }

    .welcome-label {
        font-family: 'DM Sans', sans-serif;
        font-weight: 300;
        font-size: 0.75rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #9ca3af;
    }

    .welcome-name {
        font-family: 'DM Serif Display', serif;
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 400;
        color: #111827;
        line-height: 1.05;
        margin: 0;
    }

    .welcome-sub {
        font-family: 'DM Sans', sans-serif;
        font-weight: 300;
        font-size: 1rem;
        color: #6b7280;
        margin: 0.25rem 0 0;
    }

    .app-name {
        color: #111827;
        font-weight: 400;
        border-bottom: 1.5px solid #111827;
        padding-bottom: 1px;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(12px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>
</x-layout>