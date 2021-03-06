<?php
date_default_timezone_set('Asia/Jakarta');

class Barang extends CI_Model
{
    public function getDataBarang()
    {
        $qry = $this->db->query(
            "SELECT * FROM kode_barang WHERE `status` != '0' ORDER BY kode ASC, sub_kode ASC"
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function deleteDataMasterBarang($id)
    {
        $qry = $this->db->query("DELETE FROM kode_barang WHERE id_kd_barang = '$id'");

        if ($qry) {
            return true;
        } else {
            return false;
        }
    }

    public function getKodeHeader()
    {
        $qry = $this->db->query(
            "SELECT 
                kode
                , nama_barang
                , persen_naik
                , persen_turun 
            FROM 
                kode_barang 
            WHERE 
                sub_kode = '*' 
                AND `status` = '1'"
        )->result_array();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getNewKodeBrg($kode)
    {
        $where = $kode != '' ? " WHERE kode = '$kode' " : "";
        $orderBy = $kode != '' ? " ORDER BY sub_kode DESC " : " ORDER BY kode DESC ";
        $qry = $this->db->query("SELECT kode, sub_kode, nama_barang, persen_naik, persen_turun FROM kode_barang $where $orderBy LIMIT 1");
        $data = $qry->row_array();
        if (count($data) > 0) {
            $subKode = $data['sub_kode'] == '*' ? '00.' : $data['sub_kode'];
            if ($kode == '') {
                $lastKode = trim($data['kode'], '.');
                $newKode  = $lastKode + 1;
                $data['kodeHeader']  = sprintf('%02d', $newKode) . '.';
                $data['kodeDetail']  = '01.';
                $data['namaHead']  = '';
                $data['persenNaik'] = '';
                $data['persenTurun'] = '';
            } else {
                $data['kodeHeader'] = $kode;
                $lastKode = trim($subKode, '.');
                $newKode  = $lastKode + 1;
                $data['kodeDetail']  = sprintf('%02d', $newKode) . '.';
                $data['namaHead']  = $data['nama_barang'];

                $qryPersen = $this->db->query("SELECT kode, sub_kode, nama_barang, persen_naik, persen_turun FROM kode_barang WHERE kode = '$kode' ORDER BY kode DESC LIMIT 1");
                $dataPersen = $qryPersen->row_array();
                $data['persenNaik'] = $dataPersen['persen_naik'];
                $data['persenTurun'] = $dataPersen['persen_turun'];
            }
            return $data;
        } else {
            return false;
        }
    }

    public function insertMasterBarang($opt, $kodeHead, $namaHead, $kodeDetail, $namaDetail, $naikHead, $turunHead, $hargaDetail)
    {
        if ($opt == '') {
            $qry = $this->db->query("INSERT INTO kode_barang (kode, sub_kode, nama_barang, persen_naik, persen_turun, `status`) VALUES ('$kodeHead', '*', '$namaHead', $naikHead, $turunHead, '1')");
            if ($qry) {
                for ($i = 0; $i < count($kodeDetail); $i++) {
                    $detQry = $this->db->query("INSERT INTO kode_barang (kode, sub_kode, nama_barang, harga, `status`) VALUES ('$kodeHead', '$kodeDetail[$i]', '$namaDetail[$i]', '$hargaDetail[$i]', '1')");
                }
            }
        } else {
            for ($i = 0; $i < count($kodeDetail); $i++) {
                $detQry = $this->db->query("INSERT INTO kode_barang (kode, sub_kode, nama_barang, harga, `status`) VALUES ('$kodeHead', '$kodeDetail[$i]', '$namaDetail[$i]', '$hargaDetail[$i]', '1')");
            }
        }

        if ($detQry) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataStokBarang()
    {
        $qry = $this->db->query("SELECT
                                    a.kd_pembelian
                                    , a.kd_gudang
                                    , a.kd_barang
                                    , a.tgl_masuk_gudang
                                    , date(a.tgl_masuk_gudang) tgl
                                    , a.harga_jual_start
                                    , a.harga_jual_now
                                    , a.harga_beli
                                    , a.qty
                                    , b.nama_barang
                                    , c.satuan 
                                FROM
                                    master_barang a
                                    LEFT JOIN kode_barang b ON CONCAT( b.kode, b.sub_kode ) = a.kd_barang
                                    LEFT JOIN detail_pembelian c ON c.kd_pembelian = a.kd_pembelian AND c.kd_barang = a.kd_barang
                                WHERE
                                    a.`status` = '0'
                                ORDER BY a.tgl_masuk_gudang ASC")->result_array();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function editMasterBrg($data, $id)
    {
        $this->db->set($data);
        $this->db->where($id);
        $qry = $this->db->update('kode_barang');

        if ($qry) {
            return true;
        } else {
            return false;
        }
    }

    public function insertGudang($id_detail, $qty, $tgl, $remark)
    {
        $qry = $this->db->query(
            "SELECT 
                MAX(SUBSTR(kd_gudang, 10, 5)) AS kode,
                SUBSTR(kd_gudang, 4, 2) AS day,
                SUBSTR(kd_gudang, 6, 2) AS month,
                SUBSTR(kd_gudang, 8, 2) as year
            FROM master_barang
            WHERE 
                SUBSTR(kd_gudang, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_gudang, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))
                AND SUBSTR(kd_gudang, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)"
        )->result_array();

        $urutan = (int) $qry[0]['kode'];
        $urutan++;

        $kodeBeli   = "GDG";
        $day        = date("d");
        $month      = date("m");
        $year       = substr(date("Y"), 2, 2);
        $kdGudang   = $kodeBeli . $day . $month . $year . sprintf("%05s", $urutan);

        // Query Bindings
        $qry2 = "SELECT 
                    a.kd_pembelian
                    , a.kd_barang
                    , a.harga_beli
                    , a.qty
                    , a.qty_sisa
                    , a.qty_gudang
                    , a.qty_batal
                    , c.kd_supplier
                    , (
                        SELECT persen_naik FROM kode_barang WHERE kode = SUBSTR(a.kd_barang, 1, 3) GROUP BY kode
                    ) persen_naik
                FROM detail_pembelian a
                    LEFT JOIN kode_barang b ON b.kode = SUBSTR(a.kd_barang, 1, 3) AND a.status = b.status
                    LEFT JOIN master_pembelian c ON a.kd_pembelian = c.kd_pembelian
                WHERE
                    a.status != ?
                    AND id_detail = ?";
        $getBeli = $this->db->query($qry2, array('1', $id_detail))->row();

        $kdPembelian    = $getBeli->kd_pembelian;
        $kdBarang       = $getBeli->kd_barang;
        $kdSupplier     = $getBeli->kd_supplier;
        $qtyAwal        = $getBeli->qty;
        $qtyBatal       = $getBeli->qty_batal;
        $qtySisa        = $getBeli->qty_sisa - $qty;
        $qtyGudang      = $getBeli->qty_gudang + $qty;
        $hargaBeli      = $getBeli->harga_beli;
        $persen_naik    = $getBeli->persen_naik;
        $hargaJual      = $hargaBeli + ($persen_naik / 100 * $hargaBeli); // metode persentasi kenaikan 1 bulan pertama
        $tglmasukGudang = $tgl . " " . date("H:i:s");
        $dateNow        = date("Y-m-d H:i:s");

        $data = array(
            'kd_pembelian'      => $kdPembelian,
            'kd_gudang'         => $kdGudang,
            'kd_barang'         => $kdBarang,
            'tgl_masuk_gudang'  => $tglmasukGudang,
            'harga_jual_start'  => $hargaJual,
            'harga_jual_now'    => $hargaJual,
            'harga_beli'        => $hargaBeli,
            'qty'               => $qty,
            'created_at'        => $dateNow
        );
        $insert = $this->db->insert("master_barang", $data);

        if ($insert) {
            if ($qtyBatal != '0' && $qtyGudang != '0' && $qtySisa != '0') {
                $statusBeli = '5'; // ada barang yang di batal dan barang masuk gudang
            } else if ($qtyGudang != $qtyAwal && $qtySisa != '0') {
                $statusBeli = '1'; // masuk gudang sebagian
            } else if ($qtyGudang == $qtyAwal && $qtySisa == '0' || $qtyBatal != '0' && $qtyGudang != '0' && $qtySisa == '0') {
                $statusBeli = '2'; // masuk gudang semua barang
            } else {
                $statusBeli = "6"; // logika error
            }

            $data = array(
                'qty_sisa'      => $qtySisa,
                'qty_gudang'    => $qtyGudang,
                'status_beli'   => $statusBeli
            );
            $this->db->where('id_detail', $id_detail);
            $qry3 = $this->db->update('detail_pembelian', $data);

            if ($qry3) {
                if ($this->db->affected_rows() > 0) {
                    activity_log_barang($tglmasukGudang, $kdPembelian, $kdSupplier, $kdBarang, $qtySisa, $qty, '0', $remark, $statusBeli, $kdGudang); // log barang
                    // activity_log_harga($tglmasukGudang, $kdPembelian, $kdSupplier, $kdBarang, $kdGudang, $hargaJual, $hargaJual, $tglmasukGudang, '', '', ''); // log harga barang

                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function batalGudang($id_detail, $qty, $tgl, $remark)
    {
        // Query Bindings
        $qry = "SELECT 
                    a.kd_pembelian
                    , a.kd_barang
                    , a.harga_beli
                    , a.qty
                    , a.qty_sisa
                    , a.qty_gudang
                    , a.qty_batal
                    , c.kd_supplier
                    , (
                        SELECT persen_naik FROM kode_barang WHERE kode = SUBSTR(a.kd_barang, 1, 3) GROUP BY kode
                    ) persen_naik
                FROM detail_pembelian a
                    LEFT JOIN kode_barang b ON b.kode = SUBSTR(a.kd_barang, 1, 3) AND a.status = b.status
                    LEFT JOIN master_pembelian c ON a.kd_pembelian = c.kd_pembelian
                WHERE
                    a.status != ?
                    AND id_detail = ?";
        $getBatal = $this->db->query($qry, array('1', $id_detail))->row();

        $kdPembelian    = $getBatal->kd_pembelian;
        $kdBarang       = $getBatal->kd_barang;
        $kdSupplier     = $getBatal->kd_supplier;
        $hargaBeli      = $getBatal->harga_beli;
        $qtyAwal        = $getBatal->qty;
        $qtyBatal       = ($getBatal->qty_batal == 0) ? $qty : $getBatal->qty_batal + $qty;
        $qtyGudang      = $getBatal->qty_gudang;
        $qtySisa        = $getBatal->qty_sisa - $qty;
        $totDetail      = ($qtyGudang == 0) ? $qtySisa * $hargaBeli : $qtyGudang * $hargaBeli;
        $tglmasukcencel = $tgl . " " . date("H:i:s");
        $dateNow        = date("Y-m-d H:i:s");

        if ($qtyBatal != '0' && $qtyGudang != '0' && $qtySisa != '0') {
            $statusBeli = '5'; // ada barang yang di batal dan barang masuk gudang
        } else if ($qtyBatal != $qtyAwal && $qtySisa != '0') {
            $statusBeli = '3'; // cencel sebagian
        } else if ($qtyBatal == $qtyAwal && $qtySisa == '0') {
            $statusBeli = '4'; // cencel semua barang
        } else if ($qtyBatal != '0' && $qtyGudang != '0' && $qtySisa == '0') {
            $statusBeli = '2'; // ada barang yang di batal dan barang masuk gudang
        } else {
            $statusBeli = '6'; // logika error
        }

        $data = array(
            'qty_sisa'      => $qtySisa,
            'qty_batal'     => $qtyBatal,
            'status_beli'   => $statusBeli,
            'total'         => $totDetail
        );
        $this->db->where('id_detail', $id_detail);
        $updDetail = $this->db->update('detail_pembelian', $data);

        if ($updDetail) {
            $getqry = "SELECT 
                            a.kd_pembelian
                            , sum(b.qty_sisa) qty_sisa
                            , sum(b.qty) qty
                            , sum(b.total) total
                        FROM 
                            master_pembelian a
                            LEFT JOIN detail_pembelian b ON a.kd_pembelian = b.kd_pembelian
                        WHERE
                            a.status != ?
                            AND a.kd_pembelian = ?
                        GROUP BY a.kd_pembelian";
            $res = $this->db->query($getqry, array('1', $kdPembelian))->row();

            $totPembelian = $res->total;

            $data2 = array(
                'total_pembelian' => $totPembelian,
                'created_at' => $dateNow
            );
            $this->db->where('kd_pembelian', $kdPembelian);
            $qry2 = $this->db->update('master_pembelian', $data2);

            $data3 = array(
                'kd_pembelian'  => $kdPembelian,
                'kd_barang'     => $kdBarang,
                'tgl_cencel'    => $tglmasukcencel,
                'harga_beli'    => $hargaBeli,
                'qty'           => $qty,
                'created_at'    => $dateNow
            );
            $qry3 = $this->db->insert("master_barang_cencel", $data3);

            if ($qry && $qry2 && $qry3) {
                if ($this->db->affected_rows() > 0) {
                    activity_log_barang($tglmasukcencel, $kdPembelian, $kdSupplier, $kdBarang, $qtySisa, '0', $qty, $remark, $statusBeli, '');
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getListBarang()
    {
        $qry = $this->db->query("SELECT COUNT(*) totBarang FROM master_barang WHERE `status` = '0'")->row();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getTotBrg()
    {
        $qry = $this->db->query(
            "SELECT
                a.mb_bulan,
                a.mb_thn,
                a.mb_tahun_bulan,
                a.totGdg,
                b.mbc_bulan,
                b.mbc_thn,
                b.mbc_tahun_bulan,
                b.totGdgCel 
            FROM
                ( 
                    SELECT 
                        MONTH(mb.tgl_masuk_gudang) mb_bulan
                        , YEAR(mb.tgl_masuk_gudang) mb_thn
                        , CONCAT(YEAR(mb.tgl_masuk_gudang),'/',MONTH(mb.tgl_masuk_gudang)) AS mb_tahun_bulan
                        , COUNT(*) totGdg 
                        FROM master_barang mb 
                        GROUP BY MONTH ( mb.tgl_masuk_gudang ) 
                ) a,
                (
                    SELECT 
                        MONTH( mbl.tgl_cencel ) mbc_bulan
                        , YEAR(mbl.tgl_cencel) mbc_thn
                        , CONCAT(YEAR(mbl.tgl_cencel),'/',MONTH(mbl.tgl_cencel)) AS mbc_tahun_bulan
                        , COUNT(*) totGdgCel 
                        FROM master_barang_cencel mbl 
                        GROUP BY MONTH ( mbl.tgl_cencel ) 
                ) b
            WHERE
                a.mb_bulan = b.mbc_bulan AND a.mb_thn = b.mbc_thn
            ORDER BY
                a.mb_thn ASC, a.mb_bulan ASC"
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getTotBrgJual()
    {
        $qry = $this->db->query(
            "SELECT
                a.bl_bulan,
                a.bl_thn,
                a.bl_tahun_bulan,
                a.totBeli,
                b.jl_bulan,
                b.jl_thn,
                b.jl_tahun_bulan,
                b.totJual 
            FROM
                ( 
                    SELECT
                        bl.kd_pembelian
                        , MONTH(bl.tgl_pembelian) bl_bulan
                        , YEAR(bl.tgl_pembelian) bl_thn
                        , CONCAT(YEAR(bl.tgl_pembelian),'/',MONTH(bl.tgl_pembelian)) AS bl_tahun_bulan
                        , COUNT(*) totBeli 
                    FROM master_pembelian bl 
                    GROUP BY MONTH (bl.tgl_pembelian) 
                ) a,
                (
                    SELECT 
                        MONTH( jl.tgl_penjualan ) jl_bulan
                        , YEAR(jl.tgl_penjualan) jl_thn
                        , CONCAT(YEAR(jl.tgl_penjualan),'/',MONTH(jl.tgl_penjualan)) AS jl_tahun_bulan
                        , COUNT(*) totJual 
                        FROM master_penjualan jl
                    GROUP BY MONTH (jl.tgl_penjualan) 
                ) b
            ORDER BY
            a.bl_thn ASC, a.bl_bulan ASC"
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getDataTimeline($kd_pembelian, $kd_barang)
    {
        $qry = $this->db->query(
            "SELECT 
                date_log
                , kd_pembelian
                , kd_supplier
                , kd_barang
                , qty_sisa
                , qty_batal
                , qty_gudang
                , remark
                , status_log
            FROM 
                activity_log_barang
            WHERE
                kd_pembelian = '$kd_pembelian'
                AND kd_barang = '$kd_barang'
            ORDER BY 
                date_log DESC"
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getDataTimelineHarga($kd_gudang)
    {
        $qry = $this->db->query(
            "SELECT 
                date_log
                , kd_pembelian
                , kd_gudang
                , kd_barang
                , harga_start
                , harga_now
                , tgl_harga_naik
                , tgl_harga_turun
                , tgl_harga_flashSale
                , status_harga
            FROM 
                activity_log_harga
            WHERE
                kd_gudang = '$kd_gudang'
            GROUP BY
                date_log
            ORDER BY 
                date_log DESC"
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }
}
