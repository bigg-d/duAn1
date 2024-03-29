-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2024 lúc 02:32 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 Thanh toán trực tiếp\r\n2 Chuyển khoản\r\n3 Thanh toán online',
  `ngaydathang` varchar(255) NOT NULL,
  `tatal` int(11) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.Đơn hàng mới\r\n1.Đang xử lý\r\n2.Đang giao hàng\r\n3.Đã giao hàng\r\n4 : Đã hủy đơn hàng',
  `note` varchar(255) DEFAULT NULL,
  `receive_name` varchar(255) NOT NULL,
  `receive_address` varchar(255) NOT NULL,
  `receive` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `title`, `noidung`, `iduser`, `idproduct`, `ngaybinhluan`) VALUES
(9, 'Chất liệu', 'Vải thoáng mát', 5, 28, '26/03/2024'),
(10, 'Màu sắc', 'Màu sắc okokook', 12, 28, '22/03/2004'),
(11, 'Dịch vụ', 'Shop tư vấn nhiệt tình ', 5, 28, '26/03/2024'),
(12, 'sản phẩm', 'm Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5, 28, '26/03/2024'),
(13, 'da', 'Sản phẩm ok', 18, 28, '26/03/2024'),
(14, 'Sản phẩm', 'Sản phẩm chất lượng', 18, 25, '26/03/2024'),
(15, 'Màu săc sản phẩm', 'Áo đẹp', 18, 23, '26/03/2024'),
(16, 'Dịch vụ', 'Chất lượng dịch vụ tuyệt vời', 18, 37, '26/03/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`) VALUES
(22, 5, '2024-03-28 10:25:01'),
(27, 1, '2024-03-28 11:08:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_item`
--

INSERT INTO `cart_item` (`id`, `cart_id`, `product_id`, `product_name`, `product_img`, `product_price`, `quantity`, `total_price`) VALUES
(62, 22, 28, ' Áo gile Bibos nâu hình cún con', 'anh-gan-logo-mau-nhi-2.jpg', 169000, 1, 169000),
(63, 22, 25, 'Set quần yếm rêu mix áo trắng cho bé', 'set-quan-yem-reu-mix-ao-trang-138387-1.jpg', 139000, 1, 139000),
(64, 22, 34, 'Áo len Cool Baby 4164 gấu be', 'ao-len-coolbaby-gau-be.jpg', 159000, 5, 795000),
(67, 27, 28, ' Áo gile Bibos nâu hình cún con', 'anh-gan-logo-mau-nhi-2.jpg', 169000, 1, 169000),
(68, 27, 27, 'Áo khoác lông cừu màu trắng', 'ao-khoac-long-cuu-mau-trang-138186.jpg', 189000, 1, 189000),
(69, 27, 24, 'Quần kaki bé trai phong cách màu trắng', 'quan-kaki-be-trai-phong-cach-mau-trang-138821-1.jpg', 139000, 3, 417000),
(70, 27, 36, 'Bộ áo và quần yếm bé trai BT04', 'httpsmedia.bibomart.netubbmproduct201810241029bo-ao-va-quan-yem-be-trai-118806_1.jpg', 249000, 1, 249000),
(71, 27, 26, 'Set quần yếm rêu mix áo trắng cho bé', 'set-quan-yem-nau-mix-ao-trang-138382-1.jpg', 139000, 1, 139000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddm` int(11) NOT NULL,
  `tendanhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`iddm`, `tendanhmuc`) VALUES
(1, 'Giày - Dép trẻ em'),
(2, 'Phụ kiện thời trang'),
(3, 'Đồ sơ sinh cho bé\r\n'),
(4, 'Thời trang bé gái'),
(5, 'Thời trang bé trai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_email` varchar(255) NOT NULL,
  `recipient_phone` varchar(12) NOT NULL,
  `recipient_address` varchar(255) NOT NULL,
  `payment_method` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 Thanh toán khi nhận hàng\r\n2 Chuyển khoản\r\n',
  `order_date` varchar(11) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `process` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 Tiếp nhận đơn hàng\r\n2 Đang xử lí\r\n3 Đang giao hàng\r\n4 Giao hàng thành công\r\n5 Đã hủy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `recipient_name`, `recipient_email`, `recipient_phone`, `recipient_address`, `payment_method`, `order_date`, `total_amount`, `process`) VALUES
(39, 5, 'Hoàng Lâm', 'hoanglamksks987@gmail.com', '0931999999', 'Số 52 xóm gốc dồ', 1, '2024-03-27 ', '53', 1),
(40, 1, 'Hoàng Lâm', 'hoanglamksks987@gmail.com', '0357020289', 'Số 52 xóm gốc dồfd', 1, '2024-03-28 ', '29.7', 1),
(41, 1, 'Hoàng Lâm', 'hoanglamksks987@gmail.com', '0357020289', 'Số 52 xóm gốc dồfd', 1, '2024-03-28 ', '29.7', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(52, 39, 26, 4),
(53, 39, 25, 6),
(54, 40, 28, 1),
(55, 40, 25, 1),
(56, 40, 27, 3),
(58, 41, 28, 1),
(59, 41, 27, 1),
(60, 41, 24, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `images` varchar(500) DEFAULT NULL,
  `mota` varchar(500) NOT NULL,
  `view` int(11) NOT NULL,
  `iddm` int(11) NOT NULL,
  `stock_quantity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `images`, `mota`, `view`, `iddm`, `stock_quantity`) VALUES
(23, 'Áo dài đỏ bé trai thêu rồng', 269000, 'ao-dai-do-bt-theu-rong-138804-1.jpg', 'ao-dai-do-bt-theu-rong-138804-5.jpg,ao-dai-do-bt-theu-rong-138804-3.jpg,ao-dai-do-bt-theu-rong-138804-4.jpg,ao-dai-do-bt-theu-rong-138804-2.jpg,ao-dai-do-bt-theu-rong-138804-1.jpg', 'Áo dài đỏ bé trai thêu rồng là thiết kế cách tân cực sành điệu, hiện đại dành riêng cho các quý ông nhí. Áo được làm từ vải nhung mịn mướt với độ dày vừa phải, mang đến cho bé sự thoải mái, ấm áp và dễ chịu. Dáng áo suông rộng rãi phù hợp với nhiều kiểu q', 11, 5, 0),
(24, 'Quần kaki bé trai phong cách màu trắng', 139000, 'quan-kaki-be-trai-phong-cach-mau-trang-138821-1.jpg', 'quan-kaki-be-trai-phong-cach-mau-trang-138821-2.jpg,quan-kaki-be-trai-phong-cach-mau-trang-138821-1.jpg', 'Quần kaki bé trai phong cách màu trắng là món đồ không thể thiếu trong tủ đồ của các bé trai, thích hợp mặc trong mọi dịp như đi học, đi chơi, đi dự tiệc,... Được may từ vải kaki nên quần có độ bền cao, thoáng mát và không bị phai màu khi mặc. Đồng thời, ', 3, 5, 25),
(25, 'Set quần yếm rêu mix áo trắng cho bé', 139000, 'set-quan-yem-reu-mix-ao-trang-138387-1.jpg', 'set-quan-yem-reu-mix-ao-trang-138387-4.jpg,set-quan-yem-reu-mix-ao-trang-138387-2.jpg,set-quan-yem-nau-mix-ao-trang-138382-4.jpg,set-quan-yem-reu-mix-ao-trang-138387-3.jpg,set-quan-yem-reu-mix-ao-trang-138387-1.jpg', 'Set quần yếm rêu mix áo trắng là bộ trang phục ấm áp, dày dặn, thích hợp để bé diện trong thời tiết se lạnh của mùa đông. Áo dài tay trơn màu kết hợp cùng quần yếm trang trí hoạ tiết gấu dễ thương, mang đến cho bé vẻ ngoài nổi bật và ấn tượng. Sản phẩm đư', 66, 5, 25),
(26, 'Set quần yếm rêu mix áo trắng cho bé', 139000, 'set-quan-yem-nau-mix-ao-trang-138382-1.jpg', 'set-quan-yem-nau-mix-ao-trang-138382-5.jpg,set-quan-yem-nau-mix-ao-trang-138382-4_1.jpg,set-quan-yem-nau-mix-ao-trang-138382-2.jpg,set-quan-yem-nau-mix-ao-trang-138382-3.jpg,set-quan-yem-nau-mix-ao-trang-138382-1.jpg', '                    Set quần yếm nâu mix áo trắng là thiết kế xinh xắn dành riêng cho các bé yêu trong mùa đông lạnh. Bộ trang phục gồm quần yếm và áo dài tay với kiểu dáng basic thông dụng, mang đến cho bé vẻ ngoài đáng yêu, năng động. Quần yếm có thiết kế cài cúc tiện lợi,                ', 2, 1, 25),
(27, 'Áo khoác lông cừu màu trắng', 189000, 'ao-khoac-long-cuu-mau-trang-138186.jpg', 'ao-khoac-long-cuu-mau-trang-138186-2.jpg,ao-khoac-long-cuu-mau-trang-138186-1.jpg,ao-khoac-long-cuu-mau-trang-138186.jpg', 'Áo khoác lông cừu màu trắng nổi bật với tông màu tươi tắn, làm toát lên nét đáng yêu, hồn nhiên tinh nghịch của trẻ nhỏ. Áo có thiết kế dài tay thông dụng, phom dáng rộng rãi giúp bé thoải mái trong từng cử động. Lớp lông cừu mềm mịn bao phủ cả mặt trong ', 80, 5, 25),
(28, ' Áo gile Bibos nâu hình cún con', 169000, 'anh-gan-logo-mau-nhi-2.jpg', 'ao-gile-bt-bibos-nau-135570-6.jpg,ao-gile-bt-bibos-nau-135570-4.jpg,ao-gile-bt-bibos-nau-135570-2.jpg,ao-gile-bt-bibos-nau-135570-5.jpg,ao-gile-bt-bibos-nau-135570_1_.jpg,ao-gile-nau-bibo-s-cun-con.jpg,anh-gan-logo-mau-nhi-2.jpg', 'Những anh chàng model điển trai của mẹ làm sao có thể bỏ qua mẫu áo gile Bibos nâu hình cún con xinh xắn này được. Với kiểu dáng gile kết hợp với họa tiết đáng yêu cùng chất vải mềm mịn, sản phẩm giúp mẹ dễ dàng phối cho bé những set đồ ấm áp nhưng vẫn đả', 101, 5, 25),
(29, ' Quần khủng long bé trai', 99000, 'quan-khung-long-be-trai-138448-1.jpg', 'quan-khung-long-be-trai-138448-3.jpg,quan-khung-long-be-trai-138448-2.jpg,quan-khung-long-be-trai-138448-1.jpg', 'Quần khủng long bé trai với thiết kế bo gấu tiện lợi, có khả năng giữ ấm hiệu quả cho bé trước những cơn gió lạnh đầu mùa. Chất vải nỉ dày dặn, mềm mại, tạo cảm giác dễ chịu thoải mái khi tiếp xúc với làn da nhạy cảm của trẻ nhỏ. Thiết kế in hình khủng lo', 4, 5, 0),
(30, 'Bộ pijama dài tay Chong Chóng khủng long xanh', 199000, 'bo-pijama-dt-bt-cc-xo-muslin-khung-long-xanh-134315 - Copy.jpg', 'bo-pijama-dt-bt-cc-xo-muslin-khung-long-xanh-134315-5.jpg,bo-pijama-dt-bt-cc-xo-muslin-khung-long-xanh-134315-8.jpg,bo-pijama-dt-bt-cc-xo-muslin-khung-long-xanh-134315-4.jpg,bo-pijama-dt-bt-cc-xo-muslin-khung-long-xanh-134315-3.jpg,bo-pijama-dt-bt-cc-xo-muslin-khung-long-xanh-134315 - Copy.jpg', 'Pijama là kiểu dáng quen thuộc được nhiều ba mẹ lựa chọn khi sắm quần áo mặc ở nhà cho bé. Bộ pijama dài tay Chong Chóng khủng long xanh sẽ mang đến gợi ý siêu xinh để bé được tận hưởng cảm giác thoải mái, dễ chịu mà không hề cảm thầy gò bó, bí bức khi mặ', 1, 5, 25),
(31, 'Bộ cộc tay Lullaby raglan NH147V trắng - navy', 99000, 'bo-bt-coc-tay-raglan-nh147v-trang-navy-12m-136666-1.jpg', 'bo-bt-coc-tay-raglan-nh147v-trang-navy-12m-136666-5.jpg,bo-bt-coc-tay-raglan-nh147v-trang-navy-12m-136666-4.jpg,bo-bt-coc-tay-raglan-nh147v-trang-navy-12m-136666-3.jpg,bo-bt-coc-tay-raglan-nh147v-trang-navy-12m-136666-2.jpg,bo-bt-coc-tay-raglan-nh147v-trang-navy-12m-136666-1.jpg', 'Bộ cộc tay Lullaby raglan NH147V trắng - Navy là thiết kế được yêu thích trong hè này bởi kiểu dáng thoải mái và họa tiết trang trí dễ thương. Đặc biệt, chất liệu mềm mại, không gây kích ứng cho da trẻ là ưu điểm giúp sản phẩm ghi điểm trong mắt ba mẹ.', 1, 5, 25),
(32, 'Bộ cộc tay raglan Lullaby NH135V trắng ghi', 99000, 'bo-coc-tay-raglan-lullaby-trang-ghi-136395-1.jpg', 'bo-coc-tay-raglan-lullaby-trang-ghi-136395-5.jpg,bo-coc-tay-raglan-lullaby-trang-ghi-136395-4.jpg,bo-coc-tay-raglan-lullaby-trang-ghi-136395-2.jpg,bo-coc-tay-raglan-lullaby-trang-ghi-136395-3.jpg,bo-coc-tay-raglan-lullaby-trang-ghi-136395-1.jpg', 'Bộ cộc tay raglan Lullaby trắng ghi được may từ chất liệu 100% cotton cao cấp, mang đến ưu điểm vượt trội về độ mềm mại, thông thoáng và thấm hút tốt. Một set đồ an toàn về chất liệu, năng động về kiểu dáng sẽ cùng bé trải qua những chuyến vi vu xuân hè t', 1, 5, 25),
(33, 'Bộ thun dài tay Chong Chóng gấu Panda màu nâu đậm', 149000, 'bo-dai-tay-bg-chong-chong-nau-dam.jpg', 'bo-dai-tay-bg-chong-chong-nau-dam-4.jpg,bo-dai-tay-bg-chong-chong-nau-dam-5.jpg,bo-dai-tay-bg-chong-chong-nau-dam-3.jpg,bo-dai-tay-bg-chong-chong-nau-dam-2.jpg,bo-dai-tay-bg-chong-chong-nau-dam.jpg', 'Bộ thun dài tay Chong Chóng gấu Panda màu nâu đậm nằm trong BST thu đông mới nhất của Chong Chóng lấy nguồn cảm hứng từ các nhân vật ngộ nghĩnh trong bộ phim hoạt hình nổi tiếng We Bare Bears. Bên cạnh họa tiết chú gấu Panda đang chill theo điệu nhạc vô c', 1, 5, 25),
(34, 'Áo len Cool Baby 4164 gấu be', 159000, 'ao-len-coolbaby-gau-be.jpg', 'ao-len-coolbaby-gau-1.jpg,ao-len-coolbaby-gau-2.jpg,ao-len-coolbaby-gau-be.jpg', 'Áo len Cool Baby 4164 gấu be là item luôn nên có trong tủ đồ của bé để bé trải qua những ngày đông thật ấm áp và trọn vẹn. Chất len dày dặn nhưng vẫn có độ thông thoáng để bé luôn thoải mái và tự tin cho mọi hoạt động vui chơi.', 3, 5, 25),
(35, 'Áo cộc tay Chong Chóng bé trai cài vai HC8989 vàng', 109000, 'ao-phong-coc-tay-be-trai-vang.jpg', 'ao-cv-coc-tay-bt-cc-vang-121874-1.jpg,ao-coc-tay-vang.jpg,ao-phong-coc-tay-be-trai-vang.jpg', 'Áo cộc tay Chong Chóng bé trai cài vai HC8989 vàng là sản phẩm thuộc thương hiệu Chong Chóng (Việt Nam) chuyên sản xuất quần áo cho trẻ nhỏ với chất liệu đảm bảo an toàn giúp bố mẹ có những sự lựa chọn yên tâm, tin tưởng. Bộ quần áo được làm bằng chất liệ', 0, 5, 25),
(36, 'Bộ áo và quần yếm bé trai BT04', 249000, 'httpsmedia.bibomart.netubbmproduct201810241029bo-ao-va-quan-yem-be-trai-118806_1.jpg', 'httpsmedia.bibomart.netubbmproduct201810241030bo-ao-va-quan-yem-be-trai-118806-3_1.jpg,httpsmedia.bibomart.netubbmproduct201810241030bo-ao-va-quan-yem-be-trai-118806-1_1.jpg,httpsmedia.bibomart.netubbmproduct201810241029bo-ao-va-quan-yem-be-trai-118806_1.jpg', 'Bộ áo và quần yếm bé trai BT04 sẽ là sự lựa chọn hoàn hảo của mẹ dành cho bé trong mùa thu đông năm nay. Được làm từ chất liệu cao cấp, an toàn và bền đẹp, bộ áo và quần yếm sẽ mang lại cho bé cảm giác dễ chịu, thoải mái nhất khi mặc, không những ấm áp tr', 2, 5, 25),
(37, 'Áo dài tay bé trai Bibos Little man đỏ in dây', 109000, 'img_2736.jpg', 'ao-dai-tay-be-trai_-bibos-little-man_-do-in-day-4.jpg,ao-dai-tay-be-trai_-bibos-little-man_-do-in-day-1.jpg,ao-dai-tay-be-trai_-bibos-little-man_-do-in-day-3.jpg,ao-dai-tay-be-trai_-bibos-little-man_-do-in-day-5.jpg,ao-dai-tay-be-trai_-bibos-little-man_-do-in-day.jpg', 'Áo dài tay bé trai Bibos Little man đỏ in dây là sản phẩm mới nằm trong bộ sưu tập \"Baby X-Mas\" của thương hiệu thời trang Bibos. Với những thiết kế kiểu cách đặc biệt, chất liệu được chọn lọc kĩ càng mang đến cho bé yêu của mẹ những bộ đồ xinh đẹp nhất c', 5, 5, 25),
(38, 'Bộ bổ trụ cộc tay Avaler chim xanh', 99000, 'bo-bo-tru-ct-chim-xanh.jpg', 'bo-bo-tru-ct-chim-xanh-3.jpg,bo-bo-tru-ct-chim-xanh-2.jpg,bo-bo-tru-ct-chim-xanh-1.jpg,bo-bo-tru-ct-chim-xanh.jpg', 'Bộ bổ trụ cộc tay Avaler chim xanh có họa tiết trang trí nổi bật và màu sắc xanh - trắng kết hợp hài hòa, tươi sáng. Sản phẩm sử dụng chất liệu 95% bamboo và 5% spandex cao cấp, mang lại cảm giác mềm mại, thoáng khí và co dãn dễ chịu cho bé mỗi khi mặc.', 0, 5, 25),
(39, 'Áo khoác Bibos xanh tai thỏ', 199, 'anh-gan-logo-mau-nhi-1.jpg', 'ao-khoac-bt-bibos-xanh-tai-tho-135076-4.jpg,ao-khoac-bt-bibos-xanh-tai-tho-135076-5.jpg,ao-khoac-bt-bibos-xanh-tai-tho-135076-3.jpg,ao-khoac-bt-bibos-xanh-tai-tho-135076.jpg,ao-khoac-bibo-s-tai-tho-xanh.jpg,anh-gan-logo-mau-nhi-1.jpg', 'Để bé yêu vẫn luôn xinh xắn rạng ngời ngay cả trong những ngày đông giá lạnh, Bibos mang đến cho ba mẹ gợi ý siêu dễ thương với áo khoác Bibos xanh tai thỏ hứa hẹn sẽ chiếm trọn cảm tình của bé ngay từ cái nhìn đầu tiên. Bên cạnh chất vải cotton dày dặn v', 0, 5, 25),
(40, 'Áo khoác bé trai Bibos khủng long ghi', 169000, 'ao-khoac-be-trai-bibos-khung-long-ghi_1.jpg', 'cong_nang.jpg,ao-khoac-bt-bibos-khung-long-ghi-130931-2.jpg,ao-khoac-bt-bibos-khung-long-ghi-130931-1.jpg,vai.jpg,ao-khoac-be-trai-khung-long-ngo-nghinh.jpg,ao-khoac-be-trai-bibos-khung-long-ghi_1.jpg', 'Áo khoác bé trai Bibos khủng long ghi là dòng sản phẩm mới nhất của Bibos chiếc áo khoác với thiết kế tạo hình con vật nổi bật và bắt mắt chắc chắn bé mặc lên sẽ rất yêu. Chất liệu chính để tạo lên sản phẩm này là từ 93% Jacquard xốp, Cotton, 7% spandex. ', 0, 5, 25),
(41, 'Set dạ lông màu đỏ sang chảnh cho bé', 149000, 'set-da-long-mau-do-sang-chanh-cho-be-138836.jpg', 'set-da-long-mau-do-sang-chanh-cho-be-138836-4.jpg,set-da-long-mau-do-sang-chanh-cho-be-138836-3.jpg,set-da-long-mau-do-sang-chanh-cho-be-138836-2.jpg,set-da-long-mau-do-sang-chanh-cho-be-138836-1.jpg,set-da-long-mau-do-sang-chanh-cho-be-138836.jpg', 'Set dạ lông màu đỏ sang chảnh cho bé chắc hẳn sẽ khiến các bé gái điệu đà yêu thích ngay từ cái nhìn đầu tiên. Chất vải dạ có phủ lông vừa giúp trang phục đứng phom, vừa giữ nhiệt tốt, giúp bé cảm thấy thoải mái khi diện trong những ngày trời chuyển lạnh.', 0, 4, 25),
(42, 'Set váy yếm nhung kèm gấu màu đỏ', 209000, 'set-vay-yem-nhung-kem-gau-mau-do-138521.jpg', 'set-vay-yem-nhung-kem-gau-mau-do-138521-4.jpg,set-vay-yem-nhung-kem-gau-mau-do-138521-2.jpg,set-vay-yem-nhung-kem-gau-mau-do-138521-3.jpg,set-vay-yem-nhung-kem-gau-mau-do-138521-1.jpg,set-vay-yem-nhung-kem-gau-mau-do-138521.jpg', 'Set váy yếm nhung kèm gấu màu đỏ là item không thể bỏ lỡ trong dịp giáng sinh sắp tới. Chất liệu len nhung mềm mại, ấm áp, thích hợp với thời tiết mùa đông lạnh nhưng vẫn thời trang. Set có áo thun dài tay và chiếc váy yếm đỏ đính kèm gấu cực kỳ xinh xắn,', 0, 4, 25),
(43, 'Váy tutu công chúa kết hoa xinh xắn', 269000, 'vay-tutu-cong-chua-ket-hoa-xinh-xan-138940-4.jpg', 'vay-tutu-cong-chua-ket-hoa-xinh-xan-138940-3.jpg,vay-tutu-cong-chua-ket-hoa-xinh-xan-138940-2.jpg,vay-tutu-cong-chua-ket-hoa-xinh-xan-138940-1.jpg,vay-tutu-cong-chua-ket-hoa-xinh-xan-138940-4.jpg', 'Váy tutu công chúa kết hoa xinh xắn có thiết kế cầu kỳ, giúp bé yêu trở nên tự tin và nổi bật trong những dịp đặc biệt. Váy được làm từ chất vải voan mềm mại kết hợp với các chi tiết hoa lụa cách điệu được đính trên thắt eo, đem tới diện mạo nữ tính, ngọt', 0, 4, 25),
(44, 'Áo dài lụa bé gái đính hoa ngực', 349000, 'ao-dai-do-chan-vay-dinh-hoa.jpg', 'ao-dai-do-chan-vay-dinh-hoa-4.jpg,ao-dai-do-chan-vay-dinh-hoa-3.jpg,ao-dai-do-chan-vay-dinh-hoa-hong-trang-do-2.jpg,ao-dai-do-chan-vay-dinh-hoa-1.jpg,ao-dai-do-chan-vay-dinh-hoa.jpg', 'Áo dài lụa bé gái đính hoa ngực đem tới cho các bé gái một diện mạo xinh xắn, nổi bật trong những chuyến du xuân vào dịp Tết sắp tới. Áo dài được sản xuất từ chất liệu lụa mềm mịn, mỏng nhẹ, với những đường cắt may tinh tế nên rất thân thiện với làn da bé', 0, 4, 25),
(45, 'Áo dài lụa bé gái cổ ngọc cài hoa', 349000, 'ao-dai-do-chan-vay-dinh-hoa-hong-trang-do.jpg', 'ao-dai-do-chan-vay-dinh-hoa-hong-trang-do-5.jpg,ao-dai-do-chan-vay-dinh-hoa-hong-trang-do-4.jpg,ao-dai-do-chan-vay-dinh-hoa-hong-trang-do-3.jpg,ao-dai-do-chan-vay-dinh-hoa-hong-trang-do-2_1.jpg,ao-dai-do-chan-vay-dinh-hoa-hong-trang-do-1.jpg,ao-dai-do-chan-vay-dinh-hoa-hong-trang-do.jpg', 'Áo dài lụa bé gái cổ ngọc cài hoa là một thiết kế hết sức duyên dáng, ngọt ngào dành riêng cho những bé gái điệu đà trong dịp tết năm nay. Áo dài được làm từ chất liệu vải lụa mềm mại, với những đường vân tạo hiệu ứng thị giác bắt mắt. Các chi tiết ngọc t', 0, 4, 25),
(46, 'Set váy da kèm gile lông', 269000, 'set-vay-da-kem-gile-long-138526-5.jpg', 'set-vay-da-kem-gile-long-138526-3.jpg,set-vay-da-kem-gile-long-138526-4.jpg,set-vay-da-kem-gile-long-138526-2.jpg,set-vay-da-kem-gile-long-138526-1.jpg,set-vay-da-kem-gile-long-138526.jpg,set-vay-da-kem-gile-long-138526-5.jpg', 'Set váy da kèm gile lông mang tới phong cách thời trang sang trọng nhưng vẫn tôn lên nét điệu đà, nữ tính của bé gái trong mùa thu đông năm nay. Set váy được làm từ chất liệu an toàn và mềm mại, khiến bé không chỉ thoải mái khi mặc mà còn dễ dàng vận động', 0, 4, 25),
(47, 'Set quần yếm nâu mix áo trắng cho bé', 139000, 'set-quan-yem-nau-mix-ao-trang-138382_6 (1).jpg', 'set-quan-yem-nau-mix-ao-trang-138382-5 (1).jpg,set-quan-yem-nau-mix-ao-trang-138382-4_1 (1).jpg,set-quan-yem-nau-mix-ao-trang-138382-2 (1).jpg,set-quan-yem-nau-mix-ao-trang-138382-3 (1).jpg,set-quan-yem-nau-mix-ao-trang-138382-1 (1).jpg,set-quan-yem-nau-mix-ao-trang-138382_6 (1).jpg', 'Set quần yếm nâu mix áo trắng là thiết kế xinh xắn dành riêng cho các bé yêu trong mùa đông lạnh. Bộ trang phục gồm quần yếm và áo dài tay với kiểu dáng basic thông dụng, mang đến cho bé vẻ ngoài đáng yêu, năng động. Quần yếm có thiết kế cài cúc tiện lợi,', 0, 4, 25),
(48, 'Bộ thun dài tay gân tăm in hình nhiều màu', 129000, 'bo-thun-dt-bt-gan-tam-in-hinh-138697-3.jpg', 'bo-thun-dt-bt-gan-tam-in-hinh-138697-6.jpg,bo-thun-dt-bt-gan-tam-in-hinh-138697-5.jpg,bo-thun-dt-bt-gan-tam-in-hinh-138697-4.jpg,bo-thun-dt-bt-gan-tam-in-hinh-138697-3.jpg', 'Bộ thun dài tay gân tăm in hình nhiều màu là bộ quần áo thun dài tay có thiết kế đơn giản nhưng không kém phần năng động, cá tính. Thiết kế áo cổ lửng cùng quần bo gấu giúp giữ ấm cho cơ thể bé yêu trong những ngày se lạnh mà không gây ra cảm giác bí bách', 0, 4, 25),
(49, 'Áo choàng Bibos be tai gấu', 269000, 'ao-khoac-bg-bibos-be-tai-gau-135529-1_1_2.jpg', 'ao-khoac-bg-bibos-be-tai-gau-135529-5.jpg,ao-khoac-bg-bibos-be-tai-gau-135529-6.jpg,ao-khoac-bg-bibos-be-tai-gau-135529-4.jpg,ao-khoac-bg-bibos-be-tai-gau-135529-3.jpg,ao-khoac-bg-bibos-be-tai-gau-135529-2.jpg,ao-khoac-bg-bibos-be-tai-gau-135529-1_1_2.jpg', 'Áo choàng Bibo’s be tai gấu là thiết kế cao cấp đến từ thương hiệu Bibo’s, nổi bật với công nghệ dệt vải tinh tế, đẹp mắt cùng kiểu dáng áo cánh dơi xinh xắn và độc đáo. Đây sẽ là lựa chọn hoàn hảo dành tặng bé cho những ngày đông đang đến gần bởi khả năn', 0, 4, 25),
(50, 'Áo khoác Bibos trắng tai thỏ', 199000, 'ao-khoac-bg-bibos-trang-tai-tho-135056-8.jpg', 'ao-khoac-bg-bibos-trang-tai-tho-135056-2_1.jpg,ao-khoac-bg-bibos-trang-tai-tho-135056-5.jpg,ao-khoac-bg-bibos-trang-tai-tho-135056-3.jpg,ao-khoac-bg-bibos-trang-tai-tho-135056-4.jpg,ao-khoac-bg-bibos-trang-tai-tho-135056_1.jpg,ao-khoac-bg-bibos-trang-tai-tho-135056-8.jpg', 'Áo khoác Bibos trắng tai thỏ là sự lựa chọn hoàn hảo không chỉ mang đến cho bé vẻ ngoài siêu cấp đáng yêu mà còn giữ ấm cơ thể bé một cách hiệu quả. Từ chất liệu vải đến các phụ kiện, cúc cài đều được Bibos lựa chọn kỹ lưỡng để mang đến cho bé yêu những t', 0, 4, 25),
(51, 'Áo khoác Bibos trắng tai gấu', 199000, 'ao-khoac-bibos-trang-tai-gau-135106-1.jpg', 'ao-khoac-bt-bibos-trang-tai-gau-135108-3.jpg,ao-khoac-bt-bibos-trang-tai-gau-135108-4.jpg,ao-khoac-bt-bibos-trang-tai-gau-135108-5.jpg,ao-khoac-bt-bibos-trang-tai-gau-135108-2.jpg,ao-khoac-bibos-trang-tai-gau-135106-1.jpg', 'Áo khoác Bibos trắng tai gấu mang đến một thiết kế cao cấp và chất lượng để ba mẹ có thể dành tặng bé cho mùa đông sắp đến. Với thiết kế cúc cài 2 hàng độc đáo cùng mũ đội ấm áp, sản phẩm mang đến cho bé khả năng giữ ấm vượt trội giúp mẹ chăm sóc bé tốt h', 0, 4, 25),
(52, 'Áo giữ nhiệt họa tiết gấu nhỏ', 99000, 'ao-giu-nhiet-hoa-tiet-gau-nho-138493.jpg', 'ao-giu-nhiet-hoa-tiet-gau-nho-138493-2.jpg,ao-giu-nhiet-hoa-tiet-gau-nho-138493-1.jpg,ao-giu-nhiet-hoa-tiet-gau-nho-138493.jpg', 'Áo giữ nhiệt họa tiết gấu nhỏ thích hợp cho bé mặc trong những ngày thời tiết hơi se lạnh hoặc mặc bên trong các lớp áo dày, nhờ chất liệu vải rip giữ ấm tốt nhưng không gây bí bách. Độ hoàn thiện của áo được thể hiện ở từng đường may và chi tiết trang tr', 0, 4, 25),
(53, 'Áo len cổ tim Cool Baby 4174 đỏ đậm', 179000, 'ao-len-co-tim-coolbaby-do-den_1.jpg', 'ao-len-co-tim-coolbaby-do-1.jpg,ao-len-co-tim-coolbaby-do-den_1.jpg', 'Mẹ muốn bé thật ấm áp trong những ngày đông nhưng vẫn phải thời trang và thật xinh đẹp thì áo len cổ tim Cool Baby 4174 đỏ đậm là lựa chọn lý tưởng mẹ không thể bỏ qua. Áo nổi bật không chỉ bởi chất len đan bện dày dặn mà còn gây thu hút bởi chi tiết cổ V', 0, 4, 25),
(54, 'Váy tutu Bibos Star hồng', 139000, 'vay-tutu-bg-bibos-bst-star-hong-135847-1.jpg', 'vay-tutu-bg-bibos-bst-star-hong-135847-6.jpg,vay-tutu-bg-bibos-bst-star-hong-135847-4.jpg,vay-tutu-bg-bibos-bst-star-hong-135847-7.jpg,vay-tutu-bg-bibos-bst-star-hong-135847-3.jpg,vay-tutu-bg-bibos-bst-star-hong-135847-2.jpg,vay-tutu-bg-bibos-bst-star-hong-135847-1.jpg', 'Nguồn cảm hứng từ bầu trời cùng những vì sao lấp lánh đã được đặt trọn trong thiết kế váy tutu Bibos Star hồng. Từ chất liệu, kiểu dáng cho đến quy cách may, tất cả đều toát lên sự chỉn chu, tỉ mỉ và sáng tạo của đội ngũ thiết kế trẻ nhà Bibos. Váy có độ ', 0, 4, 25),
(55, 'Áo choàng chống nắng Lullaby NH168V hồng', 220000, 'ao-choang-chong-nang-tai-tho-lulaby-hong.jpg', 'ao-choang-chong-nang-tai-tho-lulaby-hong-2.jpg,ao-choang-chong-nang-tai-tho-lulaby-hong-1.jpg,ao-chong-nang-lullaby-hong.jpg,ao-choang-chong-nang-tai-tho-lulaby-hong.jpg', 'Áo choàng chống nắng Lullaby NH168V hồng sử dụng vải công nghệ ANTI UV giúp chống nắng tức thì và loại bỏ tới 90% tia tử ngoại. Với chất liệu mềm mại, thoáng mát, co dãn tốt, sản phẩm hứa hẹn sẽ là lựa chọn hàng đầu cho bé yêu trong mùa hè.', 0, 4, 25),
(56, ' Áo cổ tròn cộc tay Chong Chóng gấu Grizzly bé gái màu trắng', 89000, 'ao-coc-tay-chong-chong-trang-bg-2.jpg', 'ao-coc-tay-chong-chong-trang-bg-1.jpg,ao-coc-tay-chong-chong-trang-bg-5 - Copy.jpg,ao-coc-tay-chong-chong-trang-bg-4 - Copy.jpg,ao-coc-tay-chong-chong-trang-bg-3.jpg,ao-coc-tay-chong-chong-trang-bg-2.jpg', 'Áo phông là item không thể thiếu trong tủ đồ của bất kỳ ai. Áo cổ tròn cộc tay Chong Chóng gấu Grizzly bé gái màu trắng là một gợi ý lý tưởng cho ba mẹ khi sắm đồ cho bé. Kiểu dáng đơn giản, tiện dụng cùng họa tiết ngộ nghĩnh giúp mẹ dễ dàng phối đồ để bé', 0, 4, 25),
(57, 'Áo len Cool Baby 4128 thỏ vàng', 179000, 'ao-len-coolbaby-tho-vang.jpg', 'ao-len-gile-tho-vang-1.jpg,ao-len-coolbaby-tho-vang-1.jpg,ao-len-coolbaby-tho-vang.jpg', 'Nếu mẹ muốn lựa chọn quần áo cho bé theo phong cách tối giản nhưng vẫn hiện đại thì áo len Cool Baby 4128 thỏ vàng là lựa chọn hoàn hảo. Áo thiết kế dạng khoác tiện lợi với hàng cúc cài chắc chắn. Từ cổ áo, ống tay cho đến đuôi áo đều được bo viền cẩn thậ', 0, 4, 25),
(58, 'Bộ quần áo len Cool Baby 5118 sóc vàng', 199000, 'bo-quan-ao-coolbaby-soc-vang.jpg', 'bo-quan-ao-len-coolbaby-soc-vang-5.jpg,bo-quan-ao-len-coolbaby-soc-vang-3.jpg,bo-quan-ao-len-coolbaby-soc-vang-4.jpg,bo-quan-ao-len-coolbaby-soc-vang-2.jpg,bo-quan-ao-len-coolbaby-soc-vang.jpg,bo-quan-ao-coolbaby-soc-vang.jpg', 'Bộ quần áo len Cool Baby 5118 sóc vàng là gợi ý ba mẹ không thể bỏ qua để dành tặng bé cho những ngày đông đang đến gần. Với chất liệu len dày dặn, giữ nhiệt tốt, sản phẩm hỗ trợ ba mẹ tối đa trong việc ủ ấm cho bé nhất là khi bé ra ngoài. Bên cạnh đó, họ', 0, 4, 25),
(61, 'Áo khoác Bibos vịt trắng', 169000, 'ao-khoac-bibo-s-vit-trang_1.jpg', 'vit-vang-4.jpg,vit-vang-1.jpg,vit-vang-2.jpg,vit-vang-3.jpg,d_ng_1_.jpg,ao-khoac-bibo-s-vit-trang_1.jpg', 'Áo khoác Bibos vịt trắng là dòng sản phẩm mới nhất của Bibos chiếc áo khoác với thiết kế tạo hình vịt con ngộ nghĩnh và bắt mắt chắc chắn bé yêu của mẹ mặc lên sẽ rất đáng yêu. Chất liệu chính để tạo lên sản phẩm này là từ 93% Jacquard xốp, Cotton, 7% spa', 0, 4, 25),
(62, 'Váy bé gái Bibos trắng tutu hồng', 189000, 'vay-bg-bibos-trang-tutu-hong-130847-1.jpg', 'img_6872.jpg,img_6867.jpg,img_6877.jpg,img_6857.jpg,img_6853.jpg,vay-bg-bibos-trang-tutu-hong-130847-1.jpg', 'Váy bé gái Bibos trắng tutu hồng là sản phẩm nằm trong bộ sưu tập \"Baby X-mas\" với thiết kế kiểu dáng váy bồng công chúa. Sản phẩm được làm từ chất liệu Cotton, Modal và spandex mang đến cho bé yêu cảm giác dễ chịu khi mặc, bé thoải mái vận động vui chơi ', 0, 4, 25),
(63, 'Váy tutu bé gái Bibos đỏ in vương miện', 159000, 'vay-tutu-be-gai_-bibos-do-in-_vuong-mien-1.jpg', 'vay-tutu-be-gai-bibos-do-in-vuong-mien-5.jpg,vay-tutu-be-gai-bibos-do-in-vuong-mien-4.jpg,vay-tutu-be-gai-bibos-do-in-vuong-mien-3.jpg,vay-tutu-be-gai-bibos-do-in-vuong-mien-2.jpg,vay-tutu-be-gai-bibos-do-in-vuong-mien-1.jpg,vay-tutu-be-gai_-bibos-do-in-_vuong-mien-1.jpg', 'Váy tutu bé gái Bibos đỏ in vương miện là sản phẩm nằm trong bộ sưu tập \"Noel 2022\" với thiết kế kiểu dáng váy bồng công chúa. Sản phẩm được làm từ chất liệu Cotton, Modal và spandex mang đến cho bé yêu cảm giác dễ chịu khi mặc, thoải mái vận động vui chơ', 0, 4, 25),
(64, 'Giày lông cún con màu ghi RC-3370', 139000, 'giay-long-cun-ghi.jpg', 'giay-long-cuu-mau-ghi.jpg,giay-long-cuu-hinh-cun-mau-ghi.jpg,giay-long-cun-ghi.jpg', 'Giày lông cún con màu ghi RC-3370 là trợ thủ đắc lực giúp ba mẹ nâng niu đôi chân nhỏ xinh của bé trong những ngày đông lạnh giá. Sản phẩm được làm từ lông cừu siêu mềm mại, giữ nhiệt tốt mang đến ấm áp cho đôi chân nhất là khi bé ra ngoài. Tạo hình chú c', 0, 1, 25),
(65, 'Giày lông cừu con màu be HC-1233', 139000, 'giay-long-cuu-mau-be.jpg', 'giay-long-cuu-mau-be.jpg', 'Giày lông cừu con màu be HC-1233 là người bạn đồng hành không thể thiếu trong những chuyến phiêu lưu khám phá của bé trong mùa đông. Với thiết kế tiện dụng cùng lớp lông cừu cao cấp, sản phẩm không chỉ giúp giữ ấm tối đa cho đôi chân bé mà còn mang đến sự', 0, 1, 25),
(66, 'Giày lông gấu con màu nâu RC-5155', 129000, 'giay-long-gau-nau-2.jpg', 'giay-long-gau-nau-1.jpg,giay-long-gau-nau.jpg,giay-long-gau-nau-2.jpg', 'Giày lông gấu con màu nâu RC-5155 là một món quà xinh xắn ba mẹ có thể dành tặng bé để đón chào mùa đông sắp tới. Sản phẩm được làm từ lông cừu kết hợp với thiết kế tiện dụng ôm nhẹ nhàng và giữ ấm tối ưu đôi chân nhỏ xinh của bé đồng thời bảo vệ bé khỏi ', 0, 1, 25),
(67, 'Giày lông thỏ nâu HC-1236', 169000, 'giay-long-tho-nau.jpg', 'giay-long-tho-nau.jpg', 'Giày lông thỏ nâu HC-1236 là item không thể thiếu khi bé ra ngoài trong những ngày đông lạnh giá. Sản phẩm mang đến khả năng giữ ấm tối ưu nhờ lớp lông siêu mềm mại, ấm áp lót bên trong. Bên cạnh đó, dép được thiết kế ôm trọn chân bé nhẹ nhàng, chống trơn', 0, 1, 25),
(69, 'Dép lông bé trai gấu xanh BF-2218', 139000, 'dep-long-gau-xanh.jpg', 'dep-long-be-trai-gau-xanh-1.jpg,dep-long-gau-xanh-1.jpg,dep-long-gau-xanh-2.jpg,dep-long-gau-xanh.jpg', 'Đôi chân của bé cần được bảo vệ và giữ ấm cẩn thận trong những ngày thời tiết lạnh giá. Dép lông bé trai gấu xanh BF-2218 được lót lông cừu bên trong siêu mềm mại và ấm áp là gợi ý lý tưởng cho bé. Bên cạnh đó, tạo hình chú gấu kết hợp với màu xanh khỏe k', 0, 1, 25),
(70, 'Giày lông HJ-1102 gấu be', 169000, 'giay-long-be-gai-gau-be-134075-2.jpg', 'giay-long-be-gai-gau-be-134075-1.jpg,giay-long-be-gai-gau-be-134075-3.jpg,giay-long-be-gai-gau-be-134075.jpg,giay-long-be-gai-gau-be-134075-2.jpg', 'Một đôi giày mềm mại và ấm áp là item không thể thiếu cho bé trong những ngày đông lạnh giá. Giày lông HJ-1102 gấu be mang đến một gợi ý xinh xắn để ba mẹ tham khảo cho bé. Với lớp lông mềm mại cùng họa tiết đáng yêu, sản phẩm không chỉ bảo vệ và giữ ấm c', 0, 1, 25),
(71, 'Giày bún cổ cao 823 sư tử màu be', 89000, 'giay-bun-co-cao-823-su-tu-be-134889.jpg', 'giay-bun-co-cao-823-su-tu-be-134889-2.jpg,giay-bun-co-cao-823-su-tu-be-134889-1.jpg,giay-bun-co-cao-823-su-tu-be-134889.jpg', 'Đôi chân bé đang trên đà phát triển, một đôi giày không phù hợp sẽ gây ra những ảnh hưởng xấu đến sự phát triển của bé sau này. Giày bún cổ cao 825 sư tử màu be mang đến cho ba mẹ một gợi ý không thể bỏ qua. Điểm nổi bật của sản phẩm nằm ở phần đế giày ch', 0, 1, 25),
(72, 'Giày bún cổ cao 810 gấu con màu ghi', 69000, 'giay-bun-co-cao-810-con-gau-ghi-134902.jpg', 'giay-bun-co-cao-810-con-gau-ghi-134902.jpg', 'Khi bé bước sang giai đoạn tập đi, đôi chân là nơi chịu nhiều lực tác động nhất. Do đó, một đôi giày mềm mại và thoải mái là lựa chọn thích hợp giúp ba mẹ nâng niu đôi chân nhỏ xinh của bé. Giày bún cổ cao 810 gấu con màu ghi mang đến một gợi ý không thể ', 0, 1, 25),
(73, 'Sandal tập đi HJ-2003 gấu vàng', 139000, 'sandal-gau-vang.jpg', 'sandal-gau-vang.jpg', 'Khi bé bước sang giai đoạn tập đi, chuẩn bị cho bé một đôi giày tập đi phù hợp là điều ba mẹ cần lưu tâm. Sandal tập đi HJ-2003 gấu vàng là sự lựa chọn lý tưởng cho bé yêu của mẹ. Với thiết kế thông minh, sản phẩm không chỉ giúp bảo vệ đôi chân nhỏ xinh c', 0, 1, 25),
(74, 'Giày bún tập đi in hình gấu màu hồng', 89000, 'giay-bun-tap-di-in-hinh-gau-134925-5.jpg', 'giay-bun-tap-di-in-hinh-gau-134925-14.jpg,giay-bun-tap-di-in-hinh-gau-134925-5.jpg', 'Giày bún tập đi in hình gấu màu hồng là một món quà xinh xắn để chào đón giai đoạn tập đi của bé yêu. Không chỉ đáp ứng yêu cầu về vẻ ngoài đáng yêu mà sản phẩm còn được thiết kế thông minh với mũi giày mở rộng, đế chống trượt 3D giúp bé có những bước đi ', 0, 1, 25),
(75, 'Giày bún tập đi A09 lưới màu ghi', 89000, 'giay-bun-tap-di-a09-luoi-134916-8.jpg', 'giay-bun-tap-di-a09-luoi-134916-1_1_3.jpg,giay-bun-tap-di-a09-luoi-134916-11.jpg,giay-bun-tap-di-a09-luoi-134916-10.jpg,giay-bun-tap-di-a09-luoi-134916-12.jpg,giay-bun-tap-di-a09-luoi-134916-5.jpg,giay-bun-tap-di-a09-luoi-134916-8.jpg', 'Với những anh chàng sành điệu thì giày bún tập đi A09 lưới màu ghi là một item không thể bỏ qua. Đôi giày này được làm bằng chất liệu vải cao cấp đem lại cho bé cảm giác thoải mái, mềm mịn và có tính năng bảo vệ cao khi sử dụng. Bên cạnh dó, đế chống trơn', 0, 1, 25),
(76, 'Sục nhựa Mario QL-19001-2 vàng', 159000, 'suc-nhua-mario-8.jpg', 'suc-nhua-mario-6.jpg,suc-nhua-mario-5.jpg,suc-nhua-mario-7.jpg,suc-nhua-mario.jpg,suc-nhua-mario-8.jpg', 'Sục nhựa Mario QL-19001-2 vàng thu hút, bắt mắt với thiết kế xinh xắn, ngộ nghĩnh, lại vô cùng tiện lợi cho các hoạt động sinh hoạt hàng ngày bởi cấu tạo đơn giản, sẽ là món quà hoàn hảo dành cho bé. Đôi sục được làm từ chất liệu nhựa EVA với đặc tính siê', 0, 1, 25),
(77, 'Xăng đan tập đi bé gái vương miện trắng LC13', 109000, 'giay-td-bg-trang-vuong-mien-125463.jpg', 'giay-td-bg-trang-vuong-mien-125463-4.jpg,giay-td-bg-trang-vuong-mien-125463-3.jpg,giay-td-bg-trang-vuong-mien-125463-2.jpg,giay-td-bg-trang-vuong-mien-125463-1.jpg,giay-td-bg-trang-vuong-mien-125463.jpg', 'Xăng đan tập đi bé gái vương miện trắng LC13 hỗ trợ bước đi đầu đời của bé nhờ chất liệu da mềm an toàn và đế nhựa dẻo linh hoạt. Đôi chân bé sẽ luôn cảm thấy thoải mái, êm ái cũng như có được sự tự tin khi bước đi. Đôi xăng đan mang thiết kế ấn tượng và ', 0, 1, 25),
(78, 'Giày tập đi bé gái rọ đính nơ be LC04', 119000, 'httpsmedia.bibomart.netubbmproduct201807121649giay-td-bg-ro-dinh-no-be-117867_1.jpg', 'httpsmedia.bibomart.netubbmproduct201807121649giay-td-bg-ro-dinh-no-be-117867-4_1.jpg,httpsmedia.bibomart.netubbmproduct201807121649giay-td-bg-ro-dinh-no-be-117867-3_1.jpg,httpsmedia.bibomart.netubbmproduct201807121649giay-td-bg-ro-dinh-no-be-117867-2_1.jpg', 'Giai đoạn bé bắt đầu chập những những bước đi đầu tiên, việc lựa chọn cho bé những đôi giày tập đi thật phù hợp sẽ giúp bé luôn cảm thấy dễ chịu và thoải mái khi mang. Giày tập đi bé gái rọ đính nơ be LC04 dưới đây sẽ mang đến gợi ý hoàn hảo mà mẹ có thể ', 0, 1, 25),
(79, 'Giày tập đi bé trai xanh nơ đen LC23', 119000, 'giay-td-bt-xanh-no-den.jpg', 'giay-td-bt-xanh-no-den-4.jpg,giay-td-bt-xanh-no-den-3.jpg,giay-td-bt-xanh-no-den-2.jpg,giay-td-bt-xanh-no-den-1.jpg,giay-td-bt-xanh-no-den.jpg', 'Khi bé chập chững bước những bước đi đầu đời thì những đôi giày tập đi mềm mại, êm ái sẽ là những món đồ không thể thiếu với các bé trong giai đoạn này, giúp bé có bước đi vững chắc và bảo vệ đôi bàn chân bé. Để giúp bố mẹ có thể dễ dàng lựa chọn cho bé y', 0, 1, 25),
(80, 'Giày tập đi da bé trai thú đỏ LC07', 189000, 'giay-tap-di-da-bt-bibos-thu-do-120148-7.jpg', 'giay-tap-di-da-bt-bibos-thu-do-120148-5.jpg,giay-tap-di-da-bt-bibos-thu-do-120148-3.jpg,giay-tap-di-da-bt-bibos-thu-do-120148-6.jpg,giay-tap-di-da-bt-bibos-thu-do-120148-2.jpg,giay-tap-di-da-bt-bibos-thu-do-120148-7.jpg', 'Giày tập đi sẽ là món đồ không thể thiếu trong giai đoạn bé chập chững những bước chân đầu đời. Vì vậy, giày tập đi da bé trai thú đỏ LC07 sau đây là một gợi ý đáng yêu mà bố mẹ có thể dành tặng cho bé yêu để hỗ trợ bé tập đi trong giai đoạn đầu này. Giày', 0, 1, 25),
(81, 'Giày tập đi thể thao bé trai trắng xanh dây LC22', 119000, 'giay-tap-di-bt-xanh.jpg', 'giay-tap-di-bt-xanh-4.jpg,giay-tap-di-bt-xanh-3.jpg,giay-tap-di-bt-xanh-2.jpg,giay-tap-di-bt-xanh-1.jpg,giay-tap-di-bt-xanh.jpg', 'Giày tập đi thể thao bé trai trắng xanh dây LC22 là một thiết kế năng động, khỏe khoắn và đầy phong cách dành đến bé trong giai đoạn đầu. Đôi giày buộc dây phối màu đơn giản, dễ dàng để bé kết hợp với nhiều loại trang phục khác nhau. Giày có chất liệu da ', 0, 1, 25),
(82, 'Dép nhựa bé gái đính thỏ hồng FC01', 109000, 'httpsmedia.bibomart.netubbmproduct201805311758dep-nhua-bg-dinh-tho-hong-117870_1.jpg', 'httpsmedia.bibomart.netubbmproduct201805311759dep-nhua-bg-dinh-tho-hong-117870-1_1.jpg,httpsmedia.bibomart.netubbmproduct201805311728dep-nhua-bg-dinh-tho-hong-117870-4_1.jpg,httpsmedia.bibomart.netubbmproduct201805311728dep-nhua-bg-dinh-tho-hong-117870-3_1.jpg', 'Mùa hè đến, thay vì những đôi giày thể thao nóng bức, mẹ hãy dành cho bé những đôi dép thật dễ thương và mát mẻ. Và dép nhựa bé gái đính thỏ hồng FC01 dưới đây sẽ mang đến một sản phẩm hữu ích mà mẹ có thể dành tặng bé. Được làm từ nhựa mềm an toàn, đôi d', 0, 1, 25),
(83, 'Sục nhựa Mario khủng long xanh QL-7688', 89000, 'untitled-2_2.jpg', 'untitled-2_2.jpg', 'Sục nhựa Mario khủng long xanh QL-7688 có kiểu dáng dễ thương, được mẹ và bé yêu thích lựa chọn phối đồ hàng ngày. Sản phẩm được nghiên cứu, đạt giá trị độ mềm và độ cứng vừa phải trong khoảng 40 - 45. Ngoài ra, dép sục còn được thiết kế đế chống trượt đả', 0, 1, 25),
(84, 'Sục nhựa Mario hồng HR-2029', 79000, 'suc-nhua-mario-hr-2029-mau-hong_1.jpg', 'suc-nhua-mario-hr-2029-mau-hong_1.jpg', '\r\nSục nhựa Mario màu hồng HR-2029 có thiết kế đế chống trơn trượt, an toàn cho trẻ khi chạy nhảy, nô đùa. Các chi tiết trang trí phía trên dép có thể tháo rời linh hoạt, giúp mẹ và bé tự do thay đổi mỗi ngày. Ba mẹ có thể kết hợp sục nhựa Mario cùng các m', 0, 1, 25),
(85, 'Sục nhựa EVA chống trượt hổ vàng', 109000, 'suc-nhua-eva-chong-truot-ho-vang-138969.jpg', 'suc-nhua-eva-chong-truot-ho-vang-138969-1.jpg,suc-nhua-eva-chong-truot-ho-vang-138969.jpg', 'Sục nhựa EVA chống trượt hổ vàng cho bé sẽ là người bạn đồng hành cùng con yêu trên từng chặng đường khôn lớn nhờ thiết kế tiện lợi, thông minh và an toàn. Sục được làm từ chất liệu nhựa siêu nhẹ, độ đàn hồi cao, đảm bảo bền bỉ theo thời gian sử dụng. Đế ', 0, 1, 25),
(86, 'Dép nhựa bé gái đính thỏ hồng FC01', 109000, 'httpsmedia.bibomart.netubbmproduct201805311758dep-nhua-bg-dinh-tho-hong-117870_1.jpg', 'httpsmedia.bibomart.netubbmproduct201805311759dep-nhua-bg-dinh-tho-hong-117870-1_1.jpg,httpsmedia.bibomart.netubbmproduct201805311728dep-nhua-bg-dinh-tho-hong-117870-4_1.jpg,httpsmedia.bibomart.netubbmproduct201805311728dep-nhua-bg-dinh-tho-hong-117870-3_1.jpg', '                    Mùa hè đến, thay vì những đôi giày thể thao nóng bức, mẹ hãy dành cho bé những đôi dép thật dễ thương và mát mẻ. Và dép nhựa bé gái đính thỏ hồng FC01 dưới đây sẽ mang đến một sản phẩm hữu ích mà mẹ có thể dành tặng bé. Được làm từ nhựa mềm an toàn, đôi d                ', 0, 1, 25),
(87, 'Mũ len hai quả bông cài cúc hình thú', 79000, 'mu-len-hai-qua-bong-cai-cuc-hinh-thu-6.jpg', 'mu-len-hai-qua-bong-cai-cuc-hinh-thu-4.jpg,mu-len-hai-qua-bong-cai-cuc-hinh-thu-5.jpg,mu-len-hai-qua-bong-cai-cuc-hinh-thu-6.jpg', 'Mũ len hai quả bông cài cúc hình thú là phụ kiện lý tưởng cho tủ đồ thu đông của bé. Hoạ tiết hình thú đính kèm 2 quả bông xinh xắn mang đến cho bé vẻ ngoài đáng yêu khi đội. Với thiết kế dáng chụp ôm vừa vặn vùng đầu, mũ có tác dụng giữ ấm tối ưu trong những ngày trời trở lạnh. Phụ kiện được trang bị cúc cài tiện lợi, giúp bé thoải mái vận động mà không sợ bị tuột hoặc bay mũ.', 0, 2, 25),
(88, 'Mũ sơ sinh hình thú màu nâu', 89000, 'mu-ss-gau-be-buoc-day.jpg', 'mu-ss-gau-be-buoc-day-1.jpg,mu-ss-gau-be-buoc-day.jpg', 'Mũ sơ sinh hình thú màu nâu với chất liệu cotton thấm hút tốt cùng thiết kế dây buộc sẽ là phụ kiện lý tưởng dành cho các bé sơ sinh trong mùa đông, giúp con vừa được giữ ấm mà không bị bí bách, khó chịu. Họa tiết mặt gấu đính nổi trước mũ cùng đôi tai thú dễ thương hai bên khiến chiếc mũ trở nên nổi bật, đồng thời giúp tôn lên vẻ ngộ nghĩnh, đáng yêu của các “thiên thần nhí” những ngày tháng đầu đời.  Sản phẩm phù hợp cho bé sơ sinh từ 0 - 9 tháng.', 0, 2, 25),
(89, 'Mũ len hình sóc nhỏ gắn đỉnh đầu', 59000, 'mu-len-hinh-soc-nho-gan-dinh-dau-2.jpg', 'mu-len-hinh-soc-nho-gan-dinh-dau-2.jpg', 'Mũ len hình sóc nhỏ gắn đỉnh đầu thu hút bé với hình chú sóc vô cùng đáng yêu gắn nổi trên đỉnh mủ cùng 2 quả bông mềm mại ở dây buộc. Với chất liệu len dày dặn, kiểu dáng mũ chụp ôm gọn lấy phần đầu, chiếc mũ xinh xắn này chắc chắn sẽ giúp mẹ bảo vệ phần đầu của bé khỏi sương giá và gió lạnh mùa đông.', 0, 2, 25),
(90, 'Mũ len buộc dây họa tiết quả dâu', 89000, '138210-m_-len-bu_c-d_y-hoa-ti_t-qu_-d_u2.jpg', '138210-m_-len-bu_c-d_y-hoa-ti_t-qu_-d_u4.jpg,138210-m_-len-bu_c-d_y-hoa-ti_t-qu_-d_u3.jpg,138210-m_-len-bu_c-d_y-hoa-ti_t-qu_-d_u2.jpg', 'Mũ len buộc dây họa tiết quả dâu là phụ kiện mùa đông rất được các bé gái yêu thích. Mũ được làm bằng chất liệu len bông xù siêu mềm, nhẹ, giữ nhiệt tốt, đảm bảo giữ ấm tối ưu cho bé trong những ngày lạnh. Thiết kế dây buộc cùng họa tiết trái dâu xinh xắn giúp chiếc mũ thêm phần dễ thương. Sản phẩm phù hợp cho các bé từ 2 - 6 tuổi.', 4, 2, 25),
(91, 'Mũ len họa tiết chuột con', 79000, '138127-m_-len-h_a-ti_t-chu_t-con.jpg', '138127-m_-len-h_a-ti_t-chu_t-con-2.jpg,138127-m_-len-h_a-ti_t-chu_t-con.jpg', '                    Thời tiết mùa đông rất lạnh nên ba mẹ cần chú ý giữ ấm cả phần đầu cho bé, đặc biệt khi đi ra ngoài trời. Mũ len họa tiết chuột con sẽ giúp ba mẹ bảo vệ sức khỏe của bé hiệu quả trong mùa đông này. Với chất liệu len lông cừu dày dặn, sản phẩm có khả năng giữ nhiệt tối ưu, giúp bé luôn cảm thấy ấm áp và thoải mái. Kiểu dáng họa tiết chuột con đáng yêu khiến chiếc mũ trở thành phụ kiện vô cùng xinh xắn, giúp tôn thêm nét dễ thương của bé trong mùa đông lạnh.                ', 0, 1, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `firstname`, `lastname`, `username`, `pass`, `email`, `address`, `phone`, `role`) VALUES
(1, 'lam', 'hoang', 'Lam hoang222', '111111', 'lamhdph45056@fpt.edu.vn', NULL, '', 1),
(5, 'Hoàng', 'Lâm', 'lamhoang2004', 'L@m214204', 'hoanglamksks987@gmail.com', NULL, NULL, 1),
(12, 'Hoàng', 'Lâm', 'lam344', 'kkkkkkk', 'hoanglafdafd7@gmail.com', 'asdfadsf', '', 0),
(18, 'Hải', 'Long', 'hhlong4', 'L@ng2004', 'hailong@gmail.com', NULL, NULL, 0),
(19, 'Nam', 'Nguyễn', 'nguyennam', 'nguyenN@m2', 'nguyennam@gmail.com', NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduct` (`idproduct`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddm`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddm` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`idproduct`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`iddm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
