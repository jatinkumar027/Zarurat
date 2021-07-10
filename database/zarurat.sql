-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 08:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zarurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_products`
--

CREATE TABLE `buyer_products` (
  `buyer_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_reg`
--

CREATE TABLE `buyer_reg` (
  `buyer_id` int(11) NOT NULL,
  `buyer_name` varchar(50) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_contact` bigint(20) NOT NULL,
  `buyer_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `delivery_charge` double NOT NULL,
  `amount` double NOT NULL,
  `payment_mode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `payment_mode_id` int(11) NOT NULL,
  `payment_mode_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`payment_mode_id`, `payment_mode_name`) VALUES
(1, 'Cash on Delivery'),
(2, 'Online'),
(3, 'On Shop');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(20) NOT NULL,
  `product_thumb` varchar(100) NOT NULL,
  `product_category_id` int(20) NOT NULL,
  `shop_category_id` int(30) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_brand` varchar(30) NOT NULL,
  `product_type_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_thumb`, `product_category_id`, `shop_category_id`, `product_name`, `product_brand`, `product_type_id`) VALUES
(1, '15-sandal-wood-diffuser-scented-fragrance-aroma-oil-15-ml-liquid.jpeg', 1, 1, '15 sandal wood diffuser scented fragrance aroma oil 15 ml liquid', 'sandal wood', 1),
(2, '150-air-freshener-bar-odonil-original.jpeg', 1, 1, '150 air freshener bar odonil original', 'odonil', 1),
(3, '1350-aer-spray-morning-violet-fresh-liquid-godrej-original.jpeg', 1, 1, '1350 aer spray morning violet fresh liquid godrej original', 'odonil', 1),
(4, 'febreze-air-freshener-lavender-hd-png-download.png', 1, 1, 'febreze air freshener lavender hd png download', 'febreze', 1),
(5, '1-chakki-fresh-atta-whole-wheat-flour-pillsbury-original.jpeg', 2, 1, '1 chakki fresh atta whole wheat flour pillsbury original', 'pillsbury', 1),
(6, '5-shudh-chakki-atta-whole-wheat-flour-aashirvaad-original.jpeg', 2, 1, '5 shudh chakki atta whole wheat flour aashirvaad original', 'aashirvaad', 1),
(7, '500-besan-besan-fortune-original.jpeg', 2, 1, '500 besan besan fortune original', 'fortune', 1),
(8, '500-fine-besan-1-besan-tata-sampann-original.jpeg', 2, 1, '500 fine besan 1 besan tata sampann original', 'Sampann', 1),
(9, '100-organic-baby-food-fruit-puree-apple-banana-mango.jpeg', 3, 1, '100 organic baby food fruit puree apple banana mango', 'organic', 1),
(10, '200-cerelac-wheat-200g-bib-pack-nestle-original.jpeg', 3, 1, '200 cerelac wheat 200g bib pack nestle original', 'Cerelac', 1),
(11, '227-baby-bits-multigrain-cereal-hearty-gerber-original.jpeg', 3, 1, '227 baby bits multigrain cereal hearty gerber original', 'gerber', 1),
(12, '300-multi-grain-cereal-with-milk-fruits-nestle.jpeg', 3, 1, '300 multi grain cereal with milk fruits nestle', 'cereal', 1),
(13, '100-lal-tail-ayurvedic-baby-massage-oil-dabur-original.jpeg', 4, 1, '100 lal tail ayurvedic baby massage oil dabur original', 'dabur', 1),
(14, '500-baby-no-more-tears-shampoo-500-ml-johnson-s-original.jpeg', 4, 1, '500 baby no more tears shampoo 500 ml johnson s original', 'Johnson\'s Baby', 1),
(15, 'baby-dry-pants-diaper-l-64-pampers-original.jpeg', 4, 1, 'baby dry pants diaper l 64 pampers original', 'pampers', 1),
(16, 'baby-skincare-wipes-160-8901012119136-johnson-s-original.jpeg', 4, 1, 'baby skincare wipes 160 8901012119136 johnson s original', 'Johnson\'s Baby', 1),
(17, '1-2-juice-aamras-tetrapack-paper-boat-original.jpeg', 5, 1, '1 2 juice aamras tetrapack paper boat original', 'paper boat', 1),
(18, '1-mixed-fruit-delight-tetrapack-tropicana-original.jpeg', 5, 1, '1 mixed fruit delight tetrapack tropicana original', 'tropicana', 1),
(19, '50-spicy-treat-uncle-chipps-original.jpeg', 5, 1, '50 spicy treat uncle chipps original', 'uncle chips', 1),
(20, '250-na-regular-tea-red-label-leaves-original.jpeg', 5, 1, '250 na regular tea red label leaves original', 'red label', 1),
(21, '50-original-chocolatey-sandwich-biscuits-oreo-original.jpeg', 6, 1, '50 original chocolatey sandwich biscuits oreo original', 'oreo', 1),
(22, '75-dark-fantasy-chocofills-sunfeast-original.jpeg', 6, 1, '75 dark fantasy chocofills sunfeast original', 'dark fantasy', 1),
(23, '75-little-hearts-britannia-original-imafr6bhu26ypnhc.jpeg', 6, 1, '75 little hearts britannia original imafr6bhu26ypnhc', 'britaniya', 1),
(24, '150-farmlite-digestive-oats-with-almonds-sunfeast-original.jpeg', 6, 1, '150 farmlite digestive oats with almonds sunfeast original', 'sunfeast', 1),
(25, '1-2-choco-moon-and-stars-pouch-kellogg-s-original.jpeg', 7, 1, '1 2 choco moon and stars pouch kellogg s original', 'Kellogg\'s', 1),
(26, '300-corn-flakes-real-almond-honey-box-kellogg-s-original.jpeg', 7, 1, '300 corn flakes real almond honey box kellogg s original', 'Kellogg\'s', 1),
(27, '400-oats-pouch-quaker-original-imaf7dwfzgxtsk7f.jpeg', 7, 1, '400 oats pouch quaker original imaf7dwfzgxtsk7f', 'Quaker ', 1),
(28, '500-muesli-with-21-fruit-and-nut-box-kellogg-s-original.jpeg', 7, 1, '500 muesli with 21 fruit and nut box kellogg s original', 'Kellogg\'s', 1),
(29, '45-treat-croissants-britannia-original.jpeg', 8, 1, '45 treat croissants britannia original', 'Britannia', 1),
(30, '120-na-cake-britannia-original.jpeg', 8, 1, '120 na cake britannia original', 'Britannia', 1),
(31, '200-cocoa-powder-natural-unsweetened-cocoa-powder-artha-natural-original.jpeg', 8, 1, '200 cocoa powder natural unsweetened cocoa powder artha natural original', 'Arth Natural', 1),
(32, '250-chocolate-cake-mix-powder-eggless-250g-raising-ingredient-original.jpeg', 8, 1, '250 chocolate cake mix powder eggless 250g raising ingredient original', 'ccds', 1),
(33, '72-8-cola-flavour-bottles-pouch-72-8-g-alpenliebe-juzt-jelly-original.jpeg', 9, 1, '72 8 cola flavour bottles pouch 72 8 g alpenliebe juzt jelly original', 'Alpenliebe', 1),
(34, '184-gold-rich-alpenliebe-original.jpeg', 9, 1, '184 gold rich alpenliebe original', 'Alpenliebe', 1),
(35, '384-eclairs-luvit-original.jpeg', 9, 1, '384 eclairs luvit original', 'LuvIt', 1),
(36, '600-axs211-axium-original.jpeg', 9, 1, '600 axs211 axium original', 'axium', 1),
(37, '100-psyllium-husk-organic-forest-original.jpeg', 10, 1, '100 psyllium husk organic forest original', 'organic forest', 1),
(38, '450-milk-bread-britannia-original.jpeg', 10, 1, '450 milk bread britannia original', 'britaniya', 1),
(39, '500-100-whole-wheat-britannia-original.jpeg', 10, 1, '500 100 whole wheat britannia original', 'britaniya', 1),
(40, '500-lite-milk-fat-bread-spread-box-amul-original.jpeg', 10, 1, '500 lite milk fat bread spread box amul original', 'amul', 1),
(41, '100-dal-rice-food-penguin-original.jpeg', 11, 1, '100 dal rice food penguin original', 'food penguin', 1),
(42, '800-ready-to-eat-veg-biryani-dal-makhani-jeera-rice-combo-pack-original.jpeg', 11, 1, '800 ready to eat veg biryani dal makhani jeera rice combo pack original', 'Ready 2 Bite', 1),
(43, 'combo-5-food-essentials-packs-nourish-original.jpeg', 11, 1, 'combo 5 food essentials packs nourish original', 'Nourish', 1),
(44, 'premium-quality-urad-dal-moong-dal-and-basmati-combo-goshudh.jpeg', 11, 1, 'premium quality urad dal moong dal and basmati combo goshudh', 'Goshudh', 1),
(45, '300-hydra-energy-deodorant-spray-pack-of-2-combo-150ml-each-original.jpeg', 12, 1, '300 hydra energy deodorant spray pack of 2 combo 150ml each original', 'wildstone', 1),
(46, '400-hamilton-deodorant-body-spray-denver-men-original.jpeg', 12, 1, '400 hamilton deodorant body spray denver men original', 'denver', 1),
(47, '450-cool-charm-and-swag-avatar-deodorant-spray-set-wet-men-original.jpeg', 12, 1, '450 cool charm and swag avatar deodorant spray set wet men original', 'set wet', 1),
(48, 'dark-temptation-150-ml-pack-of-2-and-pulse-150-ml-deodorant-original.jpeg', 12, 1, 'dark temptation 150 ml pack of 2 and pulse 150 ml deodorant original', 'axe', 1),
(49, 'detergent-big-bar-1000-tide-original.jpeg', 13, 1, 'detergent big bar 1000 tide original', 'tide ', 1),
(50, 'stain-eraser-pack-of-4-200-surf-excel-original.jpeg', 13, 1, 'stain eraser pack of 4 200 surf excel original', 'surf excel', 1),
(51, 'super-bar-tough-on-stains-and-gentle-on-fabrics-75-vanish-original.jpeg', 13, 1, 'super bar tough on stains and gentle on fabrics 75 vanish original', 'vanish', 1),
(52, 'su-rfe-xe-1000-surfexcelx-original.jpeg', 13, 1, 'su rfe xe 1000 surfexcelx original', 'surf excel', 1),
(53, '200-premium-dried-afghani-pouch-happilo-original.jpeg', 14, 1, '200 premium dried afghani pouch happilo original', 'Happilo', 1),
(54, '200-premium-dried-turkish-pouch-happilo-original.jpeg', 14, 1, '200 premium dried turkish pouch happilo original', 'Happilo', 1),
(55, '750-energy-californian-broken-walnuts-californian-almonds.jpeg', 14, 1, '750 energy californian broken walnuts californian almonds', 'Happilo', 1),
(56, '1000-celebrations-dried-organic-apricot-khumani-grade.jpeg', 14, 1, '1000 celebrations dried organic apricot khumani grade', 'Soft Art', 1),
(57, '1-fitness-isotonic-instant-energy-formula-drink-powder-1kg-original.jpeg', 15, 1, '1 fitness isotonic instant energy formula drink powder 1kg original', 'health vit', 1),
(58, '1-iso-tonic-1kg-healthxp-original.jpeg', 15, 1, '1 iso tonic 1kg healthxp original', 'health xp', 1),
(59, '400-na-protinex-original.jpeg', 15, 1, '400 na protinex original', 'protinex', 1),
(60, 'sde-92-healthvit-original.jpeg', 15, 1, 'sde 92 healthvit original', 'health vit', 1),
(61, '1-na-iodized-salt-tata-original.jpeg', 16, 1, '1 na iodized salt tata original', 'tata', 1),
(62, '5-na-pouch-white-sugar-madhur-crystal-original.jpeg', 16, 1, '5 na pouch white sugar madhur crystal original', 'madhur', 1),
(63, '100-na-carton-ananda-original.jpeg', 16, 1, '100 na carton ananda original', 'anand', 1),
(64, '500-raw-pouch-pronatural-whole-original.jpeg', 16, 1, '500 raw pouch pronatural whole original', 'pr natural', 1),
(65, '100-bhringa-indulekha.jpeg', 17, 1, '100 bhringa indulekha', 'indulekha', 1),
(66, '200-premium-cold-pressed-castor-oil-for-hair-and-skin-wishcare.jpeg', 17, 1, '200 premium cold pressed castor oil for hair and skin wishcare', 'wishCare', 1),
(67, '300-apple-cider-vinegar-shampoo-wow.jpeg', 17, 1, '300 apple cider vinegar shampoo wow', 'wow', 1),
(68, '300-cool-hair-oil-300ml-navratna.jpeg', 17, 1, '300 cool hair oil 300ml navratna', 'navratan', 1),
(69, '1-mixed-fruit-jam-plastic-bottle-mixed-fruit-jam-surabhi.jpeg', 18, 1, '1 mixed fruit jam plastic bottle mixed fruit jam surabhi', 'surbhi', 1),
(70, '100-original-veg-mayonnaise-pouch-mayonnaise-fun-foods.jpeg', 18, 1, '100 original veg mayonnaise pouch mayonnaise fun foods', 'fun foods', 1),
(71, '350-all-natural-unsweetened-peanut-butter-creamy-plastic-bottle.jpeg', 18, 1, '350 all natural unsweetened peanut butter creamy plastic bottle', 'pintola', 1),
(72, '350-spreads-cocoa-with-almond-plastic-bottle-chocolate.jpeg', 18, 1, '350 spreads cocoa with almond plastic bottle chocolate', 'Hershey\'s', 1),
(73, '10-hing-plastic-bottle-catch-whole.jpeg', 19, 1, '10 hing plastic bottle catch whole', 'catch', 1),
(74, '100-coriander-powder-pouch-catch-powde.jpeg', 19, 1, '100 coriander powder pouch catch powde', 'catch', 1),
(75, '100-turmeric-powder-pouch-tata-sampann-powder.jpeg', 19, 1, '100 turmeric powder pouch tata sampann powder', 'tata', 1),
(76, '200-garam-masala-powder-pouch-eastern-powder.jpeg', 19, 1, '200 garam masala powder pouch eastern powder', 'eastern', 1),
(77, '75-mast-masala-soupy-noodles-instant-noodles-knorr.jpeg', 20, 1, '75 mast masala soupy noodles instant noodles knorr', 'knor', 1),
(78, '75-nutri-licious-oats-masala-instant-noodles-maggi.jpeg', 20, 1, '75 nutri licious oats masala instant noodles maggi', 'maggi', 1),
(79, '140-cheese-pazzta-instant-maggi.jpeg', 20, 1, '140 cheese pazzta instant maggi', 'maggi', 1),
(80, '560-masala-instant-noodles-maggi.jpeg', 20, 1, '560 masala instant noodles maggi', 'maggi', 1),
(81, '140-expert-protection-gum-care-pepsodent.jpeg', 21, 1, '140 expert protection gum care pepsodent', 'pepsodent', 1),
(82, '150-maxfresh-spicy-fresh-red-gel-colgate.jpeg', 21, 1, '150 maxfresh spicy fresh red gel colgate', 'colgate', 1),
(83, '150-sparkling-white-himalaya-original.jpeg', 21, 1, '150 sparkling white himalaya original', 'himalaya', 1),
(84, 'td-retail-paratpar-original.jpeg', 21, 1, 'td retail paratpar original', 'retailer', 1),
(85, '100-kesh-kanti-amla-patanjali.jpeg', 22, 1, '100 kesh kanti amla patanjali', 'patanjali', 1),
(86, '150-saundarya-aloevera-gel-patanjali.jpeg', 22, 1, '150 saundarya aloevera gel patanjali', 'patanjali', 1),
(87, '300-dant-kanti-toothpaste-value-pack-200-g-100g-pack-patanjali.jpeg', 22, 1, '300 dant kanti toothpaste value pack 200 g 100g pack patanjali', 'patanjali', 1),
(88, '500-special-chyawanprash-patanjali.jpeg', 22, 1, '500 special chyawanprash patanjali', 'patanjali', 1),
(89, '1-white-biryani-special-basmati-rice-pouch-fortune.jpeg', 23, 1, '1 white biryani special basmati rice pouch fortune', 'fortune', 1),
(90, '1-white-everyday-basmati-rice-pouch-fortune.jpeg', 23, 1, '1 white everyday basmati rice pouch fortune', 'fortune', 1),
(91, '1-white-everyday-hamesha-basmati-rice-bag.jpeg', 23, 1, '1 white everyday hamesha basmati rice bag', 'fortune', 1),
(92, '1-white-rozana-super-basmati-rice-pouch-daawat.jpeg', 23, 1, '1 white rozana super basmati rice pouch daawat', 'daawat', 1),
(93, 'ultra-clean-plus-xl-44-sanitary-pad-whisper.jpeg', 24, 1, 'ultra clean plus xl 44 sanitary pad whisper', 'whisper', 1),
(94, 'ultra-night-xxxl-10-sanitary-pad-whisper.jpeg', 24, 1, 'ultra night xxxl 10 sanitary pad whisper', 'whisper', 1),
(95, 'ultra-soft-xl-50-sanitary-pad-whisper.jpeg', 24, 1, 'ultra soft xl 50 sanitary pad whisper', 'whisper', 1),
(96, 'xl-secure-ultra-thin-with-wings-xl-10-sanitary.jpeg', 24, 1, 'xl secure ultra thin with wings xl 10 sanitary', 'stayfree', 1),
(97, '1-cardamom-elaichi-instant-tea-premix-1-kg-instant.jpeg', 25, 1, '1 cardamom elaichi instant tea premix 1 kg instant', 'Granules and Beans', 1),
(98, '2-double-pack-lemon-grass-ginger-tea-instant-tea-granules-and.jpeg', 25, 1, '2 double pack lemon grass ginger tea instant tea granules and', 'Granules and Beans', 1),
(99, '10-cardamom-elaichi-instant-tea-premix-10-sachet.jpeg', 25, 1, '10 cardamom elaichi instant tea premix 10 sachet', 'Granules and Beans', 1),
(100, 'ms5-mega-star.jpeg', 25, 1, 'ms5 mega star', 'Granules and Beans', 1),
(101, 'lavender-26-hygienic-harpic.jpeg', 26, 1, 'lavender 26 hygienic harpic', 'harpic', 1),
(102, 'na-500-white-and-shine-bleach-500-ml.jpeg', 26, 1, 'na 500 white and shine bleach 500 ml', 'harpic', 1),
(103, 'original-1-5-power-plus-harpic.jpeg', 26, 1, 'original 1 5 power plus harpic', 'harpic', 1),
(104, 'regular-1-500-ml-lemon-bathroom-cleaner-500-ml-power.jpeg', 26, 1, 'regular 1 500 ml lemon bathroom cleaner 500 ml power', 'harpic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(30) NOT NULL,
  `product_category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`) VALUES
(1, 'Air Freshner'),
(2, 'Aata Flour Suji'),
(3, 'Baby Food'),
(4, 'Baby Products'),
(5, 'Beverages'),
(6, 'Biscuits and Cookies'),
(7, 'Breakfast & Cereals'),
(8, 'Cake and bakery'),
(9, 'Chocolates & Candies'),
(10, 'Dairy & Bread'),
(11, 'Dal -Rice-Atta '),
(12, 'Deos & Perfumes'),
(13, 'Detergents and Bars'),
(14, 'Dry Fruits'),
(15, 'Energy & Health Drinks'),
(16, 'Grocery & Staples'),
(17, 'Hair Care'),
(18, 'Jams & Spreads'),
(19, 'Masala & Spices'),
(20, 'Noodles-Macroni-Pasta'),
(21, 'Oral Care Toothpast'),
(22, 'Patanjali products'),
(23, 'Rice & Rice Variants'),
(24, 'Sanitary Needs'),
(25, 'Tea & Coffee'),
(26, 'Toilet & Floor Cleaners');

-- --------------------------------------------------------

--
-- Table structure for table `product_seller_edit`
--

CREATE TABLE `product_seller_edit` (
  `option_id` int(20) NOT NULL,
  `shop_inventory_id` int(20) NOT NULL,
  `product_mrp` varchar(30) NOT NULL,
  `product_sp` varchar(30) NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `product_quantity` varchar(30) NOT NULL,
  `product_wt_unit_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_seller_edit`
--

INSERT INTO `product_seller_edit` (`option_id`, `shop_inventory_id`, `product_mrp`, `product_sp`, `product_status`, `product_quantity`, `product_wt_unit_id`) VALUES
(69, 43, '100', '98', 1, '1', 1),
(73, 46, '10', '10', 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(20) NOT NULL,
  `product_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`) VALUES
(1, 'Packaged'),
(2, 'Loose');

-- --------------------------------------------------------

--
-- Table structure for table `product_wt_unit`
--

CREATE TABLE `product_wt_unit` (
  `product_wt_unit_id` int(20) NOT NULL,
  `product_wt_unit_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_wt_unit`
--

INSERT INTO `product_wt_unit` (`product_wt_unit_id`, `product_wt_unit_name`) VALUES
(1, 'Kg'),
(2, 'g'),
(3, 'L'),
(4, 'mL');

-- --------------------------------------------------------

--
-- Table structure for table `seller_reg_personal`
--

CREATE TABLE `seller_reg_personal` (
  `seller_id` int(15) NOT NULL,
  `seller_name` varchar(30) NOT NULL,
  `seller_contact` bigint(10) NOT NULL,
  `seller_email` varchar(20) NOT NULL,
  `seller_home` varchar(50) NOT NULL,
  `seller_area` varchar(50) NOT NULL,
  `seller_landmark` varchar(50) NOT NULL,
  `seller_city` varchar(50) NOT NULL,
  `seller_state` varchar(30) NOT NULL,
  `seller_pincode` int(11) NOT NULL,
  `seller_pan_number` varchar(50) NOT NULL,
  `seller_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_reg_personal`
--

INSERT INTO `seller_reg_personal` (`seller_id`, `seller_name`, `seller_contact`, `seller_email`, `seller_home`, `seller_area`, `seller_landmark`, `seller_city`, `seller_state`, `seller_pincode`, `seller_pan_number`, `seller_password`) VALUES
(1, 'Ishwar Baisla', 9821671707, 'ishwar1999@gmail.com', 'wazirabad village gali no 6', '', '', '', 'Delhi', 110084, '', '6564503fbdb2ce9749f96a89904eb42c'),
(2, 'Tapas Baranwal', 9821671707, 'tapas@gmail.com', 'sirsa', '', '', '', 'Delhi', 110084, '', '6564503fbdb2ce9749f96a89904eb42c'),
(3, 'Samarth Tandon', 9821671707, 'samarth@gmail.com', 'Mirazapur', '', '', '', 'Jammu', 110084, '', '6564503fbdb2ce9749f96a89904eb42c'),
(4, 'Ishwar Baisla', 9821671707, 'ishwar047@gmail.com', 'House no F-f34', 'Wazirabad Village', 'Sai Garage / Baraat ghar', 'Delhi', 'Delhi', 110084, 'DPL118XUV256', '6564503fbdb2ce9749f96a89904eb42c'),
(5, 'Jatin Kumar', 9821671707, 'jatin@gmail.com', 'House no F-f34', 'Merrut', 'Sai Garage / Baraat ghar', 'UP', 'Uttar Pradesh', 256003, 'DPL118XUV256', '6564503fbdb2ce9749f96a89904eb42c');

-- --------------------------------------------------------

--
-- Table structure for table `seller_shop`
--

CREATE TABLE `seller_shop` (
  `shop_id` int(20) NOT NULL,
  `seller_id` int(20) NOT NULL,
  `shop_category_id` int(20) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `shop_number` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `gst_number` bigint(20) NOT NULL,
  `open_time` varchar(15) NOT NULL,
  `close_time` varchar(15) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `ifsc_code` bigint(20) NOT NULL,
  `account_holder_name` varchar(50) NOT NULL,
  `account_number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_shop`
--

INSERT INTO `seller_shop` (`shop_id`, `seller_id`, `shop_category_id`, `shop_name`, `shop_number`, `city`, `state`, `pincode`, `gst_number`, `open_time`, `close_time`, `bank_name`, `ifsc_code`, `account_holder_name`, `account_number`) VALUES
(2, 3, 1, 'Samarth general store', '0', '', '', 0, 0, '7:00 AM', '11:00 PM', '0', 0, '0', 0),
(9, 3, 2, 'abc', '125', 'delhi', 'delhi', 110084, 12546, '07:30 AM', '09:30 PM', 'IDBI', 14236500012330, 'Ishwar Baisla', 12488866662),
(10, 3, 1, 'Prathiba Kirana Store', '8546', 'Wazirabad', 'Delhi', 110084, 125466688090, '08:00 AM', '06:00 PM', 'SBI', 0, 'Ishwar Baisla', 1100564863334),
(13, 1, 1, 'My Kirana Store', '123456', 'Delhi', 'Delhi', 110084, 12546, '01:00 AM', '01:00 AM', 'SBI', 0, 'Ishwar Baisla', 123456),
(14, 1, 3, 'My Medical Store', '123456', 'Delhi', 'Delhi', 110084, 12345, '01:00 AM', '01:00 AM', 'SBI', 0, 'Ishwar Baisla', 123456),
(15, 3, 1, 'Piyush store', '123456', 'Gaya', 'Bihar', 256003, 1234568, '08:00 AM', '11:00 PM', 'SBI', 0, 'Piyush Kumar', 1811003030230);

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE `shop_category` (
  `shop_category_id` int(15) NOT NULL,
  `shop_category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`shop_category_id`, `shop_category_name`) VALUES
(1, 'Kirana'),
(2, 'Dairy'),
(3, 'Medical'),
(4, 'Bakery');

-- --------------------------------------------------------

--
-- Table structure for table `shop_inventory`
--

CREATE TABLE `shop_inventory` (
  `shop_inventory_id` int(202) NOT NULL,
  `shop_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_inventory`
--

INSERT INTO `shop_inventory` (`shop_inventory_id`, `shop_id`, `product_id`) VALUES
(46, 2, 1),
(43, 13, 1),
(48, 13, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_products`
--
ALTER TABLE `buyer_products`
  ADD PRIMARY KEY (`buyer_product_id`);

--
-- Indexes for table `buyer_reg`
--
ALTER TABLE `buyer_reg`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `payment_mode_id` (`payment_mode_id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`payment_mode_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_id` (`product_category_id`,`shop_category_id`),
  ADD KEY `shop_category_id` (`shop_category_id`),
  ADD KEY `shop_category_id_2` (`shop_category_id`),
  ADD KEY `shop_category_id_3` (`shop_category_id`),
  ADD KEY `shop_category_id_4` (`shop_category_id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_seller_edit`
--
ALTER TABLE `product_seller_edit`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `shop_inventory_id` (`shop_inventory_id`,`product_wt_unit_id`),
  ADD KEY `shop_inventory_id_2` (`shop_inventory_id`,`product_wt_unit_id`),
  ADD KEY `product_wt_unit_id` (`product_wt_unit_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `product_wt_unit`
--
ALTER TABLE `product_wt_unit`
  ADD PRIMARY KEY (`product_wt_unit_id`);

--
-- Indexes for table `seller_reg_personal`
--
ALTER TABLE `seller_reg_personal`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `seller_shop`
--
ALTER TABLE `seller_shop`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `seller_id` (`seller_id`,`shop_category_id`),
  ADD KEY `shop_category_id` (`shop_category_id`);

--
-- Indexes for table `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`shop_category_id`);

--
-- Indexes for table `shop_inventory`
--
ALTER TABLE `shop_inventory`
  ADD PRIMARY KEY (`shop_inventory_id`),
  ADD KEY `shop_id` (`shop_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_products`
--
ALTER TABLE `buyer_products`
  MODIFY `buyer_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer_reg`
--
ALTER TABLE `buyer_reg`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `payment_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_seller_edit`
--
ALTER TABLE `product_seller_edit`
  MODIFY `option_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_wt_unit`
--
ALTER TABLE `product_wt_unit`
  MODIFY `product_wt_unit_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seller_reg_personal`
--
ALTER TABLE `seller_reg_personal`
  MODIFY `seller_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller_shop`
--
ALTER TABLE `seller_shop`
  MODIFY `shop_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `shop_category_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_inventory`
--
ALTER TABLE `shop_inventory`
  MODIFY `shop_inventory_id` int(202) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_mode` (`payment_mode_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`shop_category_id`) REFERENCES `shop_category` (`shop_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_6` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`product_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_seller_edit`
--
ALTER TABLE `product_seller_edit`
  ADD CONSTRAINT `product_seller_edit_ibfk_1` FOREIGN KEY (`shop_inventory_id`) REFERENCES `shop_inventory` (`shop_inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_seller_edit_ibfk_3` FOREIGN KEY (`product_wt_unit_id`) REFERENCES `product_wt_unit` (`product_wt_unit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller_shop`
--
ALTER TABLE `seller_shop`
  ADD CONSTRAINT `seller_shop_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller_reg_personal` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seller_shop_ibfk_2` FOREIGN KEY (`shop_category_id`) REFERENCES `shop_category` (`shop_category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop_inventory`
--
ALTER TABLE `shop_inventory`
  ADD CONSTRAINT `shop_inventory_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `seller_shop` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_inventory_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
