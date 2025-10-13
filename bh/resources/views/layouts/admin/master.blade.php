<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="@if(App()->getLocale() == 'ar')rtl @else ltr @endif">
@include('layouts.admin.head')

<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        
        <!-- Main Content Area -->
        <div class="admin-content">
            <!-- Topbar -->
            @include('layouts.admin.topbar')
            
            <!-- Main Content -->
            <main class="admin-main">
                <!-- Breadcrumb (optional) -->
                @if(View::hasSection('breadcrumb'))
                    <div class="mb-4">
                        @yield('breadcrumb')
                    </div>
                @endif
                
                <!-- Alerts -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if(session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if(session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <!-- Page Content -->
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- Chart.js (for dashboard charts) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <!-- Custom Admin JS -->
    <script>
        // CSRF Token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Sidebar Toggle for Mobile
        $(document).ready(function() {
            $('#sidebarToggle').click(function() {
                $('#adminSidebar').toggleClass('show');
            });
            
            // Close sidebar when clicking outside on mobile
            $(document).click(function(event) {
                if (!$(event.target).closest('#adminSidebar, #sidebarToggle').length) {
                    if ($(window).width() < 992) {
                        $('#adminSidebar').removeClass('show');
                    }
                }
            });
            
            // Initialize DataTables with default settings
            if ($.fn.DataTable) {
                $('.data-table').DataTable({
                    responsive: true,
                    language: {
                        @if(App::getLocale() == 'ar')
                            "search": "بحث:",
                            "lengthMenu": "عرض _MENU_ سجلات",
                            "info": "عرض _START_ إلى _END_ من _TOTAL_ سجلات",
                            "infoEmpty": "عرض 0 إلى 0 من 0 سجلات",
                            "infoFiltered": "(تمت التصفية من _MAX_ سجلات)",
                            "paginate": {
                                "first": "الأول",
                                "last": "الأخير",
                                "next": "التالي",
                                "previous": "السابق"
                            },
                            "zeroRecords": "لا توجد سجلات مطابقة",
                            "emptyTable": "لا توجد بيانات متاحة"
                        @else
                            "search": "Search:",
                            "lengthMenu": "Show _MENU_ entries",
                            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                            "infoEmpty": "Showing 0 to 0 of 0 entries",
                            "infoFiltered": "(filtered from _MAX_ total entries)",
                            "paginate": {
                                "first": "First",
                                "last": "Last",
                                "next": "Next",
                                "previous": "Previous"
                            },
                            "zeroRecords": "No matching records found",
                            "emptyTable": "No data available in table"
                        @endif
                    }
                });
            }
            
            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
            
            // Confirm delete actions
            $('.btn-delete, .delete-btn').click(function(e) {
                @if(App::getLocale() == 'ar')
                    if (!confirm('هل أنت متأكد من الحذف؟')) {
                        e.preventDefault();
                        return false;
                    }
                @else
                    if (!confirm('Are you sure you want to delete?')) {
                        e.preventDefault();
                        return false;
                    }
                @endif
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>
