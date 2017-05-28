<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('docs/css/style.css') }}" />
    <script src="{{ asset('docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://ditoraharjo.co/keykost'>MissKeen API Doc</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>KeyKost API Documentation</p>
<!-- END_INFO -->
<!-- START_4da3c74fdcbf4cdb10a2b385902f342f -->
<h1>Login Authentication</h1>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST "http://ditoraharjo.co/keykost/api/v1/auth" \
-H "Content-Type: application/json" \
-d '{
"email" : "your@mail.com",
"password" : "your-password"
}'</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">{
    "status": "true",
    "user": {
        "pemilikKost_id": "your-user-ID",
        "kost_id": "your-kost-id"
    }
}</code></pre>
<p> This endpoints used for authenticating user login.</p>
<h3>HTTP Request</h3>
<p><code>POST http://ditoraharjo.co/keykost/api/v1/auth</code></p>
<h3>Request Body Parameters</h3>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<tr>
<td>email</td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td>password</td>
<td>string</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_4da3c74fdcbf4cdb10a2b385902f342f -->
<h1>Penyewa</h1>
<!-- START_197edfbef2c1ddadda97abeb410e9fd2 -->
<h2>Get All Penyewa</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "http://ditoraharjo.co/keykost/api/v1/penyewa?kost_id=YOUR-KOST-ID" \
-H "Accept: application/json"</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">{
    {
    "id": 3,
    "rfid_id": "PENYEWA_1",
    "fullname": "Penyewa 1",
    "email": "penyewa1@gmail.com",
    "no_kamar": "001",
    "jenis_kelamin": null,
    "telp": "1111",
    "alamat": "Jalan Penyewa 1",
    "image": null,
    "register_date": null,
    "exp_date": null
  },
  {
    "another penyewa" : "..."
  }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET http://ditoraharjo.co/keykost/api/v1/penyewa?kost_id=YOUR-KOST-ID</code></p>
<!-- END_197edfbef2c1ddadda97abeb410e9fd2 -->
<!-- START_0992d2719020d74bf6cb67a1a8b21f8e -->
<h2>Get One Penyewa</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "http://ditoraharjo.co/keykost/api/v1/penyewa/{id}" \
-H "Accept: application/json"</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">{
    "id": 3,
    "rfid_id": "PENYEWA_1",
    "fullname": "Penyewa 1",
    "email": "penyewa1@gmail.com",
    "no_kamar": "001",
    "jenis_kelamin": null,
    "telp": "1111",
    "alamat": "Jalan Penyewa 1",
    "image": null,
    "register_date": null,
    "exp_date": null,
    "role": {
      "id": 3,
      "name": "Penyewa Kost",
      "created_at": "2017-05-28 11:00:40",
      "updated_at": "2017-05-28 12:52:53",
      "deleted_at": null
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET http://ditoraharjo.co/keykost/api/v1/penyewa/{id}</code></p>
<!-- END_0992d2719020d74bf6cb67a1a8b21f8e -->
<!-- START_51b7c7f127f402a285b23c721762280e -->
<h2>Get Log Penyewa</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "http://ditoraharjo.co/keykost/api/v1/log-penyewa/{id}" \
-H "Accept: application/json"</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">[
  {
    "id": 1,
    "user_id": 3,
    "kost_id": 1,
    "created_at": "2017-05-28 14:32:04",
    "updated_at": "2017-05-28 14:32:04",
    "deleted_at": null
  },
  {
    "another log" : "..."
  }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET http://ditoraharjo.co/keykost/api/v1/log-penyewa/{id}</code></p>
<!-- END_51b7c7f127f402a285b23c721762280e -->
<!-- START_baa5bf9d8df5d5df0ca3b17436d6eba1 -->
<h2>Create Penyewa</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST "http://ditoraharjo.co/keykost/api/v1/penyewa" \
-H "Accept: application/json"
-d '{
"id_pemilikKost" : "5",
"fullname" : "Penyewa 4",
"rfid_id" : "PENYEWA_4",
"no_kamar" : "004",
"email" : "penyewa4@gmail.com",
"telp" : "4444",
"alamat" : "Jalan Penyewa 4"
}'</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">{
  "status" : 200,
  "info" : "Penyewa kost created"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST http://ditoraharjo.co/keykost/api/v1/penyewa</code></p>
<!-- END_baa5bf9d8df5d5df0ca3b17436d6eba1 -->
<!-- START_596a551c1df9c359ffbcd66db8829a69 -->
<h2>Update Penyewa</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH "http://ditoraharjo.co/keykost/api/v1/penyewa" \
-H "Accept: application/json"
-d '{
"id" : "5",
"fullname" : "Penyewa 3 update",
"rfid_id" : "PENYEWA_3",
"no_kamar" : "003",
"email" : "penyewa3@gmail.com",
"password" : "4321",
"telp" : "3333",
"alamat" : "Jalan Penyewa 3"
}'</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">{
  "status" : 200,
  "info" : "Penyewa kost updated"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PATCH http://ditoraharjo.co/keykost/api/v1/penyewa</code></p>
<!-- END_596a551c1df9c359ffbcd66db8829a69 -->
<!-- START_1e2435895f5e3ebe4112dc2ea598e2c8 -->
<h2>Delete Penyewa</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE "http://ditoraharjo.co/keykost/api/v1/penyewa/{id}" \
-H "Accept: application/json"</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">{
  "status" : 200,
  "info" : "Penyewa kost deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE http://ditoraharjo.co/keykost/api/v1/penyewa/{id}</code></p>
<!-- END_1e2435895f5e3ebe4112dc2ea598e2c8 -->
<h1>Kost</h1>
<!-- START_6506623798886fe469801f64de62e0cf -->
<h2>Log Kost</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "http://ditoraharjo.co/keykost/api/v1/log-kost/{id}" \
-H "Accept: application/json"</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">[
    {
        "nama": "Penyewa 1",
        "waktu": "28/05/2017 - 14:32:04"
    },
    {
        "nama": "Penyewa 1",
        "waktu": "28/05/2017 - 14:32:08"
    },
    {
        "nama": "Penyewa 2",
        "waktu": "28/05/2017 - 14:32:14"
    },
    {
        "nama": "Penyewa 3 update",
        "waktu": "28/05/2017 - 14:32:17"
    },
    {
        "nama": "Penyewa 2",
        "waktu": "28/05/2017 - 14:32:23"
    },
    {
        "nama": "Penyewa 3 update",
        "waktu": "28/05/2017 - 14:32:26"
    },
    {
        "nama": "Penyewa 1",
        "waktu": "28/05/2017 - 14:32:30"
    },
    {
        "nama": "Penyewa 1",
        "waktu": "28/05/2017 - 14:46:42"
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET http://ditoraharjo.co/keykost/api/v1/log-kost/{id}</code></p>
<!-- END_6506623798886fe469801f64de62e0cf -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                              </div>
                </div>
    </div>
  </body>
</html>
