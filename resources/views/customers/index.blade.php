<!DOCTYPE html>
<html>
<head>
    <title>All Customers</title>
</head>
<body>
    <h1>All Customers</h1>
    <ul>
        @foreach ($customers as $customer)
            <li>
                <a href="{{ url('/customers', $customer->id) }}">{{ $customer->name }}</a>
            </li>
        @endforeach
    </ul>

    <h2>Create a New Customer</h2>
    <form action="{{ url('/customers') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>
        <button type="submit">Create Customer</button>
    </form>
</body>
</html>
