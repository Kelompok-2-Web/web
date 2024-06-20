<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Survey Polinema | Terimakasih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #007bff;
            /* Warna latar belakang biru */
            color: #ffffff;
            /* Warna teks putih */
        }

        .thank-you-card {
            max-width: 400px;
            border-radius: 15px;
            background-color: #ffffff;
            /* Warna background kartu putih */
            color: #000000;
            /* Warna teks hitam */
        }

        .icon-success {
            width: 60px;
            height: 60px;
            color: #007bff;
            /* Warna ikon tanda centang biru */
        }

        .text-success {
            color: #007bff;
        }

        .thank-you-text h1 {
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            color: #007bff;
            /* Warna teks heading biru */
        }

        .thank-you-text p {
            font-size: 0.95rem;
            color: #6c757d;
            /* Warna teks abu-abu */
        }

        .thank-you-text .btn {
            margin-top: 1rem;
            background-color: #007bff;
            /* Warna tombol biru */
            border-color: #007bff;
            /* Warna border tombol biru */
        }

        .thank-you-text .btn:hover {
            background-color: #0056b3;
            /* Warna hover tombol biru yang lebih gelap */
            border-color: #0056b3;
            /* Warna border hover tombol biru yang lebih gelap */
        }
    </style>
</head>

<body>

    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="thank-you-card shadow-sm p-4">
            <div class="text-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75" fill="#007bff" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                </svg>
            </div>
            <div class="thank-you-text text-center">
                <h1>Jawaban telah disimpan!</h1>
                <p>Terima kasih telah mengisi form ini.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>