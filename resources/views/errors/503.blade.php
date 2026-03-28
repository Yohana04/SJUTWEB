<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Maintenance - CICT SJUT</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #1a3a63 0%, #2B579A 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            overflow: hidden;
        }
        
        .maintenance-container {
            text-align: center;
            max-width: 600px;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }
        
        .icon-container {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            animation: pulse 2s infinite;
        }
        
        .icon-container::before {
            content: '';
            position: absolute;
            width: 140px;
            height: 140px;
            background: rgba(253, 185, 19, 0.1);
            border-radius: 50%;
            animation: pulse 2s infinite 0.5s;
        }
        
        .icon-container::after {
            content: '';
            position: absolute;
            width: 160px;
            height: 160px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: pulse 2s infinite 1s;
        }
        
        .maintenance-icon {
            font-size: 3rem;
            position: relative;
            z-index: 2;
        }
        
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }
        }
        
        .title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #FDB913, #fff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(253, 185, 19, 0.3);
        }
        
        .subtitle {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }
        
        .message {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .message h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #FDB913;
        }
        
        .message p {
            font-size: 0.95rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .status {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .status-dot {
            width: 8px;
            height: 8px;
            background: #FDB913;
            border-radius: 50%;
            animation: blink 1.5s infinite;
        }
        
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }
        
        .contact {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .contact h4 {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #FDB913;
        }
        
        .contact p {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }
        
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 20s infinite linear;
        }
        
        @keyframes float {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }
        
        .logo {
            position: absolute;
            top: 2rem;
            left: 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0.8;
        }
        
        .logo-icon {
            font-size: 1.5rem;
        }
        
        .logo-text {
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        
        @media (max-width: 768px) {
            .maintenance-container {
                padding: 1rem;
            }
            
            .title {
                font-size: 2rem;
            }
            
            .subtitle {
                font-size: 1rem;
            }
            
            .message {
                padding: 1.5rem;
            }
            
            .logo {
                top: 1rem;
                left: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Particles Background -->
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 6s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 8s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 10s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 12s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 14s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 16s;"></div>
    </div>

    <!-- Logo -->
    <div class="logo">
        <span class="logo-icon">🏛️</span>
        <span class="logo-text">CICT SJUT</span>
    </div>

    <!-- Main Content -->
    <div class="maintenance-container">
        <div class="icon-container">
            <span class="maintenance-icon">🔧</span>
        </div>
        
        <h1 class="title">System Under Maintenance</h1>
        
        <p class="subtitle">
            We're currently performing scheduled maintenance to improve your experience.
        </p>
        
        <div class="message">
            <p>
                We're performing essential updates to improve your experience. 
                We'll be back online shortly. Thank you for your patience!
            </p>
        </div>
        
        <div class="status">
            <div class="status-dot"></div>
            <span>We'll be back online shortly</span>
        </div>
        
        <div class="contact">
            <h4>📞 Need Assistance?</h4>
            <p>
                For urgent matters, please contact the IT Support team at<br>
                support@cict.sjut.ac.tz or call +255 123 456 789
            </p>
        </div>
    </div>

    <script>
        // Add more particles dynamically
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 20 + 's';
            particle.style.animationDuration = (15 + Math.random() * 10) + 's';
            document.querySelector('.particles').appendChild(particle);
        }
        
        // Create initial particles
        for (let i = 0; i < 15; i++) {
            createParticle();
        }
        
        // Remove old particles and create new ones periodically
        setInterval(() => {
            const particles = document.querySelectorAll('.particle');
            if (particles.length > 20) {
                particles[0].remove();
                createParticle();
            }
        }, 3000);
        
        // Auto-refresh every 5 minutes
        setTimeout(() => {
            window.location.reload();
        }, 300000);
    </script>
</body>
</html>
