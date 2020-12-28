<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Rekapitulasi Penjualan Sampah</title>
    <style type="text/css" media="screen">
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #4CAF50;
          color: white;
        }
        section.header {
          text-align: center;
        }
    </style>
  </head>
  <body>
    <section class="header">
      <h3>Rekapitulasi Penjualan Sampah</h3>
      <h4>Bank Sampah Mawar</h4>
      <h4>Perum Wiki 1 Demak</h4>
    </section>
    <section class="body">
      <table id="customers">
        <thead>
          <tr>
            <th>No.</th>
            <th>Jenis Sampah</th>
            <th>Volume</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Profit BS %</th>
            <th>Profit PTG %</th>
            <th>Nasabah %</th>
          </tr>
        </thead>
        <tbody>
          @php
            $uangNasabah = 0;
          @endphp
          @foreach ($data as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value['jenis_sampah'] }}</td>
              <td>{{ $value['volume'] }}{{ $value['satuan'] }}</td>
              <td style="text-align: right">{{ $value['harga_satuan'] }}</td>
              <td>{{ $value['jumlah'] }}</td>
              <td style="text-align: right">{{ $value['profit_bank_sampah'] }}</td>
              <td style="text-align: right">{{ $value['profit_total_petugas'] }}</td>
              <td style="text-align: right">{{ $value['uang_nasabah'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>
    <section class="footer">

    </section>
  </body>
</html>
