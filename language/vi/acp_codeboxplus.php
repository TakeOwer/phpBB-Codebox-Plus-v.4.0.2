<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * ACP language file [Vietnamese]
 *
 * @copyright (c) 2014 o0johntam0o (Huynh Buu Tam) - original author
 * @copyright (c) 2026 Salvo Cortesiano - phpBB 3.3 rewrite
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_CBP_EXPLAIN'					=> 'Khung mã tương thích mọi màn hình với làm nổi bật cú pháp cho hơn 250 ngôn ngữ, sao chép, chọn, tự động xuống dòng, số dòng, toàn màn hình và tải mã được bảo vệ. Cách dùng trong bài viết: <code>[codebox=php file=index.php]...[/codebox]</code>.',
	'CBP_BADGE_EXT'					=> 'Phần mở rộng',
	'CBP_BADGE_LANGUAGES'				=> 'Ngôn ngữ',
	'CBP_BADGE_DOWNLOADS'				=> 'Lượt tải',
	'CBP_BADGE_LICENSE'				=> 'Giấy phép',
	'CBP_LEGEND_DISPLAY'				=> 'Hiển thị',
	'CBP_HIGHLIGHT'					=> 'Làm nổi bật cú pháp',
	'CBP_HIGHLIGHT_EXPLAIN'			=> 'Tô màu mã theo ngôn ngữ đã chọn (GeSHi). Khi tắt, mã được hiển thị dạng văn bản thuần.',
	'CBP_THEME'						=> 'Giao diện màu',
	'CBP_THEME_EXPLAIN'				=> '“Tự động” dùng giao diện sáng và chuyển sang giao diện tối khi thiết bị của người dùng ở chế độ tối.',
	'CBP_THEME_AUTO'					=> 'Tự động (sáng/tối)',
	'CBP_THEME_LIGHT'					=> 'Sáng',
	'CBP_THEME_DARK'					=> 'Tối',
	'CBP_THEME_MONOKAI'				=> 'Monokai',
	'CBP_THEME_DRACULA'				=> 'Dracula',
	'CBP_THEME_NORD'					=> 'Nord',
	'CBP_LINE_NUMBERS_OPT'				=> 'Số dòng',
	'CBP_LINE_NUMBERS_OPT_EXPLAIN'		=> 'Mặc định hiện số dòng (người dùng vẫn có thể ẩn). Số dòng không bao giờ bị sao chép cùng mã.',
	'CBP_WRAP_OPT'						=> 'Tự động xuống dòng',
	'CBP_WRAP_OPT_EXPLAIN'				=> 'Mặc định ngắt các dòng dài thay vì cuộn ngang (người dùng vẫn có thể thay đổi).',
	'CBP_EXPANDED'						=> 'Luôn mở rộng',
	'CBP_EXPANDED_EXPLAIN'				=> 'Hiện toàn bộ mã. Nếu tắt, mã dài bị giới hạn theo chiều cao tối đa bên dưới và hiện thanh “Hiện toàn bộ mã”.',
	'CBP_MAX_HEIGHT'					=> 'Chiều cao tối đa',
	'CBP_MAX_HEIGHT_EXPLAIN'			=> 'Chiều cao của khung mã khi thu gọn (120 - 3000).',
	'CBP_PIXEL'						=> 'pixel',
	'CBP_TAB_SIZE'						=> 'Độ rộng tab',
	'CBP_TAB_SIZE_EXPLAIN'				=> 'Số khoảng trắng dùng để hiển thị một ký tự tab (1 - 8).',
	'CBP_EDITOR_BUTTON'				=> 'Nút trong trình soạn thảo',
	'CBP_EDITOR_BUTTON_EXPLAIN'		=> 'Thêm vào trình soạn thảo bài viết, trả lời nhanh và tin nhắn riêng một nút mở bảng chọn ngôn ngữ.',
	'CBP_FAVORITES'					=> 'Ngôn ngữ phổ biến',
	'CBP_FAVORITES_EXPLAIN'			=> 'Mã định danh của các ngôn ngữ hiển thị đầu bảng chọn, cách nhau bằng dấu phẩy (ví dụ: <code>php,javascript,python</code>).',
	'CBP_LEGEND_DOWNLOAD'				=> 'Tải về',
	'CBP_ENABLE_DOWNLOAD'				=> 'Bật tải về',
	'CBP_ENABLE_DOWNLOAD_EXPLAIN'		=> 'Hiện nút “Tải về” để lưu mã thành tập tin. Trong chủ đề, diễn đàn cung cấp tập tin sau khi kiểm tra quyền; trong phần xem trước và tin nhắn riêng, trình duyệt tự tạo tập tin.',
	'CBP_LOGIN_REQUIRED'				=> 'Yêu cầu đăng nhập',
	'CBP_LOGIN_REQUIRED_EXPLAIN'		=> 'Khách được yêu cầu đăng nhập trước khi tải về.',
	'CBP_PREVENT_BOTS'					=> 'Chặn bot',
	'CBP_PREVENT_BOTS_EXPLAIN'			=> 'Máy tìm kiếm và bot không thể tải mã và không thấy nút tải.',
	'CBP_REQUIRE_FDOWNLOAD'			=> 'Yêu cầu quyền “Có thể tải tập tin”',
	'CBP_REQUIRE_FDOWNLOAD_EXPLAIN'	=> 'Ngoài quyền đọc diễn đàn, người dùng phải có quyền tải tập tin đính kèm của diễn đàn.',
	'CBP_CAPTCHA'						=> 'Xác nhận chống spambot',
	'CBP_CAPTCHA_EXPLAIN'				=> 'Yêu cầu giải CAPTCHA được thiết lập trong “Chống spambot” trước khi tải về. Sau khi giải, có hiệu lực trong 30 phút.',
	'CBP_CAPTCHA_GUESTS_ONLY'			=> 'Chỉ xác nhận với khách',
	'CBP_CAPTCHA_GUESTS_ONLY_EXPLAIN'	=> 'Thành viên đã đăng ký tải về không cần xác nhận.',
	'CBP_MAX_ATTEMPTS'					=> 'Số lần thử tối đa',
	'CBP_MAX_ATTEMPTS_EXPLAIN'			=> 'Số lần xác nhận sai cho phép trong một phiên trước khi chặn tải về (1 - 50).',
	'CBP_LEGEND_PERFORMANCE'			=> 'Hiệu năng',
	'CBP_MAX_HIGHLIGHT_KB'				=> 'Giới hạn làm nổi bật',
	'CBP_MAX_HIGHLIGHT_KB_EXPLAIN'		=> 'Mã lớn hơn kích thước này được hiển thị không màu để tiết kiệm tài nguyên (8 - 4096).',
	'CBP_CACHE_TTL'					=> 'Bộ nhớ đệm làm nổi bật',
	'CBP_CACHE_TTL_EXPLAIN'			=> 'Thời gian giữ mã đã làm nổi bật trong bộ nhớ đệm. 0 để tắt bộ nhớ đệm (0 - 2592000; 86400 = một ngày).',
	'CBP_SECONDS'						=> 'giây',
	'CBP_PREVIEW'						=> 'Xem trước trực tiếp',
	'CBP_PREVIEW_EXPLAIN'				=> 'Giao diện, số dòng, xuống dòng, chiều cao và độ rộng tab được cập nhật khi bạn thay đổi. Hãy lưu để áp dụng cho diễn đàn.',
	'CBP_USAGE'						=> 'Cách sử dụng',
	'CBP_USAGE_EXPLAIN'				=> 'Dùng nút “Mã” trong trình soạn thảo hoặc tự viết BBCode. Ngôn ngữ và tên tập tin là không bắt buộc.',
	'CBP_MAINTENANCE'					=> 'Bảo trì',
	'CBP_PURGE_CACHE'					=> 'Xóa bộ nhớ đệm làm nổi bật',
	'CBP_PURGE_CACHE_EXPLAIN'			=> 'Mã đã làm nổi bật sẽ được tạo lại ở lần xem tiếp theo.',
	'CBP_RESET_COUNTER'				=> 'Đặt lại bộ đếm lượt tải',
	'CBP_RESET_COUNTER_EXPLAIN'		=> array(
		1 => 'Hiện có %d lượt tải.',
		2 => 'Hiện có %d lượt tải.',
	),
	'CBP_RESET_SETTINGS'				=> 'Khôi phục cài đặt mặc định',
	'CBP_RESET_SETTINGS_EXPLAIN'		=> 'Mọi tùy chọn trên trang này trở về giá trị mặc định.',
	'CBP_SETTINGS_SAVED'				=> 'Đã lưu cài đặt Codebox Plus.',
	'CBP_ERR_RANGE'					=> '“%1$s” phải nằm trong khoảng %2$d đến %3$d.',
	'CBP_ERR_FAVORITES'				=> 'Ngôn ngữ không xác định trong danh sách phổ biến: %s',
	'CBP_ERR_NO_CAPTCHA'				=> 'Chưa thiết lập plugin CAPTCHA nào: hãy chọn một plugin trong “Chống spambot” trước.',
	'CBP_CONFIRM_PURGE'				=> 'Bạn có chắc muốn xóa bộ nhớ đệm làm nổi bật?',
	'CBP_CONFIRM_RESET_COUNTER'		=> 'Bạn có chắc muốn đặt lại bộ đếm lượt tải?',
	'CBP_CONFIRM_RESET_SETTINGS'		=> 'Bạn có chắc muốn khôi phục cài đặt mặc định của Codebox Plus?',
	'CBP_CONFIRM_REMOVE_OLD_BBCODE'	=> 'Bạn có chắc muốn xóa BBCode cũ [Codebox=] khỏi bảng BBCode? Các bài viết hiện có không bị thay đổi.',
	'CBP_CACHE_PURGED'					=> 'Đã xóa bộ nhớ đệm làm nổi bật.',
	'CBP_COUNTER_RESET'				=> 'Đã đặt lại bộ đếm lượt tải.',
	'CBP_SETTINGS_RESET'				=> 'Đã khôi phục cài đặt mặc định.',
	'CBP_OLD_BBCODE_REMOVED'			=> 'Đã xóa BBCode cũ.',
	'CBP_CHECKUP_ALL_OK'				=> 'Mọi thứ hoạt động bình thường',
	'CBP_CHECKUP_HAS_ERRORS'			=> 'Có vấn đề cần bạn chú ý',
	'CBP_CHECKUP_HAS_WARNINGS'			=> 'Hoạt động, kèm một số cảnh báo',
	'CBP_CHECKUP_OK'					=> array(
		1 => '%d đạt',
		2 => '%d đạt',
	),
	'CBP_CHECKUP_WARNINGS'				=> array(
		1 => '%d cảnh báo',
		2 => '%d cảnh báo',
	),
	'CBP_CHECKUP_ERRORS'				=> array(
		1 => '%d lỗi',
		2 => '%d lỗi',
	),
	'CBP_CHECKUP_INFOS'				=> array(
		1 => '%d thông tin',
		2 => '%d thông tin',
	),
	'CBP_CHECKUP_RUN_AT'				=> 'Chạy lúc %s',
	'CBP_CHECKUP_RERUN'				=> 'Chạy lại',
	'CBP_CHECKUP_STATUS'				=> 'Trạng thái',
	'CBP_CHECKUP_TEST'					=> 'Kiểm tra',
	'CBP_CHECKUP_RESULT'				=> 'Kết quả',
	'CBP_STATUS_OK'					=> 'OK',
	'CBP_STATUS_WARNING'				=> 'Cảnh báo',
	'CBP_STATUS_ERROR'					=> 'Lỗi',
	'CBP_STATUS_INFO'					=> 'Thông tin',
	'CBP_CHK_PHP'						=> 'Phiên bản PHP',
	'CBP_CHK_PHP_DETAIL'				=> 'PHP %s (yêu cầu 7.2 trở lên).',
	'CBP_CHK_PHPBB'					=> 'Phiên bản phpBB',
	'CBP_CHK_PHPBB_DETAIL'				=> 'phpBB %s (yêu cầu 3.3.0 trở lên).',
	'CBP_CHK_PHP_EXT'					=> 'Mô-đun PHP',
	'CBP_CHK_PHP_EXT_OK'				=> 'dom, libxml và mbstring đều có sẵn.',
	'CBP_CHK_PHP_EXT_MISSING'			=> 'Thiếu mô-đun PHP: %s',
	'CBP_CHK_GESHI'					=> 'Bộ làm nổi bật GeSHi',
	'CBP_CHK_GESHI_OK'					=> 'GeSHi %1$s với đủ %2$d tập tin ngôn ngữ.',
	'CBP_CHK_GESHI_MISSING'			=> 'Thiếu tập tin ngôn ngữ: %s. Hãy tải lại phần mở rộng lên máy chủ.',
	'CBP_CHK_HIGHLIGHT'				=> 'Kiểm tra làm nổi bật',
	'CBP_CHK_HIGHLIGHT_OFF'			=> 'Làm nổi bật cú pháp đang tắt trong cài đặt.',
	'CBP_CHK_HIGHLIGHT_OK'				=> 'Đoạn mã PHP mẫu %d dòng đã được làm nổi bật chính xác.',
	'CBP_CHK_HIGHLIGHT_FAIL'			=> 'Làm nổi bật thất bại: %s',
	'CBP_CHK_PARSER'					=> 'BBCode [codebox]',
	'CBP_CHK_PARSER_OK'				=> 'BBCode đã được đăng ký và được bộ định dạng văn bản nhận diện.',
	'CBP_CHK_PARSER_FAIL'				=> 'BBCode không được nhận diện: hãy xóa bộ nhớ đệm của diễn đàn (Tổng quan → Xóa bộ nhớ đệm) và thử lại.',
	'CBP_CHK_RENDER'					=> 'Hiển thị khung mã',
	'CBP_CHK_RENDER_OK'				=> 'Khung mã với thanh công cụ và số dòng được tạo chính xác.',
	'CBP_CHK_RENDER_FAIL'				=> 'Khung mã không được tạo: hãy xóa bộ nhớ đệm của diễn đàn và kiểm tra không có phần mở rộng nào khác dùng cùng BBCode.',
	'CBP_CHK_ROUNDTRIP'				=> 'Liên kết tải về',
	'CBP_CHK_ROUNDTRIP_OK'				=> 'Dấu vân tay của mã hiển thị khớp với mã đã lưu: tải về hoạt động và mã bị ẩn không thể tải được.',
	'CBP_CHK_ROUNDTRIP_FAIL'			=> 'Dấu vân tay của mã hiển thị không khớp với mã đã lưu: tải về từ chủ đề sẽ thất bại.',
	'CBP_CHK_ROUTE'					=> 'Trang tải về',
	'CBP_CHK_ROUTE_OK'					=> 'Địa chỉ tải về được tạo chính xác.',
	'CBP_CHK_ROUTE_OFF'				=> 'Tải về đang tắt trong cài đặt.',
	'CBP_CHK_ROUTE_FAIL'				=> 'Không thể tạo địa chỉ tải về: %s',
	'CBP_CHK_OLD_BBCODE'				=> 'BBCode cũ [Codebox=]',
	'CBP_CHK_OLD_BBCODE_OK'			=> 'Không có BBCode xung đột trong bảng BBCode.',
	'CBP_CHK_OLD_BBCODE_FOUND'			=> 'Bảng BBCode vẫn còn BBCode [Codebox=] của phần mở rộng gốc. Nó bị bỏ qua, nhưng nên xóa đi.',
	'CBP_FIX_REMOVE_OLD_BBCODE'		=> 'Xóa ngay',
	'CBP_CHK_OLD_EXT'					=> 'Phần mở rộng gốc',
	'CBP_CHK_OLD_EXT_OK'				=> 'Phần mở rộng gốc o0johntam0o/codeboxplus chưa được cài đặt.',
	'CBP_CHK_OLD_EXT_ENABLED'			=> 'Phần mở rộng gốc o0johntam0o/codeboxplus đang được kích hoạt: hãy tắt nó trong “Quản lý phần mở rộng”.',
	'CBP_CHK_OLD_EXT_FILES'			=> 'Thư mục ext/o0johntam0o/codeboxplus vẫn còn trên máy chủ: sau khi tắt và xóa dữ liệu của nó, bạn có thể xóa thư mục này.',
	'CBP_CHK_CACHE'					=> 'Bộ nhớ đệm',
	'CBP_CHK_CACHE_OK'					=> 'Bộ nhớ đệm hoạt động (%s).',
	'CBP_CHK_CACHE_FAIL'				=> 'Không thể ghi vào bộ nhớ đệm: hãy kiểm tra quyền của thư mục cache/.',
	'CBP_CACHE_ON'						=> 'bộ nhớ đệm làm nổi bật đang bật, %d giây',
	'CBP_CACHE_OFF'					=> 'bộ nhớ đệm làm nổi bật đang tắt',
	'CBP_CHK_CAPTCHA'					=> 'Xác nhận chống spambot',
	'CBP_CHK_CAPTCHA_OK'				=> 'Plugin CAPTCHA “%s” khả dụng.',
	'CBP_CHK_CAPTCHA_FAIL'				=> 'Plugin CAPTCHA “%s” không khả dụng: hãy kiểm tra “Chống spambot”.',
	'CBP_CHK_CAPTCHA_OFF'				=> 'Chưa bật cho việc tải về.',
	'CBP_CHK_LANG'						=> 'Tập tin ngôn ngữ',
	'CBP_CHK_LANG_OK'					=> 'Đã dịch đầy đủ cho các ngôn ngữ đã cài: %s.',
	'CBP_CHK_LANG_FALLBACK'			=> 'Ngôn ngữ chưa được dịch (dùng tiếng Anh): %s.',
	'CBP_CHK_ASSETS'					=> 'Tập tin giao diện',
	'CBP_CHK_ASSETS_OK'				=> 'CSS, JavaScript và template đều có (styles/all: dùng được cho prosilver, ForumUS và mọi giao diện khác).',
	'CBP_CHK_ASSETS_MISSING'			=> 'Thiếu tập tin: %s',
	'CBP_CHK_POSTS'					=> 'Bài viết có mã',
	'CBP_CHK_POSTS_DETAIL'				=> array(
		0 => 'Chưa có bài viết nào chứa khung mã.',
		1 => '%d bài viết chứa khung mã.',
		2 => '%d bài viết chứa khung mã.',
	),
	'CBP_CHK_LEGACY'					=> 'Bài viết định dạng cũ',
	'CBP_CHK_LEGACY_OK'				=> 'Không có bài viết nào lưu ở định dạng cũ (phpBB 3.0/3.1).',
	'CBP_CHK_LEGACY_FOUND'				=> array(
		1 => '%d bài viết vẫn lưu ở định dạng cũ: hãy chạy <code>php bin/phpbbcli.php reparser:reparse post_text</code> để chuyển đổi.',
		2 => '%d bài viết vẫn lưu ở định dạng cũ: hãy chạy <code>php bin/phpbbcli.php reparser:reparse post_text</code> để chuyển đổi.',
	),
	'CBP_CREDITS'						=> 'Codebox Plus &middot; phát triển bởi <a href="https://github.com/o0johntam0o" target="_blank" rel="noopener">Huynh Buu Tam (o0johntam0o)</a> &middot; viết lại và nâng cấp cho phpBB 3.3 bởi <a href="https://www.netshadows.de/ombra/" target="_blank" rel="noopener">Salvo Cortesiano</a> &middot; bộ làm nổi bật <a href="https://github.com/GeSHi/geshi-1.0" target="_blank" rel="noopener">GeSHi</a> của Nigel McNie &amp; Benny Baumann',
	'CBP_DOWNLOAD_GROUPS'				=> 'Nhóm được phép tải về',
	'CBP_DOWNLOAD_GROUPS_EXPLAIN'		=> 'Chỉ thành viên của các nhóm được chọn mới có thể tải mã (Ctrl/Cmd + nhấp để chọn nhiều nhóm). Nếu không chọn nhóm nào, mọi người đều có thể tải. Khách không được phép sẽ được yêu cầu đăng nhập.',
	'CBP_DOWNLOAD_GROUPS_ALL'			=> 'Chưa chọn nhóm nào: mọi nhóm đều có thể tải.',
	'CBP_DOWNLOAD_GROUPS_SOME'			=> 'Chỉ các nhóm đã chọn mới có thể tải.',
	'CBP_DOWNLOAD_GROUPS_CLEAR'		=> 'Bỏ chọn tất cả (mọi nhóm)',
	'CBP_LEGEND_CREDITS'				=> 'Ghi công',
	'CBP_SHOW_CREDITS'					=> 'Hiện phần ghi công',
	'CBP_SHOW_CREDITS_EXPLAIN'			=> 'Hiện ở cuối mỗi khung mã bản quyền của tác giả gốc và của phiên bản phpBB 3.3, kèm liên kết tới kho mã và trang web. Tên và địa chỉ nằm trong tập tin ngôn ngữ (CBP_CREDITS_*).',
	'CBP_REPO_URL'						=> 'Địa chỉ kho mã GitHub',
	'CBP_REPO_URL_EXPLAIN'				=> 'Địa chỉ kho mã của bạn hiển thị trong phần ghi công. Để trống để dùng địa chỉ trong tập tin ngôn ngữ (CBP_CREDITS_REPO_URL).',
	'CBP_ERR_REPO_URL'					=> 'Địa chỉ kho mã phải là địa chỉ http:// hoặc https:// hợp lệ (tối đa 255 ký tự).',
	'CBP_CHK_GROUPS'					=> 'Nhóm được phép tải về',
	'CBP_CHK_GROUPS_ALL'				=> 'Mọi nhóm đều có thể tải.',
	'CBP_CHK_GROUPS_LIST'				=> 'Chỉ các nhóm này có thể tải: %s.',
));
