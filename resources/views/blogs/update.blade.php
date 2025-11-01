<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8 mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Update Blog</h2>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block font-semibold mb-2 text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{ $blog->title }}" required 
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="content" class="block font-semibold mb-2 text-gray-700">Content</label>
            <textarea id="content" name="content" rows="5" required
                      class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $blog->content }}</textarea>
        </div>

        <div>
            <label for="image" class="block font-semibold mb-2 text-gray-700">Image</label>
            @if($blog->image)
                <div class="mb-3">
                    <img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog Image" class="w-48 rounded-lg shadow">
                </div>
            @endif
            <input type="file" id="image" name="image"
                   class="block w-full text-gray-700 file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('blogs.index') }}" class="text-gray-600 hover:text-blue-600">← Back to Blog List</a>
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow">
                Update Blog
            </button>
        </div>
    </form>
</div>

</body>
</html>
