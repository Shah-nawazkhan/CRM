<!DOCTYPE html>
<html>
<head>
    <title>{{ $customer->name }} Details</title>
</head>
<body>
    <h1>{{ $customer->name }}</h1>
    <p>Email: {{ $customer->email }}</p>
    <p>Phone: {{ $customer->phone }}</p>

    <h2>Edit Customer</h2>
    <form action="{{ url('/customers/' . $customer->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $customer->name }}" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $customer->email }}" required><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ $customer->phone }}" required><br>
        <button type="submit">Update Customer</button>
    </form>

    <form action="{{ url('/customers/' . $customer->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Customer</button>
    </form>
</body>
</html>
