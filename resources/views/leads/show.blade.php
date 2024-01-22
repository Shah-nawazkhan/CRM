<!DOCTYPE html>
<html>
<head>
    <title>{{ $lead->name }} Details</title>
</head>
<body>
    <h1>{{ $lead->name }}</h1>
    <p>Email: {{ $lead->email }}</p>
    <p>Phone: {{ $lead->phone }}</p>
    <p>Status: {{ $lead->status }}</p>

    <h2>Edit Lead</h2>
    <form action="{{ url('/leads/' . $lead->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $lead->name }}" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $lead->email }}" required><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ $lead->phone }}" required><br>
        <label for="status">Status:</label>
        <select name="status" required>
            <option value="new" @if ($lead->status === 'new') selected @endif>New</option>
            <option value="contacted" @if ($lead->status === 'contacted') selected @endif>Contacted</option>
            <option value="converted" @if ($lead->status === 'converted') selected @endif>Converted</option>
        </select><br>
        <button type="submit">Update Lead</button>
    </form>

    <form action="{{ url('/leads/' . $lead->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Lead</button>
    </form>
</body>
</html>
