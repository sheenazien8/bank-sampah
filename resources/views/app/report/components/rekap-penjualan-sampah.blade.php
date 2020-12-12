<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Rekapitulasi Penjualan Sampah</title>
  </head>
  <body>
    <section class="header">
      <h3>Rekapitulasi Penjualan Sampah</h3>
      <h4>Bank Sampah Mawar</h4>
      <h4>Perum Wiki 1 Demak</h4>
    </section>
    <section class="body">
      <table>
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
          @foreach ($data as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value['jenis_sampah'] }}</td>
              <td>{{ $value['volume'] }}{{ $value['satuan'] }}</td>
              <td>{{ $value['harga_satuan'] }}</td>
              <td>{{ $value['jumlah'] }}</td>
              <td>{{ $value['profit_bank_sampah'] }}</td>
              <td>{{ $value['profit_total_petugas'] }}</td>
              <td>{{ $value['uang_nasabah'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>
    <section class="footer">

    </section>
  </body>
</html>
