<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Whitney', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        body {
            background-color: #36393f;
            color: #dcddde;
            margin: 0;
            padding: 20px;
            font-size: 14px;
        }
        
        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 24px;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #2f3136;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        fieldset {
            border: 1px solid #4f545c;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 15px;
        }
        
        legend {
            color: #ffffff;
            font-weight: 600;
            padding: 0 10px;
            font-size: 16px;
        }
        
        p {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #b9bbbe;
            font-weight: 500;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            background-color: #202225;
            border: 1px solid #4f545c;
            border-radius: 4px;
            color: #dcddde;
            font-size: 14px;
            transition: border-color 0.2s;
            outline: none;
        }
        
        input[type="text"]:focus {
            border-color: #5865f2;
        }
        
        input[type="text"]::placeholder {
            color: #72767d;
        }
        
        input[type="submit"] {
            background-color: #5865f2;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 3px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        input[type="submit"]:hover {
            background-color: #4752c4;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #00aff4;
            text-decoration: none;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Input Data Mahasiswa</h1>
    <div class="container">
        <form id="form_mahasiswa" action="proses_inputmahasiswa.php" method="post">
            <fieldset>
                <legend>Input Data Mahasiswa</legend>
                <p>
                    <label for="npm">NPM:</label>
                    <input type="text" name="npm" id="npm" placeholder="Contoh: 243307016" required>
                </p>
                <p>
                    <label for="namaMhs">Nama Mahasiswa:</label>
                    <input type="text" name="namaMhs" id="namaMhs" required>
                </p>
                <p>
                    <label for="prodi">Prodi:</label>
                    <input type="text" name="prodi" id="prodi" required>
                </p>
                <p>
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" required>
                </p>
                <p>
                    <label for="noHp">No HP:</label>
                    <input type="text" name="noHP" id="noHp" placeholder="Contoh: 081222233344" required>
                </p>
                <p>
                    <input type="submit" name="input" value="Simpan">
                </p>
            </fieldset>
        </form>
        <a href="viewMahasiswa.php" class="back-link">Kembali ke Daftar Mahasiswa</a>
    </div>
</body>
</html>