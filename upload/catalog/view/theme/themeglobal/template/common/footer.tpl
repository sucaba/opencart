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
<div id="powered">
<div id="poweredtext">&copy;Copyright 2013. Powered by <a class="blue" href="http://www.bellissima.kiev.ua">Bellissima</a><br />
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
</body></html>