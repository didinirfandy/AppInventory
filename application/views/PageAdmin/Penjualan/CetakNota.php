<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
    <style>
        @media print {
            .noPrint{
                display:none;
            }
        }

        .btn-print{
            background-color: #8ab4f8;
            align-items: center;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            box-sizing: border-box;
            color: var(--text-color);
            cursor: pointer;
            display: inline-flex;
            flex-shrink: 0;
            font-weight: 500;
            height: var(--cr-button-height);
            justify-content: center;
            min-width: 5.14em;
            outline-width: 0;
            overflow: hidden;
            padding: 8px 16px;
            position: relative;
            user-select: none;
        }
    </style>
    <div>
        <div class="noPrint" style="float: right;">
            <button onclick="window.print();" class="btn-print">Print</button>
        </div>
        <h3 style="text-align: center;">INVOICE PENJUALAN</h3>
        <div>
            <span><b>TOKO MEBEL ABADI JAYA</b></span><br><br>
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="20%">Kode Penjualan</td>
                        <td width="1%">:</td>
                        <td width="29%"><?= $dataPenjualan['headPenjualan']['kd_penjualan']?></td>
                        <td width="15%">Pelanggan</td>
                        <td width="1%">:</td>
                        <td width="34%"><?= $dataPenjualan['headPenjualan']['nama_pelanggan']?></td>
                    </tr>
                    <tr>
                        <td width="20%">Tanggal Penjualan</td>
                        <td width="1%">:</td>
                        <td width="29%"><?= $dataPenjualan['headPenjualan']['tgl_penjualan']?></td>
                        <td width="15%">Alamat</td>
                        <td width="1%">:</td>
                        <td width="34%"><?= $dataPenjualan['headPenjualan']['alamat_tujuan']?></td>
                    </tr>
                    <tr>
                        <td width="20%">Admin</td>
                        <td width="1%">:</td>
                        <td width="29%"><?= $dataPenjualan['headPenjualan']['nama']?></td>
                    </tr>
                </tbody>
            </table>            
        </div>
        <br><br>
        <div>
            <table width="100%" style="border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 1px solid black; border-top: 1px solid black;">
                        <th>No</th>
                        <th style="text-align: left;">Barang</th>
                        <th style="text-align: left;">Satuan</th>
                        <th style="text-align: right;">Qty</th>
                        <th style="text-align: right;">Harga Satuan</th>
                        <th style="text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($dataPenjualan['detailPenjualan'] as $detail) {
                            $namaBarang = $detail['nama_barang'];
                            $satuan = $detail['satuan'];
                            $qty = $detail['qty'];
                            $hargaSat = number_format($detail['harga'],0,',','.');
                            $total = number_format($detail['total'],0,',','.');
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $namaBarang; ?></td>
                            <td><?= $satuan; ?></td>
                            <td style="text-align: right;"><?= $qty; ?></td>
                            <td style="text-align: right;"><?= $hargaSat; ?></td>
                            <td style="text-align: right;"><?= $total; ?></td>
                        </tr>
                    <?php 
                        $no++;       
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <br><br>
        <div>
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="50%"></td>
                        <td width="30%">Sub Total</td>
                        <td width="20%"><?= $dataPenjualan['headPenjualan']['total_penjualan']?></td>
                    </tr>
                    <tr>
                        <td width="50%"></td>
                        <td width="30%">Bayar</td>
                        <td width="20%"><?= $dataPenjualan['headPenjualan']['bayar']?></td>
                    </tr>
                    <tr>
                        <td width="50%"></td>
                        <td width="30%">Kembali</td>
                        <td width="20%"><?= $dataPenjualan['headPenjualan']['bayar'] - $dataPenjualan['headPenjualan']['total_penjualan']?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="<?= base_url()?>assetsApp/plugins/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
          window.print()  
        })
    </script>
</body>
</html>