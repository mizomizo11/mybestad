@extends('layouts.admin')

@section('title', __('services.add_service'))

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h2><i class="fas fa-plus"></i> {{ __('services.add_service') }}</h2>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-right"></i> {{ __('services.back') }}
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Title English -->
                    <div class="col-md-6 mb-3">
                        <label for="title_en" class="form-label">{{ __('services.title_en') }} *</label>
                        <input type="text" 
                               class="form-control @error('title_en') is-invalid @enderror" 
                               id="title_en" 
                               name="title_en" 
                               value="{{ old('title_en') }}" 
                               required>
                        @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title Arabic -->
                    <div class="col-md-6 mb-3">
                        <label for="title_ar" class="form-label">{{ __('services.title_ar') }} *</label>
                        <input type="text" 
                               class="form-control @error('title_ar') is-invalid @enderror" 
                               id="title_ar" 
                               name="title_ar" 
                               value="{{ old('title_ar') }}" 
                               required>
                        @error('title_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Description English -->
                    <div class="col-md-6 mb-3">
                        <label for="description_en" class="form-label">{{ __('services.description_en') }}</label>
                        <textarea class="form-control @error('description_en') is-invalid @enderror" 
                                  id="description_en" 
                                  name="description_en" 
                                  rows="4">{{ old('description_en') }}</textarea>
                        @error('description_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description Arabic -->
                    <div class="col-md-6 mb-3">
                        <label for="description_ar" class="form-label">{{ __('services.description_ar') }}</label>
                        <textarea class="form-control @error('description_ar') is-invalid @enderror" 
                                  id="description_ar" 
                                  name="description_ar" 
                                  rows="4">{{ old('description_ar') }}</textarea>
                        @error('description_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Icon Class -->
                    <div class="col-md-4 mb-3">
                        <label for="icon_class" class="form-label">{{ __('services.icon_class') }}</label>
                        <input type="text" 
                               class="form-control @error('icon_class') is-invalid @enderror" 
                               id="icon_class" 
                               name="icon_class" 
                               value="{{ old('icon_class') }}"
                               placeholder="fas fa-stethoscope">
                        <small class="text-muted">{{ __('services.icon_help') }}</small>
                        @error('icon_class')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sort Order -->
                    <div class="col-md-4 mb-3">
                        <label for="sort_order" class="form-label">{{ __('services.sort_order') }}</label>
                        <input type="number" 
                               class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" 
                               name="sort_order" 
                               value="{{ old('sort_order', 0) }}"
                               min="0">
                        <small class="text-muted">{{ __('services.sort_help') }}</small>
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Is Active -->
                    <div class="col-md-4 mb-3">
                        <label for="is_active" class="form-label">{{ __('services.status') }}</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   id="is_active" 
                                   name="is_active" 
                                   value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                {{ __('services.is_active') }}
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">{{ __('services.image') }}</label>
                    <input type="file" 
                           class="form-control @error('image') is-invalid @enderror" 
                           id="image" 
                           name="image"
                           accept="image/*">
                    <small class="text-muted">{{ __('services.image_help') }}</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> {{ __('services.save') }}
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> {{ __('services.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
