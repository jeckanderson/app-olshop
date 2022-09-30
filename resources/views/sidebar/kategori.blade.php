{{-- Awal Kategory dan Produk Terlaris --}}
<div class="card">
    <div class="card-header bg-danger">
        <h5 class="card-title text-white">
            <i class="fa fa-bars text-white"></i> Kategori
        </h5>
    </div>
    <div class="list-group">
        @foreach($category as $kategori)
            <a href="/home/category/{{ $kategori->id_category }}" class="list-group-item"><i class="fa fa-chevron-circle-right"></i> {{ $kategori->name_category }}</a>
        @endforeach
    </div>
</div>

