<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$about->nama}}</title>

    <link rel="shortcut icon" href="{{$about->logo}}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('/home/style/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    <!-- navbar start -->
    <nav class="navbar">
        <img src="{{$about->logo}}" alt="" class="navbar-logo">

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Fitur</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="hamburger-menu"><i class="fa-solid fa-bars"></i> </a>
            <a href="/login" id=""><i class="fa-solid fa-right-to-bracket"></i> </a>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- hero section start -->
    <section class="hero" id="home" style=" background-image: url({{$about->background}});">
        <main class="content">
            <h1 class="animate__animated animate__fadeIn">Bergabung dengan <span>{{$about->nama}}</span></h1>
            <p class="animate__animated animate__fadeIn animate__delay-2s">{{$about->deskripsi}}
            </p>
            <a href="menu.html" class="cta animate__animated animate__fadeIn">Unduh Sekarang</a>
        </main>
    </section>

    <!-- hero section end -->

    <!-- about section start -->
    <section class="about" id="about">
        <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
            <h2><span>Tentang</span> Kami</h2>
        </div>

        <div class="row">

            <div data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <div class="about-img">
                    <div class="img-slider">
                    
                        <div class="slide active">
                            <img src="{{asset('img/slider.jpg')}}" alt="">
                            <div class="info">
                              <h2></h2>
                              <p></p>
                            </div>
                        </div>
                        @foreach ($slider as $item)
                        <div class="slide active">
                            <img src="{{$item->gambar}}" alt="">
                            <div class="info">
                              <h2>{{$item->judul}}</h2>
                              <p>{{$item->deskripsi}}</p>
                            </div>
                        </div>
                        @endforeach
    
    
                        <div class="navigation">
                        <div class="btn active"></div>
                        @foreach ($slider as $item)
                          <div class="btn"></div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div data-aos="fade-left">
                <div class="content">
                    <h3>Kenapa memilih kami?</h3>
                    <p>{{$about->tentang}}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- about section end -->

    <!-- menu section start -->
    <section class="menu" id="menu">
        <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
            <h2><span>Fitur</span> Kami</h2>
            <p>Fitur yang kami miliki</p>
        </div>

        <div class="row">
            @foreach ($fitur as $item) 
            <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <div class="menu-card">
                    <img src="{{$item->gambar}}" alt="" class="menu-card-img">
                    <h3 class="menu-card-tittle">{{$item->judul}}</h3>
                    <p class="menu-card-price">{{$item->deskripsi}}</p>
                </div>
            </div>          
            @endforeach
        </div>
    </section>

    <!-- menu section end -->

    <!-- contact section start -->
    <section class="contact" id="contact">
        <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
            <h2><span>Kontak</span> Kami</h2>
        </div>

        <div data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <div class="row">
                <iframe class="map"
                    src="{{$about->map}}"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
    
                <form action="{{ route('pesan.store') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="nama" id="nama" placeholder="nama">
                    </div>
                    <div class="input-group">
                        <i class="fa-solid fa-phone"></i>
                        <input type="number" name="telepon" id="telepon" placeholder="no hp">
                    </div>
                    <div class="input-group">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="pesan" id="pesan" placeholder="pesan">
                    </div>
                    <button type="submit" class="btn">Kirim Pesan</button>
                </form>      
                
            </div>
        </div>
    </section>
    <!-- contact section end -->

    <!-- footer start -->
    <footer>
        <div class="socials">
            <a href="{{$about->ig}}"><i class="fa-brands fa-instagram"></i></a>
            <a href="{{$about->yt}}"><i class="fa-brands fa-twitter"></i></a>
            <a href="{{$about->fb}}"><i class="fa-brands fa-facebook"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div>
            <h2>{{$about->nama}}</h2>
            <h3>{{$about->alamat}}</h3>
            <p>Phone: {{$about->telepon}}</p>
        </div>

        <div class="credit">
            <p>Created with <a href="#">love</a>. | &copy; 2023.</p>
        </div>
    </footer>
    <!-- footer end -->

  
      <script type="text/javascript">
     
      </script>
  
    <script src="{{asset('home/js/script.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>



</html>