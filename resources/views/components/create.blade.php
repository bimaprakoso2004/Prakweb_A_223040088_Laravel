@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="mb-4">
    <a href="/dashboard/posts/create" class="btn btn-primary">Create Post</a>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Welcome to the Dashboard</h5>
        <p class="card-text">
            Manage your posts and view analytics from here. Click the button above to create a new post.
        </p>

        <!-- Menampilkan pesan kesalahan jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<!-- JavaScript untuk menangani upload gambar -->
<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault(); // Mencegah pengunggahan file
    });

    const image = document.querySelector('#image'); // Mengambil elemen input gambar
    const imgPreview = document.querySelector('.img-preview'); // Memastikan pemilihan elemen yang tepat untuk preview

    image.addEventListener('change', function() {
        const file = this.files[0]; // Mengambil file yang diunggah
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result; // Menampilkan gambar di elemen img preview
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection