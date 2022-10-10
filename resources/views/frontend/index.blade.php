<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo/logo-mng.png') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <style>
        * {
            font-family: 'Quicksand', sans-serif;
        }
    </style>

    <style>
        #map_makanan {
            height: 400px;
        }

        #map_kerajinan {
            height: 400px;
        }

        #map_kesenian {
            height: 400px;
        }

        #map_perhelatan {
            height: 400px;
        }
    </style>

    {{-- Gis --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
        integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>


</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('assets/images/logo/logo-mng.png') }}"
                    alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link text-black" href="#minangkabau">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#portfolio">Berita</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#menu_makanan">Makanan</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#menu_kerajinan">Kerajinan</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#pepatah">Pepatah</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#menu_kesenian">Kesenian</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#menu_upacara">Upacara</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">Selamat Datang</div>
            <div class="masthead-subheading">Sistem Informasi Dokumentasi GIS Minangkabau</div>
            {{-- <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a> --}}
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="minangkabau">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Minangkabau</h2>
                <h3 class="section-subheading text-muted">Singkat tentang Minangkabau</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-compress-alt fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Sejarah</h4>
                    <p class="text-muted">Minangkabau atau disingkat Minang merupakan kelompok etnik pribumi Nusantara
                        yang menghuni Dataran Tinggi Minangkabau, Sumatera Barat, Indonesia</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-sitemap fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Nama Minangkabau</h4>
                    <p class="text-muted">Nama Minangkabau berasal dari dua kata yaitu, minang dan kabau. Nama itu
                        dikaitkan dengan suatu legenda yang dikenal di dalam tambo</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Masyarakat</h4>
                    <p class="text-muted">Dari tambo yang diterima secara turun temurun, menceritakan bahwa nenek moyang
                        mereka berasal dari keturunan Iskandar Zulkarnain.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Berita</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                @forelse ($berita as $row)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content m-3">
                                    <p>{!! $row->berita_isi !!}</p>
                                </div>
                            </div>
                            <img class="img-fluid" style="width: 360px; height: 240px;"
                                src="{{ asset('storage/berita/'. $row->berita_img) }}" alt="No Image" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{ $row->berita_judul }}</div>
                            <div class="portfolio-caption-subheading text-muted"> <i class="fa fa-clock"></i> {{
                                $row->berita_time }} <br>
                                <i class="fa fa-user"></i> {{ $row->user->name }}
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">Tidak ada data</div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Makanan-->
    <section class="page-section" id="menu_makanan">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Makanan</h2>
                <h3 class="section-subheading text-muted">Dokumentasi Persebaran GIS Makanan Minangkabau</h3>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div id="map_makanan"></div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($makanan as $no => $row_makanan)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $row_makanan->makanan_nama }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kerajinan-->
    <section class="page-section bg-light" id="menu_kerajinan">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Kerajinan</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div id="map_kerajinan"></div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kerajinan as $no => $row_kerajinan)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $row_kerajinan->kerajinan_nama }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pepatah-->
    <section class="page-section" id="pepatah">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Pepatah</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <ul class="timeline">
                @forelse ($pepatah as $no => $row_pepatah)
                @php
                ++$no
                @endphp
                <li class="{{ $no % 2 ? '' : 'timeline-inverted' }}">
                    <div class="timeline-image"></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">{{ $row_pepatah->pepatah_petitih }}</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted"><q>{{ $row_pepatah->pepatah_terjemah }}</q></p>
                            <small class="text-muted"> <i class="fa fa-calendar "></i> {{ $row_pepatah->pepatah_time
                                }} <i class="fa fa-user "></i> {{ $row_pepatah->user->name
                                }}</small>
                        </div>
                    </div>
                </li>
                @empty
                <li>
                    <h2 align="center">Tidak ada data</h2>
                </li>
                @endforelse

                {{-- <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>March 2011</h4>
                            <h4 class="subheading">An Agency is Born</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li> --}}
            </ul>
        </div>
    </section>
    <!-- Kerajinan-->
    <section class="page-section bg-light" id="menu_kesenian">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Kesenian</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div id="map_kesenian"></div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kesenian as $no => $row_kesenian)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $row_kesenian->kesenian_nama }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Upacara-->
    <section class="page-section" id="menu_upacara">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Upacara</h2>
                <h3 class="section-subheading text-muted">Dokumentasi Persebaran GIS Makanan Minangkabau</h3>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div id="map_perhelatan"></div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($upacara as $no => $row_upacara)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $row_upacara->perhelatan_nama }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets/images/sumbar.png') }}" alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-2 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets/images/pdg.png') }}" alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-2 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets/images/pss.png') }}" alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-2 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets/images/solok.png') }}" alt="..." aria-label="IBM Logo" /></a>
                </div>
                <div class="col-md-2 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets/images/solsel.png') }}" alt="..." aria-label="IBM Logo" /></a>
                </div>
                <div class="col-md-2 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets/images/bkt.png') }}" alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Adat Basandi Syara', Syara' Basandi Kitabullah</h3>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Mawa 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="twitter.com/egovaflavia" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="facebook.com/egovaflavia" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="instagram.com/egova_flavia" aria-label="LinkedIn"><i
                            class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Threads
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Illustration
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>

    <script>
        var mymap = L.map('map_makanan').setView([-0.73994, 100.800005], 7);
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA'
            }).addTo(mymap);

        $.ajax({
            type: "GET",
            url: "{{ route('backend.makanan.gis') }}",
            success: function (response) {
                $.each(response, function (key, value) {
                    L.marker([value.makanan_lat, value.makanan_long]).bindPopup(
                        `<strong>${value.makanan_nama}</strong> <br> <p> <img style="width:120px;height:120px" src="{{ asset('storage/makanan/${value.makanan_img}') }}"> <br> ${value.makanan_ket}</p>`
                    ).openPopup().addTo(mymap);
                });
            }
        });

        var mapkerajinan = L.map('map_kerajinan').setView([-0.73994, 100.800005], 7);
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA'
            }).addTo(mapkerajinan);

        $.ajax({
            type: "GET",
            url: "{{ route('backend.kerajinan.gis') }}",
            success: function (response) {
                $.each(response, function (key, value) {
                    L.marker([value.kerajinan_lat, value.kerajinan_long]).bindPopup(
                        `<strong>${value.kerajinan_nama}</strong> <br> <p> <img style="width:120px;height:120px" src="{{ asset('storage/kerajinan/${value.kerajinan_img}') }}"> <br> ${value.kerajinan_ket}</p>`
                    ).openPopup().addTo(mapkerajinan);
                });
            }
        });

        var mapkesenian = L.map('map_kesenian').setView([-0.73994, 100.800005], 7);
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA'
            }).addTo(mapkesenian);

        $.ajax({
            type: "GET",
            url: "{{ route('backend.kesenian.gis') }}",
            success: function (response) {
                $.each(response, function (key, value) {
                    L.marker([value.kesenian_lat, value.kesenian_long]).bindPopup(
                        `<strong>${value.kesenian_nama}</strong> <br> <p> <img style="width:120px;height:120px" src="{{ asset('storage/kesenian/${value.kesenian_img}') }}"> <br> ${value.kesenian_ket}</p>`
                    ).openPopup().addTo(mapkesenian);
                });
            }
        });

        var mapperhelatan = L.map('map_perhelatan').setView([-0.73994, 100.800005], 7);
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA'
            }).addTo(mapperhelatan);

        $.ajax({
            type: "GET",
            url: "{{ route('backend.perhelatan.gis') }}",
            success: function (response) {
                $.each(response, function (key, value) {
                    L.marker([value.perhelatan_lat, value.perhelatan_long]).bindPopup(
                        `<strong>${value.perhelatan_nama}</strong> <br> <p> <img style="width:120px;height:120px" src="{{ asset('storage/perhelatan/${value.perhelatan_img}') }}"> <br> ${value.perhelatan_ket}</p>`
                    ).openPopup().addTo(mapperhelatan);
                });
            }
        });

    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    {{-- <script src="{{ asset('frontend/js/scripts.js') }}"></script> --}}
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
