<?php
    include 'koneksi.php';
    
    if (isset($_GET['npm'])) {
        $id = $_GET['npm'];
        
        $query  = "SELECT * FROM t_mahasiswa WHERE npm='$id'";
        $result = mysqli_query($link, $query);
        
        if (!$result) {
            die("Query Error: " . mysqli_errno($link) .
                " - " . mysqli_error($link));
        }
        
        $data = mysqli_fetch_assoc($result);
        $npm = $data['npm'];
        $namaMhs = $data['namaMhs'];
        $prodi = $data['prodi'];
        $alamat = $data['alamat'];
        $noHp = $data['noHp'];
    } else {
        header("location:viewMahasiswa.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <style>
        :root {
            --discord-bg: #36393f;
            --discord-lighter-bg: #2f3136;
            --discord-dark-bg: #202225;
            --discord-text: #dcddde;
            --discord-white: #ffffff;
            --discord-blue: #5865f2;
            --discord-hover-blue: #4752c4;
            --discord-green: #43b581;
            --discord-input-bg: #40444b;
            --discord-border: #222428;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Whitney', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        body {
            background-color: var(--discord-bg);
            color: var(--discord-text);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        h1 {
            color: var(--discord-white);
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: var(--discord-lighter-bg);
            border-radius: 8px;
            box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.2);
            padding: 10px;
        }

        fieldset {
            border: none;
            padding: 20px;
        }

        legend {
            color: var(--discord-white);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 16px;
            width: 100%;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--discord-border);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--discord-text);
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"],
        input[type="hidden"] {
            width: 100%;
            padding: 12px;
            border-radius: 4px;
            border: none;
            background-color: var(--discord-input-bg);
            color: var(--discord-white);
            font-size: 16px;
            outline: none;
            transition: border 0.2s ease;
        }

        input[type="text"]:focus {
            box-shadow: 0 0 0 2px var(--discord-blue);
        }

        input[type="text"]:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        input[type="submit"] {
            background-color: var(--discord-blue);
            color: var(--discord-white);
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 10px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: var(--discord-hover-blue);
        }

        .back-button {
            margin-top: 20px;
            color: var(--discord-blue);
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }

        .back-button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    
    <div class="container">
        <form class="form_mahasiswa" action="proses_editmahasiswa.php" method="post">
            <fieldset>
                
                <div class="form-group">
                    <label for="npm">NPM</label>
                    <input type="hidden" name="npm" value="<?php echo $npm ?>">
                    <input type="text" id="npmDisabled" value="<?php echo $npm ?>" disabled>
                </div>
                
                <div class="form-group">
                    <label for="namaMhs">Nama Mahasiswa</label>
                    <input type="text" name="namaMhs" id="namaMhs" value="<?php echo $namaMhs ?>">
                </div>
                
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" name="prodi" id="prodi" value="<?php echo $prodi ?>">
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="<?php echo $alamat ?>">
                </div>
                
                <div class="form-group">
                    <label for="noHP">No HP</label>
                    <input type="text" name="noHp" id="noHp" value="<?php echo $noHp ?>">
                </div>
            </fieldset>
            
            <input type="submit" name="edit" value="Update Data">
        </form>
        
        <a href="viewMahasiswa.php" class="back-button">← Kembali ke Tabel</a>
    </div>
</body>
</html>