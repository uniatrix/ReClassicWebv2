<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="max-age=31536000, public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self' https: data: 'unsafe-inline' 'unsafe-eval'; img-src 'self' https: data: blob:; font-src 'self' https: data:;">
    <title><?php echo isset($title) ? $title.' | ' : ''; ?>ReClassic Ragnarok Online</title>
    
    <!-- Modern CSS framework and fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Pixelify+Sans&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS with nocache parameter -->
    <link rel="stylesheet" href="css/styles.css?nocache=<?php echo rand()?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="512x512" href="assets/RR512.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/RRicon.png">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #4fc3f7;
            --dark-color: #1F2937;
            --light-color: #F9FAFB;
            --bg-gradient: linear-gradient(135deg, rgba(52, 152, 219, 0.9), rgba(41, 128, 185, 0.8));
            
            /* Pixel border colors */
            --pixel-border-outer: #1a1c25;
            --pixel-border-inner: var(--primary-color);
        }
        
        /* Custom Cursor Styles */
        html {
            cursor: url('assets/main-cursor-frame-0.gif'), auto;
        }
        
        /* Center content for utility pages */
        .infoblocks {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        #filter_ranking {
            text-align: center;
            margin-bottom: 20px;
        }
        
        #filter_ranking a {
            display: inline-block;
            margin: 0 10px;
            text-decoration: none;
            color: #000;
        }
        
        /* Use hand-cursor.gif for pointer elements */
        a, button, [role="button"], .btn, input[type="submit"], input[type="button"], 
        input[type="reset"], select, summary, [onclick], .nav-link, .card a,
        .clickable, [style*="cursor: pointer"], [style*="cursor:pointer"] {
            cursor: url('assets/hand-cursor.gif'), pointer !important;
        }
        
        /* Animation will be handled via JavaScript */
        
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh; /* Ensure minimum height is full viewport */
            height: 100%;
            overflow-x: hidden;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('assets/prontera.jpg') no-repeat center top;
            background-color: #0F172A;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            color: var(--light-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure body takes full viewport height */
            image-rendering: pixelated;
        }
        
        /* Main content should take available space */
        main, .container, .infoblocks {
            flex: 1 0 auto; /* Allow growing, prevent shrinking */
        }
        
        /* Footer at the bottom */
        footer {
            flex-shrink: 0; /* Prevent footer from shrinking */
            width: 100%;
        }
        
        /* Ensure the cursor wrapper covers the entire page */
        #cursor-area {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9999;
            pointer-events: none; /* Allow clicks to pass through */
        }
        
        /* Main content wrapper to ensure proper sizing */
        #page-wrapper {
            flex: 1;
            position: relative;
            z-index: 1;
            width: 100%;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.95));
            z-index: -1;
        }
        
        /* Pixel Border Mixin */
        .pixel-borders {
            border-style: solid;
            border-width: 4px;
            border-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path d="M2,2 L10,2 L10,10 L2,10 L2,2" fill="none" stroke="%233498db" stroke-width="4"/></svg>') 4 repeat;
            border-image-slice: 4;
            border-image-repeat: repeat;
            box-shadow: 0 0 0 4px var(--pixel-border-outer);
        }
        
        .navbar {
            background-color: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            padding: 0.75rem 1rem;
            border-bottom: 4px solid var(--primary-color);
        }
        
        .nav-link {
            color: var(--light-color);
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 0.5rem;
            border-radius: 0;
            padding: 0.5rem 1rem;
            font-family: 'Pixelify Sans', sans-serif;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }
        
        .nav-link:hover {
            color: var(--accent-color);
            transform: translateY(-2px);
            background-color: rgba(79, 195, 247, 0.1);
        }
        
        .nav-link.active {
            background-color: var(--primary-color);
            color: white;
            box-shadow: inset -2px -2px 0 rgba(0,0,0,0.3),
                        inset 2px 2px 0 rgba(255,255,255,0.2);
        }
        
        .btn-custom {
            background: var(--primary-color);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-family: 'Pixelify Sans', sans-serif;
            font-size: 1.1rem;
            position: relative;
            box-shadow: inset -3px -3px 0 rgba(0,0,0,0.3),
                        inset 3px 3px 0 rgba(255,255,255,0.2);
        }
        
        .btn-custom:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: inset -3px -3px 0 rgba(0,0,0,0.5),
                        inset 3px 3px 0 rgba(255,255,255,0.3),
                        0 6px 10px rgba(0, 0, 0, 0.3);
        }
        
        .btn-custom::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 3px;
            left: 0;
            border-radius: 0;
            z-index: -1;
            background-color: rgba(0,0,0,0.2);
            transition: all 0.2s ease;
        }
        
        .btn-custom:active {
            transform: translateY(0);
            box-shadow: inset -1px -1px 0 rgba(0,0,0,0.3),
                        inset 1px 1px 0 rgba(255,255,255,0.2);
        }
        
        .card {
            background-color: rgba(31, 41, 55, 0.8);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            padding: 0.75rem;
            margin-bottom: 1rem;
        }
        
        .card-body {
            padding: 1rem 0.75rem;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            box-shadow: inset 0 0 0 2px rgba(255, 255, 255, 0.1);
            pointer-events: none;
            z-index: 1;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.4);
        }
        
        .card-title {
            color: var(--accent-color);
            font-weight: 700;
            font-family: 'Silkscreen', cursive;
            font-size: 1.4rem;
            text-shadow: 2px 2px 0 rgba(0,0,0,0.5);
            margin-bottom: 0.75rem;
        }
        
        .feature-icon {
            font-size: 2.8rem;
            background: var(--bg-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(2px 2px 0 rgba(0,0,0,0.3));
            margin-bottom: 0.75rem;
        }
        
        .card-text {
            font-size: 1.15rem;
            margin-bottom: auto;
            flex-grow: 1;
        }
        
        .main-logo {
            max-width: 350px;
            width: 100%;
            margin: 0 auto;
            transition: transform 0.3s ease;
            position: relative;
            z-index: 1;
        }
        
        .main-logo:before {
            content: "";
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(45deg, 
                rgba(81, 200, 250, 0) 0%, 
                rgba(81, 200, 250, 0.3) 50%, 
                rgba(81, 200, 250, 0) 100%);
            background-size: 200% 200%;
            animation: shimmer 3s linear infinite;
            border-radius: 5px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .main-logo:hover:before {
            opacity: 1;
        }
        
        @keyframes shimmer {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }
        
        .hero-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem 0;
        }
        
        /* Adjust hero section height for database and commerce pages */
        .hero-section.compact-page {
            min-height: auto;
            padding: 1rem 0;
        }
        
        .hero-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            font-family: 'Silkscreen', cursive;
            color: var(--accent-color);
            text-shadow: 4px 4px 0 rgba(0,0,0,0.5);
            letter-spacing: -0.5px;
        }
        
        .hero-subtitle {
            max-width: 800px;
            margin: 0 auto 2rem;
            color: rgba(249, 250, 251, 0.8);
            font-family: 'Pixelify Sans', sans-serif;
            font-size: 1.4rem;
            letter-spacing: 0.5px;
        }
        
        .game-stats {
            background-color: rgba(31, 41, 55, 0.7);
            backdrop-filter: blur(5px);
            border-radius: 0;
            padding: 2rem;
            margin-top: 3rem;
            border: 4px solid var(--pixel-border-outer);
            position: relative;
        }
        
        .game-stats::before {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            border: 2px solid var(--primary-color);
            pointer-events: none;
        }
        
        .stat-item {
            text-align: center;
            padding: 1rem;
        }
        
        .stat-number {
            font-weight: 700;
            color: var(--accent-color);
            font-family: 'Silkscreen', cursive;
            font-size: 1.8rem;
            text-shadow: 2px 2px 0 rgba(0,0,0,0.5);
        }
        
        .stat-label {
            color: rgba(249, 250, 251, 0.7);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Pixelify Sans', sans-serif;
            font-size: 1.2rem;
        }
        
        .feature-section {
            padding: 5rem 0;
        }
        
        footer {
            background-color: rgba(15, 23, 42, 0.95);
            padding: 3rem 0 1.5rem;
            position: relative;
            margin-top: 5rem;
            border-top: 4px solid var(--primary-color);
        }
        
        /* Pixelated Progress Bar */
        .pixel-progress {
            width: 100%;
            height: 20px;
            background-color: rgba(15, 23, 42, 0.9);
            position: relative;
            margin: 1rem 0;
            border: 2px solid var(--pixel-border-outer);
        }
        
        .pixel-progress-fill {
            height: 100%;
            background: var(--primary-color);
            position: absolute;
            top: 0;
            left: 0;
            animation: pulse-light 2s infinite;
        }
        
        @keyframes pulse-light {
            0% { background-color: var(--primary-color); }
            50% { background-color: var(--accent-color); }
            100% { background-color: var(--primary-color); }
        }
        
        /* Retro Pixel Containers */
        .pixel-container {
            background-color: rgba(31, 41, 55, 0.8);
            padding: 1rem;
            border: 4px solid var(--pixel-border-outer);
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .pixel-container::before {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            border: 2px solid var(--primary-color);
            pointer-events: none;
        }
        
        /* Decoration Elements */
        .pixel-corner {
            display: none;
        }
        
        /* Pixelated Table Styles */
        .pixel-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 4px solid var(--pixel-border-outer);
        }
        
        .pixel-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem;
            font-family: 'Silkscreen', cursive;
            font-size: 0.9rem;
            text-shadow: 1px 1px 0 rgba(0,0,0,0.5);
        }
        
        .pixel-table td {
            padding: 0.75rem;
            border: 2px solid rgba(79, 195, 247, 0.3);
            font-family: 'Pixelify Sans', sans-serif;
            font-size: 1.1rem;
        }
        
        .pixel-table tr:nth-child(odd) {
            background-color: rgba(31, 41, 55, 0.6);
        }
        
        .pixel-table tr:nth-child(even) {
            background-color: rgba(31, 41, 55, 0.8);
        }
        
        .pixel-table tr:hover {
            background-color: rgba(52, 152, 219, 0.2);
        }
        
        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 1.5rem;
            }
            
            .navbar-collapse {
                background-color: rgba(15, 23, 42, 0.95);
                padding: 1rem;
                border-radius: 0;
                margin-top: 1rem;
                border: 2px solid var(--primary-color);
            }
            
            .nav-link {
                padding: 0.75rem 1rem;
                margin: 0.25rem 0;
            }
            
            .card-title {
                font-size: 1.2rem;
            }
            
            .card-text {
                font-size: 1rem;
            }
            
            .pixel-table th {
                font-size: 0.7rem;
            }
            
            .pixel-table td {
                font-size: 1rem;
            }
        }
        
        /* SWF Container Styling */
        #swf-placeholder {
            position: relative;
            overflow: hidden;
            background-color: transparent;
        }
        
        #swf-placeholder::before {
            content: none;
        }
        
        /* Mobile adjustments for SWF */
        @media (max-width: 1500px) {
            .swf-desktop-only {
                display: none !important;
            }
        }
        
        /* Custom Spinner */
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(31, 41, 55, 0.3);
            border-top: 4px solid var(--accent-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        
        .spinner::before {
            content: none;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .logo-pulse {
            animation: logoPulse 5s cubic-bezier(0.445, 0.05, 0.55, 0.95) infinite;
            filter: drop-shadow(0 0 8px rgba(81, 200, 250, 0.5));
            transform-origin: center center;
            will-change: transform, filter;
        }
        
        .logo-wrapper {
            position: relative;
            display: inline-block;
        }
        
        .logo-glow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: radial-gradient(
                circle at center,
                rgba(81, 200, 250, 0.4) 5%,
                rgba(81, 200, 250, 0.1) 30%,
                rgba(81, 200, 250, 0) 70%
            );
            filter: blur(10px);
            opacity: 0;
            z-index: -1;
            animation: logoGlow 5s cubic-bezier(0.445, 0.05, 0.55, 0.95) infinite;
        }
        
        @keyframes logoGlow {
            0% {
                opacity: 0.3;
                transform: scale(0.96);
            }
            25% {
                opacity: 0.4;
            }
            50% {
                opacity: 0.6;
                transform: scale(1.08);
            }
            75% {
                opacity: 0.4;
            }
            100% {
                opacity: 0.3;
                transform: scale(0.96);
            }
        }
        
        @keyframes logoPulse {
            0% {
                transform: scale(1);
                filter: drop-shadow(0 0 6px rgba(81, 200, 250, 0.5));
            }
            25% {
                transform: scale(1.016);
                filter: drop-shadow(0 0 8px rgba(81, 200, 250, 0.6));
            }
            50% {
                transform: scale(1.03);
                filter: drop-shadow(0 0 10px rgba(81, 200, 250, 0.7));
            }
            75% {
                transform: scale(1.016);
                filter: drop-shadow(0 0 8px rgba(81, 200, 250, 0.6));
            }
            100% {
                transform: scale(1);
                filter: drop-shadow(0 0 6px rgba(81, 200, 250, 0.5));
            }
        }
        
        .pixel-float-button i {
            margin-bottom: 2px;
        }
        
        @keyframes pulse-highlight {
            0% {
                box-shadow: 0 0 0 0 rgba(81, 200, 250, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(81, 200, 250, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(81, 200, 250, 0);
            }
        }
        
        .pixel-account-float {
            position: fixed;
            right: 25px;
            bottom: 25px;
            z-index: 1000;
        }
        
        .pixel-float-menu {
            position: relative;
        }
        
        .pixel-float-button {
            width: 65px;
            height: 65px;
            background: var(--primary-color);
            border: 3px solid var(--pixel-border-outer);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 0;
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            animation: float 3s ease-in-out infinite, pulse-highlight 2s infinite;
        }
        
        .pixel-float-button::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            right: 3px;
            bottom: 3px;
            border: 2px solid var(--pixel-border-inner);
            pointer-events: none;
        }
        
        .pixel-float-button:hover {
            transform: translateY(-3px);
            color: white;
            background: var(--secondary-color);
        }
        
        .pixel-float-button span {
            font-family: 'Silkscreen', cursive;
            font-size: 0.65rem;
            margin-top: 2px;
            text-align: center;
            line-height: 1;
            position: relative;
            z-index: 1;
        }
        
        .pixel-float-items {
            position: absolute;
            bottom: 70px;
            right: 0;
            background: rgba(31, 41, 55, 0.95);
            border: 3px solid var(--pixel-border-outer);
            display: flex;
            flex-direction: column;
            width: 200px;
            opacity: 0;
            transform: translateY(10px);
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.3s ease, transform 0.3s ease, visibility 0s linear 0.3s;
        }
        
        /* Add a delay before the menu disappears */
        .pixel-float-menu:hover .pixel-float-items,
        .pixel-float-items:hover {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
            pointer-events: all;
            transition: opacity 0.3s ease, transform 0.3s ease, visibility 0s;
        }
        
        .pixel-float-items::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            right: 3px;
            bottom: 3px;
            border: 2px solid var(--pixel-border-inner);
            pointer-events: none;
            z-index: 0;
        }
        
        /* Add a "bridge" element to prevent the menu from closing when moving between button and menu */
        .pixel-menu-bridge {
            position: absolute;
            bottom: 65px;
            right: 0;
            width: 200px;
            height: 10px;
            opacity: 0;
            z-index: 0;
        }
        
        .pixel-float-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: white;
            font-family: 'Silkscreen', cursive;
            font-size: 0.9rem;
            position: relative;
            z-index: 1;
            transition: all 0.2s ease;
            border-bottom: 2px solid rgba(79, 195, 247, 0.2);
        }
        
        .pixel-float-item:last-child {
            border-bottom: none;
        }
        
        .pixel-float-item i {
            width: 30px;
            margin-right: 10px;
            text-align: center;
        }
        
        .pixel-float-item:hover {
            background: rgba(79, 195, 247, 0.2);
            color: var(--accent-color);
        }
        
        .join-button {
            background: var(--accent-color);
        }
        
        .join-button:hover {
            background: #3a90c9;
        }
        
        .account-button {
            background: #3498db;
        }
        
        .account-button:hover {
            background: #2980b9;
        }
        
        @keyframes float {
            0%, 100% {
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            }
            50% {
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            }
        }
        
        /* Remove old account sidebar on desktop */
        .account-sidebar {
            display: none !important;
        }
        
        /* ===============================================
           STICKY NAV MENU
           =============================================== */
        .sticky-nav {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-left: 20px;
        }

        .sticky-nav-link {
            color: var(--light-color);
            text-decoration: none;
            font-family: 'Pixelify Sans', sans-serif;
            font-size: 0.95rem;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .sticky-nav-link:hover {
            background-color: rgba(79, 195, 247, 0.15);
            color: var(--accent-color);
        }

        .sticky-nav-link i {
            font-size: 0.9rem;
        }

        .sticky-nav-download {
            background: var(--primary-color);
            color: white;
        }

        .sticky-nav-download:hover {
            background: var(--secondary-color);
            color: white;
        }

        .sticky-account-btn {
            background: rgba(79, 195, 247, 0.2);
            padding: 8px 16px;
            color: var(--accent-color);
            text-decoration: none;
            border-radius: 4px;
            font-family: 'Pixelify Sans', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-right: 10px;
        }

        .sticky-account-btn:hover {
            background: rgba(79, 195, 247, 0.3);
            color: white;
        }

        .sticky-account-btn i {
            margin-right: 6px;
        }

        /* Mobile adjustments for sticky nav */
        @media (max-width: 992px) {
            .sticky-nav {
                display: none;
            }
        }

        /* ===============================================
           LOGIN POPUP MODAL - REFINED DESIGN
           =============================================== */
        .login-popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 100000;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .login-popup-overlay.active {
            display: flex;
            opacity: 1;
        }

        .login-popup {
            background: linear-gradient(145deg, rgba(20, 25, 35, 0.98), rgba(15, 20, 30, 0.98));
            border: 1px solid rgba(52, 152, 219, 0.3);
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            margin: 20px;
            position: relative;
            box-shadow:
                0 0 0 1px rgba(52, 152, 219, 0.1),
                0 25px 80px rgba(0, 0, 0, 0.5),
                0 0 40px rgba(52, 152, 219, 0.1);
            animation: popupSlideIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes popupSlideIn {
            from {
                opacity: 0;
                transform: translateY(-40px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .login-popup-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: transparent;
            border: none;
            font-size: 1.4rem;
            color: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            padding: 8px;
            line-height: 1;
            transition: all 0.2s ease;
            z-index: 10;
            border-radius: 8px;
        }

        .login-popup-close:hover {
            color: var(--accent-color);
            background: rgba(79, 195, 247, 0.1);
        }

        .login-popup-content {
            padding: 50px 40px 40px;
            text-align: center;
        }

        .login-popup-title {
            font-family: 'Silkscreen', cursive;
            font-size: 1.8rem;
            font-style: italic;
            color: var(--accent-color);
            margin-bottom: 35px;
            letter-spacing: 2px;
            text-shadow: 0 0 20px rgba(79, 195, 247, 0.3);
        }

        .login-popup-field {
            margin-bottom: 20px;
            text-align: left;
        }

        .login-popup-field label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 0.95rem;
            margin-bottom: 10px;
            letter-spacing: 0.3px;
        }

        .login-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .login-input-wrapper i {
            position: absolute;
            left: 18px;
            color: var(--accent-color);
            font-size: 1rem;
            transition: color 0.2s ease;
            z-index: 2;
        }

        .login-popup-field input {
            width: 100%;
            padding: 16px 18px 16px 50px;
            border: 2px solid rgba(52, 152, 219, 0.4);
            border-radius: 12px;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s ease;
            background: rgba(15, 20, 30, 0.6);
            color: white;
            height: auto;
            background-image: none !important;
        }

        .login-popup-field input::placeholder {
            color: rgba(255, 255, 255, 0.35);
        }

        .login-popup-field input:focus {
            border-color: var(--accent-color);
            outline: none;
            background: rgba(20, 25, 40, 0.8);
            box-shadow: 0 0 0 4px rgba(79, 195, 247, 0.1);
        }

        .login-popup-field input:focus + i,
        .login-input-wrapper:focus-within i {
            color: var(--accent-color);
        }

        #loginPopupMessage {
            margin: 20px 0;
        }

        #loginPopupMessage .error {
            background: rgba(220, 53, 69, 0.15);
            color: #ff6b6b;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.9rem;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .login-popup-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 12px;
            font-family: 'Pixelify Sans', sans-serif;
            font-size: 1.15rem;
            font-weight: 600;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
            text-transform: uppercase;
            box-shadow: 0 4px 20px rgba(52, 152, 219, 0.3);
        }

        .login-popup-submit:hover {
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 30px rgba(79, 195, 247, 0.4);
        }

        .login-popup-submit:active {
            transform: translateY(0);
        }

        .login-popup-submit:disabled {
            background: rgba(100, 100, 100, 0.5);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .login-popup-links {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .login-popup-links a {
            color: var(--accent-color);
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            padding: 5px 10px;
            border-radius: 6px;
        }

        .login-popup-links a:hover {
            color: white;
            background: rgba(79, 195, 247, 0.15);
        }

        /* Mobile adjustments for login popup */
        @media (max-width: 480px) {
            .login-popup-content {
                padding: 40px 25px 30px;
            }

            .login-popup-title {
                font-size: 1.5rem;
            }

            .login-popup-field input {
                padding: 14px 14px 14px 45px;
            }

            .login-input-wrapper i {
                left: 14px;
            }
        }
    </style>
    
    <!-- Add custom styles for account page -->
    <?php if (isset($_GET['to']) && $_GET['to'] === 'conta'): ?>
    <style>
        /* Account page styles for better readability on white backgrounds */
        .conta-table th, .conta-table td,
        .table-chars th, .table-chars td,
        .infoblocks h3, .infoblocks h4,
        .infoblocks p, .infoblocks label,
        .infoblocks input, .infoblocks select,
        .infoblocks textarea {
            color: #222 !important;
        }
        
        .info-conta, .actions-conta, 
        .organize-conta, .infoblocks {
            color: #333 !important;
        }
        
        /* Override any light text colors for better contrast */
        .text-light, .card-text.text-light {
            color: #333 !important;
        }
        
        /* Make sure buttons maintain proper contrast */
        .btn-custom {
            color: white !important;
        }
    </style>
    <?php endif; ?>
</head>

<body class="<?php echo (isset($_GET['to']) && in_array($_GET['to'], ['database', 'veritem', 'vermonstro', 'vermapa', 'ranking', 'comercio', 'verloja'])) ? 'database-page' : ''; ?>">
    <!-- Google Tag Manager scripts from original site -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NK8C88NZ');</script>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NK8C88NZ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11498041750"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'AW-11498041750');
    </script>

    <!-- Sticky Header -->
    <header class="sticky-header">
        <div class="sticky-header-container">
            <a href="./" class="sticky-logo">
                <img src="assets/logo.png" alt="ReClassic">
            </a>
            <nav class="sticky-nav">
                <a href="./" class="sticky-nav-link"><i class="fas fa-home"></i> Início</a>
                <a href="?to=database&type=itens" class="sticky-nav-link"><i class="fas fa-database"></i> Database</a>
                <a href="?to=comercio&type=vendedores" class="sticky-nav-link"><i class="fas fa-store"></i> Mercadores</a>
                <a href="?to=ranking&type=personagens" class="sticky-nav-link"><i class="fas fa-trophy"></i> Ranking</a>
                <a href="wiki/index.php/P%C3%A1gina_principal" class="sticky-nav-link"><i class="fas fa-book"></i> Wiki</a>
                <a href="?to=rmt" class="sticky-nav-link"><i class="fas fa-hand-holding-usd"></i> RMT</a>
                <a href="?to=vote" class="sticky-nav-link"><i class="fas fa-vote-yea"></i> Votar</a>
                <a href="https://drive.google.com/file/d/1ROEqhrWH4mnp40ULfnM0wul84jp6knn4/view?usp=sharing" target="_blank" class="sticky-nav-link sticky-nav-download"><i class="fas fa-download"></i> Download</a>
            </nav>
            <div class="sticky-actions">
                <?php if(isset($_SESSION["conta"]) && !empty($_SESSION["conta"])): ?>
                    <a href="?to=conta" class="sticky-account-btn">
                        <i class="fas fa-user"></i> Conta
                    </a>
                    <div class="sticky-balance">
                        <i class="fas fa-coins"></i>
                        <span><?php echo RECLASSIC::formatCashToBRL(RECLASSIC::getCashBalance($_SESSION["conta"])); ?></span>
                    </div>
                <?php else: ?>
                    <a href="#" class="sticky-login-btn" onclick="openLoginPopup(); return false;">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Login Popup Modal -->
    <div id="loginPopupOverlay" class="login-popup-overlay" onclick="closeLoginPopup()">
        <div class="login-popup" onclick="event.stopPropagation()">
            <button class="login-popup-close" onclick="closeLoginPopup()">
                <i class="fas fa-times"></i>
            </button>
            <div class="login-popup-content">
                <h2 class="login-popup-title">ACESSAR CONTA</h2>

                <form id="loginPopupForm">
                    <div class="login-popup-field">
                        <label for="popupUserID">Usuário</label>
                        <div class="login-input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" name="UserID" id="popupUserID" placeholder="Seu usuário" maxlength="20" required>
                        </div>
                    </div>
                    <div class="login-popup-field">
                        <label for="popupUserPW">Senha</label>
                        <div class="login-input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="UserPW" id="popupUserPW" placeholder="Sua senha" maxlength="12" required>
                        </div>
                    </div>
                    <div id="loginPopupMessage"></div>
                    <button type="submit" class="login-popup-submit">
                        ENTRAR
                    </button>
                </form>

                <div class="login-popup-links">
                    <a href="?to=registro">Criar conta</a>
                </div>
            </div>
        </div>
    </div>

    <script>
    function openLoginPopup() {
        document.getElementById('loginPopupOverlay').classList.add('active');
        document.body.style.overflow = 'hidden';
        setTimeout(() => document.getElementById('popupUserID').focus(), 100);
    }

    function closeLoginPopup() {
        document.getElementById('loginPopupOverlay').classList.remove('active');
        document.body.style.overflow = '';
    }

    // Close on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLoginPopup();
    });

    // Handle login form submission
    $(document).ready(function() {
        $('#loginPopupForm').on('submit', function(e) {
            e.preventDefault();
            var $btn = $(this).find('button[type="submit"]');
            $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> ENTRANDO...');

            $.ajax({
                type: 'POST',
                url: 'api/entrar.php',
                data: $(this).serialize(),
                success: function(response) {
                    $('#loginPopupMessage').html(response);
                    $btn.prop('disabled', false).html('ENTRAR');

                    // If login successful (check for redirect or success indicator)
                    if (response.includes('sucesso') || response.includes('Sucesso') || response.includes('window.location')) {
                        // Verificar se há redirect pendente no sessionStorage
                        var redirectUrl = sessionStorage.getItem('redirectAfterLogin');
                        sessionStorage.removeItem('redirectAfterLogin');

                        setTimeout(function() {
                            if (redirectUrl) {
                                window.location.href = redirectUrl;
                            } else {
                                window.location.reload();
                            }
                        }, 1000);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro na requisição', status, error);
                    $btn.prop('disabled', false).html('ENTRAR');
                }
            });
        });
    });
    </script>

    <!-- Hero Section with Game Elements -->
    <?php
    $compactPages = ['database', 'comercio', 'ranking', 'registro', 'entrar', 'conta', 'veritem', 'vermonstro', 'rmt', 'pacote-fundador', 'pagamento-fundador'];
    $isCompactPage = isset($_GET['to']) && in_array($_GET['to'], $compactPages);
    ?>
    <section class="hero-section pt-5 mt-4 <?php echo $isCompactPage ? 'compact-page' : ''; ?>"
            style="padding-top: <?php echo $isCompactPage ? '20px' : '100px'; ?> !important;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    <?php if (!$isCompactPage): ?>
                    <!-- SWF Placeholder -->
                    <div id="swf-placeholder" class="swf-desktop-only" style="width: 100%; max-width: 760px; height: 404px; margin: 0 auto 30px; display: flex; justify-content: center; align-items: center; pointer-events: none;">
                        <div class="spinner"></div>
                    </div>
                    <div id="swf-container" class="swf-desktop-only" style="pointer-events: none; margin-left: 90px;"></div>
                    
                    <p class="hero-subtitle mb-4">Reviva a nostalgia do Ragnarok clássico com melhorias modernas e uma comunidade vibrante</p>
                    
                    <!-- Main Action Buttons -->
                    <div class="container px-3 mb-5" style="margin-bottom: 5rem !important;">
                        <div class="row justify-content-center">
                            <!-- Download Button Only -->
                            <div class="col-md-8 text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="https://drive.google.com/file/d/1ROEqhrWH4mnp40ULfnM0wul84jp6knn4/view?usp=sharing" target="_blank" 
                                       class="btn btn-custom py-2" style="min-width: 220px; height: 48px; line-height: 28px; font-family: 'Silkscreen', cursive; font-size: 1.1rem;">
                                       <i class="fas fa-download me-2"></i>Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Container -->
    <?php if (!$isCompactPage): ?>
    <div class="container mb-5 mt-3" style="margin-top: 2rem !important;">
        <!-- Community Section -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center">
                        <i class="fas fa-book feature-icon"></i>
                        <h3 class="card-title">Wiki</h3>
                        <p class="card-text text-light" style="text-align: justify;">Em nossa wiki você encontrará informações importantes sobre o servidor, oferecendo aos jogadores o conhecimento necessário para entender e aproveitar melhor sua experiência.</p>
                        <a href="wiki/index.php/P%C3%A1gina_principal" class="btn btn-custom mt-auto">Visitar Wiki</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center">
                        <i class="fab fa-discord feature-icon"></i>
                        <h3 class="card-title">Comunidade Discord</h3>
                        <p class="card-text text-light">Junte-se ao nosso servidor Discord para se conectar com outros jogadores, obter ajuda e ficar atualizado.</p>
                        <a href="https://discord.gg/JG6vTMbT58" class="btn btn-custom mt-auto">Entrar no Discord</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Cards Section -->
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-store feature-icon"></i>
                        <h3 class="card-title">Lista de Mercadores</h3>
                        <p class="card-text text-light">Navegue pelas lojas dos jogadores e encontre os itens que você precisa dos nossos mercadores.</p>
                        <a href="?to=comercio&type=vendedores" class="btn btn-custom mt-3">Ver Mercadores</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-database feature-icon"></i>
                        <h3 class="card-title">Database</h3>
                        <p class="card-text text-light">Explore nossa base de dados completa de itens, monstros e mapas do jogo.</p>
                        <a href="?to=database&type=itens" class="btn btn-custom mt-3">Acessar Database</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-trophy feature-icon"></i>
                        <h3 class="card-title">Ranking</h3>
                        <p class="card-text text-light">Confira os melhores jogadores e guildas do servidor.</p>
                        <a href="?to=ranking&type=personagens" class="btn btn-custom mt-3">Ver Rankings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Modern scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth scrolling for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Add active class to current nav item
        const currentLocation = location.href;
        const menuItems = document.querySelectorAll('.navbar-nav a');
        menuItems.forEach(item => {
            if(item.href === currentLocation) {
                item.classList.add('active');
            }
        });
        
        // Custom animated cursor
        document.addEventListener('DOMContentLoaded', function() {
            // Pular cursor customizado em dispositivos touch (mobile)
            if ('ontouchstart' in window || navigator.maxTouchPoints > 0) {
                return;
            }

            const cursorFrames = [
                'assets/main-cursor-frame-0.gif',
                'assets/main-cursor-frame-1.gif',
                'assets/main-cursor-frame-2.gif',
                'assets/main-cursor-frame-3.gif',
                'assets/main-cursor-frame-4.gif',
                'assets/main-cursor-frame-5.gif'
            ];
            
            let currentFrame = 0;
            
            function updateCursor() {
                document.documentElement.style.cursor = `url('${cursorFrames[currentFrame]}'), auto`;
                
                // Set the delay - normal 100ms, but 300ms pause after showing frame 0
                const delay = (currentFrame === 0) ? 300 : 100;
                
                // Determine the next frame
                currentFrame = (currentFrame + 1) % cursorFrames.length;
                
                // Schedule the next update
                setTimeout(updateCursor, delay);
            }
            
            // Start the animation
            updateCursor();
        });
    </script>
    
</body>
</html>
