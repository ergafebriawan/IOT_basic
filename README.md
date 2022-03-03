# IOT_basic
<h2> Basic IOT Panel </h2>
<p>dibuat oleh fusionx project, project ini boleh dikembangkan secara gratis dan semuanya untuk pengmbangan IOT secara basic</p>

<p>import database dari file iot_lite.sql ke mysql anda. untuk mengubah konfigurasi koneksi ke database mysql di directory config/config.php</p>

<p>struktur file dalam framework ini</p>
<ul>
    <li>/api    => untuk mengakses rest API </li>
    <li>/assets => untuk menyimpan asset seperti gambar dan media lainya</li>
    <li>/config => untuk konfigurasi dan meyimpan function</li>
    <li>/layout => menyimpan layout utama pada framework</li>
    <li>/views  => untuk membuat view halaman yang ditampilkan sebagai content</li>
</ul>

<p>untuk menggunakan API url local seperti berikut</p>
<code>
    #get data\n
    http://hostname/nama_folder/api/get_data.php
</code>
<code>
    #get data per sensor\n
    http://hostname/nama_folder/api/get_data.php?id=1
</code>
<code>
    #send data\n
    http://hostname/nama_folder/api/send_data.php?id=1&val=20
</code>

<p>untuk menggunakan API url hosting/public seperti berikut</p>
<code>
    #get data\n
    http://domain.com/api/get_data.php
</code>
<code>
    #get data per sensor\n
    http://domain.com/api/get_data.php?id=1
</code>
<code>
    #send data\n
    http://domain.com/api/send_data.php?id=1&val=20
</code>