-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 05:48 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gabbar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `Login_Id` smallint(3) UNSIGNED NOT NULL,
  `Login_Name` varchar(20) NOT NULL,
  `Login_Password` varchar(30) DEFAULT NULL,
  `User_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Job_Title` varchar(50) DEFAULT NULL,
  `Mobile_No` varchar(20) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Profile_Image` varchar(20) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT '1',
  `Website` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Login_Id`, `Login_Name`, `Login_Password`, `User_Name`, `Email`, `Job_Title`, `Mobile_No`, `Country`, `City`, `Profile_Image`, `Status`, `Website`) VALUES
(1, 'admin', '123456', 'Khilendra kumar sahu', 'khilendra@gmail.com', 'Presss', '9098510289', 'India', 'Bhilai', '1469702556.jpg', 1, 'khilendra.com');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `Blogs_Id` smallint(6) NOT NULL,
  `Title` text NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Description` longtext NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Image_Path` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`Blogs_Id`, `Title`, `Date_Time`, `Description`, `Status`, `Image_Path`) VALUES
(2, 'This IS My First Blogs Post', '2016-05-28 18:31:03', '<p>This is Demo Blogs Post</p>', 1, '1464440463.jpg'),
(3, 'Personal Blog and Portfolio Template', '2016-07-27 17:51:41', '<blockquote class="capton">\r\n<p>Twitter is asking its users to tell brands exactly what they think of their ads with the launch of its new conversational advertising format.</p>\r\n</blockquote>\r\n<p>Consider that alongside cheap devices like the <a href="http://thenextweb.com/google/2015/09/29/hands-on-with-googles-new-chromecast-audio-35-streaming-dongle/#gref">Chromecast Audio</a>, which makes old stereos usable again, and that sort of flexibility has to be of concern to companies like <a href="http://thenextweb.com/gadgets/2015/10/29/sonos-play5-review-worth-the-price-on-audio-quality-alone/#gref">Sonos and its awesome multi-room speaker setups</a>.</p>\r\n<p>You&rsquo;ll then receive an automated thank you, which offers another opportunity for them to shine as it&rsquo;ll appear in your timeline along with the original message. This is much like other publishers have been doing for a while, with automated Tweet buttons from their stories that link directly into Twitter. The ads are live in beta with select brands across the world, with Samsung one of the first to try them.</p>\r\n<div class="feature-inner single-space">\r\n<div class="post-thumb">\r\n<div class="touch-slider owl-carousel owl-theme">\r\n<div class="owl-wrapper-outer">\r\n<div class="owl-wrapper">\r\n<div class="owl-item">\r\n<div class="item">\r\n<p>But brands beware. It&rsquo;s already pretty easy to get in touch with someone on Twitter if you want to talk to them and it&rsquo;s not always a nice conversation that people want to have.</p>\r\n<blockquote class="quote">\r\n<p>The ads are live in beta with select brands across the world, with Samsung one of the first to try them.</p>\r\n</blockquote>\r\n<p>Perhaps more interestingly, however, Google also announced new Cast partners for audio products, including the likes of B&amp;O Play, Harman Kardon, Onkyo, Philips, Pioneer, and Raumfeld. There will also be new models from Sony and LG, who already offer Cast-enabled devices. Ultimately, what this means is that you&rsquo;ll be able to recreate a multi-room synced playback setup using ad-hoc brands and types of speakers, if you want.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1, '1469622101.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_Id` smallint(6) NOT NULL,
  `Category_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_Id`, `Category_Name`) VALUES
(4, 'Cake'),
(5, 'Bookey'),
(6, 'Chocolates '),
(7, 'Greeting Cards');

-- --------------------------------------------------------

--
-- Table structure for table `contact_email`
--

CREATE TABLE `contact_email` (
  `Contact_Id` tinyint(4) NOT NULL,
  `Email_Id` varchar(100) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_email`
--

INSERT INTO `contact_email` (`Contact_Id`, `Email_Id`, `Status`) VALUES
(1, 'info@mywebportal.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favicon`
--

CREATE TABLE `favicon` (
  `Toplogo_Id` smallint(4) NOT NULL,
  `Website_Name` varchar(200) DEFAULT NULL,
  `Logo_Image` varchar(15) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favicon`
--

INSERT INTO `favicon` (`Toplogo_Id`, `Website_Name`, `Logo_Image`, `Date`, `Status`) VALUES
(3, NULL, '1485615762.png', '2017-01-28 15:02:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `Footer_Id` tinyint(4) NOT NULL,
  `Details` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`Footer_Id`, `Details`) VALUES
(1, '<p>copyright @ 2016 digitalvalue.in</p>');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image`
--

CREATE TABLE `gallery_image` (
  `Id` smallint(6) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Image` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Position` smallint(6) NOT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_image`
--

INSERT INTO `gallery_image` (`Id`, `Title`, `Image`, `Date`, `Position`, `Description`) VALUES
(33, 'during movie shoot', '1474141716.jpg', '2016-09-17 03:18:36', 1, ''),
(34, 'shooting time', '1474141759.jpg', '2016-09-17 03:19:19', 2, ''),
(35, 'professional shoot', '1474142092.jpg', '2016-09-17 03:24:53', 3, ''),
(36, 'project shoot', '1474142307.jpg', '2016-09-17 03:28:27', 4, ''),
(37, 'project work', '1474142175.jpg', '2016-09-17 03:26:15', 5, ''),
(38, 'profession time', '1474142215.jpg', '2016-09-17 03:26:55', 7, ''),
(39, 'traditional wear', '1474142259.jpg', '2016-09-17 03:27:39', 8, ''),
(40, '.', '1474142380.jpg', '2016-09-17 03:29:40', 8, ''),
(41, '.', '1474142413.jpg', '2016-09-17 03:30:13', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE `hits` (
  `pageid` varchar(100) NOT NULL,
  `isunique` tinyint(1) NOT NULL,
  `hitcount` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`pageid`, `isunique`, `hitcount`) VALUES
('page1', 0, 11),
('page1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Menu_Id` smallint(4) NOT NULL,
  `File_Name` varchar(100) DEFAULT NULL,
  `Menu_Name` varchar(50) NOT NULL,
  `Position` tinyint(1) NOT NULL DEFAULT '1',
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `Defualt_Menu` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Menu_Id`, `File_Name`, `Menu_Name`, `Position`, `Status`, `Defualt_Menu`) VALUES
(1, 'index.php', 'HOME', 1, 1, 1),
(2, 'about.php', 'ABOUT', 2, 1, 1),
(3, 'contact.php', 'CONTACT', 6, 1, 1),
(7, 'gallery.php', 'GALLERY', 3, 1, 1),
(11, 'professional_life.php', 'PROFESSIONAL LIFE', 4, 1, NULL),
(12, 'modeling.php', 'modeling', 6, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nodupes`
--

CREATE TABLE `nodupes` (
  `ids_hash` char(64) NOT NULL,
  `time` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodupes`
--

INSERT INTO `nodupes` (`ids_hash`, `time`) VALUES
('9b7b7d8f6d1ffc1128085ed3f5c310c8e81518e193d1171995557390655d98c9', 1470228484);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `Order_No` varchar(30) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Order_Amount` float NOT NULL,
  `Shipping_Address` varchar(100) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Transaction_Id` varchar(100) NOT NULL,
  `Transaction_Date` datetime NOT NULL,
  `Payment_Mode` varchar(20) NOT NULL,
  `Pay_Status` varchar(20) DEFAULT NULL COMMENT 'failure or success or NULL',
  `Payment_Id` varchar(20) NOT NULL,
  `Payment_Status` tinyint(4) NOT NULL COMMENT '0 for Unpaid, 1 for paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `Order_No`, `Order_Date`, `Order_Amount`, `Shipping_Address`, `User_Id`, `Transaction_Id`, `Transaction_Date`, `Payment_Mode`, `Pay_Status`, `Payment_Id`, `Payment_Status`) VALUES
(1, '920953', '2017-02-20 20:19:09', 1, 'LIG277 Old Deen Dayal Upadhyay\r\nJunwani', 1, '', '0000-00-00 00:00:00', '', NULL, '', 0),
(2, '339035', '2017-02-20 20:24:49', 1, 'LIG277 Old Deen Dayal Upadhyay\r\nJunwani', 1, '', '0000-00-00 00:00:00', '', NULL, '', 0),
(3, '931912', '2017-09-06 21:03:42', 1, 'LIG277 Old Deen Dayal Upadhyay\r\nJunwani', 1, '', '0000-00-00 00:00:00', '', NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_Detail_Id` int(11) NOT NULL,
  `Order_Id` int(11) NOT NULL,
  `Product_Id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Order_Detail_Id`, `Order_Id`, `Product_Id`) VALUES
(1, 1, 18),
(2, 2, 2),
(3, 2, 20),
(4, 3, 1),
(5, 3, 18);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `Package_Id` int(11) NOT NULL,
  `Package_Name` varchar(100) NOT NULL,
  `Old_Price` float NOT NULL,
  `New_Price` float NOT NULL,
  `SKU` varchar(50) NOT NULL,
  `Image` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`Package_Id`, `Package_Name`, `Old_Price`, `New_Price`, `SKU`, `Image`) VALUES
(17, 'Package1', 500, 400, 'SKU01', 'PKG1487430819.jpg'),
(18, 'Package2', 800, 750, 'SKU02', 'PKG1487430735.jpg'),
(19, 'Package3', 200, 150, 'SKU03', 'PKG1487430690.jpg'),
(20, 'Package4', 100, 80, 'SKU04', 'PKG1487430660.jpg'),
(25, 'Package5', 5, 1, 'SKU05', 'PKG1487430618.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `package_relation_category`
--

CREATE TABLE `package_relation_category` (
  `Package_Id` int(11) NOT NULL,
  `Category_Id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_relation_category`
--

INSERT INTO `package_relation_category` (`Package_Id`, `Category_Id`) VALUES
(20, 7),
(19, 6),
(18, 4),
(17, 5),
(6, 5),
(25, 5),
(25, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `Pages_Id` smallint(6) NOT NULL,
  `Menu_Id` smallint(4) NOT NULL COMMENT 'Menu_Id',
  `Details` longtext NOT NULL,
  `Image_Path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`Pages_Id`, `Menu_Id`, `Details`, `Image_Path`) VALUES
(1, 1, '<section class="col-3 ss-style-doublediagonal our-features">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-6  promo-border" style="margin-top: 20px;">\r\n<h2>DURING WORK</h2>\r\n<div class="promo-text">The experience of "beauty" often involves an interpretation of some entity as being in balance and <a title="Harmony" href="https://en.wikipedia.org/wiki/Harmony">harmony</a> with <a title="Nature" href="https://en.wikipedia.org/wiki/Nature">nature</a>, which may lead to feelings of <a title="Sexual attraction" href="https://en.wikipedia.org/wiki/Sexual_attraction">attraction</a> and <a title="Emotional well-being" href="https://en.wikipedia.org/wiki/Emotional_well-being">emotional well-being</a>. Because this can be a <a title="Subjectivity" href="https://en.wikipedia.org/wiki/Subjectivity">subjective</a> experience, it is often said that "beauty is in the eye of the beholder."<sup id="cite_ref-phrase_1-0" class="reference"><a href="https://en.wikipedia.org/wiki/Beauty#cite_note-phrase-1">[1]</a></sup></div>\r\n<div style="font-family: calibri; font-size: 20px; margin-top: 25px;"><img src="image_upload/pages/1474127999.jpg" alt="" width="402" height="500" /></div>\r\n<p style="font-family: calibri; font-size: 14px; padding: 10px;">History of <a title="Clothing in India" href="https://en.wikipedia.org/wiki/Clothing_in_India">clothing in India</a>, dates back of ancient times, yet fashion in a new <a title="Industry" href="https://en.wikipedia.org/wiki/Industry">industry</a>, as it was the <a class="mw-redirect" title="Fashion in india" href="https://en.wikipedia.org/wiki/Fashion_in_india#Traditional_clothing">traditional Indian clothings</a> with regional variations, be it <a title="Sari" href="https://en.wikipedia.org/wiki/Sari">sari</a>, <a class="mw-redirect" title="Ghagra choli" href="https://en.wikipedia.org/wiki/Ghagra_choli">ghagra choli</a> or <a title="Dhoti" href="https://en.wikipedia.org/wiki/Dhoti">dhoti</a>, that remained popular till early decades of <a class="mw-redirect" title="Independence of India" href="https://en.wikipedia.org/wiki/Independence_of_India">post-independence</a> India.<sup id="cite_ref-Tierney2013_1-0" class="reference"><a href="https://en.wikipedia.org/wiki/Fashion_in_India#cite_note-Tierney2013-1">[1]</a></sup> A common form of the Indian fashion originates from the Western culture. Fashion includes a series of sequins and gold thread to attract customers and apply a statement to the Indian fashion community. A famous <a class="mw-redirect" title="Indian fashion" href="https://en.wikipedia.org/wiki/Indian_fashion">Indian fashion</a> trademark is <a title="Embroidery" href="https://en.wikipedia.org/wiki/Embroidery">embroidery</a>, a art of sewing distinct thread patterns..</p>\r\n</div>\r\n<div class="col-md-6 promo-border" style="margin-top: 20px;">\r\n<h2>TRADITIONAL WEAR</h2>\r\n<div class="promo-text">&nbsp;&nbsp;<strong>India</strong> is a country with an ancient clothing design tradition, yet an emerging <a class="mw-redirect" title="Fashion industry" href="https://en.wikipedia.org/wiki/Fashion_industry">fashion industry</a>. Though a handful of designers existed prior to the 1980s, This was the result of increasing exposure to global fashion. The following decades firmly established fashion as an industry, across India.</div>\r\n<p style="font-family: calibri; font-size: 20px; margin-top: 25px;"><img src="image_upload/pages/1474128050.jpg" alt="" width="402" height="500" /></p>\r\n<p style="font-family: calibri; font-size: 14px; padding: 10px;">A way to include the traditional look and create a new fashion statement includes embroidery applied to different dresses, skirts, shirts, and pants to reflect the western culture influence as well as include the <a class="mw-redirect" title="Indian tradition" href="https://en.wikipedia.org/wiki/Indian_tradition">Indian tradition</a>. As a part of larger revival movement in the Indian textile industry,<a title="Ritu Kumar" href="https://en.wikipedia.org/wiki/Ritu_Kumar">Ritu Kumar</a>, a Kolkata-based designer and textile print-expert started working on reviving the traditional <a title="Textile printing" href="https://en.wikipedia.org/wiki/Textile_printing#Hand_block_printing">hand block printing</a> techniques of Bengal, and making it a part of the fashion industry</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="row">&nbsp;</div>\r\n<div class="row">&nbsp;</div>\r\n</section>\r\n<section>\r\n<div class="row">\r\n<div class="text-center" style="padding: 0 80px;">\r\n<h2 class="text-uppercase">As a professional&nbsp;</h2>\r\n<p><img src="image_upload/pages/1474128235.jpg" alt="" /></p>\r\n<div class="divider">&nbsp;</div>\r\n<p>They have become much more than people who represent the vision of the designer. Today, a model is a brand in herself and represents the fashion fraternity as a whole.</p>\r\n</div>\r\n</div>\r\n<div class="col-md-4 ">\r\n<div class="pv-30 ph-20 service-block bordered shadow text-center object-non-visible animated object-visible fadeInDownSmall" data-animation-effect="fadeInDownSmall" data-effect-delay="100">\r\n<h3>Clean Code &amp; Design</h3>\r\n<div class="divider clearfix">&nbsp;</div>\r\n<p>Voluptatem ad provident non repudiandae beatae cupiditate amet reiciendis lorem ipsum dolor sit amet, consectetur.</p>\r\n</div>\r\n</div>\r\n<div class="col-md-4 ">\r\n<div class="pv-30 ph-20 service-block bordered shadow text-center object-non-visible animated object-visible fadeInDownSmall" data-animation-effect="fadeInDownSmall" data-effect-delay="150">\r\n<h3>Extremely Flexible</h3>\r\n<div class="divider clearfix">&nbsp;</div>\r\n<p>Iure sequi unde hic. Sapiente quaerat sequi inventore veritatis cumque lorem ipsum dolor sit amet, consectetur.</p>\r\n</div>\r\n</div>\r\n<div class="col-md-4 ">\r\n<h3>Latest Technologies</h3>\r\n<div class="divider clearfix">&nbsp;</div>\r\n<p>Iure sequi unde hic. Sapiente quaerat sequi inventore veritatis cumque lorem ipsum dolor sit amet, consectetur.</p>\r\n</div>\r\n<div class="pv-30 ph-20 service-block bordered shadow text-center object-non-visible animated object-visible fadeInDownSmall" data-animation-effect="fadeInDownSmall" data-effect-delay="200">&nbsp;</div>\r\n<div class="col-md-4 ">&nbsp;</div>\r\n</section>', ''),
(2, 2, '<div class="container">\r\n<article class="single-post-content">\r\n<div class="blog-item-wrap"><img src="image_upload/pages/1469617028.jpg" alt="" width="741" height="292" /></div>\r\n<blockquote class="capton">\r\n<p>Twitter is asking its users to tell brands exactly what they think of their ads with the launch of its new conversational advertising format.</p>\r\n</blockquote>\r\n<p>Consider that alongside cheap devices like the <a href="http://thenextweb.com/google/2015/09/29/hands-on-with-googles-new-chromecast-audio-35-streaming-dongle/#gref">Chromecast Audio</a>, which makes old stereos usable again, and that sort of flexibility has to be of concern to companies like<a href="http://thenextweb.com/gadgets/2015/10/29/sonos-play5-review-worth-the-price-on-audio-quality-alone/#gref">Sonos and its awesome multi-room speaker setups</a>.</p>\r\n<br />\r\n<p>You&rsquo;ll then receive an automated thank you, which offers another opportunity for them to shine as it&rsquo;ll appear in your timeline along with the original message. This is much like other publishers have been doing for a while, with automated Tweet buttons from their stories that link directly into Twitter. The ads are live in beta with select brands across the world, with Samsung one of the first to try them.</p>\r\n<div class="feature-inner single-space">&nbsp;</div>\r\n<p>But brands beware. It&rsquo;s already pretty easy to get in touch with someone on Twitter if you want to talk to them and it&rsquo;s not always a nice conversation that people want to have.</p>\r\n<blockquote class="quote">\r\n<p>The ads are live in beta with select brands across the world, with Samsung one of the first to try them.</p>\r\n</blockquote>\r\n<p>Perhaps more interestingly, however, Google also announced new Cast partners for audio products, including the likes of B&amp;O Play, Harman Kardon, Onkyo, Philips, Pioneer, and Raumfeld. There will also be new models from Sony and LG, who already offer Cast-enabled devices. Ultimately, what this means is that you&rsquo;ll be able to recreate a multi-room synced playback setup using ad-hoc brands and types of speakers, if you want.</p>\r\n<div class="feature-inner single-space">&nbsp;</div>\r\n</article>\r\n<article>\r\n<div class="author">\r\n<div class="author-content">\r\n<h4>About Marggaret Gould</h4>\r\n<p>Margaret Gould Stewart is Director of Product Design at Facebook, Inc, leading the companys user experience efforts around advertising and business presence. Prior to her current role, she spent three years leading UX for YouTube, and two years leading Search and Consumer Products UX at Google.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</article>\r\n</div>', ''),
(3, 3, '<div class="contact-info-wrapper clearfix">\r\n<div class="col-md-4">\r\n<div class="contact-item-wrapper">\r\n<div class="icon">&nbsp;</div>\r\n<h4><img src="../../image_upload/pages/1474139974.jpg" alt="" width="264" height="191" /></h4>\r\n<h4>&nbsp;</h4>\r\n<h4>Email-</h4>\r\n<p>info@kiyaraaggarwal.com</p>\r\n</div>\r\n</div>\r\n<div class="col-md-4">\r\n<div class="contact-item-wrapper bl">\r\n<div class="icon">&nbsp;</div>\r\n<h4><img src="../../image_upload/pages/1474140124.jpg" alt="" width="280" height="180" /></h4>\r\n<h4>&nbsp;</h4>\r\n<h4>Address</h4>\r\n<p>gurgaon<br /><br /></p>\r\n</div>\r\n</div>\r\n<div class="col-md-4">\r\n<div class="contact-item-wrapper">\r\n<div class="icon">&nbsp;</div>\r\n<h4><img src="../../image_upload/pages/1474140464.jpg" alt="" width="276" height="183" /></h4>\r\n<h4>&nbsp;</h4>\r\n<h4>Website</h4>\r\n<p>www.kiyaraaggarwal.com</p>\r\n</div>\r\n</div>\r\n</div>', ''),
(4, 7, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway_detail`
--

CREATE TABLE `payment_gateway_detail` (
  `Payment_Gateway_Id` tinyint(4) NOT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Merchant_Key` varchar(20) NOT NULL,
  `Salt_Key` varchar(20) NOT NULL,
  `Status` tinyint(4) NOT NULL COMMENT '1 for Activated'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateway_detail`
--

INSERT INTO `payment_gateway_detail` (`Payment_Gateway_Id`, `Company_Name`, `Merchant_Key`, `Salt_Key`, `Status`) VALUES
(1, 'CRESTERA MARKETING SERVICES PRIVATE LIMITED', '7VU52FGt', 'Z6KVuWl2W0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `Product_Id` mediumint(9) NOT NULL,
  `Product_Image` varchar(75) NOT NULL,
  `Category_Id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`Product_Id`, `Product_Image`, `Category_Id`) VALUES
(1, '14873463500.jpg', 5),
(2, '14873463511.jpg', 5),
(3, '14873463512.jpg', 5),
(4, '14873463513.jpg', 5),
(5, '14873463514.jpg', 5),
(6, '14873463515.jpg', 5),
(7, '14873463516.jpg', 5),
(8, '14873463517.jpg', 5),
(9, '14873463518.jpg', 5),
(10, '14873463519.jpeg', 5),
(11, '14873464660.jpg', 4),
(12, '14873464661.jpg', 4),
(13, '14873464662.jpg', 4),
(14, '14873464663.jpg', 4),
(15, '14873464664.jpg', 4),
(16, '14873464665.jpg', 4),
(17, '14873464666.jpg', 4),
(18, '14873465280.jpg', 6),
(19, '14873465281.jpg', 6),
(20, '14873465292.jpg', 6),
(21, '14873465293.jpg', 6),
(22, '14873465294.jpg', 6),
(23, '14873465295.jpg', 6),
(24, '14873465306.jpg', 6),
(25, '14873465307.jpg', 6),
(26, '14873466120.gif', 7),
(27, '14873466121.jpg', 7),
(28, '14873466122.png', 7),
(29, '14873466123.jpg', 7),
(30, '14873466134.jpg', 7),
(31, '14873466135.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile_No` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`Name`, `Email`, `Mobile_No`, `Address`, `User_Id`) VALUES
('v sudhir', 'sudhir5106@gmail.com', '9826396462', 'LIG277 Old Deen Dayal Upadhyay\r\nJunwani', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `Id` smallint(6) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Image` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Position` smallint(6) NOT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`Id`, `Title`, `Image`, `Date`, `Position`, `Description`) VALUES
(29, '.', '1471619314.jpg', '2016-08-18 22:38:34', 2, '.'),
(30, '.', '1471619367.jpg', '2016-08-18 22:39:27', 3, ''),
(34, '.', '1471619544.jpg', '2016-08-18 22:42:24', 4, ''),
(36, '.  ', '1473922577.jpg', '2016-09-14 14:26:17', 5, ''),
(37, '.', '1474229253.jpg', '2016-09-18 03:37:33', 5, '.');

-- --------------------------------------------------------

--
-- Table structure for table `social_icon`
--

CREATE TABLE `social_icon` (
  `Social_Id` smallint(4) NOT NULL,
  `Icon_Path` varchar(20) NOT NULL,
  `Url` varchar(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Position` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_icon`
--

INSERT INTO `social_icon` (`Social_Id`, `Icon_Path`, `Url`, `Name`, `Status`, `Position`) VALUES
(2, '1470209475.png', 'https://www.facebook.com/', 'FACEBOOK', 1, 1),
(3, '1470209723.png', 'https://twitter.com', 'TWITTER', 1, 2),
(4, '1470209775.jpg', 'https://www.youtube.com/?gl=IN', 'YOUTUBE', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `Title_Id` smallint(6) NOT NULL,
  `Menu_Id` smallint(6) NOT NULL,
  `Title_Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`Title_Id`, `Menu_Id`, `Title_Name`) VALUES
(1, 0, 'undefined'),
(2, 0, 'undefined'),
(3, 0, 'undefined'),
(4, 0, 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `toplogo`
--

CREATE TABLE `toplogo` (
  `Toplogo_Id` smallint(4) NOT NULL,
  `Website_Name` varchar(200) NOT NULL,
  `Logo_Image` varchar(15) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toplogo`
--

INSERT INTO `toplogo` (`Toplogo_Id`, `Website_Name`, `Logo_Image`, `Date`, `Status`) VALUES
(16, 'kiyaraaggarwal', '1471618699.jpg', '2016-08-18 22:29:06', 0),
(17, 'kiyaraagarwal', '', '2016-08-18 22:29:25', 0),
(18, 'Kiyara Aggarwal', '', '2016-09-20 17:41:54', 0),
(19, 'Kiyara Aggarwal', '1474128509.png', '2016-09-21 02:32:30', 0),
(20, 'Kiyara Aggarwal', '1474452714.png', '2017-01-28 07:27:00', 0),
(21, 'Kiyara Aggarwal', '1474452762.png', '2016-09-21 02:41:53', 0),
(22, 'Gabbaroclock', '', '2017-01-28 07:27:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `User_Id` int(11) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `User_Mobile` varchar(15) NOT NULL,
  `User_Password` varchar(20) NOT NULL,
  `User_Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`User_Id`, `User_Name`, `User_Email`, `User_Mobile`, `User_Password`, `User_Address`) VALUES
(1, 'v sudhir', 'sudhir5106@gmail.com', '9826396462', '123456', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_tracker`
--

CREATE TABLE `visitor_tracker` (
  `id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ip` varchar(20) NOT NULL,
  `web_page` varchar(255) NOT NULL,
  `query_string` varchar(255) NOT NULL,
  `http_referer` varchar(255) NOT NULL,
  `http_user_agent` varchar(255) NOT NULL,
  `is_bot` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_tracker`
--

INSERT INTO `visitor_tracker` (`id`, `country`, `city`, `date`, `time`, `ip`, `web_page`, `query_string`, `http_referer`, `http_user_agent`, `is_bot`) VALUES
(1, '', '', '2016-08-03', '13:54:53', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(2, '', '', '2016-08-03', '14:01:35', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(3, '', '', '2016-08-03', '14:12:24', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(4, '', '', '2016-08-03', '14:59:34', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(5, '', '', '2016-08-03', '15:48:03', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(6, '', '', '2016-08-03', '15:48:14', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(20, '-', '-', '2016-08-03', '19:23:56', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(21, '-', '-', '2016-08-03', '19:28:24', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(22, '-', '-', '2016-08-03', '18:30:39', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(23, '-', '-', '2016-08-03', '18:31:34', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(24, '-', '-', '2016-08-03', '18:34:44', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(25, '', '', '2016-08-03', '18:35:32', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(26, '', '', '2016-08-03', '18:36:24', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(27, '', '', '2016-08-03', '18:36:53', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(28, '', '', '2016-08-03', '18:37:20', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(29, '', '', '2016-08-03', '18:37:22', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(30, '', '', '2016-08-03', '18:39:07', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(31, '', '', '2016-08-03', '18:39:10', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(32, '', '', '2016-08-03', '18:40:05', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(33, '', '', '2016-08-03', '18:40:28', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(34, '', '', '2016-08-03', '18:41:56', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(35, '', '', '2016-08-03', '18:43:52', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(36, '', '', '2016-08-03', '18:44:13', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(37, '', '', '2016-08-03', '18:46:25', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(38, '', '', '2016-08-03', '18:49:03', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(39, '', '', '2016-08-03', '18:49:20', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(40, '', '', '2016-08-03', '18:49:48', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(41, '', '', '2016-08-03', '18:50:45', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(42, '', '', '2016-08-03', '18:51:41', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(43, '', '', '2016-08-03', '18:51:53', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(44, '', '', '2016-08-03', '18:51:57', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(45, '', '', '2016-08-03', '18:54:52', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(46, '', '', '2016-08-03', '19:00:19', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(47, '', '', '2016-08-03', '19:02:25', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(48, '', '', '2016-08-03', '19:02:48', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(49, '', '', '2016-08-03', '19:03:24', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(50, '', '', '2016-08-03', '19:03:53', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(51, '', '', '2016-08-03', '19:04:22', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(52, '', '', '2016-08-03', '19:04:51', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(53, '', '', '2016-08-03', '19:05:26', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(54, '', '', '2016-08-03', '19:06:51', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(55, '', '', '2016-08-03', '19:07:06', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(56, '', '', '2016-08-03', '19:07:16', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(57, '', '', '2016-08-03', '19:08:08', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(58, '', '', '2016-08-03', '19:08:40', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(59, '', '', '2016-08-03', '19:08:58', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(60, '', '', '2016-08-03', '19:09:12', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(61, '', '', '2016-08-03', '19:09:56', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(62, '', '', '2016-08-03', '19:12:57', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(63, '', '', '2016-08-03', '19:13:38', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(64, '', '', '2016-08-03', '19:13:51', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(65, '', '', '2016-08-04', '10:55:26', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(66, '', '', '2016-08-04', '11:05:11', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(67, '', '', '2016-08-04', '11:06:12', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(68, '', '', '2016-08-04', '11:07:01', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(69, '', '', '2016-08-04', '11:07:33', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(70, '', '', '2016-08-04', '11:07:44', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(71, '', '', '2016-08-04', '11:07:52', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(72, '', '', '2016-08-04', '11:08:05', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(73, '', '', '2016-08-04', '11:09:34', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(74, '', '', '2016-08-04', '11:10:35', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(75, '', '', '2016-08-04', '11:12:30', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(76, '', '', '2016-08-04', '11:15:53', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(77, '', '', '2016-08-04', '11:16:18', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(78, '', '', '2016-08-04', '11:16:32', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(79, '', '', '2016-08-04', '11:16:52', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(80, '', '', '2016-08-04', '11:18:46', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(81, '', '', '2016-08-04', '11:19:31', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(82, '', '', '2016-08-04', '11:19:48', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(83, '', '', '2016-08-04', '11:20:29', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(84, '', '', '2016-08-04', '11:22:07', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(85, '', '', '2016-08-04', '11:23:11', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(86, '', '', '2016-08-04', '11:23:41', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(87, '', '', '2016-08-04', '11:24:40', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(88, '', '', '2016-08-04', '11:25:38', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(89, '', '', '2016-08-04', '11:27:03', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(90, '', '', '2016-08-04', '11:27:19', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(91, '', '', '2016-08-04', '11:28:17', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(92, '', '', '2016-08-04', '11:28:26', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(93, '', '', '2016-08-04', '11:34:36', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(94, '', '', '2016-08-04', '11:35:29', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(95, '', '', '2016-08-04', '11:36:19', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(96, '', '', '2016-08-04', '11:38:33', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(97, '', '', '2016-08-04', '11:40:42', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(98, '', '', '2016-08-04', '11:42:33', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(99, '', '', '2016-08-04', '11:42:56', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(100, '', '', '2016-08-04', '11:45:02', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(101, '', '', '2016-08-04', '11:46:22', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(102, '', '', '2016-08-04', '11:47:37', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(103, '', '', '2016-08-04', '11:48:51', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(104, '', '', '2016-08-04', '11:49:06', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(105, '', '', '2016-08-04', '11:49:38', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(106, '', '', '2016-08-05', '10:58:55', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(107, '', '', '2016-08-05', '11:39:41', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(108, '', '', '2016-08-05', '11:39:49', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(109, '', '', '2016-08-05', '11:41:29', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(110, '', '', '2016-08-05', '11:42:48', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(111, '', '', '2016-08-05', '11:44:17', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(112, '', '', '2016-08-05', '11:44:20', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(113, '', '', '2016-08-05', '11:44:49', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(114, '', '', '2016-08-05', '11:45:03', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(115, '', '', '2016-08-05', '11:46:47', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(116, '', '', '2016-08-05', '11:46:57', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(117, '', '', '2016-08-05', '11:48:59', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(118, '', '', '2016-08-05', '11:50:19', '::1', '/website_portfolio/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36', 0),
(119, '', '', '2016-08-05', '18:25:47', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(120, '', '', '2016-08-05', '18:27:24', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(121, '', '', '2016-08-05', '18:29:27', '122.168.105.209', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(122, '', '', '2016-08-05', '18:29:58', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(123, '', '', '2016-08-05', '18:33:04', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(124, '', '', '2016-08-05', '18:35:02', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(125, '', '', '2016-08-05', '18:37:52', '122.168.105.209', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(126, '', '', '2016-08-05', '18:39:51', '122.168.105.209', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(127, '', '', '2016-08-05', '18:40:54', '122.168.105.209', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(128, '', '', '2016-08-05', '18:41:58', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(129, '', '', '2016-08-05', '18:44:08', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(130, '', '', '2016-08-05', '18:46:02', '122.168.105.209', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(131, '', '', '2016-08-05', '18:49:01', '66.249.64.177', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(132, '', '', '2016-08-05', '18:56:40', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(133, '', '', '2016-08-05', '19:26:59', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(134, '', '', '2016-08-05', '19:28:33', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(135, '', '', '2016-08-05', '19:39:44', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(136, '', '', '2016-08-05', '19:39:54', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(137, '', '', '2016-08-05', '19:39:59', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(138, '', '', '2016-08-05', '19:40:37', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(139, '', '', '2016-08-05', '19:41:30', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(140, '', '', '2016-08-05', '19:42:16', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(141, '', '', '2016-08-05', '19:42:43', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(142, '', '', '2016-08-05', '19:51:22', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(143, '', '', '2016-08-05', '19:52:59', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(144, '', '', '2016-08-05', '19:53:30', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(145, '', '', '2016-08-05', '19:53:50', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(146, '', '', '2016-08-05', '19:54:37', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(147, '', '', '2016-08-05', '19:57:40', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(148, '', '', '2016-08-05', '19:59:16', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(149, '', '', '2016-08-05', '20:00:01', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(150, '', '', '2016-08-05', '20:07:40', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(151, '', '', '2016-08-05', '20:10:58', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(152, '', '', '2016-08-05', '20:11:21', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(153, '', '', '2016-08-05', '20:14:13', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(154, '', '', '2016-08-05', '20:28:46', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(155, '', '', '2016-08-05', '20:35:00', '66.249.64.177', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(156, '', '', '2016-08-05', '20:35:18', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(157, '', '', '2016-08-05', '20:37:46', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(158, '', '', '2016-08-05', '20:38:54', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(159, '', '', '2016-08-05', '20:41:04', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(160, '', '', '2016-08-05', '20:43:51', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(161, '', '', '2016-08-05', '20:45:57', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(162, '', '', '2016-08-05', '20:47:31', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(163, '', '', '2016-08-05', '20:50:59', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(164, '', '', '2016-08-05', '20:51:38', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(165, '', '', '2016-08-05', '20:52:32', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(166, '', '', '2016-08-05', '20:55:53', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(167, '', '', '2016-08-05', '20:56:17', '27.58.24.31', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 6.0.1; ONE A2003 Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(168, '', '', '2016-08-05', '20:58:46', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(169, '', '', '2016-08-05', '20:58:58', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(170, '', '', '2016-08-05', '21:01:06', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(171, '', '', '2016-08-05', '21:01:46', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(172, '', '', '2016-08-05', '21:02:20', '106.221.143.65', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; ONE A2003 Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(173, '', '', '2016-08-05', '21:02:51', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(174, '', '', '2016-08-05', '21:09:50', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(175, '', '', '2016-08-05', '21:13:16', '117.222.66.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(176, '', '', '2016-08-05', '21:20:51', '8.37.225.88', '/index.php', '', 'http://lm.facebook.com/lsr.php?u=http%3A%2F%2Fwww.rishabhjaiswal.com%2F&ext=1470412310&hash=AcmKnBozeaUBCEQiDKsZMedo1BzrOkw9oUY6tePth_-dBA&_rdr', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.0.5) Gecko/200900101 Firefox/3.0.5', 0),
(177, '', '', '2016-08-05', '21:22:42', '117.222.66.149', '/index.php', '', 'http://rishabhjaiswal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(178, '', '', '2016-08-05', '21:23:35', '117.222.66.149', '/index.php', '', 'http://rishabhjaiswal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(179, '', '', '2016-08-05', '21:24:45', '117.222.66.149', '/index.php', '', 'http://rishabhjaiswal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(180, '', '', '2016-08-05', '22:13:48', '122.175.241.5', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; ONE A2003 Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(181, '', '', '2016-08-05', '23:33:27', '66.249.64.177', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(182, '', '', '2016-08-06', '03:05:18', '66.249.64.164', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(183, '', '', '2016-08-06', '08:36:58', '54.92.157.225', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:30.0) Gecko/20100101 Firefox/30.0', 0),
(184, '', '', '2016-08-06', '10:14:41', '66.249.64.174', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(185, '', '', '2016-08-06', '13:01:54', '117.222.69.110', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(186, '', '', '2016-08-06', '13:03:00', '117.222.69.110', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(187, '', '', '2016-08-06', '13:16:23', '117.222.69.110', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(188, '', '', '2016-08-06', '13:28:47', '117.222.69.110', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(189, '', '', '2016-08-06', '14:43:21', '117.222.69.110', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(190, '', '', '2016-08-06', '14:44:30', '117.222.69.110', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(191, '', '', '2016-08-06', '14:45:16', '117.222.69.110', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(192, '', '', '2016-08-06', '15:04:53', '66.249.64.174', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(193, '', '', '2016-08-06', '15:55:27', '117.222.69.110', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(194, '', '', '2016-08-06', '18:13:26', '122.168.155.19', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(195, '', '', '2016-08-06', '18:16:04', '82.145.220.169', '/index.php', '', 'http://www.google.co.in/search?client=ms-opera-mobile&channel=new&ei=69ulV4jlNMyVgAaI1JaQBA&q=www.rishabhjaiswal.com&oq=www.rishabhjaiswal.com&gs_l=mobile-gws-serp.12...315.6515.0.7881.10.9.1.0.0.0.1286.6473.3-3j1j1j1j3.9.0....0...1c.1.64.mobile-gws-serp.', 'Mozilla/5.0 (Linux; Android 4.3; NokiaX2DS Build/JLS36C) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Mobile Safari/537.36 OPR/21.0.1437.75439', 0),
(196, '', '', '2016-08-06', '18:16:36', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(197, '', '', '2016-08-06', '18:16:36', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(198, '', '', '2016-08-06', '18:16:36', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(199, '', '', '2016-08-06', '18:17:33', '82.145.220.169', '/index.php', '', 'http://www.google.co.in/search?client=ms-opera-mobile&channel=new&ei=69ulV4jlNMyVgAaI1JaQBA&q=www.rishabhjaiswal.com&oq=www.rishabhjaiswal.com&gs_l=mobile-gws-serp.12...315.6515.0.7881.10.9.1.0.0.0.1286.6473.3-3j1j1j1j3.9.0....0...1c.1.64.mobile-gws-serp.', 'Mozilla/5.0 (Linux; Android 4.3; NokiaX2DS Build/JLS36C) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Mobile Safari/537.36 OPR/21.0.1437.75439', 0),
(200, '', '', '2016-08-06', '18:19:10', '82.145.220.169', '/index.php', '', 'http://www.google.co.in/search?client=ms-opera-mobile&channel=new&ei=69ulV4jlNMyVgAaI1JaQBA&q=www.rishabhjaiswal.com&oq=www.rishabhjaiswal.com&gs_l=mobile-gws-serp.12...315.6515.0.7881.10.9.1.0.0.0.1286.6473.3-3j1j1j1j3.9.0....0...1c.1.64.mobile-gws-serp.', 'Mozilla/5.0 (Linux; Android 4.3; NokiaX2DS Build/JLS36C) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Mobile Safari/537.36 OPR/21.0.1437.75439', 0),
(201, '', '', '2016-08-06', '18:19:24', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(202, '', '', '2016-08-06', '18:26:34', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(203, '', '', '2016-08-06', '18:30:13', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(204, '', '', '2016-08-06', '19:29:07', '117.222.69.110', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(205, '', '', '2016-08-06', '20:11:58', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(206, '', '', '2016-08-06', '20:16:22', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(207, '', '', '2016-08-06', '20:16:29', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(208, '', '', '2016-08-06', '20:17:23', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(209, '', '', '2016-08-06', '20:17:31', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(210, '', '', '2016-08-06', '20:19:28', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(211, '', '', '2016-08-06', '20:19:35', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(212, '', '', '2016-08-06', '20:19:53', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(213, '', '', '2016-08-06', '20:19:56', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(214, '', '', '2016-08-06', '20:20:15', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(215, '', '', '2016-08-06', '20:20:56', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(216, '', '', '2016-08-06', '20:20:59', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(217, '', '', '2016-08-06', '20:21:56', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(218, '', '', '2016-08-06', '20:22:46', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(219, '', '', '2016-08-06', '20:22:57', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(220, '', '', '2016-08-06', '20:23:14', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(221, '', '', '2016-08-06', '20:24:05', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(222, '', '', '2016-08-06', '20:25:05', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(223, '', '', '2016-08-06', '20:26:42', '122.168.155.19', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(224, '', '', '2016-08-06', '20:26:53', '122.168.155.19', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(225, '', '', '2016-08-06', '20:26:59', '122.168.155.19', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(226, '', '', '2016-08-06', '20:27:57', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(227, '', '', '2016-08-06', '20:28:23', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(228, '', '', '2016-08-06', '20:28:34', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(229, '', '', '2016-08-06', '20:31:06', '122.168.155.19', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(230, '', '', '2016-08-06', '20:37:05', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(231, '', '', '2016-08-06', '20:38:42', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(232, '', '', '2016-08-06', '20:39:42', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(233, '', '', '2016-08-06', '20:42:10', '122.168.155.19', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(234, '', '', '2016-08-06', '20:42:15', '122.168.155.19', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(235, '', '', '2016-08-06', '20:42:18', '122.168.155.19', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(236, '', '', '2016-08-06', '20:44:32', '168.235.205.112', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.4.4; en-US; 2014818 Build/KTU84P) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.10.8.820 U3/0.8.0 Mobile Safari/534.30', 0),
(237, '', '', '2016-08-06', '20:47:30', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(238, '', '', '2016-08-06', '20:47:36', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(239, '', '', '2016-08-06', '20:47:42', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(240, '', '', '2016-08-06', '20:47:42', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(241, '', '', '2016-08-06', '20:49:34', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(242, '', '', '2016-08-06', '20:55:22', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(243, '', '', '2016-08-06', '20:58:43', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(244, '', '', '2016-08-06', '21:00:20', '122.168.155.19', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(245, '', '', '2016-08-06', '21:01:17', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(246, '', '', '2016-08-06', '21:04:34', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(247, '', '', '2016-08-06', '21:05:44', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(248, '', '', '2016-08-06', '21:06:04', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(249, '', '', '2016-08-06', '21:10:22', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(250, '', '', '2016-08-06', '21:10:51', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0);
INSERT INTO `visitor_tracker` (`id`, `country`, `city`, `date`, `time`, `ip`, `web_page`, `query_string`, `http_referer`, `http_user_agent`, `is_bot`) VALUES
(251, '', '', '2016-08-06', '21:11:28', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(252, '', '', '2016-08-06', '21:13:54', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(253, '', '', '2016-08-06', '21:14:03', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(254, '', '', '2016-08-06', '21:16:32', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(255, '', '', '2016-08-06', '21:17:36', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(256, '', '', '2016-08-06', '21:18:43', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(257, '', '', '2016-08-06', '21:20:40', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(258, '', '', '2016-08-06', '21:20:43', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(259, '', '', '2016-08-06', '21:22:51', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(260, '', '', '2016-08-06', '21:23:25', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(261, '', '', '2016-08-06', '21:24:01', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(262, '', '', '2016-08-06', '21:24:04', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(263, '', '', '2016-08-06', '21:27:20', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(264, '', '', '2016-08-06', '21:27:29', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(265, '', '', '2016-08-06', '21:37:06', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(266, '', '', '2016-08-06', '21:44:41', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(267, '', '', '2016-08-06', '21:44:53', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(268, '', '', '2016-08-06', '21:47:03', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(269, '', '', '2016-08-06', '21:50:58', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(270, '', '', '2016-08-06', '22:01:07', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(271, '', '', '2016-08-06', '22:01:43', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(272, '', '', '2016-08-06', '22:05:09', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(273, '', '', '2016-08-06', '22:05:36', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(274, '', '', '2016-08-06', '22:07:10', '122.168.155.19', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(275, '', '', '2016-08-06', '22:07:55', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(276, '', '', '2016-08-06', '22:09:38', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(277, '', '', '2016-08-06', '22:09:47', '122.168.155.19', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(278, '', '', '2016-08-06', '22:20:50', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(279, '', '', '2016-08-06', '22:20:58', '59.88.182.175', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(280, '', '', '2016-08-06', '22:29:15', '122.168.155.19', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(281, '', '', '2016-08-06', '22:37:04', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(282, '', '', '2016-08-06', '22:41:10', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(283, '', '', '2016-08-06', '22:41:34', '122.168.155.19', '/index.php', '', 'http://www.rishabhjaiswal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(284, '', '', '2016-08-07', '04:22:46', '166.78.181.113', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 0),
(285, '', '', '2016-08-07', '13:11:00', '27.97.69.139', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 5.1; Aqua_LifeIII Build/LMY47D; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/50.0.2661.86 Mobile Safari/537.36', 0),
(286, '', '', '2016-08-07', '13:16:43', '27.97.69.139', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 5.1; Aqua_LifeIII Build/LMY47D; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/50.0.2661.86 Mobile Safari/537.36', 0),
(287, '', '', '2016-08-07', '13:20:15', '27.97.69.139', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 5.1; Aqua_LifeIII Build/LMY47D; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/50.0.2661.86 Mobile Safari/537.36', 0),
(288, '', '', '2016-08-07', '17:09:31', '198.101.238.203', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 0),
(289, '', '', '2016-08-07', '20:13:12', '122.175.154.138', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(290, '', '', '2016-08-07', '20:15:26', '122.175.154.138', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(291, '', '', '2016-08-07', '22:06:04', '167.114.157.46', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; DomainSONOCrawler/0.1; +http://domainsono.com)', 0),
(292, '', '', '2016-08-08', '02:55:31', '158.69.25.178', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101  Firefox/28.0', 0),
(293, '', '', '2016-08-08', '02:57:55', '158.69.25.178', '/index.php', '', 'http://domainsigma.com/whois/rishabhjaiswal.com', 'Mozilla/5.0 (compatible; DomainSigmaCrawler/0.1; +http://domainsigma.com/robot)', 0),
(294, '', '', '2016-08-08', '03:54:11', '66.249.64.63', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(295, '', '', '2016-08-08', '06:10:19', '66.249.66.181', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(296, '', '', '2016-08-08', '09:54:07', '66.249.64.5', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(297, '', '', '2016-08-08', '12:52:04', '122.168.65.169', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(298, '', '', '2016-08-08', '12:53:47', '49.32.66.172', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 5.1; LS-4005 Build/LMY47D) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/39.0.0.0 Mobile Safari/537.36', 0),
(299, '', '', '2016-08-08', '12:54:44', '122.168.65.169', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(300, '', '', '2016-08-08', '14:13:56', '122.168.65.169', '/index.php', '', 'http://www.rishabhjaiswal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(301, '', '', '2016-08-08', '14:32:26', '122.168.65.169', '/index.php', '', 'http://www.rishabhjaiswal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(302, '', '', '2016-08-08', '15:11:35', '66.249.64.63', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(303, '', '', '2016-08-08', '18:36:45', '122.168.65.169', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(304, '', '', '2016-08-08', '20:21:54', '122.168.65.169', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(305, '', '', '2016-08-08', '20:36:52', '122.168.65.169', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(306, '', '', '2016-08-08', '20:36:52', '122.168.65.169', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(307, '', '', '2016-08-08', '20:54:59', '66.249.64.25', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(308, '', '', '2016-08-09', '10:48:52', '122.175.171.130', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(309, '', '', '2016-08-09', '18:09:16', '122.175.171.130', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(310, '', '', '2016-08-09', '18:10:12', '122.175.171.130', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(311, '', '', '2016-08-09', '18:55:18', '66.249.66.189', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(312, '', '', '2016-08-09', '21:46:08', '117.198.17.129', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(313, '', '', '2016-08-09', '21:47:04', '117.198.17.129', '/index.php', '', 'http://rishabhjaiswal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 0),
(314, '', '', '2016-08-10', '02:39:44', '66.249.79.136', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(315, '', '', '2016-08-10', '02:49:04', '66.249.79.181', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(316, '', '', '2016-08-10', '04:10:03', '66.249.79.131', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(317, '', '', '2016-08-10', '11:32:35', '171.61.42.58', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(318, '', '', '2016-08-10', '11:46:27', '66.249.79.181', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(319, '', '', '2016-08-10', '17:24:46', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(320, '', '', '2016-08-10', '17:26:34', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(321, '', '', '2016-08-10', '17:27:01', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(322, '', '', '2016-08-10', '17:54:17', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(323, '', '', '2016-08-10', '18:21:54', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(324, '', '', '2016-08-10', '18:23:39', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(325, '', '', '2016-08-10', '18:24:14', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(326, '', '', '2016-08-10', '18:24:17', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(327, '', '', '2016-08-10', '18:26:20', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(328, '', '', '2016-08-10', '18:26:32', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(329, '', '', '2016-08-10', '18:27:37', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(330, '', '', '2016-08-10', '18:28:13', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(331, '', '', '2016-08-10', '18:28:21', '59.88.181.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(332, '', '', '2016-08-10', '19:45:35', '171.61.42.58', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(333, '', '', '2016-08-11', '01:41:27', '66.249.79.136', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(334, '', '', '2016-08-11', '02:08:41', '66.249.79.131', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(335, '', '', '2016-08-11', '05:26:36', '66.249.79.136', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(336, '', '', '2016-08-11', '07:46:04', '66.249.79.184', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(337, '', '', '2016-08-11', '10:45:53', '122.175.165.55', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(338, '', '', '2016-08-11', '11:15:25', '66.249.79.136', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(339, '', '', '2016-08-11', '12:34:55', '122.175.165.55', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(340, '', '', '2016-08-11', '16:12:15', '66.249.79.140', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(341, '', '', '2016-08-11', '17:10:37', '122.175.165.55', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(342, '', '', '2016-08-11', '17:10:50', '122.175.165.55', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(343, '', '', '2016-08-11', '19:06:18', '122.168.19.160', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(344, '', '', '2016-08-11', '19:38:49', '122.168.19.160', '/index.php', '', 'http://rishabhjaiswal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(345, '', '', '2016-08-11', '20:32:41', '66.249.79.140', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(346, '', '', '2016-08-11', '22:59:08', '122.175.165.55', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(347, '', '', '2016-08-12', '00:07:05', '66.249.79.144', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(348, '', '', '2016-08-12', '01:34:10', '66.249.79.144', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(349, '', '', '2016-08-12', '06:48:18', '66.249.79.140', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(350, '', '', '2016-08-12', '08:50:19', '66.249.79.136', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(351, '', '', '2016-08-12', '12:18:55', '66.249.79.136', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(352, '', '', '2016-08-12', '13:35:01', '66.249.79.184', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(353, '', '', '2016-08-12', '14:01:54', '122.168.11.93', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(354, '', '', '2016-08-12', '14:05:13', '122.168.11.93', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(355, '', '', '2016-08-12', '18:01:16', '117.222.22.23', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(356, '', '', '2016-08-12', '18:01:51', '117.222.22.23', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(357, '', '', '2016-08-12', '19:07:05', '122.168.11.93', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(358, '', '', '2016-08-12', '19:08:02', '117.222.22.23', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(359, '', '', '2016-08-12', '19:08:05', '117.222.22.23', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(360, '', '', '2016-08-12', '19:16:28', '38.100.21.65', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2)', 0),
(361, '', '', '2016-08-12', '20:19:22', '122.168.11.93', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(362, '', '', '2016-08-12', '20:44:12', '66.249.79.136', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(363, '', '', '2016-08-12', '21:35:26', '122.168.11.93', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(364, '', '', '2016-08-12', '23:08:14', '49.32.66.99', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(365, '', '', '2016-08-12', '23:08:16', '49.32.66.99', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(366, '', '', '2016-08-12', '23:08:19', '49.32.66.99', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(367, '', '', '2016-08-12', '23:10:48', '49.32.66.99', '/index.php', '', 'http://www.rishabhjaiswal.com/gallery.php', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(368, '', '', '2016-08-13', '01:45:25', '66.249.79.144', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(369, '', '', '2016-08-13', '02:01:01', '158.69.25.178', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; DomainSONOCrawler/0.1; +http://domainsono.com)', 0),
(370, '', '', '2016-08-13', '05:09:57', '66.249.79.144', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(371, '', '', '2016-08-13', '07:58:19', '66.249.79.140', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(372, '', '', '2016-08-13', '11:43:07', '66.249.79.181', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(373, '', '', '2016-08-13', '18:23:14', '68.180.228.186', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)', 0),
(374, '', '', '2016-08-13', '18:26:12', '68.180.228.186', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)', 0),
(375, '', '', '2016-08-13', '18:38:17', '59.88.182.220', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(376, '', '', '2016-08-13', '19:14:15', '59.88.182.220', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(377, '', '', '2016-08-13', '19:40:14', '59.88.182.220', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(378, '', '', '2016-08-13', '20:09:50', '59.88.182.220', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(379, '', '', '2016-08-13', '20:11:17', '59.88.182.220', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(380, '', '', '2016-08-13', '20:12:09', '59.88.182.220', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(381, '', '', '2016-08-13', '20:14:42', '59.88.182.220', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(382, '', '', '2016-08-13', '20:58:58', '59.88.182.220', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(383, '', '', '2016-08-13', '21:15:34', '66.249.79.140', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(384, '', '', '2016-08-13', '21:20:31', '103.41.198.2', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(385, '', '', '2016-08-13', '21:22:10', '103.41.198.2', '/index.php', '', 'http://www.rishabhjaiswal.com/about.php', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(386, '', '', '2016-08-13', '21:46:37', '103.41.198.2', '/index.php', '', 'http://www.rishabhjaiswal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(387, '', '', '2016-08-13', '21:59:53', '66.249.79.140', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(388, '', '', '2016-08-14', '01:10:32', '66.249.79.140', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(389, '', '', '2016-08-14', '01:13:35', '66.249.79.181', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(390, '', '', '2016-08-14', '09:10:24', '66.249.79.144', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(391, '', '', '2016-08-14', '12:59:03', '66.249.66.186', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(392, '', '', '2016-08-14', '16:38:37', '66.249.66.186', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(393, '', '', '2016-08-14', '22:06:24', '66.249.66.189', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(394, '', '', '2016-08-15', '06:26:01', '109.201.152.241', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:44.0) Gecko/20100101 Firefox/44.0', 0),
(395, '', '', '2016-08-15', '07:38:14', '66.249.66.186', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(396, '', '', '2016-08-15', '11:13:16', '66.249.66.186', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(397, '', '', '2016-08-15', '12:45:22', '66.249.66.128', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(398, '', '', '2016-08-15', '14:01:34', '122.168.67.116', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(399, '', '', '2016-08-15', '14:31:29', '66.249.66.189', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(400, '', '', '2016-08-15', '16:42:21', '66.249.66.128', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(401, '', '', '2016-08-15', '17:50:04', '122.168.67.116', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(402, '', '', '2016-08-15', '17:58:15', '122.168.67.116', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(403, '', '', '2016-08-15', '18:00:58', '66.249.66.187', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(404, '', '', '2016-08-15', '18:09:02', '122.168.67.116', '/index.php', '', 'http://www.rishabhjaiswal.com/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(405, '', '', '2016-08-15', '18:10:36', '122.168.67.116', '/index.php', '', 'http://www.rishabhjaiswal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(406, '', '', '2016-08-15', '18:21:56', '122.168.67.116', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(407, '', '', '2016-08-15', '18:22:07', '122.168.67.116', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(408, '', '', '2016-08-15', '18:25:39', '117.222.19.20', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(409, '', '', '2016-08-15', '18:27:48', '117.222.19.20', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(410, '', '', '2016-08-15', '18:38:48', '117.222.19.20', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(411, '', '', '2016-08-15', '18:52:47', '117.222.19.20', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(412, '', '', '2016-08-15', '19:23:41', '122.168.67.116', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(413, '', '', '2016-08-15', '19:29:05', '122.168.67.116', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(414, '', '', '2016-08-15', '20:18:19', '104.238.194.164', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)', 0),
(415, '', '', '2016-08-16', '01:34:33', '198.186.192.44', '/index.php', '', 'no referer', 'no User-agent', 0),
(416, '', '', '2016-08-16', '07:11:56', '209.19.186.170', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:0.9.4) Gecko/20011128 Netscape6/6.2.1', 0),
(417, '', '', '2016-08-16', '07:11:56', '209.19.189.41', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.16 (KHTML, like Gecko) Chrome/10.0.648.11 Safari/534.16', 0),
(418, '', '', '2016-08-16', '10:17:11', '122.177.39.6', '/index.php', '', 'no referer', 'no User-agent', 0),
(419, '', '', '2016-08-16', '13:44:19', '121.42.0.65', '/index.php', '', 'no referer', 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/WK10171 Safari/8536.25', 0),
(420, '', '', '2016-08-16', '19:04:11', '158.69.25.178', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101  Firefox/28.0', 0),
(421, '', '', '2016-08-16', '19:06:12', '158.69.25.178', '/index.php', '', 'http://domainsigma.com/whois/kiyaraaggarwal.com', 'Mozilla/5.0 (compatible; DomainSigmaCrawler/0.1; +http://domainsigma.com/robot)', 0),
(422, '', '', '2016-08-16', '19:06:18', '31.13.102.109', '/index.php', '', 'no referer', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 0),
(423, '', '', '2016-08-16', '21:22:01', '78.47.155.198', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Digincore bot; https://www.digincore.com/crawler.html for rules and instructions.', 0),
(424, '', '', '2016-08-17', '02:10:10', '198.186.192.44', '/index.php', '', 'no referer', 'no User-agent', 0),
(425, '', '', '2016-08-17', '04:10:17', '54.81.88.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3 GTB6 (.NET CLR 3.5.30729)', 0),
(426, '', '', '2016-08-17', '06:48:14', '40.121.157.240', '/index.php', '', 'no referer', 'python-requests/2.7.0 CPython/2.7.6 Windows/2008ServerR2', 0),
(427, '', '', '2016-08-17', '07:39:18', '64.71.195.218', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 5.1; rv:8.0.1) Gecko/20100101 Firefox/8.0.1', 0),
(428, '', '', '2016-08-17', '08:12:21', '140.224.94.53', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1', 0),
(429, '', '', '2016-08-18', '00:43:48', '54.158.58.98', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:30.0) Gecko/20100101 Firefox/30.0', 0),
(430, '', '', '2016-08-18', '03:30:45', '158.69.25.178', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; DomainSONOCrawler/0.1; +http://domainsono.com)', 0),
(431, '', '', '2016-08-18', '03:31:40', '158.69.25.178', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; DomainSONOCrawler/0.1; +http://domainsono.com)', 0),
(432, '', '', '2016-08-18', '03:46:46', '69.58.178.59', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:14.0; ips-agent) Gecko/20100101 Firefox/14.0.1', 0),
(433, '', '', '2016-08-18', '03:46:50', '69.58.178.59', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:14.0; ips-agent) Gecko/20100101 Firefox/14.0.1', 0),
(434, '', '', '2016-08-18', '05:47:31', '110.83.63.135', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1', 0),
(435, '', '', '2016-08-18', '09:23:58', '158.69.25.178', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101  Firefox/28.0', 0),
(436, '', '', '2016-08-18', '12:41:20', '121.42.0.66', '/index.php', '', 'no referer', 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/WK10171 Safari/8536.25', 0),
(437, '', '', '2016-08-18', '17:09:29', '40.121.157.207', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 5.1; rv:33.0) Gecko/20100101 Firefox/33.0', 0),
(438, '', '', '2016-08-18', '17:18:00', '66.249.79.131', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(439, '', '', '2016-08-18', '17:51:08', '66.249.79.131', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(440, '', '', '2016-08-18', '19:17:17', '66.249.79.183', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(441, '', '', '2016-08-18', '20:55:49', '66.249.79.135', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(442, '', '', '2016-08-19', '06:50:18', '158.69.229.134', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:24.0) Gecko/20100101 Firefox/24.0', 0),
(443, '', '', '2016-08-19', '13:30:19', '182.70.182.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(444, '', '', '2016-08-19', '16:39:12', '121.42.0.60', '/index.php', '', 'no referer', 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/WK10171 Safari/8536.25', 0),
(445, '', '', '2016-08-19', '16:39:25', '121.42.0.55', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; MSIE 8.0; Trident/4.0; Windows NT 6.1; SLCC2 2.5.5231; .NET CLR 2.0.50727; .NET CLR 4.1.23457; .NET CLR 4.0.23457; Media Center PC 6.0; MS-WK 8)', 0),
(446, '', '', '2016-08-19', '16:53:46', '52.179.122.20', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)', 0),
(447, '', '', '2016-08-19', '16:54:26', '52.179.120.135', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)', 0),
(448, '', '', '2016-08-19', '20:22:10', '182.70.182.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(449, '', '', '2016-08-19', '20:28:42', '182.70.182.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(450, '', '', '2016-08-19', '20:29:32', '182.70.182.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(451, '', '', '2016-08-19', '20:40:17', '182.70.182.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(452, '', '', '2016-08-19', '20:43:28', '182.70.182.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(453, '', '', '2016-08-19', '20:45:41', '182.70.182.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(454, '', '', '2016-08-19', '20:55:04', '182.70.182.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(455, '', '', '2016-08-19', '20:59:05', '182.70.182.14', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(456, '', '', '2016-08-19', '21:33:36', '75.149.221.170', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 0),
(457, '', '', '2016-08-20', '09:16:34', '66.249.79.119', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(458, '', '', '2016-08-20', '12:22:29', '122.168.155.211', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(459, '', '', '2016-08-20', '13:41:29', '49.32.66.77', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 5.1; LS-4005 Build/LMY47D) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/39.0.0.0 Mobile Safari/537.36', 0),
(460, '', '', '2016-08-20', '14:25:00', '121.42.0.73', '/index.php', '', 'no referer', 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/WK10171 Safari/8536.25', 0),
(461, '', '', '2016-08-20', '16:37:52', '176.31.149.121', '/index.php', 'author=1', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0', 0),
(462, '', '', '2016-08-20', '16:40:29', '182.70.211.12', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(463, '', '', '2016-08-20', '18:58:41', '182.70.211.12', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(464, '', '', '2016-08-20', '19:00:40', '182.70.211.12', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(465, '', '', '2016-08-21', '07:09:54', '206.207.117.163', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.94 Safari/537.4', 0),
(466, '', '', '2016-08-21', '07:14:38', '158.69.229.134', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.16 Safari/537.36', 0),
(467, '', '', '2016-08-21', '11:55:47', '122.168.155.101', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(468, '', '', '2016-08-21', '13:34:09', '8.37.233.244', '/index.php', '', 'https://www.google.co.in/search?hl=en&ie=ISO-8859-1&q=kiyaraagrawal', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; iBall Slide Avonte-7 Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.10.5.809 U3/0.8.0 Mobile Safari/534.30', 0),
(469, '', '', '2016-08-21', '14:00:23', '49.32.66.40', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(470, '', '', '2016-08-21', '14:16:03', '121.42.0.63', '/index.php', '', 'no referer', 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/WK10171 Safari/8536.25', 0),
(471, '', '', '2016-08-21', '15:47:31', '49.32.66.40', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(472, '', '', '2016-08-21', '17:18:01', '66.249.79.127', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(473, '', '', '2016-08-21', '20:14:41', '122.168.155.101', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(474, '', '', '2016-08-22', '10:54:38', '122.175.168.79', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(475, '', '', '2016-08-22', '11:22:48', '122.175.168.79', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(476, '', '', '2016-08-22', '12:15:39', '54.188.203.224', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows; U; Windows NT 6.0; pl; rv:1.9b4) Gecko/2008030714 Firefox/3.0b4', 0),
(477, '', '', '2016-08-22', '19:19:58', '122.175.168.79', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(478, '', '', '2016-08-22', '20:34:21', '49.32.66.25', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.4.4; en-gb; 2014818 Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/46.0.2490.85 Mobile Safari/537.36 XiaoMi/MiuiBrowser/2.1.1', 0),
(479, '', '', '2016-08-22', '20:51:13', '168.235.205.112', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.4.4; en-US; 2014818 Build/KTU84P) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.10.8.820 U3/0.8.0 Mobile Safari/534.30', 0),
(480, '', '', '2016-08-22', '21:43:47', '49.32.66.4', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(481, '', '', '2016-08-22', '21:43:53', '49.32.66.4', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(482, '', '', '2016-08-23', '19:24:52', '66.249.79.127', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(483, '', '', '2016-08-23', '21:50:58', '166.78.181.113', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 0),
(484, '', '', '2016-08-23', '22:12:32', '8.37.233.244', '/index.php', '', 'https://www.google.co.in/search?hl=en&q=Kiyaraaggrawal&nfpr=1&sa=X', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; iBall Slide Avonte-7 Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.10.5.809 U3/0.8.0 Mobile Safari/534.30', 0),
(485, '', '', '2016-08-24', '02:26:46', '38.99.82.192', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Qt/4.7.1 Safari/533.3', 0),
(486, '', '', '2016-08-24', '03:41:59', '66.249.79.127', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(487, '', '', '2016-08-24', '05:26:25', '38.99.82.191', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Qt/4.7.1 Safari/533.3', 0),
(488, '', '', '2016-08-24', '06:02:16', '38.99.82.191', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Qt/4.7.1 Safari/533.3', 0),
(489, '', '', '2016-08-24', '06:06:37', '192.237.216.89', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 0),
(490, '', '', '2016-08-24', '06:10:19', '46.101.157.147', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(491, '', '', '2016-08-24', '06:30:41', '91.210.147.209', '/index.php', '', 'http://kiyaraaggarwal.com', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', 0),
(492, '', '', '2016-08-24', '07:53:24', '209.19.177.57', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; chromeframe/13.0.782.218; chromeframe; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)', 0);
INSERT INTO `visitor_tracker` (`id`, `country`, `city`, `date`, `time`, `ip`, `web_page`, `query_string`, `http_referer`, `http_user_agent`, `is_bot`) VALUES
(493, '', '', '2016-08-24', '07:57:26', '38.99.82.191', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Qt/4.7.1 Safari/533.3', 0),
(494, '', '', '2016-08-24', '16:34:16', '206.183.1.74', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; http://search.thunderstone.com/texis/websearch/about.html)', 0),
(495, '', '', '2016-08-24', '16:34:23', '206.183.1.74', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; http://search.thunderstone.com/texis/websearch/about.html)', 0),
(496, '', '', '2016-08-24', '16:34:30', '206.183.1.74', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; http://search.thunderstone.com/texis/websearch/about.html)', 0),
(497, '', '', '2016-08-24', '17:18:02', '66.249.79.127', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(498, '', '', '2016-08-24', '19:33:25', '103.41.198.240', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(499, '', '', '2016-08-25', '11:23:51', '66.249.79.123', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(500, '', '', '2016-08-25', '15:21:38', '182.70.177.174', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(501, '', '', '2016-08-25', '15:23:12', '182.70.177.174', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(502, '', '', '2016-08-25', '15:24:56', '182.70.177.174', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(503, '', '', '2016-08-25', '21:23:13', '66.249.79.119', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(504, '', '', '2016-08-26', '02:18:41', '66.249.79.119', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(505, '', '', '2016-08-26', '16:29:35', '5.135.59.191', '/index.php', 'author=1', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0', 0),
(506, '', '', '2016-08-26', '16:39:52', '182.70.216.188', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(507, '', '', '2016-08-27', '00:17:42', '49.32.66.102', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 4.4.2; iBall Slide Avonte-7 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Safari/537.36', 0),
(508, '', '', '2016-08-27', '00:21:01', '49.32.66.114', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-A800F Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(509, '', '', '2016-08-27', '00:23:14', '49.32.66.114', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-A800F Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(510, '', '', '2016-08-27', '00:23:18', '49.32.66.114', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-A800F Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(511, '', '', '2016-08-27', '00:24:12', '49.32.66.114', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-A800F Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36', 0),
(512, '', '', '2016-08-27', '13:23:44', '27.97.230.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.4.2; GT-I9192 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.91 Mobile Safari/537.36', 0),
(513, '', '', '2016-08-27', '13:24:40', '27.97.230.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.4.2; GT-I9192 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.91 Mobile Safari/537.36', 0),
(514, '', '', '2016-08-27', '13:57:24', '103.41.198.93', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(515, '', '', '2016-08-27', '13:58:39', '103.41.198.93', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(516, '', '', '2016-08-27', '13:59:24', '103.41.198.93', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(517, '', '', '2016-08-27', '14:38:57', '103.41.198.93', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(518, '', '', '2016-08-27', '14:39:18', '103.41.198.93', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(519, '', '', '2016-08-27', '17:18:04', '66.249.79.119', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(520, '', '', '2016-08-27', '18:10:31', '217.70.180.226', '/index.php', '', 'no referer', 'no User-agent', 0),
(521, '', '', '2016-08-27', '20:19:54', '148.251.41.162', '/index.php', '', 'no referer', 'no User-agent', 0),
(522, '', '', '2016-08-27', '22:21:39', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(523, '', '', '2016-08-28', '01:58:38', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(524, '', '', '2016-08-28', '07:11:51', '209.19.177.1', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Konqueror/3.1; Linux; en)', 0),
(525, '', '', '2016-08-28', '08:11:15', '69.195.124.137', '/index.php', '', 'no referer', 'no User-agent', 0),
(526, '', '', '2016-08-28', '13:01:22', '122.175.155.152', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(527, '', '', '2016-08-28', '13:01:23', '122.175.155.152', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(528, '', '', '2016-08-28', '15:15:56', '198.252.106.67', '/index.php', '', 'no referer', 'no User-agent', 0),
(529, '', '', '2016-08-28', '16:00:54', '49.32.66.157', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J500F Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.89 Mobile Safari/537.36', 0),
(530, '', '', '2016-08-28', '16:15:37', '122.175.155.152', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(531, '', '', '2016-08-28', '16:23:45', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(532, '', '', '2016-08-29', '04:25:20', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(533, '', '', '2016-08-29', '10:43:14', '158.69.25.178', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101  Firefox/28.0', 0),
(534, '', '', '2016-08-29', '16:04:57', '66.249.79.123', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(535, '', '', '2016-08-29', '21:50:28', '188.163.107.178', '/index.php', '', 'http://kiyaraaggarwal.com', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', 0),
(536, '', '', '2016-08-30', '02:01:18', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(537, '', '', '2016-08-30', '08:15:46', '54.158.35.179', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3 GTB6 (.NET CLR 3.5.30729)', 0),
(538, '', '', '2016-08-30', '17:18:07', '66.249.79.119', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(539, '', '', '2016-08-30', '21:15:13', '216.145.5.42', '/index.php', '', 'http://whois.domaintools.com/kiyaraaggarwal.com', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en; rv:1.9.0.13) Gecko/2009073022 Firefox/3.5.2 (.NET CLR 3.5.30729) SurveyBot/2.3 (DomainTools)', 0),
(540, '', '', '2016-08-30', '23:13:25', '49.32.66.139', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(541, '', '', '2016-08-31', '00:49:01', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(542, '', '', '2016-08-31', '07:10:33', '209.19.178.159', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1', 0),
(543, '', '', '2016-08-31', '17:18:59', '134.249.159.113', '/index.php', '', 'no referer', 'no User-agent', 0),
(544, '', '', '2016-09-01', '10:55:43', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(545, '', '', '2016-09-01', '15:44:54', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(546, '', '', '2016-09-01', '15:59:42', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(547, '', '', '2016-09-01', '20:12:04', '49.32.66.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(548, '', '', '2016-09-01', '20:12:25', '49.32.66.14', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(549, '', '', '2016-09-02', '03:49:42', '158.69.25.178', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; DomainSONOCrawler/0.1; +http://domainsono.com)', 0),
(550, '', '', '2016-09-02', '11:31:29', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(551, '', '', '2016-09-02', '11:32:03', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(552, '', '', '2016-09-02', '13:25:59', '49.32.66.5', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(553, '', '', '2016-09-02', '13:26:29', '49.32.66.5', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(554, '', '', '2016-09-02', '15:23:29', '49.32.66.5', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(555, '', '', '2016-09-02', '17:05:43', '49.32.66.5', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(556, '', '', '2016-09-02', '17:28:59', '66.249.79.123', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(557, '', '', '2016-09-04', '07:14:05', '64.71.203.48', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 10.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 0),
(558, '', '', '2016-09-04', '12:56:51', '168.235.207.185', '/index.php', '', 'http://kiyaraaggarwal.com/', 'UCWEB/2.0 (Windows; U; wds 8.10; en-IN; NOKIA; RM-998_im_india_910) U2/1.0.0 UCBrowser/4.2.1.541 U2/1.0.0 Mobile', 0),
(559, '', '', '2016-09-04', '13:40:08', '157.55.39.139', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 0),
(560, '', '', '2016-09-04', '16:07:44', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(561, '', '', '2016-09-04', '16:11:05', '171.49.129.186', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 0),
(562, '', '', '2016-09-04', '17:42:39', '171.49.129.186', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(563, '', '', '2016-09-04', '23:13:32', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(564, '', '', '2016-09-05', '15:20:36', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(565, '', '', '2016-09-05', '18:34:15', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(566, '', '', '2016-09-05', '20:17:05', '178.33.200.180', '/index.php', 'author=1', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0', 0),
(567, '', '', '2016-09-06', '12:45:55', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(568, '', '', '2016-09-06', '13:40:20', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(569, '', '', '2016-09-06', '19:43:51', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(570, '', '', '2016-09-07', '07:09:15', '64.71.197.133', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0', 0),
(571, '', '', '2016-09-07', '12:49:07', '38.80.27.206', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0', 0),
(572, '', '', '2016-09-07', '15:44:13', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(573, '', '', '2016-09-07', '16:28:26', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(574, '', '', '2016-09-07', '21:12:30', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(575, '', '', '2016-09-08', '03:12:01', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(576, '', '', '2016-09-08', '03:25:16', '204.13.201.138', '/index.php', '', 'http://www.bing.com', 'Mozilla/5.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; .NET CLR 1.0.3705; .NET CLR 1.1.4322)', 0),
(577, '', '', '2016-09-08', '03:32:03', '77.247.181.162', '/index.php', '', 'http://kiyaraaggarwal.com/', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)', 0),
(578, '', '', '2016-09-08', '03:54:42', '69.164.206.42', '/index.php', '', 'no referer', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', 0),
(579, '', '', '2016-09-08', '03:59:11', '150.70.173.40', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', 0),
(580, '', '', '2016-09-08', '05:52:41', '52.87.252.74', '/index.php', '', 'no referer', 'roboto', 0),
(581, '', '', '2016-09-08', '06:21:59', '212.7.220.221', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)', 0),
(582, '', '', '2016-09-08', '07:21:00', '82.80.230.228', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22', 0),
(583, '', '', '2016-09-08', '09:47:39', '82.80.249.211', '/index.php', '', 'no referer', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:26.0) Gecko/20100101 Firefox/26.0', 0),
(584, '', '', '2016-09-08', '09:48:59', '82.80.230.228', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:25.0) Gecko/20100101 Firefox/25.0', 0),
(585, '', '', '2016-09-08', '09:49:02', '82.80.230.228', '/index.php', '', 'http://www.kiyaraaggarwal.com/', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:26.0) Gecko/20100101 Firefox/26.0', 0),
(586, '', '', '2016-09-08', '13:01:50', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(587, '', '', '2016-09-08', '13:35:29', '91.121.83.118', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36', 0),
(588, '', '', '2016-09-09', '00:10:44', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(589, '', '', '2016-09-09', '03:50:53', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(590, '', '', '2016-09-09', '04:12:54', '66.249.79.119', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(591, '', '', '2016-09-09', '06:51:25', '217.70.19.83', '/index.php', '', 'no referer', 'Mozilla/42.0 (compatible; MSIE 28.0; Win128)', 0),
(592, '', '', '2016-09-09', '07:10:34', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(593, '', '', '2016-09-09', '11:27:30', '54.69.46.63', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko', 0),
(594, '', '', '2016-09-09', '12:20:34', '64.74.215.60', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/534.27+ (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27', 0),
(595, '', '', '2016-09-09', '12:21:35', '64.74.215.60', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/534.27+ (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27', 0),
(596, '', '', '2016-09-09', '12:22:54', '64.74.215.60', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/534.27+ (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27', 0),
(597, '', '', '2016-09-09', '12:36:02', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(598, '', '', '2016-09-09', '14:58:33', '91.210.147.214', '/index.php', '', 'http://kiyaraaggarwal.com', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', 0),
(599, '', '', '2016-09-09', '21:30:21', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(600, '', '', '2016-09-10', '01:09:34', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(601, '', '', '2016-09-10', '02:17:06', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(602, '', '', '2016-09-10', '05:06:09', '38.100.21.69', '/index.php', '', 'no referer', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2)', 0),
(603, '', '', '2016-09-10', '07:20:45', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(604, '', '', '2016-09-10', '08:54:29', '166.78.181.113', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 0),
(605, '', '', '2016-09-10', '09:10:29', '14.142.64.3', '/index.php', '', 'no referer', 'Mozilla', 0),
(606, '', '', '2016-09-10', '09:10:29', '14.142.64.3', '/index.php', '', 'no referer', 'Mozilla', 0),
(607, '', '', '2016-09-10', '14:36:55', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(608, '', '', '2016-09-10', '20:39:43', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(609, '', '', '2016-09-10', '22:19:06', '59.95.39.240', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(610, '', '', '2016-09-10', '23:22:25', '198.101.238.203', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 0),
(611, '', '', '2016-09-11', '02:44:02', '117.252.68.129', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(612, '', '', '2016-09-11', '02:52:00', '117.254.213.62', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(613, '', '', '2016-09-11', '07:10:14', '207.70.3.137', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 10.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 0),
(614, '', '', '2016-09-11', '09:37:53', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(615, '', '', '2016-09-11', '10:32:14', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(616, '', '', '2016-09-11', '11:08:04', '122.175.210.123', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 0),
(617, '', '', '2016-09-11', '13:23:40', '122.175.182.77', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(618, '', '', '2016-09-11', '13:24:56', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(619, '', '', '2016-09-11', '13:25:50', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(620, '', '', '2016-09-11', '16:20:04', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(621, '', '', '2016-09-11', '20:08:59', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(622, '', '', '2016-09-11', '23:43:55', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(623, '', '', '2016-09-12', '03:55:03', '158.69.25.178', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101  Firefox/28.0', 0),
(624, '', '', '2016-09-12', '06:56:29', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(625, '', '', '2016-09-12', '12:04:59', '171.61.12.225', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 0),
(626, '', '', '2016-09-12', '23:28:53', '153.227.83.35', '/index.php', '', 'http://www.bing.com/search?q=amazon', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E; InfoPath.2; BOIE9;ENUS)', 0),
(627, '', '', '2016-09-14', '04:14:53', '66.249.79.127', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(628, '', '', '2016-09-14', '07:12:24', '209.19.177.147', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36', 0),
(629, '', '', '2016-09-14', '09:36:21', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(630, '', '', '2016-09-14', '20:09:16', '47.247.225.82', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(631, '', '', '2016-09-15', '03:17:18', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(632, '', '', '2016-09-15', '08:52:08', '65.181.118.38', '/index.php', '', 'no referer', 'AdnormCrawler www.adnorm.com/crawler', 0),
(633, '', '', '2016-09-15', '12:14:00', '171.61.34.158', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 0),
(634, '', '', '2016-09-15', '12:16:22', '171.61.34.158', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 0),
(635, '', '', '2016-09-15', '12:26:26', '171.61.34.158', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 0),
(636, '', '', '2016-09-16', '00:24:42', '64.246.178.34', '/index.php', '', 'http://whois.domaintools.com/kiyaraaggarwal.com', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en; rv:1.9.0.13) Gecko/2009073022 Firefox/3.5.2 (.NET CLR 3.5.30729) SurveyBot/2.3 (DomainTools)', 0),
(637, '', '', '2016-09-16', '09:15:47', '195.154.146.225', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0) like Gecko', 0),
(638, '', '', '2016-09-16', '21:10:37', '122.168.154.158', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(639, '', '', '2016-09-16', '22:21:11', '47.247.38.43', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 0),
(640, '', '', '2016-09-16', '23:22:12', '199.217.117.207', '/index.php', '', 'no referer', 'no User-agent', 0),
(641, '', '', '2016-09-17', '00:07:37', '47.247.38.43', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(642, '', '', '2016-09-17', '07:11:46', '69.58.178.56', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:14.0; ips-agent) Gecko/20100101 Firefox/14.0.1', 0),
(643, '', '', '2016-09-17', '07:11:51', '69.58.178.56', '/index.php', '', 'no referer', 'BlackBerry9000/4.6.0.167 Profile/MIDP-2.0 Configuration/CLDC-1.1 VendorID/102 ips-agent', 0),
(644, '', '', '2016-09-17', '07:11:56', '69.58.178.56', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:14.0; ips-agent) Gecko/20100101 Firefox/14.0.1', 0),
(645, '', '', '2016-09-17', '12:16:18', '89.145.95.41', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; GrapeshotCrawler/2.0; +http://www.grapeshot.co.uk/crawler.php)', 0),
(646, '', '', '2016-09-17', '12:39:13', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 0),
(647, '', '', '2016-09-17', '19:39:20', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(648, '', '', '2016-09-17', '20:29:06', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(649, '', '', '2016-09-17', '20:42:02', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(650, '', '', '2016-09-17', '20:42:41', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(651, '', '', '2016-09-17', '21:04:03', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(652, '', '', '2016-09-17', '21:05:23', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(653, '', '', '2016-09-17', '21:14:10', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(654, '', '', '2016-09-17', '21:23:05', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(655, '', '', '2016-09-17', '21:23:56', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(656, '', '', '2016-09-17', '21:26:41', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(657, '', '', '2016-09-17', '21:27:06', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(658, '', '', '2016-09-17', '21:32:45', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(659, '', '', '2016-09-17', '21:35:34', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(660, '', '', '2016-09-17', '21:38:41', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(661, '', '', '2016-09-17', '21:39:51', '122.175.167.37', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1572 Build/MPHS24.49-18-4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(662, '', '', '2016-09-17', '21:45:24', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(663, '', '', '2016-09-17', '21:45:58', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(664, '', '', '2016-09-17', '21:49:35', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(665, '', '', '2016-09-17', '21:50:16', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(666, '', '', '2016-09-17', '21:50:24', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(667, '', '', '2016-09-17', '21:51:05', '171.49.132.182', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(668, '', '', '2016-09-17', '22:37:00', '122.175.167.37', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1572 Build/MPHS24.49-18-4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(669, '', '', '2016-09-17', '22:58:15', '122.175.167.37', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; XT1572 Build/MPHS24.49-18-4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(670, '', '', '2016-09-17', '22:59:06', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(671, '', '', '2016-09-17', '23:25:07', '122.175.167.37', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(672, '', '', '2016-09-18', '00:08:47', '47.247.152.213', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(673, '', '', '2016-09-18', '00:10:12', '47.247.152.213', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(674, '', '', '2016-09-18', '00:10:32', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(675, '', '', '2016-09-18', '00:22:24', '8.37.232.34', '/index.php', '', 'https://www.google.co.in/m?q=kiyaraagrawal.com', 'Mozilla/5.0 (Linux; U; Android 6.0.1; en-US; Moto E Build/MOB31E) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.9.0.731 U3/0.8.0 Mobile Safari/534.30', 0),
(676, '', '', '2016-09-18', '00:25:49', '124.124.42.72', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(677, '', '', '2016-09-18', '00:27:58', '47.247.222.174', '/index.php', '', 'http://kiyaraaggarwal.com/', 'Mozilla/5.0 (Linux; U; Android 6.0.1; en-US; Moto E Build/MOB31E) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.9.0.731 U3/0.8.0 Mobile Safari/534.30', 0),
(678, '', '', '2016-09-18', '00:28:04', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(679, '', '', '2016-09-18', '00:29:10', '124.124.42.72', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(680, '', '', '2016-09-18', '00:34:13', '47.247.80.14', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; iBall Slide Avonte-7 Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.0.0.828 U3/0.8.0 Mobile Safari/534.30', 0),
(681, '', '', '2016-09-18', '00:39:29', '47.247.152.213', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(682, '', '', '2016-09-18', '00:39:40', '47.247.152.213', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(683, '', '', '2016-09-18', '00:41:28', '47.247.152.213', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(684, '', '', '2016-09-18', '00:41:55', '47.247.152.213', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(685, '', '', '2016-09-18', '00:53:01', '47.247.152.213', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(686, '', '', '2016-09-18', '01:00:11', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php?name=pankaj+rajak&email=rishabhjshw67%40gmail.com&subject=testing&message=final+checkup&submit=submit', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(687, '', '', '2016-09-18', '01:11:18', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php?name=pankaj+rajak&email=rishabhjshw67%40gmail.com&subject=testing&message=final+checkup&submit=submit', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(688, '', '', '2016-09-18', '01:12:31', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php?name=pankaj+rajak&email=rishabhjshw67%40gmail.com&subject=testing&message=final+checkup&submit=submit', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(689, '', '', '2016-09-18', '01:13:48', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php?name=pankaj+rajak&email=rishabhjshw67%40gmail.com&subject=testing&message=final+checkup&submit=submit', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(690, '', '', '2016-09-18', '01:16:30', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php?name=pankaj+rajak&email=rishabhjshw67%40gmail.com&subject=testing&message=final+checkup&submit=submit', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(691, '', '', '2016-09-18', '01:28:51', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(692, '', '', '2016-09-18', '01:30:20', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(693, '', '', '2016-09-18', '03:02:39', '47.247.152.213', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(694, '', '', '2016-09-18', '07:09:42', '206.207.117.163', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.134 Safari/537.36', 0),
(695, '', '', '2016-09-18', '12:29:50', '122.175.155.166', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(696, '', '', '2016-09-18', '12:30:17', '122.175.155.166', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(697, '', '', '2016-09-18', '13:26:39', '122.175.218.140', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(698, '', '', '2016-09-18', '16:03:32', '122.175.155.166', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(699, '', '', '2016-09-18', '16:04:15', '122.175.155.166', '/index.php', '', 'http://www.kiyaraaggarwal.com/', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(700, '', '', '2016-09-18', '16:04:28', '122.175.155.166', '/index.php', '', 'http://www.kiyaraaggarwal.com/', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(701, '', '', '2016-09-18', '16:05:13', '122.175.155.166', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(702, '', '', '2016-09-18', '16:07:53', '122.175.155.166', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(703, '', '', '2016-09-18', '16:47:50', '122.175.155.166', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(704, '', '', '2016-09-18', '16:48:58', '122.175.155.166', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(705, '', '', '2016-09-18', '16:52:26', '122.175.155.166', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(706, '', '', '2016-09-18', '16:55:54', '122.175.155.166', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(707, '', '', '2016-09-18', '17:15:58', '122.175.155.166', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(708, '', '', '2016-09-18', '17:19:31', '122.175.155.166', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(709, '', '', '2016-09-18', '17:51:29', '122.175.155.166', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(710, '', '', '2016-09-18', '19:02:45', '122.175.155.166', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.1.2; en-us; LG-F200/-20 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 0),
(711, '', '', '2016-09-18', '20:21:56', '14.139.61.197', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Linux; Android 6.0; XT1572 Build/MPHS24.49-18-4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(712, '', '', '2016-09-18', '22:28:53', '122.175.170.15', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(713, '', '', '2016-09-18', '23:06:43', '122.175.170.15', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(714, '', '', '2016-09-19', '01:35:17', '47.247.252.140', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(715, '', '', '2016-09-19', '01:37:42', '47.247.252.140', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(716, '', '', '2016-09-19', '02:35:03', '122.175.218.140', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 0),
(717, '', '', '2016-09-19', '03:11:12', '95.65.30.156', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 0),
(718, '', '', '2016-09-19', '09:27:06', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(719, '', '', '2016-09-19', '11:39:47', '182.77.69.204', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(720, '', '', '2016-09-19', '15:11:30', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(721, '', '', '2016-09-19', '18:59:45', '47.247.4.234', '/index.php', '', 'android-app://com.google.android.googlequicksearchbox', 'Mozilla/5.0 (Linux; Android 6.0.1; ONE A2003 Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(722, '', '', '2016-09-19', '23:29:48', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(723, '', '', '2016-09-20', '04:10:04', '38.99.82.191', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Qt/4.7.1 Safari/533.3', 0),
(724, '', '', '2016-09-20', '05:33:07', '38.99.82.191', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Qt/4.7.1 Safari/533.3', 0),
(725, '', '', '2016-09-20', '06:58:11', '62.210.80.20', '/index.php', '', 'no referer', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:28.0) Gecko/20100101 Firefox/28.0', 0),
(726, '', '', '2016-09-20', '07:23:09', '38.99.82.191', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Qt/4.7.1 Safari/533.3', 0),
(727, '', '', '2016-09-20', '08:02:53', '38.99.82.192', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Qt/4.7.1 Safari/533.3', 0),
(728, '', '', '2016-09-20', '09:11:47', '38.99.82.191', '/index.php', '', 'no referer', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Qt/4.7.1 Safari/533.3', 0),
(729, '', '', '2016-09-20', '14:26:27', '47.247.246.149', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.1.2; en-us; LG-F200/-20 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 0),
(730, '', '', '2016-09-20', '20:28:48', '66.249.69.119', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(731, '', '', '2016-09-20', '22:39:25', '66.249.69.83', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(732, '', '', '2016-09-20', '23:03:11', '47.247.236.38', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0);
INSERT INTO `visitor_tracker` (`id`, `country`, `city`, `date`, `time`, `ip`, `web_page`, `query_string`, `http_referer`, `http_user_agent`, `is_bot`) VALUES
(733, '', '', '2016-09-20', '23:05:00', '47.247.236.38', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(734, '', '', '2016-09-21', '03:13:08', '66.249.69.83', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(735, '', '', '2016-09-21', '07:14:41', '206.207.117.168', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0', 0),
(736, '', '', '2016-09-21', '08:28:06', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(737, '', '', '2016-09-21', '11:11:53', '182.77.75.99', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(738, '', '', '2016-09-21', '11:40:13', '182.77.75.99', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(739, '', '', '2016-09-21', '14:09:23', '182.77.75.99', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(740, '', '', '2016-09-21', '15:41:00', '122.168.138.92', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(741, '', '', '2016-09-21', '15:41:59', '122.168.138.92', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(742, '', '', '2016-09-21', '15:42:47', '122.168.138.92', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(743, '', '', '2016-09-21', '15:43:29', '122.168.138.92', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(744, '', '', '2016-09-21', '15:45:16', '122.168.138.92', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(745, '', '', '2016-09-21', '17:52:16', '122.168.138.92', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(746, '', '', '2016-09-21', '17:53:05', '122.168.138.92', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(747, '', '', '2016-09-21', '17:54:56', '82.145.221.128', '/index.php', '', 'http://www.google.co.in/search?client=ms-opera-mobile&channel=new&ei=BnziV_H-GcT6afXHl5AL&q=kiyara+aggarwal.com&oq=kiyara+aggarwal.com&gs_l=mobile-gws-serp.3...6927.8026.0.8522.4.4.0.0.0.0.662.1487.3-1j1j1.3.0....0...1.1.64.mobile-gws-serp..1.1.449...0i13', 'Mozilla/5.0 (Linux; Android 4.3; NokiaX2DS Build/JLS36C) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Mobile Safari/537.36 OPR/21.0.1437.75439', 0),
(748, '', '', '2016-09-21', '17:55:13', '122.168.138.92', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(749, '', '', '2016-09-21', '17:55:47', '82.145.221.128', '/index.php', '', 'http://www.google.co.in/search?client=ms-opera-mobile&channel=new&ei=BnziV_H-GcT6afXHl5AL&q=kiyara+aggarwal.com&oq=kiyara+aggarwal.com&gs_l=mobile-gws-serp.3...6927.8026.0.8522.4.4.0.0.0.0.662.1487.3-1j1j1.3.0....0...1.1.64.mobile-gws-serp..1.1.449...0i13', 'Mozilla/5.0 (Linux; Android 4.3; NokiaX2DS Build/JLS36C) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Mobile Safari/537.36 OPR/21.0.1437.75439', 0),
(750, '', '', '2016-09-21', '17:57:33', '122.168.138.92', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(751, '', '', '2016-09-21', '17:58:28', '122.168.138.92', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(752, '', '', '2016-09-21', '18:22:33', '122.168.138.92', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(753, '', '', '2016-09-21', '18:33:43', '66.102.6.106', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.2.1; en-us; Nexus 5 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko; googleweblight) Chrome/38.0.1025.166 Mobile Safari/535.19', 0),
(754, '', '', '2016-09-21', '18:33:43', '66.102.6.104', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 4.2.1; en-us; Nexus 5 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko; googleweblight) Chrome/38.0.1025.166 Mobile Safari/535.19', 0),
(755, '', '', '2016-09-21', '18:33:51', '122.168.138.92', '/index.php', '', 'http://googleweblight.com/?lite_url=http://www.kiyaraaggarwal.com/index.php&ei=5udBLcU-&lc=en-IN&s=1&m=465&host=www.google.co.in&ts=1474463011&sig=AKOVD67mVGOg_P7lvKlzf7h_24LLkmL3WA', 'Mozilla/5.0(Linux; Android 4.4.2; Micromax A102 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36', 0),
(756, '', '', '2016-09-21', '18:33:52', '66.102.6.108', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 4.2.1; en-us; Nexus 5 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko; googleweblight) Chrome/38.0.1025.166 Mobile Safari/535.19', 0),
(757, '', '', '2016-09-21', '18:34:28', '122.168.138.92', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0(Linux; Android 4.4.2; Micromax A102 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36', 0),
(758, '', '', '2016-09-21', '18:34:43', '122.168.138.92', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0(Linux; Android 4.4.2; Micromax A102 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36', 0),
(759, '', '', '2016-09-21', '19:05:28', '122.168.138.92', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(760, '', '', '2016-09-21', '19:18:34', '122.168.138.92', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0(Linux; Android 4.4.2; Micromax A102 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36', 0),
(761, '', '', '2016-09-21', '19:18:36', '122.168.138.92', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0(Linux; Android 4.4.2; Micromax A102 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36', 0),
(762, '', '', '2016-09-21', '19:22:49', '122.168.138.92', '/index.php', '', 'http://www.kiyaraaggarwal.com/index.php', 'Mozilla/5.0(Linux; Android 4.4.2; Micromax A102 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36', 0),
(763, '', '', '2016-09-21', '19:38:11', '157.55.39.185', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 0),
(764, '', '', '2016-09-21', '19:53:39', '122.168.138.92', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(765, '', '', '2016-09-21', '23:31:20', '47.247.55.222', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 4.1.2; LG-F200 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Mobile Safari/537.36', 0),
(766, '', '', '2016-09-22', '00:15:57', '47.247.55.222', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(767, '', '', '2016-09-22', '00:19:17', '47.247.55.222', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(768, '', '', '2016-09-22', '00:21:50', '47.247.55.222', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(769, '', '', '2016-09-22', '00:24:31', '47.247.55.222', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(770, '', '', '2016-09-22', '00:40:50', '47.247.55.222', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(771, '', '', '2016-09-22', '00:43:15', '47.247.55.222', '/index.php', '', 'http://www.kiyaraaggarwal.com/gallery.php', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(772, '', '', '2016-09-22', '01:50:51', '103.46.192.6', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 5.1.1; en-gb; 2014818 Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/46.0.2490.85 Mobile Safari/537.36 XiaoMi/MiuiBrowser/2.1.1', 0),
(773, '', '', '2016-09-22', '01:53:43', '103.46.192.6', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 5.1.1; en-gb; 2014818 Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/46.0.2490.85 Mobile Safari/537.36 XiaoMi/MiuiBrowser/2.1.1', 0),
(774, '', '', '2016-09-22', '13:07:22', '171.49.137.253', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(775, '', '', '2016-09-22', '13:18:01', '171.49.137.253', '/index.php', '', 'http://kiyaraaggarwal.com/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(776, '', '', '2016-09-22', '15:53:11', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(777, '', '', '2016-09-22', '18:51:19', '66.249.79.123', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(778, '', '', '2016-09-22', '20:05:12', '157.55.39.185', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 0),
(779, '', '', '2016-09-22', '22:08:39', '173.252.102.117', '/index.php', '', 'no referer', 'facebookexternalhit/1.1', 0),
(780, '', '', '2016-09-22', '22:08:40', '66.220.145.244', '/index.php', '', 'http://l.facebook.com/lsr.php?u=http%3A%2F%2Fwww.kiyaraaggarwal.com%2F&ext=1474562619&hash=AcmlJu0g0LanxUDA9g5gYBhCbFrTXlKfdqoniN1e8l4L9w', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(781, '', '', '2016-09-22', '22:09:14', '173.252.90.91', '/index.php', '', 'no referer', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 0),
(782, '', '', '2016-09-22', '22:09:16', '183.83.228.147', '/index.php', '', 'http://m.facebook.com', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_0_1 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) Mobile/14A403 [FBAN/MessengerForiOS;FBAV/88.0.0.27.69;FBBV/38853002;FBRV/0;FBDV/iPhone6,2;FBMD/iPhone;FBSN/iOS;FBSV/10.0.1;FBSS/2;FBCR/Carrier;FBID/phone;FBL', 0),
(783, '', '', '2016-09-22', '22:55:23', '183.83.228.147', '/index.php', '', 'no referer', 'WhatsApp/2.16.10/i', 0),
(784, '', '', '2016-09-23', '00:34:29', '107.77.70.15', '/index.php', '', 'no referer', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13F69 Safari/601.1', 0),
(785, '', '', '2016-09-23', '00:34:46', '107.77.70.15', '/index.php', '', 'http://www.kiyaraaggarwal.com/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13F69 Safari/601.1', 0),
(786, '', '', '2016-09-23', '00:34:48', '107.77.70.15', '/index.php', '', 'http://www.kiyaraaggarwal.com/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13F69 Safari/601.1', 0),
(787, '', '', '2016-09-23', '01:09:26', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(788, '', '', '2016-09-23', '05:53:20', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(789, '', '', '2016-09-23', '06:10:34', '103.46.192.6', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_0 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) Version/10.0 Mobile/14A5346a Safari/602.1', 0),
(790, '', '', '2016-09-23', '07:14:37', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(791, '', '', '2016-09-23', '09:49:00', '103.41.96.94', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-G925I Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/4.0 Chrome/44.0.2403.133 Mobile Safari/537.36', 0),
(792, '', '', '2016-09-23', '09:49:54', '183.83.228.147', '/index.php', '', 'no referer', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_0_1 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) Version/10.0 Mobile/14A403 Safari/602.1', 0),
(793, '', '', '2016-09-23', '09:52:16', '103.41.96.94', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-G925I Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/4.0 Chrome/44.0.2403.133 Mobile Safari/537.36', 0),
(794, '', '', '2016-09-23', '09:57:05', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(795, '', '', '2016-09-23', '10:19:49', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(796, '', '', '2016-09-23', '10:56:47', '103.41.96.94', '/index.php', '', 'https://www.google.co.in/', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(797, '', '', '2016-09-23', '10:58:07', '103.41.96.94', '/index.php', '', 'http://www.kiyaraaggarwal.com/contact.php', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(798, '', '', '2016-09-23', '14:15:13', '171.61.35.249', '/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-gb; GT-P7500 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 0),
(799, '', '', '2016-09-23', '15:34:57', '183.83.228.147', '/index.php', '', 'no referer', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_0_1 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) Version/10.0 Mobile/14A403 Safari/602.1', 0),
(800, '', '', '2016-09-23', '15:54:34', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(801, '', '', '2016-09-23', '17:19:31', '171.61.35.249', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(802, '', '', '2016-09-23', '17:25:23', '171.61.35.249', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(803, '', '', '2016-09-23', '18:05:59', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(804, '', '', '2016-09-23', '20:59:42', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(805, '', '', '2016-09-23', '21:03:28', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(806, '', '', '2016-09-23', '22:25:09', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(807, '', '', '2016-09-23', '23:06:05', '66.249.79.123', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(808, '', '', '2016-09-23', '23:48:58', '47.247.53.7', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(809, '', '', '2016-09-23', '23:51:09', '47.247.53.7', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(810, '', '', '2016-09-24', '01:40:14', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(811, '', '', '2016-09-24', '02:44:18', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(812, '', '', '2016-09-24', '10:54:31', '182.77.66.96', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(813, '', '', '2016-09-24', '10:59:33', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(814, '', '', '2016-09-24', '13:42:46', '182.77.66.96', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(815, '', '', '2016-09-24', '13:42:46', '182.77.66.96', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(816, '', '', '2016-09-24', '13:53:32', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(817, '', '', '2016-09-24', '14:35:10', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(818, '', '', '2016-09-24', '16:09:45', '66.249.79.119', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(819, '', '', '2016-09-24', '16:47:11', '139.59.149.57', '/index.php', '', 'https://freevpn.ninja/', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 0),
(820, '', '', '2016-09-24', '18:06:01', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(821, '', '', '2016-09-24', '20:24:49', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(822, '', '', '2016-09-24', '20:54:17', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(823, '', '', '2016-09-25', '03:33:30', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(824, '', '', '2016-09-25', '05:28:18', '66.249.79.146', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(825, '', '', '2016-09-25', '06:20:32', '66.249.79.150', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(826, '', '', '2016-09-25', '14:43:52', '66.249.79.142', '/index.php', '', 'no referer', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 0),
(827, '', '', '2016-09-25', '22:01:27', '192.99.10.173', '/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 0),
(828, '', '', '2016-09-26', '11:11:05', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(829, '', '', '2016-09-26', '11:16:19', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(830, '', '', '2016-09-26', '11:22:59', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(831, '', '', '2016-09-26', '11:28:46', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(832, '', '', '2016-09-26', '11:29:26', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(833, '', '', '2016-09-26', '11:30:33', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(834, '', '', '2016-09-26', '11:37:13', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(835, '', '', '2016-09-26', '11:37:49', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(836, '', '', '2016-09-26', '11:38:00', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(837, '', '', '2016-09-26', '11:38:17', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(838, '', '', '2016-09-26', '11:47:11', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(839, '', '', '2016-09-26', '11:48:51', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(840, '', '', '2016-09-26', '11:51:30', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(841, '', '', '2016-09-26', '11:53:39', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(842, '', '', '2016-09-26', '11:57:29', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(843, '', '', '2016-09-26', '11:58:43', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(844, '', '', '2016-09-26', '12:00:10', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(845, '', '', '2016-09-26', '12:05:31', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(846, '', '', '2016-09-26', '12:07:02', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(847, '', '', '2016-09-26', '12:07:46', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(848, '', '', '2016-09-26', '12:10:45', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(849, '', '', '2016-09-26', '12:11:58', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(850, '', '', '2016-09-26', '12:12:19', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(851, '', '', '2016-09-26', '12:13:22', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(852, '', '', '2016-09-26', '12:13:41', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(853, '', '', '2016-09-26', '12:14:29', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(854, '', '', '2016-09-26', '12:15:15', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(855, '', '', '2016-09-26', '12:15:46', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(856, '', '', '2016-09-26', '12:16:01', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(857, '', '', '2016-09-26', '12:19:24', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(858, '', '', '2016-09-26', '12:20:27', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(859, '', '', '2016-09-26', '12:21:42', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(860, '', '', '2016-09-26', '12:22:42', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(861, '', '', '2016-09-26', '12:24:11', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(862, '', '', '2016-09-26', '12:35:21', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(863, '', '', '2016-09-26', '12:36:08', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(864, '', '', '2016-09-26', '12:37:06', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(865, '', '', '2016-09-26', '12:39:05', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(866, '', '', '2016-09-26', '12:39:57', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(867, '', '', '2016-09-26', '13:51:07', '::1', '/kiyaraggarwal/index.php', '', 'http://localhost/kiyaraggarwal/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(868, '', '', '2016-09-26', '13:52:01', '::1', '/kiyaraggarwal/index.php', '', 'http://localhost/kiyaraggarwal/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(869, '', '', '2016-09-26', '13:52:26', '::1', '/kiyaraggarwal/index.php', '', 'http://localhost/kiyaraggarwal/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(870, '', '', '2016-09-26', '13:52:52', '::1', '/kiyaraggarwal/index.php', '', 'http://localhost/kiyaraggarwal/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(871, '', '', '2016-09-26', '13:53:20', '::1', '/kiyaraggarwal/index.php', '', 'http://localhost/kiyaraggarwal/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(872, '', '', '2016-09-26', '13:54:21', '::1', '/kiyaraggarwal/index.php', '', 'http://localhost/kiyaraggarwal/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(873, '', '', '2016-09-26', '18:32:37', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(874, '', '', '2016-09-26', '20:25:44', '::1', '/amitjaiswal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(875, '', '', '2016-09-26', '20:25:50', '::1', '/amitjaiswal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(876, '', '', '2016-09-26', '20:26:38', '::1', '/amitjaiswal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(877, '', '', '2016-09-26', '20:45:08', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(878, '', '', '2016-09-26', '20:50:31', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(879, '', '', '2016-09-28', '06:23:38', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(880, '', '', '2016-09-28', '06:23:48', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(881, '', '', '2016-09-29', '19:40:16', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(882, '', '', '2016-09-29', '19:41:21', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(883, '', '', '2016-09-29', '19:49:32', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(884, '', '', '2016-09-29', '19:56:38', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(885, '', '', '2016-09-29', '19:56:55', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(886, '', '', '2016-09-29', '19:57:36', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(887, '', '', '2016-09-29', '19:58:02', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(888, '', '', '2016-09-29', '20:01:29', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(889, '', '', '2016-09-29', '20:02:35', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(890, '', '', '2016-09-29', '20:03:01', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(891, '', '', '2016-09-29', '20:05:35', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(892, '', '', '2016-09-29', '20:05:51', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(893, '', '', '2016-09-29', '20:06:34', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(894, '', '', '2016-09-29', '20:07:03', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36', 0),
(895, '', '', '2016-09-29', '20:13:35', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(896, '', '', '2016-09-29', '21:19:05', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(897, '', '', '2016-09-30', '14:42:00', '::1', '/kiyaraggarwal/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(898, '', '', '2016-10-02', '16:34:58', '::1', '/mspraviteja/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(899, '', '', '2016-10-02', '16:37:10', '::1', '/mspraviteja/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 0),
(900, '', '', '2017-01-27', '21:16:12', '::1', '/mspraviteja/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(901, '', '', '2017-01-28', '12:55:21', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(902, '', '', '2017-01-28', '12:57:21', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(903, '', '', '2017-01-28', '13:06:22', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(904, '', '', '2017-01-28', '13:06:37', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(905, '', '', '2017-01-28', '13:07:05', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(906, '', '', '2017-01-28', '13:07:17', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(907, '', '', '2017-01-28', '13:11:09', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(908, '', '', '2017-01-28', '13:11:28', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/gallery.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(909, '', '', '2017-01-28', '13:12:05', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(910, '', '', '2017-01-28', '13:12:09', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(911, '', '', '2017-01-28', '13:15:29', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(912, '', '', '2017-01-28', '17:44:16', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(913, '', '', '2017-01-28', '20:33:05', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(914, '', '', '2017-02-08', '17:29:59', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(915, '', '', '2017-02-08', '20:51:40', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 0),
(916, '', '', '2017-02-10', '17:00:41', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(917, '', '', '2017-02-11', '11:30:29', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(918, '', '', '2017-02-11', '11:30:54', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(919, '', '', '2017-02-11', '11:52:50', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(920, '', '', '2017-02-11', '12:00:56', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(921, '', '', '2017-02-11', '12:01:13', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(922, '', '', '2017-02-11', '12:01:15', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(923, '', '', '2017-02-11', '12:02:29', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(924, '', '', '2017-02-11', '12:03:11', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(925, '', '', '2017-02-11', '12:03:11', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(926, '', '', '2017-02-11', '12:10:09', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(927, '', '', '2017-02-11', '12:10:55', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(928, '', '', '2017-02-11', '12:10:57', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(929, '', '', '2017-02-11', '12:10:57', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(930, '', '', '2017-02-11', '12:11:37', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(931, '', '', '2017-02-11', '12:12:02', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(932, '', '', '2017-02-11', '12:12:02', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(933, '', '', '2017-02-11', '12:12:58', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(934, '', '', '2017-02-11', '12:13:05', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(935, '', '', '2017-02-11', '12:14:42', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(936, '', '', '2017-02-11', '12:15:46', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(937, '', '', '2017-02-11', '12:17:02', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(938, '', '', '2017-02-11', '12:17:19', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(939, '', '', '2017-02-11', '12:17:45', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(940, '', '', '2017-02-11', '12:18:31', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(941, '', '', '2017-02-11', '12:18:53', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(942, '', '', '2017-02-11', '12:24:49', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(943, '', '', '2017-02-11', '12:25:08', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(944, '', '', '2017-02-11', '12:26:00', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(945, '', '', '2017-02-11', '12:26:14', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(946, '', '', '2017-02-11', '12:26:34', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(947, '', '', '2017-02-11', '12:27:30', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(948, '', '', '2017-02-11', '12:27:47', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(949, '', '', '2017-02-11', '12:27:58', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(950, '', '', '2017-02-11', '12:28:55', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(951, '', '', '2017-02-11', '12:29:07', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(952, '', '', '2017-02-11', '12:29:23', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(953, '', '', '2017-02-11', '12:30:16', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(954, '', '', '2017-02-11', '12:30:48', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(955, '', '', '2017-02-11', '12:31:51', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(956, '', '', '2017-02-11', '12:31:56', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(957, '', '', '2017-02-11', '12:33:37', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(958, '', '', '2017-02-11', '12:43:30', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(959, '', '', '2017-02-11', '12:44:43', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(960, '', '', '2017-02-11', '12:45:16', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(961, '', '', '2017-02-11', '12:45:43', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(962, '', '', '2017-02-11', '12:46:51', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(963, '', '', '2017-02-11', '12:47:00', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(964, '', '', '2017-02-11', '12:47:23', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(965, '', '', '2017-02-11', '12:48:19', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(966, '', '', '2017-02-11', '12:52:42', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(967, '', '', '2017-02-11', '12:54:26', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(968, '', '', '2017-02-11', '12:54:42', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(969, '', '', '2017-02-11', '12:54:44', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(970, '', '', '2017-02-11', '12:54:52', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/gallery.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(971, '', '', '2017-02-11', '14:32:49', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=13', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0);
INSERT INTO `visitor_tracker` (`id`, `country`, `city`, `date`, `time`, `ip`, `web_page`, `query_string`, `http_referer`, `http_user_agent`, `is_bot`) VALUES
(972, '', '', '2017-02-11', '14:33:11', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=13', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(973, '', '', '2017-02-11', '14:33:23', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=12', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(974, '', '', '2017-02-11', '14:50:05', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/about.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(975, '', '', '2017-02-11', '14:50:10', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=13', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(976, '', '', '2017-02-11', '14:50:31', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=13', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(977, '', '', '2017-02-11', '14:51:44', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(978, '', '', '2017-02-11', '14:51:55', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(979, '', '', '2017-02-11', '14:52:17', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/contact.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(980, '', '', '2017-02-11', '17:22:34', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=13', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(981, '', '', '2017-02-11', '17:25:10', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=13', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(982, '', '', '2017-02-11', '17:25:11', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(983, '', '', '2017-02-11', '17:25:15', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(984, '', '', '2017-02-11', '17:25:16', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(985, '', '', '2017-02-11', '17:25:17', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(986, '', '', '2017-02-11', '17:25:18', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(987, '', '', '2017-02-11', '17:25:19', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(988, '', '', '2017-02-11', '17:25:20', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(989, '', '', '2017-02-11', '17:25:20', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(990, '', '', '2017-02-11', '17:25:29', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(991, '', '', '2017-02-11', '17:25:31', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(992, '', '', '2017-02-11', '17:26:37', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(993, '', '', '2017-02-11', '17:26:40', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(994, '', '', '2017-02-11', '17:26:42', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(995, '', '', '2017-02-11', '17:26:43', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(996, '', '', '2017-02-11', '17:26:45', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(997, '', '', '2017-02-11', '17:27:55', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(998, '', '', '2017-02-11', '17:27:58', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(999, '', '', '2017-02-11', '17:28:03', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1000, '', '', '2017-02-11', '17:28:05', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1001, '', '', '2017-02-11', '17:28:06', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1002, '', '', '2017-02-11', '17:28:28', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1003, '', '', '2017-02-11', '17:29:31', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1004, '', '', '2017-02-11', '17:29:44', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1005, '', '', '2017-02-11', '17:30:13', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1006, '', '', '2017-02-11', '17:31:36', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1007, '', '', '2017-02-11', '17:31:41', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1008, '', '', '2017-02-11', '17:31:45', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1009, '', '', '2017-02-11', '17:32:13', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1010, '', '', '2017-02-11', '17:32:15', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1011, '', '', '2017-02-11', '17:32:17', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1012, '', '', '2017-02-11', '17:32:45', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1013, '', '', '2017-02-11', '17:34:40', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1014, '', '', '2017-02-11', '17:37:12', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1015, '', '', '2017-02-13', '11:15:41', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1016, '', '', '2017-02-13', '13:19:30', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1017, '', '', '2017-02-13', '13:19:31', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1018, '', '', '2017-02-13', '13:29:39', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1019, '', '', '2017-02-13', '13:29:53', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1020, '', '', '2017-02-13', '13:29:55', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1021, '', '', '2017-02-13', '17:04:55', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1022, '', '', '2017-02-13', '17:05:03', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1023, '', '', '2017-02-13', '17:06:42', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1024, '', '', '2017-02-13', '17:06:45', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1025, '', '', '2017-02-13', '17:07:54', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1026, '', '', '2017-02-13', '17:08:09', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1027, '', '', '2017-02-13', '17:09:37', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1028, '', '', '2017-02-13', '17:09:40', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1029, '', '', '2017-02-13', '17:09:41', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1030, '', '', '2017-02-13', '17:15:54', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1031, '', '', '2017-02-13', '17:15:56', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1032, '', '', '2017-02-13', '17:20:45', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1033, '', '', '2017-02-13', '17:20:46', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1034, '', '', '2017-02-13', '17:21:39', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1035, '', '', '2017-02-13', '17:21:40', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1036, '', '', '2017-02-13', '17:21:48', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1037, '', '', '2017-02-13', '17:24:56', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1038, '', '', '2017-02-13', '17:24:57', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1039, '', '', '2017-02-13', '17:26:38', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1040, '', '', '2017-02-13', '17:26:40', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1041, '', '', '2017-02-13', '17:27:13', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1042, '', '', '2017-02-13', '17:28:41', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1043, '', '', '2017-02-13', '17:28:45', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1044, '', '', '2017-02-13', '17:41:33', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1045, '', '', '2017-02-13', '17:46:03', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1046, '', '', '2017-02-13', '18:12:01', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1047, '', '', '2017-02-13', '18:12:06', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1048, '', '', '2017-02-13', '18:13:41', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1049, '', '', '2017-02-13', '18:13:42', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1050, '', '', '2017-02-13', '18:15:24', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1051, '', '', '2017-02-13', '18:15:25', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1052, '', '', '2017-02-13', '18:16:10', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1053, '', '', '2017-02-13', '18:16:11', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1054, '', '', '2017-02-13', '18:16:22', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1055, '', '', '2017-02-13', '18:16:24', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1056, '', '', '2017-02-13', '18:16:53', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1057, '', '', '2017-02-13', '18:17:45', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1058, '', '', '2017-02-13', '18:17:46', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1059, '', '', '2017-02-13', '18:18:19', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1060, '', '', '2017-02-13', '18:18:20', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1061, '', '', '2017-02-13', '19:12:05', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=MTYtNi0xMy8wMi8yMDE3', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1062, '', '', '2017-02-13', '19:12:09', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=MTYtNi0xMy8wMi8yMDE3', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1063, '', '', '2017-02-13', '20:28:37', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=MTctNi0xMy8wMi8yMDE3', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1064, '', '', '2017-02-13', '20:28:42', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=MTctNi0xMy8wMi8yMDE3', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1065, '', '', '2017-02-13', '20:28:44', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=MTctNi0xMy8wMi8yMDE3', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1066, '', '', '2017-02-13', '20:28:56', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1067, '', '', '2017-02-13', '20:31:31', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=MTgtNi0xMy8wMi8yMDE3', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1068, '', '', '2017-02-13', '20:31:32', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=MTgtNi0xMy8wMi8yMDE3', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1069, '', '', '2017-02-13', '20:49:44', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=MTgtNi0xMy8wMi8yMDE3', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1070, '', '', '2017-02-13', '20:59:13', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20index:%20id%20in%20%3Cb%3EC:xampphtdocsgabbarpaymentinvalid_trans.php%3C/b%3E%20on%20line%20%3Cb%3E24%3C/b%3E%3Cbr%20/%3E', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1071, '', '', '2017-02-13', '21:12:17', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20index:%20id%20in%20%3Cb%3EC:xampphtdocsgabbarpaymentinvalid_trans.php%3C/b%3E%20on%20line%20%3Cb%3E24%3C/b%3E%3Cbr%20/%3E', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1072, '', '', '2017-02-13', '21:12:20', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20index:%20id%20in%20%3Cb%3EC:xampphtdocsgabbarpaymentinvalid_trans.php%3C/b%3E%20on%20line%20%3Cb%3E24%3C/b%3E%3Cbr%20/%3E', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1073, '', '', '2017-02-13', '21:12:31', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20index:%20id%20in%20%3Cb%3EC:xampphtdocsgabbarpaymentinvalid_trans.php%3C/b%3E%20on%20line%20%3Cb%3E24%3C/b%3E%3Cbr%20/%3E', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1074, '', '', '2017-02-13', '21:13:25', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20index:%20id%20in%20%3Cb%3EC:xampphtdocsgabbarpaymentinvalid_trans.php%3C/b%3E%20on%20line%20%3Cb%3E24%3C/b%3E%3Cbr%20/%3E', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1075, '', '', '2017-02-13', '21:13:43', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20index:%20id%20in%20%3Cb%3EC:xampphtdocsgabbarpaymentinvalid_trans.php%3C/b%3E%20on%20line%20%3Cb%3E24%3C/b%3E%3Cbr%20/%3E', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1076, '', '', '2017-02-13', '21:13:50', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20index:%20id%20in%20%3Cb%3EC:xampphtdocsgabbarpaymentinvalid_trans.php%3C/b%3E%20on%20line%20%3Cb%3E24%3C/b%3E%3Cbr%20/%3E', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1077, '', '', '2017-02-13', '21:14:39', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20index:%20id%20in%20%3Cb%3EC:xampphtdocsgabbarpaymentinvalid_trans.php%3C/b%3E%20on%20line%20%3Cb%3E24%3C/b%3E%3Cbr%20/%3E', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1078, '', '', '2017-02-13', '21:14:50', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20index:%20id%20in%20%3Cb%3EC:xampphtdocsgabbarpaymentinvalid_trans.php%3C/b%3E%20on%20line%20%3Cb%3E24%3C/b%3E%3Cbr%20/%3E', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1079, '', '', '2017-02-17', '20:58:08', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1080, '', '', '2017-02-17', '21:09:00', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1081, '', '', '2017-02-17', '21:23:29', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1082, '', '', '2017-02-17', '21:24:17', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=4', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1083, '', '', '2017-02-17', '21:24:27', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=3', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1084, '', '', '2017-02-17', '21:24:32', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=2', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1085, '', '', '2017-02-17', '21:24:43', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1086, '', '', '2017-02-18', '11:16:33', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1087, '', '', '2017-02-18', '11:17:55', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1088, '', '', '2017-02-18', '12:32:17', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=5', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1089, '', '', '2017-02-18', '12:32:30', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=5', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1090, '', '', '2017-02-18', '18:12:38', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1091, '', '', '2017-02-18', '20:32:13', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=5', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1092, '', '', '2017-02-18', '20:32:32', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=17', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1093, '', '', '2017-02-18', '20:34:02', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=17', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1094, '', '', '2017-02-18', '20:38:58', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=17', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1095, '', '', '2017-02-18', '20:40:24', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=17', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1096, '', '', '2017-02-18', '20:41:06', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=17', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1097, '', '', '2017-02-18', '20:41:33', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=17', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1098, '', '', '2017-02-18', '20:42:20', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=17', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1099, '', '', '2017-02-18', '20:42:48', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1100, '', '', '2017-02-18', '20:43:06', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1101, '', '', '2017-02-18', '20:43:25', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1102, '', '', '2017-02-18', '20:43:42', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1103, '', '', '2017-02-18', '20:44:37', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1104, '', '', '2017-02-18', '20:45:39', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1105, '', '', '2017-02-18', '20:46:44', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1106, '', '', '2017-02-18', '20:46:47', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1107, '', '', '2017-02-18', '20:46:53', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1108, '', '', '2017-02-18', '20:47:07', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1109, '', '', '2017-02-18', '20:47:24', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1110, '', '', '2017-02-18', '20:48:54', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1111, '', '', '2017-02-18', '20:49:14', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1112, '', '', '2017-02-18', '20:49:30', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1113, '', '', '2017-02-18', '20:49:37', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1114, '', '', '2017-02-18', '20:50:30', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=25', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1115, '', '', '2017-02-18', '20:50:47', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=25', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1116, '', '', '2017-02-18', '20:50:53', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=25', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1117, '', '', '2017-02-18', '20:50:59', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=20', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1118, '', '', '2017-02-18', '20:51:05', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=19', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1119, '', '', '2017-02-18', '21:22:06', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=19', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1120, '', '', '2017-02-18', '21:22:53', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1121, '', '', '2017-02-18', '21:26:03', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1122, '', '', '2017-02-18', '21:27:06', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1123, '', '', '2017-02-18', '21:27:33', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1124, '', '', '2017-02-20', '20:18:19', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1125, '', '', '2017-02-20', '20:21:58', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/payment/PayUMoney_form.php?id=MS0xLTIwLzAyLzIwMTc=', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1126, '', '', '2017-02-20', '20:22:08', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=20', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1127, '', '', '2017-02-20', '20:22:13', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=19', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1128, '', '', '2017-02-20', '20:22:17', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=17', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1129, '', '', '2017-02-20', '20:22:57', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1130, '', '', '2017-02-20', '21:53:49', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1131, '', '', '2017-02-20', '21:54:00', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=25', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1132, '', '', '2017-02-21', '19:58:44', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1133, '', '', '2017-02-21', '19:58:57', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1134, '', '', '2017-02-21', '20:04:07', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1135, '', '', '2017-02-21', '20:04:09', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1136, '', '', '2017-02-21', '20:06:36', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1137, '', '', '2017-02-21', '20:06:56', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1138, '', '', '2017-02-21', '20:08:35', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1139, '', '', '2017-02-21', '20:09:46', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1140, '', '', '2017-02-21', '20:09:49', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1141, '', '', '2017-02-21', '20:09:58', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1142, '', '', '2017-02-21', '20:10:52', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1143, '', '', '2017-02-21', '20:11:19', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1144, '', '', '2017-02-21', '20:11:44', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1145, '', '', '2017-02-21', '20:11:45', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/user/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1146, '', '', '2017-02-21', '20:16:30', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1147, '', '', '2017-02-21', '20:17:12', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1148, '', '', '2017-02-21', '20:17:18', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1149, '', '', '2017-02-21', '20:32:39', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1150, '', '', '2017-02-21', '20:33:23', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1151, '', '', '2017-02-21', '20:33:31', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1152, '', '', '2017-02-21', '20:33:34', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1153, '', '', '2017-02-21', '20:33:58', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1154, '', '', '2017-02-21', '20:34:40', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1155, '', '', '2017-02-21', '20:34:49', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1156, '', '', '2017-02-21', '20:35:16', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1157, '', '', '2017-02-21', '20:35:30', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1158, '', '', '2017-02-21', '20:37:00', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1159, '', '', '2017-02-21', '20:37:02', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1160, '', '', '2017-02-21', '20:37:25', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1161, '', '', '2017-02-21', '20:37:49', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1162, '', '', '2017-02-21', '20:38:58', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1163, '', '', '2017-02-21', '20:39:44', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1164, '', '', '2017-02-21', '20:40:09', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1165, '', '', '2017-02-21', '20:40:57', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1166, '', '', '2017-02-21', '20:41:13', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1167, '', '', '2017-02-21', '20:42:36', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1168, '', '', '2017-02-21', '20:43:05', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1169, '', '', '2017-02-21', '20:44:19', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1170, '', '', '2017-02-21', '20:46:01', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1171, '', '', '2017-02-21', '20:46:07', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1172, '', '', '2017-02-21', '20:46:23', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1173, '', '', '2017-02-21', '20:50:42', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1174, '', '', '2017-02-21', '20:51:28', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1175, '', '', '2017-02-21', '20:54:10', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1176, '', '', '2017-02-21', '20:56:04', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1177, '', '', '2017-02-21', '20:56:50', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1178, '', '', '2017-02-21', '20:57:33', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1179, '', '', '2017-02-21', '20:57:44', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1180, '', '', '2017-02-21', '20:58:24', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1181, '', '', '2017-02-21', '20:58:37', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1182, '', '', '2017-02-21', '20:58:58', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1183, '', '', '2017-02-21', '21:00:04', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1184, '', '', '2017-02-21', '21:02:01', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1185, '', '', '2017-02-21', '21:04:44', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1186, '', '', '2017-02-21', '21:04:58', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0);
INSERT INTO `visitor_tracker` (`id`, `country`, `city`, `date`, `time`, `ip`, `web_page`, `query_string`, `http_referer`, `http_user_agent`, `is_bot`) VALUES
(1187, '', '', '2017-02-21', '21:06:20', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1188, '', '', '2017-02-21', '21:06:30', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1189, '', '', '2017-02-21', '21:06:31', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/user/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1190, '', '', '2017-02-21', '21:06:31', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/user/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1191, '', '', '2017-02-21', '21:06:46', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1192, '', '', '2017-02-21', '21:06:50', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1193, '', '', '2017-02-21', '21:13:25', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1194, '', '', '2017-02-21', '21:13:35', '::1', '/gabbar/user/my-orders.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1195, '', '', '2017-02-21', '21:16:17', '::1', '/gabbar/user/my-orders.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1196, '', '', '2017-02-21', '21:16:39', '::1', '/gabbar/user/my-orders.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1197, '', '', '2017-02-21', '21:16:40', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1198, '', '', '2017-02-21', '21:16:42', '::1', '/gabbar/user/my-orders.php', '', 'http://localhost/gabbar/user/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1199, '', '', '2017-02-21', '21:17:13', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1200, '', '', '2017-02-21', '21:17:23', '::1', '/gabbar/user/my-orders.php', '', 'http://localhost/gabbar/user/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1201, '', '', '2017-02-21', '21:17:29', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1202, '', '', '2017-02-21', '21:20:49', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1203, '', '', '2017-02-21', '21:20:50', '::1', '/gabbar/user/my-orders.php', '', 'http://localhost/gabbar/user/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1204, '', '', '2017-02-21', '21:21:34', '::1', '/gabbar/user/order-detail.php', 'ono=339035', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1205, '', '', '2017-02-21', '21:22:39', '::1', '/gabbar/user/order-detail.php', 'ono=339035', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1206, '', '', '2017-02-21', '21:22:41', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/user/order-detail.php?ono=339035', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1207, '', '', '2017-02-21', '21:22:42', '::1', '/gabbar/user/my-orders.php', '', 'http://localhost/gabbar/user/index.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1208, '', '', '2017-02-21', '21:22:44', '::1', '/gabbar/user/order-detail.php', 'ono=339035', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1209, '', '', '2017-02-21', '21:23:45', '::1', '/gabbar/user/order-detail.php', 'ono=339035', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1210, '', '', '2017-02-21', '21:24:20', '::1', '/gabbar/user/order-detail.php', 'ono=339035', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1211, '', '', '2017-02-21', '21:24:33', '::1', '/gabbar/user/my-orders.php', '', 'http://localhost/gabbar/user/order-detail.php?ono=339035', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1212, '', '', '2017-02-21', '21:24:39', '::1', '/gabbar/user/order-detail.php', 'ono=920953', 'http://localhost/gabbar/user/my-orders.php', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1213, '', '', '2017-02-21', '21:24:44', '::1', '/gabbar/user/index.php', '', 'http://localhost/gabbar/user/order-detail.php?ono=920953', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1214, '', '', '2017-02-21', '21:49:16', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1215, '', '', '2017-02-21', '22:12:26', '::1', '/gabbar/index.php', '', 'http://localhost/gabbar/package-items.php?pkgid=25', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 0),
(1216, '', '', '2017-09-04', '09:33:55', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 0),
(1217, '', '', '2017-09-06', '20:59:38', '::1', '/gabbar/index.php', '', 'no referer', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`Login_Id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`Blogs_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `contact_email`
--
ALTER TABLE `contact_email`
  ADD PRIMARY KEY (`Contact_Id`);

--
-- Indexes for table `favicon`
--
ALTER TABLE `favicon`
  ADD PRIMARY KEY (`Toplogo_Id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`Footer_Id`);

--
-- Indexes for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `hits`
--
ALTER TABLE `hits`
  ADD KEY `pageid` (`pageid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Menu_Id`);

--
-- Indexes for table `nodupes`
--
ALTER TABLE `nodupes`
  ADD PRIMARY KEY (`ids_hash`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_Detail_Id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`Package_Id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`Pages_Id`),
  ADD KEY `Menu_Id` (`Menu_Id`);

--
-- Indexes for table `payment_gateway_detail`
--
ALTER TABLE `payment_gateway_detail`
  ADD PRIMARY KEY (`Payment_Gateway_Id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `social_icon`
--
ALTER TABLE `social_icon`
  ADD PRIMARY KEY (`Social_Id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`Title_Id`);

--
-- Indexes for table `toplogo`
--
ALTER TABLE `toplogo`
  ADD PRIMARY KEY (`Toplogo_Id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `visitor_tracker`
--
ALTER TABLE `visitor_tracker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `Login_Id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `Blogs_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contact_email`
--
ALTER TABLE `contact_email`
  MODIFY `Contact_Id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `favicon`
--
ALTER TABLE `favicon`
  MODIFY `Toplogo_Id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `Footer_Id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Menu_Id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_Detail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `Package_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `Pages_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment_gateway_detail`
--
ALTER TABLE `payment_gateway_detail`
  MODIFY `Payment_Gateway_Id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `Product_Id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `social_icon`
--
ALTER TABLE `social_icon`
  MODIFY `Social_Id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `Title_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `toplogo`
--
ALTER TABLE `toplogo`
  MODIFY `Toplogo_Id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visitor_tracker`
--
ALTER TABLE `visitor_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1218;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `page_fk_menu` FOREIGN KEY (`Menu_Id`) REFERENCES `menu` (`Menu_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
