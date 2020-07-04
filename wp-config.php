<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'nhom8tmdt_dogochitrung' );

/** Username của database */
define( 'DB_USER', 'nhom8tmdt_dogochitrung' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', 'nhom8' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Ar$%bNA/j*w !S4DnZch<yW@EV-LKWwm=gQ*Gc@ttS[|Eo>st*%u@2J`3k[gM,H0' );
define( 'SECURE_AUTH_KEY',  'J&+D6U-WK-oNf41mZ[K;l,qZ&9f)&f{%;%P4%r}7f=z`Y+H/yms!epJ,@g],vH~f' );
define( 'LOGGED_IN_KEY',    '6w^{F1 5~xe5E9oW:Kux{,pWG =Roywxf9~&I45mb=@4E,#pP+0ZItFH>k$7=tr`' );
define( 'NONCE_KEY',        '-ky5Nfb{RC5u!=Qu$Y[wF}X_A;A~{!+C8*KuuVrrUe ~;cxTV>s,BUVJ3+eN+QCe' );
define( 'AUTH_SALT',        '%)(yGl+adZB8ilnDp1RgQfY7^3evMz>O=w*!zZ+mS`-!<[S= 6W&ol?guHS<49nR' );
define( 'SECURE_AUTH_SALT', 'D+@<X9wUZg.K0)IDKLf}IvqE6vcmdbMDr*qO.8w!.EUmgpN?DhJRvMhsCre3++go' );
define( 'LOGGED_IN_SALT',   '{OK+.NH T1XflBJz3Q5hl#:[[8koY3kULlA.`A0&HW(dI4q^xRG?AMkQ@sF5$|c2' );
define( 'NONCE_SALT',       'MGQ.)rnW7IW*e,[xy (c:s2iEw){6TSz&`3*1iiEeg^>-4hpPzDKy&K-~%dMNs@)' );

define('JWT_AUTH_SECRET_KEY', 'secret');
define('JWT_AUTH_CORS_ENABLE', true);
/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');