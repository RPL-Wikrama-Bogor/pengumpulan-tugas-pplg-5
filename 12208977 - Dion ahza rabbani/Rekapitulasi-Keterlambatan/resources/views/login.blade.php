<h1>Silahkan Login terlebih dahulu</h1>
<form action="{{ route('login')}}" method="post">
    {{ csrf_field() }}
    <input class="" type="email" name="email">
    <input class="" type="password" name="password">
    <button class="btn btn-primary" type="submit">Login</button>

</form>
<style>
            body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-left: 35%;
        }
        h1 {
            text-align: center;
        }
        form input[type="email"],
        form input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn {
            width: 100%;
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100px;
            margin-left: 30%
        }
        .btn:hover {
            background-color: #2980b9;
        }

</style>