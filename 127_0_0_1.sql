-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-05-12 12:43:14
-- 伺服器版本: 10.1.25-MariaDB
-- PHP 版本： 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `travel`
--
/*CREATE DATABASE IF NOT EXISTS `travel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `travel`;*/

-- --------------------------------------------------------

--
-- 資料表結構 `customer_order`
--

CREATE TABLE `customer_order` (
  `customer_orderID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `orderNO` varchar(255) NOT NULL,
  `orderDate` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `totalPrice` int(11) NOT NULL,
  `processingFee` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `createdDate` varchar(255) NOT NULL,
  `updatedDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `customer_order`
--

INSERT INTO `customer_order` (`customer_orderID`, `memberID`, `orderNO`, `orderDate`, `status`, `totalPrice`, `processingFee`, `name`, `phone`, `email`, `address`, `createdDate`, `updatedDate`) VALUES
(1, 7, 'SH20191106143115', '2019-05-06 14-31-15', 0, 30000, 0, 'siri', '09498979879', '156465@12345646', NULL, '2019-05-06 14-31-15', NULL),
(2, 7, 'SH20191108092131', '2019-05-08 09-21-31', 3, 30000, 0, 'siri', '09498979879', '156465@12345646', NULL, '2019-05-08 09-21-31', '2019-05-09 09-46-52'),
(3, 7, 'SH20191109124440', '2019-05-09 12-44-40', 0, 28000, 0, 'siri', '09498979879', '156465@12345646', NULL, '2019-05-09 12-44-40', NULL),
(4, 7, 'SH20191109134117', '2019-05-09 13-41-17', 0, 28000, 0, 'siri', '09498979879', '156465@12345646', NULL, '2019-05-09 13-41-17', NULL),
(5, 7, 'SH20191110175401', '2019-05-10 17-54-01', 0, 28000, 0, 'siri', '09498979879', '156465@12345646', NULL, '2019-05-10 17-54-01', NULL),
(6, 7, 'SH20191111223643', '2019-05-11 22-36-43', 0, 50000, 0, 'siri', '09498979879', '156465@12345646', NULL, '2019-05-11 22-36-43', NULL),
(7, 7, 'SH20191112025303', '2019-05-12 02-53-03', 0, 50000, 0, 'siri', '09498979879', '156465@12345646', NULL, '2019-05-12 02-53-03', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `memberID` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `createdDate` varchar(255) NOT NULL,
  `updatedDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`memberID`, `account`, `password`, `name`, `phone`, `email`, `address`, `birthday`, `picture`, `createdDate`, `updatedDate`) VALUES
(4, 'admin3', 'admin3', 'admin3', 'admin3', 'admin3', 'admin3', '', 'photo.jpg', '2019-05-16 19-42-51', NULL),
(5, '$filename', '$filename', '$filename', '$filename', '$filename', '$filename', '', '94210052.JPG', '2019-05-16 19-44-04', NULL),
(6, 'dasd', 'asd', 'as', 'asd', 'wd', 'asdq', '', '52211204.JPG', '2019-05-16 21-09-46', NULL),
(7, 'siri1030@gmail.com', 'a12345', 'siri', '09498979879', '156465@12345646', 'asdwqjodiqwhoidhqwhdq', '1990-3-3', NULL, '2019-05-30 10-31-31', '2019-05-12 02-54-23'),
(8, 'asdasd', 'asdwqdqwd', '123456', 'dqwdqwdqw', 'dqwdqwd', 'dqwdqwdqwd', '', '37105046.jpg', '2019-05-30 10-49-20', '2019-05-30 10-50-38'),
(9, 'siri1030@gmail.com', 'a12345', '', '6549879792313', '', '', '', NULL, '2019-05-06 10:59:34', NULL),
(15, 'asdasd@gmail.com', 'a123456', '', 'aaaaa78a97s9', '', '', '', NULL, '2019-05-09 16:32:01', NULL),
(16, 'kda123@gmail.com', 'a12345', '', '123456789', '', '', '', NULL, '2019-05-10 17:47:33', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `newsID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `productCategoryID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `createdDate` varchar(255) DEFAULT NULL,
  `publishedDate` varchar(255) DEFAULT NULL,
  `updatedDate` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `news`
--

INSERT INTO `news` (`newsID`, `productID`, `productCategoryID`, `title`, `picture`, `content`, `createdDate`, `publishedDate`, `updatedDate`, `price`) VALUES
(24, 22, 4, '東京美食名勝七日', '77143427.jpg', '<p>旅行中必嚐的美食，旅行當下享用美食，必去！日劇《孤獨的美食家》 中好評不斷的十家「 東京必吃餐廳」 日本美食網站「東京メインディッシュ」根據日劇《孤獨的美食家》中出現的餐廳.</p>', '2019-05-12 19-26-08', '2019-05-12', NULL, '35000'),
(25, 20, 5, '川蜀九寨8日', '92103147.jpg', '<p>「九寨歸來不看水」相信早已在各位旅人的口耳裡相傳已久，位列中國最高5A評等的水景之王，更獲評為世界自然遺產，以湛藍幻麗、宛若仙境的彩湖、瀑布、彩林美景聞名。以獨特的石灰岩地形景觀著稱於世的黃龍風景區，以彩池、雪山、峽谷、森林「四絕」揚名中外。加贈3大精彩夜秀，豐富您的遊程。加上成都其他精采景區，帶您樂遊四川，體驗蜀國文化。</p>', '2019-05-12 19-26-16', '2019-05-12', NULL, '50000'),
(26, 25, 3, '澎湖花火節X浮潛', '3411.jpg', '<p>浮潛－何需捨近求遠！不必搭船出海，直接前往澎南山水，就能潛見美麗珊瑚礁和熱帶魚群！來澎湖最佳的浮潛聖地海底裡美麗的珊瑚礁是許多人來到澎湖必玩的行程之一而要來澎湖浮潛</p>', '2019-05-12 19-26-24', '2019-05-12', NULL, '12000');

-- --------------------------------------------------------

--
-- 資料表結構 `order_details`
--

CREATE TABLE `order_details` (
  `order_detailsID` int(11) NOT NULL,
  `customer_orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `createdDate` varchar(255) NOT NULL,
  `updatedDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `order_details`
--

INSERT INTO `order_details` (`order_detailsID`, `customer_orderID`, `productID`, `name`, `price`, `picture`, `quantity`, `createdDate`, `updatedDate`) VALUES
(1, 1, 13, '張家界5天4夜', '30000', '55102134.jpg', 0, '2019-05-06 14-31-15', NULL),
(2, 2, 19, '12345', '30000', '48154813.jpg', 0, '2019-05-08 09-21-31', NULL),
(3, 3, 13, '張家界5天4夜', '28000', '55102134.jpg', 0, '2019-05-09 12-44-40', NULL),
(4, 4, 24, '台北二天一夜', '8000', '3311.jpg', 0, '2019-05-09 13-41-17', NULL),
(5, 4, 25, '澎湖花火節', '12000', '3411.jpg', 0, '2019-05-09 13-41-17', NULL),
(6, 4, 26, '南投火龍名俗兩天一夜', '8000', '3211.jpg', 0, '2019-05-09 13-41-17', NULL),
(7, 5, 13, '張家界5天4夜', '28000', '55102134.jpg', 0, '2019-05-10 17-54-01', NULL),
(8, 6, 20, '川蜀九寨8日', '50000', '92103147.jpg', 0, '2019-05-11 22-36-43', NULL),
(9, 7, 20, '川蜀九寨8日', '50000', '92103147.jpg', 0, '2019-05-12 02-53-03', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `page`
--

CREATE TABLE `page` (
  `pageID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createdDate` varchar(255) NOT NULL,
  `publishedDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `page`
--

INSERT INTO `page` (`pageID`, `title`, `content`, `createdDate`, `publishedDate`) VALUES
(1, '公司簡歷', '<div class=\"title\">關於台北101<a class=\"back\" href=\"http://www.taipei-101.com.tw/content_cmp.aspx?cid=9\"><img src=\"http://www.taipei-101.com.tw/images/btn-back-1.png\" alt=\"\" /></a></div>\r\n<div class=\"txt\">一座傑出的地標建築，足以改變這個城市。如同帝國大廈之於紐約、艾菲爾鐵塔之於巴黎、更如晚近的金茂大廈之於上海，面對二十一世紀，台北需要更寬廣的舞台、更亮眼的演出，高度508公尺，地上101層，地下5層的台北101專案即是「將台北帶向全世界」(Bringing Taipei to the world )的希望工程。</div>\r\n<div class=\"h\">&nbsp;</div>\r\n<ul class=\"li\">\r\n<li>基地面積：9,159坪 (30,277平方米)</li>\r\n<li>總建物面積：約114,737坪 (379,296平方米 )</li>\r\n<li>購物中心建物面積(不含停車場)：23,744坪 (78,491平方米)</li>\r\n<li>辦公大樓建物面積：65,269坪(215,767平方米)</li>\r\n<li>停車位：汽車1858輛 / 機車3045輛</li>\r\n</ul>\r\n<p>&nbsp;</p>', '2019-05-30', '2019-05-01');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productCategoryID` int(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` text,
  `contant1` text,
  `contant2` text,
  `price` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `createdDate` varchar(255) DEFAULT NULL,
  `publishedDate` varchar(255) DEFAULT NULL,
  `updatedDate` varchar(255) DEFAULT NULL,
  `picture1` varchar(255) DEFAULT NULL,
  `picture2` varchar(255) DEFAULT NULL,
  `picture3` varchar(255) DEFAULT NULL,
  `picture4` varchar(255) DEFAULT NULL,
  `picture5` varchar(255) DEFAULT NULL,
  `picture6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`productID`, `productCategoryID`, `name`, `picture`, `description`, `contant1`, `contant2`, `price`, `day`, `createdDate`, `publishedDate`, `updatedDate`, `picture1`, `picture2`, `picture3`, `picture4`, `picture5`, `picture6`) VALUES
(13, 5, '張家界5天4夜', 'door.jpg', '中國第一個國家森林公園【張家界】，位於湖南省武陵源的西南端，三千奇峰拔地而起，八百溪流婉蜓縱橫，被譽為【中國山水畫的原本】', '★【天門山國家森林公園】AAAAA級景區~大自然億萬年雕琢的「人間仙境」\r\n1992年被批准為國家森林公園，面積達190多平方公里，是張家界是第二個國家森林公園。擁有『湘西第一神山』之美譽，在張家界地區是最早被記入國史的名山，長久以來一直被當地人民奉為『神山』、『聖山』。世界海拔最高的天然穿山溶洞~安排纜車上下，歷經大自然億萬年雕琢的「人間仙境」將搭乘全球最長─7455米的天門山纜車上下山，體驗凌空飛仙般的神奇感覺。\r\n\r\n', '★『張家界大峽谷』【含玻璃橋+電梯+遊船】價值約NTD 700元/人\r\n張家界大峽谷玻璃橋總長430米、寬6米，橋面距離谷底相對高度約300米，最大遊客容量為800人。去年12月，這條玻璃橋成功合龍時，它以世界最長、世界最高、世界首座玻璃作為主受力結構的大型橋梁等十項「世界之最」成為國際橋梁建設的典範。\r\n', '28000', '5', '2019-05-01 10-20-59', NULL, '2019-05-08 10-43-15', 'moutain.jpg', 'bridge.jpg', 'bridge.jpg', 'door.jpg', 'moutain.jpg', '55102134.jpg'),
(19, 4, '大阪京都遊蹤浪漫五日', 'temple2.jpg', '<p><strong>【東本願寺】</strong></p>\r\n淨土真宗本願寺派的本山，位於日本京都府，正式名稱為東本願寺。本願寺是淨土真宗最大教派，為親鸞所創，最初本山為1272年（文永9年）所建大谷本願寺正式名稱為東本願寺\r\n', '<p><strong>【嵐山竹林】</strong></p>\r\n嵯峨野和嵐山位於京都府西部。8世紀前後因爲貴族們在這片土地上欣賞紅葉、玩耍遊船，田園和竹林的景色逐漸擴大，至今往日的風貌仍然依稀可辨。被列入世界文化遺産的天龍寺是當時的大將軍足利尊氏爲悼念天皇而建造的，現在已成爲京都五山之一，五個主要寺院之一。庭園也被指定爲國家特別名勝。\r\n\r\n', '<p><strong>【嵐山渡月橋】</strong></p>\r\n別名嵐橋，橫跨在京都嵐山的大堰川上，全長155公尺，據說是空海的弟子道昌於日本平安時代初期的836年(日本承和3年)整修大堰川時所建。渡月橋融入嵐山景緻，風景秀麗，成為代表京都的明媚景色，吸引許多旅客造訪。\r\n', '30000', '5', '2019-05-01 15-47-46', NULL, '2019-05-08 14-30-42', 'forest.jpg', 'river.jpg', '48154813.jpg', 'river.jpg', 'forest.jpg', 'temple2.jpg'),
(20, 5, '川蜀九寨8日', '92103147.jpg', '<p>「九寨歸來不看水」相信早已在各位旅人的口耳裡相傳已久，位列中國最高5A評等的水景之王，更獲評為世界自然遺產，以湛藍幻麗、宛若仙境的彩湖、瀑布、彩林美景聞名。以獨特的石灰岩地形景觀著稱於世的黃龍風景區，以彩池、雪山、峽谷、森林「四絕」揚名中外。加贈3大精彩夜秀，豐富您的遊程。加上成都其他精采景區，帶您樂遊四川，體驗蜀國文化。</p>\r\n\r\n', '<p><strong>【黃龍】</strong>以彩池、灘流、雪山、峽谷、古寺、民俗&ldquo;六絕&rdquo;著稱於世，被譽為&ldquo;人間瑤池&rdquo;、&ldquo;人間仙境&rdquo;、&ldquo;濃縮的綿繡中華&rdquo;。</p><p><strong>【三大秀】</strong><strong>藏羌歌舞秀：</strong>歌舞晚會包括藏族歌舞、傳統活動表演及傳統服飾展示。</p>', '<p><strong>【樂山大佛】</strong>被列入世界文化與自然遺產名錄，也是世界上高度最高的石佛像。</p>\r\n\r\n<p><strong>&nbsp; 峨嵋聖像秀：</strong>由&ldquo;幻、雅、靈、蜀、剛、夢、禪&rdquo;七部分組成。</p>\r\n<p><strong>川劇變臉秀：</strong>以變臉、吐火、滾燈表演馳名海內外，內容精彩絕倫，讓人大呼過癮。</p>', '50000', '8', '2019-05-08 10-28-05', NULL, '2019-05-08 10-41-16', '55102134.jpg', '58103326.jpg', '92103147.jpg', '58103326.jpg', '55102134.jpg', '55102134.jpg'),
(21, 5, '山西、內蒙古草原8日', 'farm.jpg', '【希拉穆仁草原】位於內蒙古包頭市達茂聯合旗東南部，是內蒙古開發最早的景點之一，蜚聲中外的避暑勝地。希拉穆仁河橫貫草原，為草原帶來豐厚的滋養，這裏有著成群的牛羊，馬兒在草原中賓士，勤勞勇敢的蒙古人在這裏生活，用他們的美酒和奶茶迎接四方來客。\r\n', '<p>★<strong>【萬年冰洞】</strong>中國境內最大的冰洞，此冰洞洞深約一百公尺，上下共為五層，形成於新生代第四紀冰川期，距今大約有三百萬年的歷史，但令專家百思不解的是以冰洞所在的位置，不論垂直高度、地表緯度或是氣候條件都不足以四季冰。</p>', '<p>★<strong>【懸空寺(不含登頂費用)】</strong>懸空寺的選址之險，建築之奇，結構之巧，豐富的內涵，堪稱世界一絕。整個寺院，上載危崖，下臨深谷，背岩依龕，寺門向南，以西為正。全寺為木質框架式結構，依照力學原理，半插橫樑為基，巧借岩石暗托，樑柱上下一體，廊欄左右緊聯。僅152.5平米的面積建有大小房屋40間。</p>', '40000', '8', '2019-05-08 10-31-54', NULL, '2019-05-08 10-41-30', 'cave.jpg', 'wall.jpg', 'grassland.jpg', 'cave.jpg', 'wall.jpg', 'farm.jpg'),
(22, 4, '東京美食名勝七日', '77143427.jpg', '旅行中必嚐的美食，旅行當下享用美食，必去！日劇《孤獨的美食家》 中好評不斷的十家「 東京必吃餐廳」 日本美食網站「東京メインディッシュ」根據日劇《孤獨的美食家》中出現的餐廳.', '【白川郷合掌村】世界遺產「合掌村」分布在岐阜縣大野郡白川村(白川鄉)，富山縣東礪波郡平村與上平村(五箇山)。目前白川鄉內共有5座合掌村落，其中荻町的規模最大也最有名，至今完整保留113棟合掌造。荻町在觀光方面最充実，有超過20間民宿及旅館、約50家特產店、餐廳、重要文化遺產和田家、明善寺鄉土館、生活資料館等是欣賞合掌村的最佳景點。\r\n', '【加賀傳統工藝村】感受日本的情感及加賀的文化在擁有13萬坪廣闊的大自然森林中，日本古老的傳統建築鱗次櫛比。風格各異的古老房屋、成為向來訪者介紹日本傳統工藝和加賀文化之建築。\r\n★特別安排～手做體驗金箔作品\r\n\r\n', '35000', '5', '2019-05-08 14-31-36', NULL, NULL, 'village.jpg', 'process.jpg', 'street.jpg', 'village.jpg', 'process.jpg', '77143427.jpg'),
(23, 4, '函館、日光、東京賞楓五日', 'tree.jpg', '日本位處在溫帶，在秋天會變紅的樹木很多，譬如漆紅葉、梅紅葉、盧紅葉、柏紅葉、山櫻紅葉、銀杏紅葉、滿天星紅葉、乍紅葉、白樺紅葉、葡萄紅葉等。 每年秋天開始，思慕紅葉的觀光客也大量湧入，旅遊日本雖然賞心悅目，但消費並不便宜。一年四季之中，秋天是日本最宜人的季節，除欣賞美景之外，同時也可滿足口腹之慾；所以秋遊日本是最佳的季節。', '【狐狸村】原名【宮城藏王狐狸村】，位於宮城縣白石市北西部，是以展示狐狸為中心的民營主題動物園。園內育有包括稀有種類的高貴氣質的銀狐、青狐、有狐狸界帥哥之稱的白金狐、十字狐以及有白狐之稱的北極狐等，合計共6種類，數量超過100隻的狐狸，放養在大自的森林園區內，偶而會有小狐跟行在後面，時而拉扯衣角，極盡頑皮之可愛的模樣，深受遊客的愛憐。2006年上映的電影「子狐物語」中的男主角「小狐海倫」，以及曾在2013年廣受好評的電視劇「小海女」中軋上一角的小狐，都是來自於【藏王狐狸村】，名氣是越來越響叮噹。', '創建於628年，是東京都內最古老的寺院。現世利益的「淺草觀音」為眾多信徒所信仰，每年有來自國內外約3000萬人到此參拜。這裡曾是江戶文化發展的中心，現在其週邊依然殘留著當時的風貌，這裡還會應不同的季節，舉辦酸漿市集和毽子板市集等許多活動。雷門前懸掛的巨大的燈籠全國知名。', '50000', '3', '2019-05-08 14-34-29', NULL, NULL, 'foxy.jpg', 'temple.jpg', 'tree.jpg', 'leaf.jpg', 'temple.jpg', 'foxy.jpg'),
(24, 3, '台北101X中正紀念堂', '3311.jpg\r\n', '中正紀念堂是一座為紀念已故前中華民國總統蔣中正而興建的建築，位於臺北市中正區，也是眾多紀念蔣中正總統的建築中規模最大者。園區廣場的南北側，另建有國家表演藝術中心國家兩廳院管理的國家戲劇院和國家音樂廳，落成以來成為臺北市及臺灣在國際上最著名地標之一。', NULL, NULL, '1000', '2', '2019-05-09 13-04-34', NULL, NULL, '3311.jpg', '3411.jpg', '3211.jpg', '3411.jpg', '3311.jpg', '3211.jpg'),
(25, 3, '澎湖花火節X浮潛', '3411.jpg', '浮潛－何需捨近求遠！不必搭船出海，直接前往澎南山水，就能潛見美麗珊瑚礁和熱帶魚群！來澎湖最佳的浮潛聖地海底裡美麗的珊瑚礁是許多人來到澎湖必玩的行程之一而要來澎湖浮潛', '石滬為澎湖的一種人與大海相互依存的捕魚方法，因有兩座心狀石滬而得雙心石滬美名。原理為利用潮汐起落，在潮間帶堆砌兩道長圓弧形堤岸，從淺水處一路延長至深水處，在深水處盡頭向內做成彎鉤狀。漲潮時，魚群順著海水進入石滬中覓食海藻；退潮後，石堤已高於海面，魚迴游至捲曲處被阻，困於滬內，漁民藉此捕捉漁獲。', '波濤洶湧的台灣海峽上分布著澎湖群島，群島的南方有座名為「七. 美」的島嶼，島嶼上有一望夫石，是一座深入海面的巨型礁岩，形狀有如身懷六甲的孕婦躺臥，一般稱作「七美望夫石」', '12000', '2', '2019-05-09 13-26-38', NULL, NULL, 'beach1.jpg', 'beach2.jpg', 'beach3.jpg', '3411.jpg', 'beach1.jpg', 'beach2.jpg'),
(26, 3, '清境農場X火龍民俗', 'farm.jpg', '清境農場四季景致秀麗，各有趣味，信步其中可盡覽清境之美：碧湖映壽、步步高升、慈雲獻壽、青青草原、果林飄香、心誠則靈，不妨細細品味高山原野自然恬靜的氣氛。\r\n', '來自中國四川的「銅梁火龍」民俗活動，今晚在南投燈會系列活動中首次燈場，生鐵熔化成鐵水，往空中澆出熾熱的火花，舞龍在花火與煙霧中活靈活現', '廣義的清境，包含退輔會清境農場及周邊地區，南起霧社，北至梅峰，省道台14甲線貫穿其間，青青草原、觀山牧區、壽山園生態區、步步高升至小瑞士花園為主要賞景與遊憩動線。', '8000', '2', '2019-05-09 13-27-07', NULL, NULL, '3211.jpg', 'grassland.jpg', 'farm.jpg', '92103147.jpg', 'grassland.jpg', '3211.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `productcategory`
--

CREATE TABLE `productcategory` (
  `productCategoryID` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `createdDate` varchar(255) DEFAULT NULL,
  `publishedDate` varchar(255) DEFAULT NULL,
  `updatedDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `productcategory`
--

INSERT INTO `productcategory` (`productCategoryID`, `area`, `createdDate`, `publishedDate`, `updatedDate`) VALUES
(3, '台灣', '2019-05-30 13-08-28', NULL, NULL),
(4, '日本', '2019-05-01 10-20-35', NULL, NULL),
(5, '大陸', '2019-05-01 10-20-42', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`userID`, `account`, `password`) VALUES
(1, 'admin', 'admin');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`customer_orderID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`);

--
-- 資料表索引 `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detailsID`);

--
-- 資料表索引 `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`pageID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- 資料表索引 `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`productCategoryID`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `customer_orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用資料表 AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用資料表 AUTO_INCREMENT `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `page`
--
ALTER TABLE `page`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用資料表 AUTO_INCREMENT `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `productCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
