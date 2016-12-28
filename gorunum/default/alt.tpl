				</div>
			</div>
			<div id="alt" class="container-fluid">
				<div class="container">
				</div>
			</div>
			<div id="uyari">
				<div class="uyariPencere">
					<div class="baslik">Ürün Sil ! <a class="pencerekapat" onClick="pencerekapat()"><i class="fa fa-times" aria-hidden="true"></i></a></div>
					<div class="icerik">Bu ürün kalıcı olarak silinsin mi ?</div>
					<div class="buttonlar">
						<form id="uyariform" action="{$base_dir}sayfa.php" method="POST">
							<input type="hidden" id="urunsil" name="numara"/>
							<button class="btn btnTuruncu" type="submit" name="urunsil" value="1">Evet</button>
							<button class="btn yesilButton" type="button" onClick="pencerekapat()" value="1">Hayır</button>
						</form>
					</div>
				</div>
			</div>
			<div class="modal fade" id="pencereGoster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				  </div>
				  <div class="modal-body">
					
				  </div>
				</div>
			  </div>
			</div>
			<script src="{$js_dir}bootstrap.min.js"></script>
			<script src="{$js_dir}style.js"></script>
			{if $sayfaAdi == 'anasayfa'}
				<script src="{$js_dir}count.js"></script>
				<script type="text/javascript">
					countUp({$toplamMusteri});
					countUp2({$toplamUrun});
					countUp3({$toplamKullanici});
				</script>
			{/if}
	</body>
</html>