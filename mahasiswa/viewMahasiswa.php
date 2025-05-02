<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Mahasiswa</title>
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
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #2f3136;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 24px;
        }
        
        .action-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center;
            padding: 0 5px;
        }
        
        .btn {
            background-color: #5865f2;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 3px;
            text-decoration: none;
            transition: background-color 0.2s;
            font-size: 14px;
            font-weight: 500;
        }
        
        .btn:hover {
            background-color: #4752c4;
        }
        
        .search-container {
            display: flex;
            max-width: 400px;
            background-color: #202225;
            border-radius: 4px;
            border: 1px solid #4f545c;
            overflow: hidden;
        }
        
        .search-input {
            flex-grow: 1;
            padding: 10px 12px;
            border: none;
            background-color: transparent;
            color: #dcddde;
            font-size: 14px;
            outline: none;
        }
        
        .search-input::placeholder {
            color: #72767d;
        }
        
        .search-btn {
            background-color: #5865f2;
            color: white;
            border: none;
            padding: 0 15px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .search-btn:hover {
            background-color: #4752c4;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #36393f;
            border-radius: 4px;
            overflow: hidden;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        
        th {
            background-color: #202225;
            font-weight: 600;
            color: #ffffff;
            border-bottom: 1px solid #4f545c;
        }
        
        tr {
            border-bottom: 1px solid #40444b;
        }
        
        tr:last-child {
            border-bottom: none;
        }
        
        tr:hover {
            background-color: #32353b;
        }
        
        .action-links a {
            color: #00aff4;
            margin-right: 12px;
            text-decoration: none;
            font-weight: 500;
        }
        
        .action-links a:hover {
            text-decoration: underline;
        }
        
        .action-links a:last-child {
            color: #ed4245;
        }
        
        .no-results {
            text-align: center;
            padding: 20px;
            color: #72767d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tabel Mahasiswa</h1>
        
        <div class="action-bar">
            <a href="inputMahasiswa.php" class="btn">+ Tambah Data</a>
            
            <form method="GET" action="" class="search-container">
                <input type="text" name="search" placeholder="Cari mahasiswa..." class="search-input" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit" class="search-btn">Cari</button>
            </form>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Set up the search query
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            
            if(!empty($search)) {
                $query = "SELECT * FROM t_mahasiswa WHERE namaMhs LIKE '%$search%' ORDER BY npm ASC";
            } else {
                $query = "SELECT * FROM t_mahasiswa ORDER BY npm ASC";
            }
            
            $result = mysqli_query($link, $query);
            
            if(!$result) {
                die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
            }
            
            if(mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['npm'] . "</td>";
                    echo "<td>" . $data['namaMhs'] . "</td>";
                    echo "<td>" . $data['prodi'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td>" . $data['noHp'] . "</td>";
                    echo "<td class='action-links'>
                        <a href='editMahasiswa.php?npm=" . $data['npm'] . "'>Edit</a>
                        <a href='hapusMahasiswa.php?npm=" . $data['npm'] . "' 
                        onclick=\"return confirm('Anda yakin akan menghapus data?')\">Hapus</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='no-results'>Tidak ada data yang ditemukan</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>