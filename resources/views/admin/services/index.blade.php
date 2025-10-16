@extends('layouts.admin')

@section('title', __('services.manage_services'))

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-concierge-bell"></i> {{ __('services.manage_services') }}</h2>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> {{ __('services.add_service') }}
        </a>
    </div>

    @if($services->count() > 0)
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="servicesTable">
                        <thead>
                            <tr>
                                <th>{{ __('services.sort_order') }}</th>
                                <th>{{ __('services.title_en') }}</th>
                                <th>{{ __('services.title_ar') }}</th>
                                <th>{{ __('services.icon_class') }}</th>
                                <th>{{ __('services.status') }}</th>
                                <th class="text-center">{{ __('services.edit') }}</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-services">
                            @foreach($services as $service)
                                <tr data-id="{{ $service->id }}">
                                    <td>
                                        <i class="fas fa-grip-vertical text-muted" style="cursor: move;"></i>
                                        {{ $service->sort_order }}
                                    </td>
                                    <td>{{ $service->title_en }}</td>
                                    <td>{{ $service->title_ar }}</td>
                                    <td>
                                        @if($service->icon_class)
                                            <i class="{{ $service->icon_class }}"></i>
                                            <small class="text-muted">{{ $service->icon_class }}</small>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-toggle-status {{ $service->is_active ? 'btn-success' : 'btn-secondary' }}"
                                                data-id="{{ $service->id }}"
                                                data-active="{{ $service->is_active ? 'true' : 'false' }}">
                                            <i class="fas fa-{{ $service->is_active ? 'check' : 'times' }}"></i>
                                            {{ $service->is_active ? __('services.active') : __('services.inactive') }}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.services.edit', $service) }}" 
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.services.destroy', $service) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('{{ __('services.confirm_delete') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> {{ __('services.no_services') }}
        </div>
    @endif
</div>
@endsection

@section('extra-js')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    // Toggle active status
    document.querySelectorAll('.btn-toggle-status').forEach(button => {
        button.addEventListener('click', function() {
            const serviceId = this.dataset.id;
            const isActive = this.dataset.active === 'true';
            
            fetch(`/admin/services/${serviceId}/toggle`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update button
                    this.dataset.active = data.is_active ? 'true' : 'false';
                    this.className = `btn btn-sm btn-toggle-status ${data.is_active ? 'btn-success' : 'btn-secondary'}`;
                    this.innerHTML = `<i class="fas fa-${data.is_active ? 'check' : 'times'}"></i> ${data.is_active ? '{{ __('services.active') }}' : '{{ __('services.inactive') }}'}`;
                }
            });
        });
    });

    // Sortable functionality
    const sortable = Sortable.create(document.getElementById('sortable-services'), {
        animation: 150,
        handle: '.fa-grip-vertical',
        onEnd: function(evt) {
            const orders = [];
            document.querySelectorAll('#sortable-services tr').forEach((row, index) => {
                orders.push(row.dataset.id);
            });
            
            fetch('/admin/services/reorder', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ orders: orders })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Refresh page to update sort_order display
                    location.reload();
                }
            });
        }
    });
</script>
@endsection
