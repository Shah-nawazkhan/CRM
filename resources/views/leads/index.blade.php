<!DOCTYPE html>
<html>
<head>
    <title>All Leads</title>
</head>
<body>
    <h1>All Leads</h1>
    <ul>
        @foreach ($leads as $lead)
            <li>
                <a href="{{ url('/leads', $lead->id) }}">{{ $lead->name }}</a>
            </li>
        @endforeach
    </ul>

    <h2>Create a New Lead</h2>
    <form action="{{ url('/leads') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>
        <button type="submit">Create Lead</button>
    </form>
</body>
</html>
