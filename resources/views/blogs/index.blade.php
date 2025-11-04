<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG LIST</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="max-w-6xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">BLOG LIST</h1>
        <a href="{{ route('blogs.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
           + Create New Blog
        </a>
    </div>

   
<div class="h-12 mb-4 flex items-center justify-center">
    @if(session('success'))
        <div id="success-message"
             class="bg-green-100 text-green-800 px-4 py-2 rounded-lg shadow transition-all duration-700 ease-in-out">
            {{ session('success') }}
        </div>

        <script>
            // Hide success message after 3 seconds (with fade effect)
            setTimeout(() => {
                const msg = document.getElementById('success-message');
                if (msg) {
                    msg.style.opacity = '0';
                    setTimeout(() => msg.remove(), 500);
                }
            }, 3000);
        </script>
    @endif
</div>



    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-4 py-2 text-left">Content</th>
                    <th class="px-4 py-2 text-left">Image</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $blog->id }}</td>
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $blog->title }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ Str::limit($blog->content, 100) }}</td>
                        <td class="px-4 py-2">
                            @if($blog->image)
                                <img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog Image" class="w-20 rounded-md shadow">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('blogs.edit', $blog->id) }}"
                               class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this blog?')"
                                        class="text-red-600 hover:text-red-800 font-medium">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
