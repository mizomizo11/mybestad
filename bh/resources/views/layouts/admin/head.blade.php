<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Admin Dashboard - '.config('app.name'))</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('all/favicon.png')}}"/>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- DataTables CSS (for admin tables) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Custom Admin CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css')}}">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --topbar-height: 70px;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            direction: @if(App()->getLocale() == 'ar') rtl @else ltr @endif;
        }
        
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        .admin-sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #1e293b 0%, #334155 100%);
            color: white;
            position: fixed;
            top: 0;
            @if(App()->getLocale() == 'ar')
                right: 0;
            @else
                left: 0;
            @endif
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .admin-content {
            flex: 1;
            @if(App()->getLocale() == 'ar')
                margin-right: var(--sidebar-width);
            @else
                margin-left: var(--sidebar-width);
            @endif
            transition: all 0.3s ease;
        }
        
        .admin-topbar {
            height: var(--topbar-height);
            background: white;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        
        .admin-main {
            padding: 2rem;
        }
        
        /* Mobile Responsive */
        @media (max-width: 991px) {
            .admin-sidebar {
                @if(App()->getLocale() == 'ar')
                    right: calc(-1 * var(--sidebar-width));
                @else
                    left: calc(-1 * var(--sidebar-width));
                @endif
            }
            
            .admin-sidebar.show {
                @if(App()->getLocale() == 'ar')
                    right: 0;
                @else
                    left: 0;
                @endif
            }
            
            .admin-content {
                margin-left: 0;
                margin-right: 0;
            }
        }
    </style>
    
    @yield('styles')
</head>
