<!-- ======= Product Section ======= -->
<section id="product" class="product section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Product</h2>
      <h3>Produk <span>Kami</span></h3>
      <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="product-flters">
          <li data-filter="*" class="filter-active">All</li>
          @foreach ($categories as $c)
          <li data-filter=".c{{ $c->id }}">{{ $c->name }}</li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="row product-container" >

      @foreach ($products as $p) 
      <div class="col-lg-3 col-md-6 align-items-stretch product-item c{{ $p->category_id }}">
        <div class="member">
          <div class="member-img">
            <img src="{{ Storage::url('public/images/' . $p->photo) }}" class="img-fluid" alt="" style="aspect-ratio: 4/3; object-fit: cover">
            {{-- <div class="social">
              <a href="" onclick="buy({{ $p->id }})"><i class="bi bi-whatsapp"></i> Pesan</a>
            </div> --}}
          </div>
          <div class="member-info">
            <h4 id="p{{ $p->id }}">{{ $p->name }}</h4>
            <span class="mb-2">{{ $p->short_desc }}</span>
            {{-- <p>{{ $brands[$p->brand_id-1]->name }}</p> --}}
            <a href="" class="btn btn-sm btn-primary" onclick="buy({{ $p->id }})"><i class="bi bi-whatsapp"></i> Pesan</a>
          </div>
        </div>
      </div>
      @endforeach

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