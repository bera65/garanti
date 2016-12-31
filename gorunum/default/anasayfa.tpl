<div class="kbaslik">İstatistikler</div>
<div class="row">
	<div class="bir col-sm-4 uclukutu">
		<div class="ickisim panel">
			<div class="ust_kisim">
				<div class="col-sm-8 col-xs-8 sayi"><span class="count">{$toplamMusteri}</span><br />Müşteri</div>
				<div class="col-sm-4 col-xs-4 icon"><i class="fa fa-users"></i></div>
			</div>
			<div class="alt_kisim">
				<div class="col-sm-8 col-xs-8">Bir Önceki Yıla Göre</div>
				<div class="col-sm-4 col-xs-4 solayasla"><i class="fa fa-arrow-up"></i></div>
			</div>
		</div>
	</div>
	<div class="iki col-sm-4 uclukutu">
		<div class="ickisim panel">
			<div class="ust_kisim">
				<div class="col-sm-8 col-xs-8 sayi"><span class="count2">{$toplamUrun}</span><br />Ürün</div>
				<div class="col-sm-4 col-xs-4 icon"><i class="fa fa-file-text-o"></i></div>
			</div>
			<div class="alt_kisim">
				<div class="col-sm-8 col-xs-8">Bir Önceki Yıla Göre</div>
				<div class="col-sm-4 col-xs-4 solayasla"><i class="fa fa-arrow-up"></i></div>
			</div>
		</div>
	</div>
	<div class="uc col-sm-4 uclukutu">
		<div class="ickisim panel">
			<div class="ust_kisim">
				<div class="col-sm-8 col-xs-8 sayi"><span class="count3">{$toplamKullanici}</span><br />Kullanıcı</div>
				<div class="col-sm-4 col-xs-4 icon"><i class="fa fa-user"></i></div>
			</div>
			<div class="alt_kisim">
				<div class="col-sm-8 col-xs-8">Bir Önceki Yıla Göre</div>
				<div class="col-sm-4 col-xs-4 solayasla"><i class="fa fa-arrow-up"></i></div>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<section class="panel ana_istatistik">
	<header class="panel-heading">
	Ençok Satılan Ürünler <span class="sagaYasla"><span class="siyah">Müşeriler</span> <span class="kirmizi">Ürünler</span></span>
	</header>
	<div class="panel-body">
	<canvas id="linechart" ></canvas>
	</div>
</section>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül","Ekim", "Kasım", "Aralık"],
                    datasets: [
                        {
                            label: "Müşteriler",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(0,0,0,0.5)",
                            pointColor: "rgba(0,0,0,0.5)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(0,0,0,0.5)",
                            data: [{$musteriOcak}, {$musteriSubat}, {$musteriMart}, {$musteriNisan}, {$musteriMayis}, {$musteriHaziran},{$musteriTemmuz}, {$musteriAgustos}, {$musteriEylul},{$musteriEkim}, {$musteriKasim},{$musteriAralik}]
                        },
                        {
                            label: "Ürünler",
                            fillColor: "rgba(219,0,40,0.2)",
                            strokeColor: "rgba(219,0,40,1)",
                            pointColor: "rgba(219,0,40,0.5)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(219,0,40,1)",
                            data: [{$urunOcak}, {$urunSubat}, {$urunMart}, {$urunNisan}, {$urunMayis}, {$urunHaziran},{$urunTemmuz}, {$urunAgustos}, {$urunEylul},{$urunEkim}, {$urunKasim},{$urunAralik}]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
<div class="row">
	<div class="col-sm-6">
		<div class="panel">
			<div class="panel-heading">Son Müşteriler</div>
			<div class="panel-body">
				<ul>
					{foreach $musteriler as $musteri key=$k}
						<li class="urun{$k}"><a href="{LinkYapisi::php('musteriler', 'idmusteri', {$musteri.id_musteri})}">{$musteri.musteri_ad}</a></li>
					{/foreach}
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel">
			<div class="panel-heading">Son Ürünler</div>
			<div class="panel-body">
				<ul>
					{foreach $urunler as $urun key=$k}
						<li class="urun{$k}" data-baslik="{$urun.musteri_ad|escape:'html':'UTF-8'}"><a onClick="urunGoster({$urun.id_urun})" data-toggle="modal" data-target="#pencereGoster">{$urun.urun_adi} <span class="sagaYasla">{$urun.garanti_bitis|date_format:"%d.%m.%Y"}</span></a></li>
					{/foreach}
				</ul>
			</div>
		</div>
	</div>
</div>