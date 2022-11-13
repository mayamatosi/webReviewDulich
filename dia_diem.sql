-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2022 lúc 06:59 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dia_diem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `des`
--

CREATE TABLE `des` (
  `id_des` int(11) NOT NULL,
  `id_dd` int(11) NOT NULL,
  `img` text NOT NULL,
  `title` text NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `des`
--

INSERT INTO `des` (`id_des`, `id_dd`, `img`, `title`, `des`) VALUES
(1, 1, 'https://vietskytourism.com.vn/wp-content/uploads/2017/01/dong-phong-nha.jpg', 'Khám phá Phong Nha Kẻ Bàng', 'Kinh nghiệm phượt Phong Nha Kẻ Bàng, khám phá khu du lịch Phong Nha Kẻ Bàng trong 1 ngày – 2 ngày cùng cẩm nang, review du lịch tự túc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diadiem`
--

CREATE TABLE `diadiem` (
  `id_dd` int(11) NOT NULL,
  `ten` text NOT NULL,
  `trong/ngoai` tinyint(1) NOT NULL,
  `mien` varchar(10) NOT NULL,
  `vi_tri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diadiem`
--

INSERT INTO `diadiem` (`id_dd`, `ten`, `trong/ngoai`, `mien`, `vi_tri`) VALUES
(1, 'Phong nha kẻ bàng', 1, 'trung', 'Vườn quốc gia Phong Nha - Kẻ Bàng, Tỉnh Quảng Bình, Việt Nam'),
(2, 'Vịnh Hạ Long', 1, 'Bac', 'Vịnh Hạ Long, Cầu Bài Thơ 2, Hồng Gai, Thành phố Hạ Long, Tỉnh Quảng Ninh, 36000, Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite`
--

CREATE TABLE `favorite` (
  `user_id` int(11) NOT NULL,
  `id_dd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `favorite`
--

INSERT INTO `favorite` (`user_id`, `id_dd`) VALUES
(10, 0),
(10, 0),
(10, 0),
(10, 0),
(10, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img`
--

CREATE TABLE `img` (
  `id_img` int(11) NOT NULL,
  `id_dd` int(11) NOT NULL,
  `img` text NOT NULL,
  `img_des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `img`
--

INSERT INTO `img` (`id_img`, `id_dd`, `img`, `img_des`) VALUES
(1, 1, 'https://media.cungphuot.info/2018/05/25087/gioi-thieu-phong-nha-ke-bang-2.jpg', ''),
(2, 1, 'https://vietskytourism.com.vn/wp-content/uploads/2017/01/dong-phong-nha.jpg', 'https://vietskytourism.com.vn/wp-content/uploads/2017/01/dong-phong-nha.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mota`
--

CREATE TABLE `mota` (
  `id` int(11) NOT NULL,
  `id_dd` int(11) NOT NULL,
  `title` text NOT NULL,
  `des` text NOT NULL,
  `cont` text NOT NULL,
  `cont2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mota`
--

INSERT INTO `mota` (`id`, `id_dd`, `title`, `des`, `cont`, `cont2`) VALUES
(1, 1, 'Kinh nghiệm phượt Phong Nha Kẻ Bàng, review du lịch tự túc 1,2 ngày ở Phong Nha Quảng Bình', 'Kinh nghiệm phượt Phong Nha Kẻ Bàng, khám phá khu du lịch Phong Nha Kẻ Bàng trong 1 ngày – 2 ngày cùng cẩm nang, review du lịch tự túc: giá vé Phong Nha Quảng Bình mà Vietskytourism sẽ chia sẻ ở bài viết dưới đây.', '<div class=\"brs_col\"><h2 class=\"Normal\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Giá vé Phong Nha Kẻ Bàng 2018</span></h2><p style=\"text-align: justify;\">Giá vé tham quan các động để bạn tham khảo trước nhé !</p><p style=\"text-align: justify;\">Động Phong Nha: Người lớn: 80.000đ/lượt, trẻ em: 40.000đ/lượt (từ 7 đến 15 tuổi)</p><p style=\"text-align: justify;\">Động Tiên Sơn:Người lớn: 40.000đ/ lượt, trẻ em: 20.000đ/lượt</p><p style=\"text-align: justify;\">Động Thiên Đường: người lớn 120.000đ/ 1 lượt, trẻ em dưới 1,3m 60.000đ/ 1 lượt</p><p style=\"text-align: justify;\"><strong>Giá vé đi thuyền</strong>:</p><p style=\"text-align: justify;\">Giá thuê thuyền vận chuyển khách tham quan động Phong Nha, động Tiên Sơn</p><p style=\"text-align: justify;\">(1 thuyền chở từ từ 1 – 14 người, kể cả trẻ em)</p><p style=\"text-align: justify;\">Tham quan 01 động: 320.000đ/chuyến (thời gian tham quan tối đa 3,5 tiếng)</p><p style=\"text-align: justify;\">Tham quan 02 động: 350.000đ/chuyến (thời gian tham quan tối đa 05 tiếng )</p><p style=\"text-align: justify;\">Thời gian tham quan: từ 7h – 17h các ngày trong tuần.</p><p style=\"text-align: justify;\">Tất cả các thuyền ở đây đều do trung tâm du lịch văn hóa- sinh thái Vườn Quốc Gia Phong Nha – Kẻ Bàng điều phối nên bạn&nbsp;yên tâm về giá nhé!</p><p class=\"Normal\" style=\"text-align: justify;\">Khi đã chuẩn bị được những gì cần thiết có chuyến đi, việc làm tiếp theo đó là xác định điểm đến của mình trong chuyến đi. Phong Nha Kẻ Bàng luôn nổi tiếng khắp cả nước, để có thể khám phá được hết thì cũng là một điều khó khăn cho bạn trong thời gian ngắn.</p><p class=\"Normal\" style=\"text-align: justify;\">Tuy nhiên thì, Vietskytourism sẽ giúp bạn liệt kê tất cả những điểm đặc biệt nổi trội tại khu du lịch Phong Nha để bạn có sự lựa chọn và sắp xếp thời gian hợp lý cho chuyến đi của mình. Hy vọng bạn sẽ có một kỳ nghỉ hoàn hảo, tiết kiệm cùng những trải nghiệm tuyệt vời tại đây:</p><h2 class=\"Normal\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Khám phá khu du lịch Phong Nha Kẻ Bàng</span></h2><div class=\"brs_col\" style=\"text-align: justify;\"><h3><span style=\"font-size: 12pt;\">– Động Phong Nha</span></h3><p>Động Phong Nha&nbsp;là một danh thắng tiêu biểu nhất của hệ thống hang động thuộc quần thể danh thắng&nbsp;Phong Nha Kẻ Bàng.&nbsp;Phong Nha&nbsp;được bình chọn là một trong những hang động đẹp nhất thế giới cùng với các tiêu chí: Sông ngầm dài nhất, hồ nước ngầm đẹp nhất, cửa hang cao và rộng nhất, các bãi cát, bãi đá ngầm đẹp nhất, hang khô rộng và đẹp nhất, hệ thống thạch nhũ kỳ ảo và tráng lệ nhất và có hang động nước dài nhất.</p><p><img loading=\"lazy\" class=\"aligncenter wp-image-6780\" src=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/%C4%90%E1%BB%98NG-PHONG-NHA.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/ĐỘNG-PHONG-NHA.jpg 1008w, https://vietskytourism.com.vn/wp-content/uploads/2018/03/ĐỘNG-PHONG-NHA-234x150.jpg 234w\" alt=\"Động Phong Nha\" width=\"550\" height=\"353\"></p><p></p><center><span style=\"color: #999999; font-size: 10pt;\">Phượt Phong Nha Kẻ Bàng đi đâu:&nbsp;Động Phong Nha</span></center>Vé vào động Phong Nha là 150.000VNĐ, trẻ em dưới 1m3 miễn phí<p></p><h3><span style=\"font-size: 12pt;\">– Động Tiên Sơn</span></h3><p class=\"nVcaUb\">Động Tiên Sơn&nbsp;được ví như là chốn “bồng lai tiên cảnh”. Tua tủa trong động đó là hàng ngàn khối nhũ đá cùng với nhiều màu sắc hư ảo. Vòm động cao, thoáng và nổi rõ nhiều vân có màu như vàng bạc. Những hàng cột đá màu cẩm thạch mang nhiều dáng vẻ kỳ diệu khiến người ta ngây ngất như đang lạc vào thiên cung hay thủy cung vậy.&nbsp;Đường lên Tiên Sơn quanh co uốn lượn, miệng hang ở độ cao khoảng 200m nằm phía trên trần động Phong Nha. Động được xem như lâu đài của thạch nhũ cùng với hàng nghìn khối nhũ muôn sắc óng ánh màu cẩm thạch.</p><p><img loading=\"lazy\" class=\"aligncenter wp-image-6824\" src=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/%C4%91%E1%BB%99ng-Ti%C3%AAn-s%C6%A1n.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/động-Tiên-sơn.jpg 432w, https://vietskytourism.com.vn/wp-content/uploads/2018/03/động-Tiên-sơn-216x150.jpg 216w\" alt=\"Động Tiên sơn\" width=\"550\" height=\"382\"></p><p></p><center><span style=\"color: #999999; font-size: 10pt;\">Phượt Phong Nha Kẻ Bàng đi đâu:&nbsp;Động Tiên Sơn</span></center></div><div class=\"brs_col\" style=\"text-align: justify;\">Vé vào động Tiên Sơn là 80.000VNĐ, trẻ em dưới 1m3 miễn phí</div><h3 class=\"brs_col\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">– Động Thiên Đường</span></h3><p style=\"text-align: justify;\">Địa chỉ: thuộc huyện Bố Trạch, tỉnh Quảng Bình</p><div class=\"brs_col\" style=\"text-align: justify;\">Động Thiên Đường&nbsp;đúng với cái tên của nó – tuyệt đẹp tựa vào cõi thần tiên. Với những khối thạch nhũ muôn hình vạn trạng do thiên nhiên tạo thành và theo một cách nào đó mà có sự gắn kết kỳ lạ của thiên nhiên sẽ làm cho bạn không thể rời mắt.&nbsp;Động Thiên Đường được mệnh danh là “hoàng cung trong lòng đất” là một trong những kỳ quan tráng lệ và huyền ảo bậc nhất thế giới.</div><div class=\"brs_col\" style=\"text-align: justify;\"></div><div class=\"brs_col\" style=\"text-align: justify;\">Động Thiên đường nằm ở km 16 và cách rìa nhánh tây đường Hồ Chí Minh gần 4 km. Động nằm ở trong lòng một quần thể núi đá vôi với độ cao 191m, bao quanh là khu rừng nguyên sinh thuộc Vườn Quốc gia Phong Nha – Kẻ Bàng có chiều dài 31,4 km, chiều rộng dao động từ 30 đến 100m, nơi rộng nhất 150m và có chiều cao từ đáy lên trần động khoảng 60m.</div><div class=\"brs_col\" style=\"text-align: justify;\"></div><div class=\"brs_col\" style=\"text-align: justify;\"><img loading=\"lazy\" class=\"aligncenter wp-image-6913\" src=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/%C4%90%E1%BB%99ng-Thi%C3%AAn-%C4%90%C6%B0%E1%BB%9Dng.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/Động-Thiên-Đường.jpg 650w, https://vietskytourism.com.vn/wp-content/uploads/2018/03/Động-Thiên-Đường-250x115.jpg 250w\" alt=\"Động Thiên Đường\" width=\"550\" height=\"254\"></div><div class=\"brs_col\" style=\"text-align: center;\"><span style=\"font-size: 10pt; color: #999999;\">Phượt Phong Nha Kẻ Bàng đi đâu:&nbsp;Động Thiên Đường</span></div><div class=\"brs_col\" style=\"text-align: justify;\"></div><div class=\"brs_col\" style=\"text-align: justify;\">Giá vé 120.000VNĐ/người, vé xe điện đi vào là 100.000VNĐ cho 4 người khứ hồi</div><div class=\"brs_col\" style=\"text-align: justify;\"><h3><span style=\"font-size: 12pt;\"><strong>– Hang Tú Làn</strong></span></h3><p>Khám phá hang Tú Làn là hành trình bạn nên thử khi tới Phong Nha – Kẻ Bàng. Đến đây, bạn sẽ được dựng trại cạnh hang Ken nằm gần cửa hang Tú Làn, trước khi tiến vào sâu trong hang Tú Làn. Những phiến đá trơn cộng với địa hình hiểm trở chắc chắn sẽ là thử thách đáng nhớ khi chinh phục Tú Làn dành cho bạn đấy !</p><p><img loading=\"lazy\" class=\"aligncenter wp-image-6915\" src=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/Hang-T%C3%BA-L%C3%A0n.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/Hang-Tú-Làn.jpg 447w, https://vietskytourism.com.vn/wp-content/uploads/2018/03/Hang-Tú-Làn-223x150.jpg 223w\" alt=\"Hang Tú Làn\" width=\"550\" height=\"369\"></p><p style=\"text-align: center;\"><span style=\"font-size: 10pt; color: #999999;\">Phượt Phong Nha Kẻ Bàng đi đâu:&nbsp;Hang Tú Làn</span></p></div><h3 class=\"nVcaUb\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">– Hang Sơn Đòong</span></h3><p class=\"nVcaUb\" style=\"text-align: justify;\">Hang Sơn Đòong mới được phát hiện gần đây nằm ở trong quần thể di tích Phong Nha – Kẻ Bàng, Sơn Đoòng (hay còn được gọi là Sơn Động) là hang động lớn nhất thế giới. Nó to lớn đến mức có thể chứa được cả một toà nhà 40 tầng. Người ta thường ví Sơn Đoòng như là “Vạn lý trường thành” của Việt Nam bởi sự hùng vĩ và đồ sộ của cảnh quan trong hang Sơn Đoòng.</p><p style=\"text-align: justify;\"><img loading=\"lazy\" class=\"wp-image-6839 aligncenter\" src=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/Hang-S%C6%A1n-%C4%90%C3%B2ong.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/Hang-Sơn-Đòong.jpg 800w, https://vietskytourism.com.vn/wp-content/uploads/2018/03/Hang-Sơn-Đòong-200x150.jpg 200w\" alt=\"Hang Sơn Đòong\" width=\"550\" height=\"413\"></p><p style=\"text-align: center;\"><span style=\"font-size: 10pt; color: #999999;\">Phượt Phong Nha Kẻ Bàng đi đâu:&nbsp;Hang Sơn Đòong</span></p><p style=\"text-align: justify;\">Không chỉ nổi tiếng về kích thước khổng lồ mà Sơn Đoòng còn có cả một hệ sinh thái trong hang cùng cảnh quan sinh vật đa dạng và thảm thực vật phong phú.</p><div class=\"brs_col\" style=\"text-align: justify;\"><h3><span style=\"font-size: 12pt;\"><strong>– Hang Én</strong></span></h3><p>Nằm cạnh hang Sơn Đoòng, hang Én được nhận định là hang động lớn thứ 3 trên thế giới. Đây cũng là một trong những hang động đẹp nhất thuộc quần thể Phong Nha – Kẻ Bàng với sông ngầm và hệ sinh thái độc đáo bên trong.</p><p><img loading=\"lazy\" class=\"aligncenter wp-image-6914\" src=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/Hang-%C3%89n-1.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"https://vietskytourism.com.vn/wp-content/uploads/2018/03/Hang-Én-1.jpg 450w, https://vietskytourism.com.vn/wp-content/uploads/2018/03/Hang-Én-1-225x150.jpg 225w\" alt=\"Hang Én\" width=\"550\" height=\"367\"></p><p style=\"text-align: center;\"><span style=\"font-size: 10pt; color: #999999;\">Phượt Phong Nha Kẻ Bàng đi đâu:&nbsp;Hang Én</span></p><h3 class=\"nVcaUb\"><span style=\"font-size: 12pt;\">– Sông Chày Hang Tối ở Quảng Bình</span></h3><p class=\"nVcaUb\">Sông Chày Hang Tối&nbsp;thuộc Di sản thiên nhiên thế giới Vườn quốc gia Phong Nha – Kẻ Bàng, cách TP. Đồng Hới khoảng 50km về phía Tây Bắc.</p><p class=\"nVcaUb\">Sông Chày là con sông được khởi tạo từ vùng núi đá vôi ở Phong Nha – Kẻ Bàng. Đến đây, nơi chạm vào mắt bạn sẽ là những gợn nước trong veo màu xanh ngọc bích cực đẹp và chắc chắn bạn sẽ&nbsp;mê mẩn&nbsp;trong tầm mắt với 2 bên dọc bờ sông với những cánh đồng trù phú, khu rừng nhiệt đới rậm rạp rất hoang dã.</p><p class=\"nVcaUb\">Mở đầu hành trình khám phá hang Tối, du khách được thử cảm giác đu dây zipline nối hai bên bờ sông, trước khi bơi vào khu vực cửa hang. Ánh sáng mờ dần và khung cảnh trở nên huyền ảo khi đi sâu hơn vào hang, qua những lối đi nhỏ đầy bùn. Trải nghiệm bơi trong hồ nước Thủy Tiên nằm sâu dưới lòng hang sẽ mang lại giây phút đáng nhớ. Sau khi chèo thuyền kayak, ngắm không gian thơ mộng, bạn sẽ trở về bến thuyền, kết thúc chuyến thăm hang Tối.</p><p class=\"nVcaUb\">Đi trong lòng hang, bạn sẽ chỉ còn những ánh sáng từ đèn pin dẫn lối. Nhưng đến khi vào bên trong bạn sẽ như được bắt nhịp với tiên cảnh thơ mộng, thỏa sức vẫy vùng trong lớp bùn non (rất tốt cho sức khỏe và làm đẹp). Sau đó, bạn hãy quay ngược lại hồ Thủy Tiên trong hang Tối để có thể&nbsp; tắm rửa cho sạch bùn trên người nhé !</p><h2 class=\"nVcaUb\"><span style=\"font-size: 12pt;\">Có thể bạn muốn xem: <span style=\"color: #0000ff;\"><a style=\"color: #0000ff;\" href=\"https://vietskytourism.com.vn/chi-tiet/gia-ve-hang-toi-quang-binh/\" target=\"_blank\" rel=\"noopener noreferrer\">Giá vé Hang Tối Quảng Bình</a></span></span></h2></div><h2 class=\"nVcaUb\" style=\"text-align: justify;\"><span style=\"font-size: 14pt;\">Tour du lịch Phong Nha Kẻ Bàng</span></h2><p style=\"text-align: justify;\">Các chương trình tour du lịch Quảng Bình được tổ chức bởi Vietskytourism:</p><p style=\"text-align: justify;\">– Tour du lịch Hà Nội – Biển Nhật Lệ – Động Phong Nha 5N4Đ – 4N3Đ</p><p style=\"text-align: justify;\">–&nbsp;Tour Du Lịch Quảng Bình: Khám phá sông Chày- Hang tối</p><p style=\"text-align: justify;\">–&nbsp;Tour Du Lịch Quảng Bình: Động Phong Nha</p><p style=\"text-align: justify;\">–&nbsp;Tour Du Lịch Hà Nội – Đà Nẵng – Huế – Thánh Địa La Vang – Quảng Bình</p><p style=\"text-align: justify;\">Cùng với rất nhiều các chương trình tour hấp dẫn khác với giá vô cùng ưu đãi.</p><p style=\"text-align: justify;\">Nếu như công việc của bạn khá bận rộn, bạn cần quay về với thiên nhiên, khám phá những hang động, thả hồn vào những con sóng biển để có thể giải tỏa sự căng thẳng của bản thân. Vietskytourism sẽ giúp bạn điều đó, chỉ với 1 hoặc 2 ngày, bạn có thể đến với Quảng Bình thơ mộng này, vừa có người đồng hành mới chuyện trò và cũng không phải lo lắng về điều gì trong chuyến đi. Chắc chắn rằng với chuyến đi ngắn này, bạn cũng có thể quay lại công việc với một năng lượng tràn đầy sức sống đấy ! Tham khảo lịch trình tour dưới đây nhé :</p><h2 class=\"nVcaUb\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">&gt;&gt;&gt;&gt; <span style=\"color: #0000ff;\"><a style=\"color: #0000ff;\" href=\"https://vietskytourism.com.vn/du-lich-quang-binh/\" target=\"_blank\" rel=\"noopener noreferrer\">Tour Phong Nha Kẻ Bàng 1 ngày</a></span></span></h2><p style=\"text-align: justify;\">–&nbsp;Tour Du Lịch Quảng Bình: Động Thiên Đường<br> –&nbsp;Tour Du Lịch Quảng Bình: Động Phong Nha<br> –&nbsp;Tour Du Lịch Quảng Bình: Khám phá sông Chày – Hang tối</p><h2 style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Tour du lịch Phong Nha Kẻ Bàng 2 ngày</span></h2><p style=\"text-align: justify;\">Bạn có thể tham khảo lịch trình Tour Huế – Phong Nha trong 2 ngày dưới đây nhé !</p><div class=\"program-title\" style=\"text-align: justify;\"><p>NGÀY 1: HUẾ – ĐỘNG PHONG NHA – ĐỒNG HỚI</p></div><div class=\"program-content\" style=\"text-align: justify;\"><p>06h30: Xe và HDV đón khách tại điểm hẹn khởi hành đi tham quan động Phong Nha – Thiên Đường. Trên đường đi ghé tham quan Thánh Địa La Vang (Được mệnh danh là Tiểu Vương Cung Thánh Đường). Ngoài ra HDV sẽ giới thiệu cho Quý Khách đôi nét về Thành Cổ Quảng Trị và các địa danh lịch sử Cách Mạng như: Căn Cứ Dốc Miếu, cầu Hiền Lương, sông Bến Hải (không dừng tham quan) … Ăn trưa tại nhà hàng.</p><p>12h30 : Du thuyền trên sông Son vào tham quan Động Phong Nha</p><p>16h00 : Trở lại bến thuyền. Xe đưa quý khách về Đồng Hới nhận phòng nghỉ ngơi.</p><div class=\"program-title\"><p>NGÀY 2:ĐỒNG HỚI – ĐỘNG THIÊN ĐƯỜNG – HUẾ</p></div><div class=\"program-content\"><p>10h40: Xe và HDV đón quý khách tại khách sạn. Khởi hành đi tham quan Động Thiên Đường</p><p>11h45: Ăn trưa tại nhà hàng.</p><p>13h00: Tham quan Động Thiên Đường.</p><p>15h30: Trở về Huế theo Đường mòn Hồ Chí Minh.</p><p>22h00: Đến Huế, trả khách tại điểm hẹn ban đầu.</p><p>Mặc dù là một đơn vị mới được thành lập từ tiền thân là một đại lý vé máy bay ở khu vực phía Bắc. Nhưng với đội ngũ nhân sự chủ chốt nhiều năm kinh nghiệm đã từng làm việc cho các đơn vị lữ hành lớn tại Việt Nam thì Vietskytourism luôn tự hào mang đến cho du khách những chương trình du lịch chất lượng nhất với giá cả hợp lý nhất.</p></div></div><p style=\"text-align: justify;\">Hy vọng với bài viết <strong>”Kinh nghiệm phượt Phong Nha Kẻ Bàng&nbsp;”&nbsp;</strong>&nbsp;sẽ mang đến cho bạn những thông tin bổ ích và thú vị trong chuyến đi sắp tới của mình. Với nhiều kinh nghiệm của mình, Vietskytourism tin chắc rằng sẽ mang lại cho bạn&nbsp;những trải nghiệm tốt nhất ! Chúc bạn có chuyến đi vui vẻ !</p></div>', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dia_chi` text NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `dia_chi`, `user_type`, `created_at`) VALUES
(10, 'admin', '$2y$10$uI03dBGlXlDxlNlc9VWz2..DydvYcalEtVwuK8sT5cr8SqeZVlzD6', 'Tỉnh Bạc Liêu, Việt Nam', 2, '2022-11-07 18:58:50'),
(13, 'mayamqqqqq', '$2y$10$HvR/YC55jubsBfcuFPYmWOM6CUWybHlrneU.Hd0935I65bR8Ckn7.', 'Tỉnh Bạc Liêu, Việt Nam', 1, '2022-11-12 17:03:56');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `des`
--
ALTER TABLE `des`
  ADD PRIMARY KEY (`id_des`);

--
-- Chỉ mục cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  ADD PRIMARY KEY (`id_dd`);

--
-- Chỉ mục cho bảng `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`);

--
-- Chỉ mục cho bảng `mota`
--
ALTER TABLE `mota`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `des`
--
ALTER TABLE `des`
  MODIFY `id_des` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `id_dd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `mota`
--
ALTER TABLE `mota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
