<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquête bewerken</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Enquête bewerken</h1>
            <form action="{{ route('surveys.update', $survey->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titel van de enquête</label>
                    <input type="text" name="title" class="form-input w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" value="{{ $survey->title }}" required>
                </div>
                <div class="mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Beschrijving van de enquête</label>
                    <textarea name="description" class="form-textarea w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" required>{{ $survey->description }}</textarea>
                </div>
                <hr class="my-6">
                <h2 class="text-xl font-bold mb-4 text-blue-600">Vragen</h2>
                @foreach($survey->questions as $index => $question)
                    <div class="mb-6">
                        <label for="question{{$index}}" class="block text-gray-700 text-sm font-bold mb-2">Vraag {{$index + 1}}</label>
                        <input type="text" name="questions[{{$index}}][text]" class="form-input w-full px-4 py-2 mb-4 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" value="{{ $question->question_text }}" required>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Opties (gescheiden door komma's)</label>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach(explode(',', $question->options) as $option)
                                <input type="text" name="questions[{{$index}}][options][]" class="form-input w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" value="{{ $option }}" required>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <div class="flex items-center justify-center mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Bijwerken</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
