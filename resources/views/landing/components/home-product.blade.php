<!-- ======= Product Section ======= -->
<section id="product" class="product section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Product</h2>
      <h3>Produk <span>Kami</span></h3>
      <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
    </div>

    <div class="row">
      @foreach ($products as $p) 
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <div class="member-img">
            <img src="assets/img/portfolio/portfolio-{{ $loop->iteration }}.jpg" class="img-fluid" alt="" style="aspect-ratio: 4/3; object-fit: cover">
            <div class="social">
              <a href="" onclick="buy({{ $p->id }})"><i class="bi bi-whatsapp"></i> Pesan</a>
            </div>
          </div>
          <div class="member-info">
            <h4 id="p{{ $p->id }}">{{ $p->name }}</h4>
            <span>{{ $p->short_desc }}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-center">
      <a href="/katalog" class="btn btn-primary">Lihat selengkapnya</a>
    </div>

  </div>
</section><!-- End Team Section -->

<script>
  function buy(id) {
    let name = $("#p"+id).text();
    let phone = '6285234006051';
    let text = "Halo%20Admin%20Saya%20ingin%20membeli%20" + name;
    let url = 'https://api.whatsapp.com/send?phone=' + phone + '&text=' + text;
    window.open(url, '_blank').focus();
  }
  </script>