@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 dark:bg-slate-800">
                <div class="card-body p-5 text-center">
                    
                    <h3 class="fw-bold mb-4 dark:text-white">Profile Settings</h3>

                    <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" id="avatarForm">
                        @csrf
                        
                        <div class="position-relative d-inline-block mb-4">
                            <div class="rounded-circle shadow-sm border border-4 border-white overflow-hidden" 
                                 style="width: 150px; height: 150px; cursor: pointer; background:#dee2e6;" 
                                 onclick="document.getElementById('avatarInput').click()">
                                
                                <img id="preview" 
                                     src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : '#' }}" 
                                     class="w-100 h-100 {{ Auth::user()->avatar ? '' : 'd-none' }}" 
                                     style="object-fit: cover;">
                                
                                <div id="initials" class="w-100 h-100 d-flex align-items-center justify-content-center text-white bg-primary {{ Auth::user()->avatar ? 'd-none' : '' }}" 
                                     style="font-size: 3rem;">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            </div>
                            
                            <div class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle p-2 shadow-sm">
                                <i class="bi bi-camera-fill"></i>
                            </div>

                            <input type="file" name="avatar" id="avatarInput" class="d-none" accept="image/*" onchange="previewImage(this)">
                        </div>

                        <div class="text-start mb-4">
                            <label class="form-label text-muted">Full Name</label>
                            <input type="text" class="form-control rounded-pill bg-light" value="{{ Auth::user()->name }}" disabled>
                            
                            <label class="form-label text-muted mt-3">Email Address</label>
                            <input type="email" class="form-control rounded-pill bg-light" value="{{ Auth::user()->email }}" disabled>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill py-2 shadow-sm">
                                <i class="bi bi-save"></i> Save Changes
                            </button>
                        </div>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-success mt-3 rounded-pill py-2">{{ session('success') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('preview').classList.remove('d-none');
            document.getElementById('initials').classList.add('d-none');
        }
        reader.readAsDataURL(input.files);
    }
}
</script>
@endsection