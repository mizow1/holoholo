<?php $page_name = '「HoloHoloタロット占い」について'; ?>
<?php require_once(SERVICE_PATH.'template/parts/head.php'); ?>
<body>
<div class="container">

<!-- HEADER -->
<?php require_once(SERVICE_PATH.'template/parts/site_header.php'); ?>
<!-- //HEADER -->
	
<!-- SP_NAV -->
<?php require_once(SERVICE_PATH.'template/parts/sp_nav.php'); ?>
<!-- //SP_NAV -->
	
<!-- GNAV -->
<?php require_once(SERVICE_PATH.'template/parts/gnav.php'); ?>
<!-- //GNAV -->

<!-- MAIN -->
<div class="main">

			<ul class="breadcrumb">
				<li><a href="<?php echo SERVICE_URL ?>">HOME</a></li>
				<li><?php echo $page_name ?></li>
			</ul>
			
			<div class="about">
			<table border="0" cellpadding="0" cellspacing="1" class="table_company" width="100%">
        <tbody>
          <tr>
            <th>社名</th>
            <td>株式会社アウトワード</td>
          </tr>
          <tr>
            <th>代表者</th>
            <td>代表取締役 伊藤 邦行</td>
          </tr>
          <tr>
            <th>設　立</th>
            <td>2001年10月</td>
          </tr>
          <tr>
            <th>事業内容</th>
            <td>ソフトウェアの企画・開発・販売<br />
            インターネットに関連するソフトウェアの企画・開発・販売<br />
            WEBデザイン業務<br />
            WEBサイトの企画立案、作成及び管理代行<br />
            WEBサイトの保守管理<br />
            インターネット・コンピュータの導入・利用等におけるコンサルティング業務<br />
            サーバの設置及びその管理業務<br />
            デジタルコンテンツの企画及び制作<br />
            インターネットにおける広告企画業務<br />
            情報通信機器のソフトウェアの開発、製造及び販売<br />
            情報通信端末及び通信機器の販売<br />
            広告代理業務</td>
          </tr>
          <tr>
            <th>会社URL</th>
            <td><a href="https://www.outward.jp/company/" target="_blank" class="ext_icon">https://www.outward.jp/company/</a></td>
          </tr>
        </tbody>
      </table>

			</div>
			<!-- /.about -->	


</div>
<!-- //MAIN -->

<div class="page_top" id="js_pagetop"><i class="fa fa-angle-up" aria-hidden="true"></i></div>

<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>
