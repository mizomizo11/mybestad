<!-- Services Section -->
<section class="services-section">
    <h2 class="text-center mb-4">{{ __('services.our_services') }}</h2>
    
    @if($services->count() > 0)
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4 mb-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            @if($service->image_path)
                                <img src="{{ Storage::url($service->image_path) }}" 
                                     alt="{{ app()->getLocale() == 'ar' ? $service->title_ar : $service->title_en }}" 
                                     class="img-fluid mb-3"
                                     style="max-height: 100px; object-fit: contain;">
                            @elseif($service->icon_class)
                                <i class="{{ $service->icon_class }} fa-3x text-primary mb-3"></i>
                            @endif
                            
                            <h5 class="card-title">
                                {{ app()->getLocale() == 'ar' ? $service->title_ar : $service->title_en }}
                            </h5>
                            
                            @if(app()->getLocale() == 'ar' ? $service->description_ar : $service->description_en)
                                <p class="card-text">
                                    {{ app()->getLocale() == 'ar' ? $service->description_ar : $service->description_en }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle"></i> {{ __('services.no_services') }}
        </div>
    @endif
</section>
