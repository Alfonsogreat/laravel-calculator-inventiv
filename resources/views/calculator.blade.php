<!DOCTYPE html>
<html>
<head>
    <title>Laravel Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Inventiv Test Calculator</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($result))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4 text-center">
                <strong>Result:</strong> {{ $result }}
            </div>
        @endif

        <form method="POST" action="{{ route('calculator.calculate') }}" class="space-y-4">
            @csrf
            <input type="number" name="number1" value="{{ old('number1', $old['number1'] ?? '') }}" placeholder="First Number" required class="w-full border border-gray-300 rounded px-4 py-2">
            
            <select name="operation" required class="w-full border border-gray-300 rounded px-4 py-2">
                <option value="add" {{ old('operation', $old['operation'] ?? '') == 'add' ? 'selected' : '' }}>+</option>
                <option value="subtract" {{ old('operation', $old['operation'] ?? '') == 'subtract' ? 'selected' : '' }}>-</option>
                <option value="multiply" {{ old('operation', $old['operation'] ?? '') == 'multiply' ? 'selected' : '' }}>*</option>
                <option value="divide" {{ old('operation', $old['operation'] ?? '') == 'divide' ? 'selected' : '' }}>/</option>
            </select>

            <input type="number" name="number2" value="{{ old('number2', $old['number2'] ?? '') }}" placeholder="Second Number" required class="w-full border border-gray-300 rounded px-4 py-2">

            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Calculate</button>
        </form>
    </div>
</body>
</html>
