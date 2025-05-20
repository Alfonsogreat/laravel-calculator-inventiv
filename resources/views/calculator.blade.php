<!DOCTYPE html>
<html>
<head>
    <title>Laravel Calculator</title>
</head>
<body>
    <h1>Inventiv Test Calculator</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (isset($result))
        <h2>Result: {{ $result }}</h2>
    @endif

    <form method="POST" action="{{ route('calculator.calculate') }}">
        @csrf
        <input type="number" name="number1" value="{{ old('number1', $old['number1'] ?? '') }}" placeholder="First Number" required>
        <select name="operation" required>
            <option value="add" {{ old('operation', $old['operation'] ?? '') == 'add' ? 'selected' : '' }}>+</option>
            <option value="subtract" {{ old('operation', $old['operation'] ?? '') == 'subtract' ? 'selected' : '' }}>-</option>
            <option value="multiply" {{ old('operation', $old['operation'] ?? '') == 'multiply' ? 'selected' : '' }}>*</option>
            <option value="divide" {{ old('operation', $old['operation'] ?? '') == 'divide' ? 'selected' : '' }}>/</option>
        </select>
        <input type="number" name="number2" value="{{ old('number2', $old['number2'] ?? '') }}" placeholder="Second Number" required>
        <button type="submit">Calculate</button>
    </form>
</body>
</html>
