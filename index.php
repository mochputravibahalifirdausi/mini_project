<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kasir OOP - Nature Theme</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            /* Background gradasi hijau gelap (Forest/Nature Theme) */
            background: linear-gradient(135deg, #1b4332, #2d6a4f, #081c15);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #2d3748;
        }

        /* Desain Card Utama (Solid & Bersih) */
        .card {
            background: #ffffff;
            width: 100%;
            max-width: 450px;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border-top: 6px solid #40916c; /* Aksen hijau daun di atas form */
        }

        h2 { 
            text-align: center; 
            margin-bottom: 25px; 
            font-weight: 700;
            color: #1b4332; /* Hijau tua */
            letter-spacing: 0.5px;
        }

        label { 
            font-size: 14px; 
            margin-bottom: 8px; 
            display: block; 
            font-weight: 500;
            color: #4a5568;
        }

        /* Form Input Normal */
        input, select {
            width: 100%; 
            padding: 12px 15px; 
            margin-bottom: 20px;
            background: #f7fafc; 
            border: 1px solid #cbd5e0;
            border-radius: 8px; 
            font-size: 15px;
            color: #2d3748;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            outline: none;
        }

        input::placeholder {
            color: #a0aec0;
        }

        input:focus, select:focus {
            background: #ffffff;
            border-color: #40916c;
            box-shadow: 0 0 0 3px rgba(64, 145, 108, 0.2);
        }

        /* Tombol Tema Alam */
        button {
            width: 100%; 
            background: #2d6a4f; /* Hijau solid */
            color: white;
            padding: 14px; 
            border: none;
            border-radius: 8px;
            font-size: 16px; 
            font-weight: 600; 
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        button:hover { 
            background: #1b4332; /* Hijau lebih gelap saat di-hover */
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(27, 67, 50, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        /* Kotak Hasil (Struk) */
        .hasil-container {
            display: none;
            margin-top: 25px; 
            padding: 20px; 
            background: #ebf8f1; /* Latar hijau super muda */
            border: 1px solid #c6f6d5;
            border-left: 5px solid #40916c; /* Garis aksen hijau daun */
            border-radius: 8px; 
            line-height: 1.6;
            font-size: 14px;
            color: #22543d;
            animation: fadeIn 0.4s ease forwards;
        }

        .hasil-container.tampil {
            display: block;
        }

        .hasil-container hr { 
            border: 0; 
            border-top: 1px dashed #9ae6b4; 
            margin: 15px 0; 
        }

        .hasil-container b {
            font-weight: 700;
            color: #1b4332;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="card">
        <h2>Form Pembayaran</h2>
        
        <form id="formPembayaran">
            <label>Nominal Belanja (Rp):</label>
            <input type="number" id="jumlah" name="jumlah" required min="1" placeholder="Contoh: 100000">

            <label>Pilih Metode Pembayaran:</label>
            <select id="metode" name="metode" required>
                <option value="transfer">Transfer Bank</option>
                <option value="ewallet">E-Wallet</option>
                <option value="qris">QRIS</option>
                <option value="cod">Cash on Delivery (COD)</option>
                <option value="va">Virtual Account (VA)</option>
            </select>

            <button type="submit" id="btnProses">Proses Transaksi</button>
        </form>

        <div id="tempatHasil" class="hasil-container"></div>
    </div>

    <script>
        // Logika JavaScript tetap sama, tidak ada yang diubah
        document.getElementById('formPembayaran').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const jumlah = document.getElementById('jumlah').value;
            const metode = document.getElementById('metode').value;
            const tempatHasil = document.getElementById('tempatHasil');
            const btnProses = document.getElementById('btnProses');

            btnProses.textContent = "Memproses...";

            const formData = new FormData();
            formData.append('jumlah', jumlah);
            formData.append('metode', metode);

            fetch('proses.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                tempatHasil.innerHTML = data;
                
                tempatHasil.classList.remove('tampil');
                void tempatHasil.offsetWidth; 
                tempatHasil.classList.add('tampil');
                
                btnProses.textContent = "Proses Transaksi";
            })
            .catch(error => {
                tempatHasil.innerHTML = "Terjadi kesalahan sistem.";
                tempatHasil.classList.add('tampil');
                btnProses.textContent = "Proses Transaksi";
            });
        });
    </script>
</body>
</html>