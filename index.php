<?php 
ob_start();
// Header
include 'header.php';

// Main content
include './components/index/HeroSlider.php';
include './components/index/HeroBanner.php';
include './components/index/WomenBanner.php';
// include './components/index/DealOfTheWeek.php';
include './components/index/MenBanner.php';
// include './components/index/Blog.php';
include './components/common/PartnerLogos.php';

// Footer
include 'footer.php';
