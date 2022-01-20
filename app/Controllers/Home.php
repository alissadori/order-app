<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\TransaksiDetailModel;
use App\Models\TransaksiModel;

class Home extends BaseController
{
    public function index()
    {
        $transaksiDetail = new TransaksiDetailModel();
        $transaksi = new TransaksiModel();

        //Deklarasikan variable tanggal
        $hrini             = date('Y-m-d');
        $mingguini         = date('YW');
        $bulanini         = date('m');
        $tahunini         = date('Y');

        //Query Penjualan hari ini
        $totaltoday = $transaksiDetail->select('created_at, sum(total) as totale')
            ->where('DATE(created_at)', $hrini)
            ->first();

        //Query Penjualan minggu ini
        $totalweek = $transaksiDetail->select('created_at, sum(total) as totale')
            ->where('YEARWEEK(created_at)', $mingguini)
            ->first();

        //Query Penjualan bulan ini
        $totalyear = $transaksiDetail->select('created_at, sum(total) as totale')
            ->where('MONTH(created_at)', $bulanini)
            ->where('YEAR(created_at)', $tahunini)
            ->first();

        //Total Penjualan
        $penjualan = $transaksiDetail->select('sum(total) as total')->first();

        //Tampilkan ke View
        $data['total_hariini']      = $totaltoday->totale;
        $data['total_mingguini']    = $totalweek->totale;
        $data['total_bulanini']     = $totalyear->totale;
        $data['total']              = $penjualan->total;
        $data['grafik']             = $transaksi->getChartData();

        $data['title'] = "Homepage";
        return view('home', $data);
    }

    public function indexBackup()
    {
        $kategori = new KategoriModel();
        $produk = new ProdukModel();
        $transaksiDetail = new TransaksiDetailModel();
        $transaksi = new TransaksiModel();

        /*$today = date("Y-m-d");
         $updated_at = $transaksiDetail->select('updated_at')->get();
         $date = $updated_at->$year;
         $data['kategori'] = $date;
         $data['produk'] = $produk->countAllResults();


         $penjualan = $transaksiDetail->select('sum(jumlah) as jumlah,sum(total) as total')->first();
         $data['penjualan'] = $penjualan->jumlah;
         $data['total'] = $penjualan->total;
         $data['grafik'] = $transaksi->getChartData();*/

        $data['kategori'] = $kategori->countAllResults();
        $data['produk'] = $produk->countAllResults();

        $penjualan = $transaksiDetail->select('sum(jumlah) as jumlah,sum(total) as total')->first();
        $data['penjualan'] = $penjualan->jumlah;
        $data['total'] = $penjualan->total;
        $data['grafik'] = $transaksi->getChartData();

        $data['title'] = "Homepage";
        return view('home', $data);
    }
}
