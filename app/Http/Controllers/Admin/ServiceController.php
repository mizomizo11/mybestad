<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->validated();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('services', 'public');
        }
        
        Service::create($data);
        
        return redirect()->route('admin.services.index')
            ->with('success', __('services.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }
            $data['image_path'] = $request->file('image')->store('services', 'public');
        }
        
        $service->update($data);
        
        return redirect()->route('admin.services.index')
            ->with('success', __('services.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }
        
        $service->delete();
        
        return redirect()->route('admin.services.index')
            ->with('success', __('services.deleted_successfully'));
    }

    /**
     * Toggle the active status of the service.
     */
    public function toggle(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);
        
        return response()->json([
            'success' => true,
            'is_active' => $service->is_active,
            'message' => __('services.status_updated')
        ]);
    }

    /**
     * Update sort order of services.
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'integer|exists:services,id'
        ]);

        foreach ($request->orders as $index => $id) {
            Service::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json([
            'success' => true,
            'message' => __('services.order_updated')
        ]);
    }
}
