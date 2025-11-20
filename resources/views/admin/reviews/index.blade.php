@extends('layouts.admin')

@section('title', 'إدارة التقييمات')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4"><i class="fas fa-star"></i> إدارة التقييمات</h1>
    
    <!-- Add New Review Form -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-plus"></i> إضافة تقييم جديد</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.reviews.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="name" class="form-label">اسم العميل</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="rating" class="form-label">التقييم</label>
                        <select class="form-control @error('rating') is-invalid @enderror" 
                                id="rating" name="rating" required>
                            <option value="">اختر التقييم</option>
                            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5)</option>
                            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4)</option>
                            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐ (3)</option>
                            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>⭐⭐ (2)</option>
                            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>⭐ (1)</option>
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="approved" class="form-label">الحالة</label>
                        <select class="form-control" id="approved" name="approved">
                            <option value="0">قيد المراجعة</option>
                            <option value="1">معتمد</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">التعليق</label>
                    <textarea class="form-control @error('comment') is-invalid @enderror" 
                              id="comment" name="comment" rows="3" required>{{ old('comment') }}</textarea>
                    @error('comment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> إضافة التقييم
                </button>
            </form>
        </div>
    </div>

    <!-- Reviews List -->
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0"><i class="fas fa-list"></i> جميع التقييمات</h5>
        </div>
        <div class="card-body">
            @if($reviews->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                <th>التقييم</th>
                                <th>التعليق</th>
                                <th>الحالة</th>
                                <th>تاريخ الإضافة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                                <tr id="review-{{ $review->id }}">
                                    <td>{{ $review->id }}</td>
                                    <td>{{ $review->name }}</td>
                                    <td>
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                        <span class="badge bg-info">{{ $review->rating }}/5</span>
                                    </td>
                                    <td>{{ Str::limit($review->comment, 50) }}</td>
                                    <td>
                                        @if($review->approved)
                                            <span class="badge bg-success">معتمد</span>
                                        @else
                                            <span class="badge bg-warning">قيد المراجعة</span>
                                        @endif
                                    </td>
                                    <td>{{ $review->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- Approve/Unapprove Button -->
                                            <form action="{{ route('admin.reviews.approve', $review->id) }}" 
                                                  method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-sm {{ $review->approved ? 'btn-warning' : 'btn-success' }}"
                                                        title="{{ $review->approved ? 'إلغاء الاعتماد' : 'اعتماد' }}">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-sm btn-primary" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editModal{{ $review->id }}"
                                                    title="تعديل">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" 
                                                  method="POST" style="display: inline;"
                                                  onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="حذف">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $review->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">تعديل التقييم</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">اسم العميل</label>
                                                        <input type="text" class="form-control" name="name" 
                                                               value="{{ $review->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">التقييم</label>
                                                        <select class="form-control" name="rating" required>
                                                            <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5)</option>
                                                            <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4)</option>
                                                            <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>⭐⭐⭐ (3)</option>
                                                            <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>⭐⭐ (2)</option>
                                                            <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>⭐ (1)</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">التعليق</label>
                                                        <textarea class="form-control" name="comment" rows="3" required>{{ $review->comment }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">الحالة</label>
                                                        <select class="form-control" name="approved">
                                                            <option value="0" {{ !$review->approved ? 'selected' : '' }}>قيد المراجعة</option>
                                                            <option value="1" {{ $review->approved ? 'selected' : '' }}>معتمد</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> لا توجد تقييمات حالياً
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
