<h1>Upload Live Link</h1>

<p>Please upload the blog post live link:</p>

<form method="POST" action="{{ route('blog.upload', ['id' => $id]) }}">
    @csrf

    <div>
        <label for="live_link">Live Link:</label>
        <input type="text" id="live_link" name="live_link" value="{{ old('live_link') }}">
    </div>

    <button type="submit">Upload</button>
</form>
