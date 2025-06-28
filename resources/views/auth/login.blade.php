<!DOCTYPE html>
<html>
<head>
    <title>VidOcean - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #006994 0%, #004d6b 50%, #002a3a 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Ocean Waves Background */
        .ocean {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%2300a8cc"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%2300a8cc"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%2300a8cc"/></svg>') repeat-x;
            animation: wave 15s cubic-bezier(.55,.5,.45,.5) infinite;
        }

        .wave:nth-child(2) {
            bottom: 10px;
            animation: wave2 20s cubic-bezier(.55,.5,.45,.5) -.125s infinite, swell 7s ease -1.25s infinite;
            opacity: 0.8;
        }

        .wave:nth-child(3) {
            bottom: 15px;
            animation: wave2 18s cubic-bezier(.55,.5,.45,.5) -.25s infinite, swell 7s ease -2.5s infinite;
            opacity: 0.5;
        }

        @keyframes wave {
            0% { transform: translateX(0); }
            50% { transform: translateX(-25%); }
            100% { transform: translateX(-50%); }
        }

        @keyframes wave2 {
            0% { transform: translateX(0); }
            50% { transform: translateX(-25%); }
            100% { transform: translateX(-50%); }
        }

        @keyframes swell {
            0%, 100% { transform: translate3d(0,-25px,0); }
            50% { transform: translate3d(0,5px,0); }
        }

        .main-container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }

        /* Logo Container */
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
            animation: fadeInDown 1s ease-out;
        }

        .logo-wrapper {
            position: relative;
            display: inline-block;
        }

        .logo-bg {
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: rgba(0, 168, 204, 0.2);
            border-radius: 50%;
            backdrop-filter: blur(10px);
            animation: pulse 3s ease-in-out infinite;
        }

        .logo {
            position: relative;
            z-index: 2;
            width: 120px;
            height: 120px;
            filter: drop-shadow(0 10px 30px rgba(0, 42, 58, 0.5));
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.1) rotate(5deg);
        }

        .brand-name {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #00d4ff 0%, #87ceeb 50%, #ffffff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-top: 1rem;
            text-shadow: 0 2px 10px rgba(0, 42, 58, 0.5);
            letter-spacing: -0.02em;
        }

        .tagline {
            color: rgba(135, 206, 235, 0.9);
            font-size: 1rem;
            font-weight: 400;
            margin-top: 0.5rem;
            letter-spacing: 0.5px;
        }

        /* Card Styling */
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 168, 204, 0.3);
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 42, 58, 0.3);
            overflow: hidden;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .card-header {
            background: linear-gradient(135deg, rgba(0, 105, 148, 0.1) 0%, rgba(0, 168, 204, 0.1) 100%);
            border: none;
            padding: 2rem 2rem 1rem;
            text-align: center;
        }
 
        .card-header h4 {
            color: #004d6b;
            font-weight: 600;
            font-size: 1.5rem;
            margin: 0;
        }

        .card-body {
            padding: 1rem;
        }

        /* Form Styling */
        .form-label {
            color: #006994;
            font-weight: 500;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #b3e0f2;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            border-color: #00a8cc;
            box-shadow: 0 0 0 3px rgba(0, 168, 204, 0.2);
            background: rgba(255, 255, 255, 1);
            transform: translateY(-2px);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .btn-ocean {
            background: linear-gradient(135deg, #006994 0%, #00a8cc 50%, #004d6b 100%);
            border: none;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-ocean::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-ocean:hover::before {
            left: 100%;
        }

        .btn-ocean:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 168, 204, 0.4);
            background: linear-gradient(135deg, #0077a3 0%, #00bfdf 50%, #005a7a 100%);
        }

        .form-check-input:checked {
            background-color: #00a8cc;
            border-color: #006994;
        }

        .form-check-label {
            color: #006994;
            font-size: 0.875rem;
        }

        /* Link styling */
        .ocean-link {
            color: #00a8cc !important;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .ocean-link:hover {
            color: #006994 !important;
        }

        .text-ocean {
            color: #4a90a4 !important;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.7;
            }
            50% {
                transform: scale(1.05);
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .brand-name {
                font-size: 2rem;
            }
            
            .logo {
                width: 100px;
                height: 100px;
            }
            
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Ocean Background -->
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <div class="main-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <!-- Logo Section -->
                    <div class="logo-container">
                        <div class="logo-wrapper">
                            <div class="logo-bg"></div>
                            <svg class="logo" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="oceanGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#006994;stop-opacity:1" />
                                        <stop offset="50%" style="stop-color:#00a8cc;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#004d6b;stop-opacity:1" />
                                    </linearGradient>
                                    <linearGradient id="waveGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:#87ceeb;stop-opacity:0.9" />
                                        <stop offset="50%" style="stop-color:#00d4ff;stop-opacity:0.7" />
                                        <stop offset="100%" style="stop-color:#87ceeb;stop-opacity:0.9" />
                                    </linearGradient>
                                </defs>
                                
                                <!-- Ocean Circle -->
                                <circle cx="60" cy="60" r="55" fill="url(#oceanGradient)" stroke="rgba(0,212,255,0.4)" stroke-width="2"/>
                                
                                <!-- Ocean Waves -->
                                <path d="M15 45 Q30 35 45 45 T75 45 T105 45" stroke="url(#waveGradient)" stroke-width="3" fill="none" opacity="0.8">
                                    <animate attributeName="d" dur="3s" repeatCount="indefinite" 
                                        values="M15 45 Q30 35 45 45 T75 45 T105 45;M15 45 Q30 55 45 45 T75 45 T105 45;M15 45 Q30 35 45 45 T75 45 T105 45"/>
                                </path>
                                <path d="M15 55 Q30 45 45 55 T75 55 T105 55" stroke="url(#waveGradient)" stroke-width="2" fill="none" opacity="0.6">
                                    <animate attributeName="d" dur="2.5s" repeatCount="indefinite" 
                                        values="M15 55 Q30 45 45 55 T75 55 T105 55;M15 55 Q30 65 45 55 T75 55 T105 55;M15 55 Q30 45 45 55 T75 55 T105 55"/>
                                </path>
                                <path d="M15 65 Q30 55 45 65 T75 65 T105 65" stroke="url(#waveGradient)" stroke-width="2" fill="none" opacity="0.4">
                                    <animate attributeName="d" dur="2s" repeatCount="indefinite" 
                                        values="M15 65 Q30 55 45 65 T75 65 T105 65;M15 65 Q30 75 45 65 T75 65 T105 65;M15 65 Q30 55 45 65 T75 65 T105 65"/>
                                </path>
                                
                                <!-- Play Button -->
                                <circle cx="60" cy="60" r="12" fill="rgba(255,255,255,0.95)"/>
                                <polygon points="56,54 56,66 68,60" fill="url(#oceanGradient)"/>
                            </svg>
                        </div>
                        <h1 class="brand-name">VidOcean</h1>
                        <p class="tagline">Dive into endless possibilities</p>
                    </div>
                    
                    <div class="login-card">
                        <div class="card-header">
                            <h4>Welcome Back</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required
                                            placeholder="Enter your email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" required
                                            placeholder="Enter your password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Keep me signed in</label>
                                </div>
                                
                                <button type="submit" class="btn btn-ocean w-100 mb-3">Sign In</button>
                                
                                <div class="text-center">
                                    <p class="mb-0 text-ocean">
                                        Don't have an account? 
                                        <a href="{{ route('register') }}" class="ocean-link">Create Account</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>