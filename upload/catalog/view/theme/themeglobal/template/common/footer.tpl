<div id="footer">
<?php if ($informations) { ?>
  <div class="column">
    <h3><?php echo $text_information; ?></h3>
    <ul>
      <?php foreach ($informations as $information) { ?>
      <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
      <?php } ?>
    </ul>
  </div>
  <?php } ?>
  <div class="column">
    <h3><?php echo $text_service; ?></h3>
    <ul>
      <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
      <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
      <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
    </ul>
  </div>
  <div class="column">
    <h3><?php echo $text_extra; ?></h3>
    <ul>
      <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
      <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
      <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
      <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
    </ul>
  </div>
  <div class="column">
    <h3><?php echo $text_account; ?></h3>
    <ul>
      <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
      <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
      <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
      <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
    </ul>
  </div>
</div>
<script type="text/javascript" src="/callme/js/callme.js"></script>
<div id="powered">
<div id="poweredtext">&copy;Copyright 2014. Powered by <a class="blue" href="http://www.bellissima.kiev.ua">Bellissima</a><br />
</div>
</div>

<div id="paymentimage">
  	<?php if (unserialize($this->config->get('tg_themeglobal_paymentimages_slide_image'))) {?>	
  		<?php foreach( unserialize($this->config->get('tg_themeglobal_paymentimages_slide_image')) as $image): ?>
      		<?php if ($image['url']) {?>
      		<span style="margin-left:10px;"><a href="<?php echo $image['url'];?>" target="_blank"><img src="<?php echo HTTPS_SERVER . 'image/' . $image['file'];?>" /></a></span>
      	<?php } else { ?>
      		<span style="margin-left:10px;"><img src="<?php echo HTTPS_SERVER . 'image/' . $image['file'];?>" /></span>
      	<?php } ?>
    	<?php endforeach; ?>
    <?php } ?>
</div>	
</div>	
</div>
<!-- Код тега ремаркетинга Google -->
<!--------------------------------------------------
С помощью тега ремаркетинга запрещается собирать информацию, по которой можно идентифицировать личность пользователя. Также запрещается размещать тег на страницах с контентом деликатного характера. Подробнее об этих требованиях и о настройке тега читайте на странице http://google.com/ads/remarketingsetup.
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 965377307;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/965377307/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body></html>