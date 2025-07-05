<form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="foto">Pilih Foto:</label>
    <input type="file" name="foto" id="foto" required>
    <button type="submit">Upload</button>
</form>