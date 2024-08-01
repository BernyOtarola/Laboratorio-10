<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        header {
            padding: 20px;
            background: #007bff; /* Color principal */
            color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 500;
            border-bottom: 2px solid transparent;
            transition: border-bottom 0.3s ease, transform 0.3s ease;
        }

        header a:hover {
            border-bottom: 2px solid #fff;
            transform: translateY(-2px);
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 10px 0;
            background: #007bff; /* Color principal */
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background: #0056b3; /* Color principal más oscuro */
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .complete-btn {
            background: #28a745; /* Color para completar */
        }

        .complete-btn:hover {
            background: #218838;
        }

        .delete-btn {
            background: #dc3545; /* Color para eliminar */
        }

        .delete-btn:hover {
            background: #c82333;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #007bff; /* Color principal */
            color: #fff;
            border-radius: 12px;
            margin-top: 20px;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        .tags {
            margin-top: 10px;
        }

        .tag {
            background: #e2e2e2;
            color: #555;
            border-radius: 3px;
            padding: 5px 10px;
            margin-right: 5px;
            display: inline-block;
            font-size: 0.9em;
        }

        .completed {
            color: #28a745;
            font-weight: bold;
        }

        /* Agregar Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 10px;
            }

            header h1 {
                font-size: 1.8rem;
            }

            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
    <div class="container">
        @yield('header')
        @yield('content')
        @yield('footer')
    </div>
</body>
</html>
