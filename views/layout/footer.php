<?php
$dark_mode = $dark_mode ?? false;
$footer_bg = $dark_mode ? '#121212' : '#f0f0f0';
$footer_color = $dark_mode ? '#e0e0e0' : '#333';
$bottom_bg = $dark_mode ? '#222' : '#222';
$bottom_color = $dark_mode ? '#ccc' : '#ccc';
?>
<footer style="background-color: <?= $footer_bg ?>; color: <?= $footer_color ?>; font-size: 14px; padding: 40px 0 20px 0; font-family: Arial, sans-serif;">
  <div class="container">
    <div class="row g-2">
      <div class="col-md-3">
        <h5>Help</h5>
        <ul style="list-style:none; padding-left:0; line-height:1.6;">
          <li><a href="#" style="color: <?= $footer_color ?>;">Help center</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">FAQs</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Privacy policy</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Cookie policy</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Terms of use</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Digital Services Act (EU)</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Content guidelines &amp; reporting</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Modern Slavery Statement</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Company</h5>
        <ul style="list-style:none; padding-left:0; line-height:1.6;">
          <li><a href="#" style="color: <?= $footer_color ?>;">About us</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Careers</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Press</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Blog</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">PointsMAX</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Destinations</h5>
        <ul style="list-style:none; padding-left:0; line-height:1.6;">
          <li><a href="#" style="color: <?= $footer_color ?>;">Countries/Territories</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">All Flight Routes</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Partner with us</h5>
        <ul style="list-style:none; padding-left:0; line-height:1.6;">
          <li><a href="#" style="color: <?= $footer_color ?>;">YCS partner portal</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Partner Hub</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Advertise on Agoda</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Affiliates</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Agoda API Documentation</a></li>
        </ul>
      </div>
      <div class="col-md-3" style="margin-top: 20px;">
        <h5>Get the app</h5>
        <ul style="list-style:none; padding-left:0; line-height:1.6;">
          <li><a href="#" style="color: <?= $footer_color ?>;">iOS app</a></li>
          <li><a href="#" style="color: <?= $footer_color ?>;">Android app</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div style="background-color: <?= $bottom_bg ?>; color: <?= $bottom_color ?>; font-size: 13px; padding: 15px 0; text-align: center; margin-top: 20px;">
    <p style="margin: 0;">All material herein © 2005–2025 Shuta Company Pte. Ltd. All Rights Reserved.</p>
    <p style="margin: 0;">Shuta Hotel is part of Shuta Comp Inc., the world leader in online travel &amp; related services.</p>
  </div>
</footer>
</div> <!-- End Container -->
</body>
</html>
