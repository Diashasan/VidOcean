@extends('layouts.master')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    .modern-upload-container {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: linear-gradient(135deg,rgb(13, 68, 234) 0%,rgb(47, 174, 238) 100%);
        min-height: 100vh;
        padding: 40px 20px;
        margin: -20px;
    }

    .upload-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 32px 64px rgba(0, 0, 0, 0.15);
        max-width: 800px;
        margin: 0 auto;
        border: 1px solid rgba(255, 255, 255, 0.2);
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .upload-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .upload-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #006994,rgb(6, 56, 220));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }

    .upload-header p {
        color: #6b7280;
        font-size: 1.1rem;
    }

    .form-section {
        margin-bottom: 32px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 24px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 8px;
        font-size: 1rem;
    }

    .form-input {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-input:focus {
        outline: none;
        border-color: #006994;
        box-shadow: 0 0 0 3px rgba(0, 105, 148, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 100px;
    }

    .upload-zone {
        border: 3px dashed #d1d5db;
        border-radius: 16px;
        padding: 60px 40px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        margin-bottom: 24px;
    }

    .upload-zone:hover {
        border-color: #006994;
        background: linear-gradient(135deg, #e6f3f9, #d1eaf2);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 105, 148, 0.15);
    }

    .upload-zone.dragover {
        border-color: #006994;
        background: linear-gradient(135deg, #e6f3f9, #cce7f0);
        transform: scale(1.02);
    }

    .upload-zone.has-file {
        border-color: #10b981;
        background: linear-gradient(135deg, #ecfdf5, #d1fae5);
    }

    .upload-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #006994, #003d5b);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        transition: all 0.3s ease;
    }

    .upload-zone:hover .upload-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .upload-icon svg {
        width: 40px;
        height: 40px;
        fill: white;
    }

    .upload-text h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .upload-text p {
        color: #6b7280;
        font-size: 1rem;
        margin-bottom: 16px;
    }

    .upload-button {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        padding: 12px 32px;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .upload-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .file-input {
        display: none;
    }

    .file-preview {
        display: none;
        background: #f8fafc;
        border-radius: 12px;
        padding: 20px;
        margin-top: 16px;
        border: 1px solid #e5e7eb;
    }

    .file-preview.show {
        display: block;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .file-details {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .file-thumbnail {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #10b981, #059669);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .file-meta h4 {
        font-size: 1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .file-meta p {
        color: #6b7280;
        font-size: 0.9rem;
    }

    .remove-file {
        margin-left: auto;
        background: #fee2e2;
        color: #dc2626;
        border: none;
        padding: 8px 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }

    .remove-file:hover {
        background: #fecaca;
    }

    .submit-section {
        border-top: 1px solid #e5e7eb;
        padding-top: 32px;
        text-align: center;
    }

    .submit-btn {
        background: linear-gradient(135deg, #006994, #003d5b);
        color: white;
        border: none;
        padding: 16px 48px;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 105, 148, 0.3);
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 105, 148, 0.4);
    }

    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .format-info {
        background: #f0f4ff;
        border: 1px solid #c7d2fe;
        border-radius: 12px;
        padding: 16px;
        margin-top: 24px;
    }

    .format-info h4 {
        color: #4338ca;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .format-info p {
        color: #6366f1;
        font-size: 0.9rem;
        margin: 0;
    }

    .alert {
        padding: 16px;
        border-radius: 12px;
        margin-bottom: 24px;
        border: none;
    }

    .alert-success {
        background: #ecfdf5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }

    .alert-danger {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    @media (max-width: 768px) {
        .modern-upload-container {
            padding: 20px 10px;
        }
        
        .upload-card {
            padding: 24px;
        }
        
        .upload-header h1 {
            font-size: 2rem;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .upload-zone {
            padding: 40px 20px;
        }
    }
</style>

<div class="modern-upload-container">
    <div class="upload-card">
        <div class="upload-header">
            <h1>Upload Video</h1>
            <p>Bagikan video Anda dengan mudah dan cepat</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf
            
            <div class="form-section">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-input" required value="{{ old('title') }}" placeholder="Masukkan judul video">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Category *</label>
                        <select name="category_id" class="form-input" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Description (optional)</label>
                    <textarea name="description" class="form-input form-textarea" rows="3" placeholder="Berikan deskripsi singkat tentang video">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="form-section">
                <label class="form-label">Video File *</label>
                
                <div class="upload-zone" id="uploadZone">
                    <div class="upload-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                        </svg>
                    </div>
                    <div class="upload-text">
                        <h3>Seret & Letakkan Video</h3>
                        <p>atau klik untuk memilih file dari perangkat Anda</p>
                        <button type="button" class="upload-button" onclick="document.getElementById('videoFile').click()">
                            Pilih Video
                        </button>
                    </div>
                </div>

                <input type="file" id="videoFile" name="video" class="file-input" accept="video/*" required>
                
                <div class="file-preview" id="filePreview">
                    <div class="file-details">
                        <div class="file-thumbnail" id="fileThumbnail">MP4</div>
                        <div class="file-meta">
                            <h4 id="fileName">video_sample.mp4</h4>
                            <p id="fileSize">12.5 MB</p>
                        </div>
                        <button type="button" class="remove-file" onclick="removeFile()">Remove</button>
                    </div>
                </div>

                <div class="format-info">
                    <h4>Format yang Didukung</h4>
                    <p>MP4, AVI, MOV, WMV, FLV • Maksimal 500MB • Resolusi hingga 4K</p>
                </div>
            </div>

            <div class="submit-section">
                <button type="submit" class="submit-btn" id="submitBtn">
                    Upload Video
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const uploadZone = document.getElementById('uploadZone');
    const videoFile = document.getElementById('videoFile');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const fileThumbnail = document.getElementById('fileThumbnail');
    const submitBtn = document.getElementById('submitBtn');
    
    let selectedFile = null;

    // Drag and drop functionality
    uploadZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadZone.classList.add('dragover');
    });

    uploadZone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadZone.classList.remove('dragover');
    });

    uploadZone.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadZone.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleFile(files[0]);
        }
    });

    uploadZone.addEventListener('click', () => {
        videoFile.click();
    });

    videoFile.addEventListener('change', (e) => {
        if (e.target.files.length > 0) {
            handleFile(e.target.files[0]);
        }
    });

    function handleFile(file) {
        if (!file.type.startsWith('video/')) {
            alert('Harap pilih file video yang valid');
            return;
        }

        if (file.size > 500 * 1024 * 1024) { // 500MB limit
            alert('Ukuran file terlalu besar. Maksimal 500MB');
            return;
        }

        selectedFile = file;
        
        // Update file info
        fileName.textContent = file.name;
        fileSize.textContent = formatFileSize(file.size);
        
        // Update thumbnail based on file type
        const extension = file.name.split('.').pop().toUpperCase();
        fileThumbnail.textContent = extension;
        
        // Show file preview
        filePreview.classList.add('show');
        uploadZone.classList.add('has-file');
        
        // Update form
        const dt = new DataTransfer();
        dt.items.add(file);
        videoFile.files = dt.files;
        
        // Enable submit button
        submitBtn.disabled = false;
    }

    function removeFile() {
        selectedFile = null;
        filePreview.classList.remove('show');
        uploadZone.classList.remove('has-file');
        videoFile.value = '';
        submitBtn.disabled = false;
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Form submission handling
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Uploading...';
        
        // You could add a progress bar here if needed
        // This is just a basic loading state
    });

    // Initialize form state
    document.addEventListener('DOMContentLoaded', function() {
        // Check if there's an old file value (in case of validation errors)
        if (videoFile.files.length > 0) {
            handleFile(videoFile.files[0]);
        }
    });
</script>

<<<<<<< HEAD
@endsection
=======
@endsection 
>>>>>>> d782962 (main)
