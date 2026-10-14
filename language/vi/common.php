<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * Front-end language file [Vietnamese]
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
	'CBP_DEFAULT_FILENAME'			=> 'ma_nguon',
	'CBP_LINES'						=> array(
		1 => '%d dòng',
		2 => '%d dòng',
	),
	'CBP_TOOLBAR'					=> 'Công cụ mã nguồn',
	'CBP_COPY'						=> 'Sao chép',
	'CBP_COPIED'						=> 'Đã sao chép!',
	'CBP_COPY_FAILED'				=> 'Sao chép thất bại',
	'CBP_SELECT_ALL'					=> 'Chọn tất cả',
	'CBP_WRAP'						=> 'Tự động xuống dòng',
	'CBP_LINE_NUMBERS'				=> 'Hiện/ẩn số dòng',
	'CBP_FULLSCREEN'					=> 'Toàn màn hình',
	'CBP_EXIT_FULLSCREEN'			=> 'Thoát toàn màn hình (Esc)',
	'CBP_DOWNLOAD'					=> 'Tải về',
	'CBP_CODE_OF'					=> 'Mã %s',
	'CBP_SHOW_ALL'					=> array(
		1 => 'Hiện toàn bộ mã (%d dòng)',
		2 => 'Hiện toàn bộ mã (%d dòng)',
	),
	'CBP_SHOW_LESS'					=> 'Thu gọn',
	'CBP_PICKER_TITLE'				=> 'Chèn khung mã',
	'CBP_CLOSE'						=> 'Đóng',
	'CBP_PICKER_SEARCH'				=> 'Tìm ngôn ngữ',
	'CBP_PICKER_SEARCH_PLACEHOLDER'	=> 'ví dụ: php, python, sql, js...',
	'CBP_PICKER_FAVORITES'			=> 'Phổ biến',
	'CBP_PICKER_ALL'					=> 'Tất cả ngôn ngữ',
	'CBP_PICKER_NO_RESULTS'			=> 'Không tìm thấy ngôn ngữ nào',
	'CBP_PICKER_FILE'				=> 'Tên tập tin (không bắt buộc, dùng khi tải về)',
	'CBP_PICKER_FILE_PLACEHOLDER'	=> 'ví dụ: index.php',
	'CBP_PICKER_INSERT'				=> 'Chèn',
	'CBP_EDITOR_BUTTON_TITLE'		=> 'Chèn mã có làm nổi bật cú pháp (Codebox Plus)',
	'CBP_EDITOR_BUTTON_SHORT'		=> 'Mã',
	'CBP_DOWNLOAD_TITLE'				=> 'Tải mã nguồn',
	'CBP_FROM_POST'					=> 'Từ bài viết',
	'CBP_CONFIRM'					=> 'Cần xác nhận',
	'CBP_CONFIRM_EXPLAIN'			=> 'Để bảo vệ diễn đàn khỏi việc tải về tự động, vui lòng hoàn thành bước kiểm tra bên dưới.',
	'CBP_CONFIRM_SOLVED'				=> 'Đã kiểm tra xong: việc tải về sẽ tự động bắt đầu. Nếu không, hãy dùng nút bên dưới.',
	'CBP_DOWNLOAD_NOW'				=> 'Tải về ngay',
	'CBP_BACK_TO_POST'				=> 'Quay lại bài viết',
	'CBP_ATTEMPTS_LEFT'				=> array(
		1 => 'Còn %d lần thử.',
		2 => 'Còn %d lần thử.',
	),
	'CBP_ERR_DOWNLOAD_DISABLED'		=> 'Tính năng tải mã đã bị người quản trị tắt.',
	'CBP_ERR_BOTS'					=> 'Máy tìm kiếm và bot không được phép tải mã.',
	'CBP_ERR_LOGIN_REQUIRED'			=> 'Bạn cần đăng nhập để tải mã.',
	'CBP_ERR_POST_NOT_FOUND'			=> 'Bài viết được yêu cầu không tồn tại hoặc không khả dụng.',
	'CBP_ERR_NO_PERMISSION'			=> 'Bạn không có quyền cần thiết để tải mã này.',
	'CBP_ERR_CODE_NOT_FOUND'			=> 'Không tìm thấy mã được yêu cầu trong bài viết. Có thể bài viết đã được sửa: hãy tải lại chủ đề và thử lại.',
	'CBP_ERR_FILE_EMPTY'				=> 'Khung mã này trống.',
	'CBP_ERR_CONFIRM'				=> 'Bạn đã vượt quá số lần xác nhận tối đa trong phiên truy cập này. Vui lòng thử lại sau.',
	'CBP_ERR_GROUP'					=> 'Nhóm thành viên của bạn không được phép tải mã.',
	'CBP_CREDITS_ORIGINAL'			=> 'Codebox Plus gốc &copy; 2014 %s',
	'CBP_CREDITS_AUTHOR'				=> 'Phiên bản phpBB 3.3 &copy; 2026 %s',
	'CBP_CREDITS_REPO'				=> 'Kho mã GitHub',

	// Credits at the bottom of the code boxes: names and addresses (you can change them)
	// Crediti in fondo ai riquadri: nomi e indirizzi (puoi modificarli)
	'CBP_CREDITS_ORIGINAL_NAME'		=> 'o0johntam0o (Huynh Buu Tam)',
	'CBP_CREDITS_ORIGINAL_URL'		=> 'https://github.com/o0johntam0o/phpBB-Extension-Codebox-Plus',
	'CBP_CREDITS_AUTHOR_NAME'		=> 'Salvo Cortesiano',
	'CBP_CREDITS_AUTHOR_URL'			=> 'https://www.netshadows.de/ombra/',
	'CBP_CREDITS_REPO_URL'			=> 'https://github.com/TakeOwer/phpBB-Codebox-Plus-v.4.0.2',
	'CBP_WIN_FOLD'					=> 'Thu gọn khung (chỉ hiện thanh tiêu đề)',
	'CBP_WIN_UNFOLD'					=> 'Khôi phục khung',
	'CBP_WIN_MORE'					=> 'Hiện toàn bộ mã / thu gọn',
	'CBP_WIN_MORE_NA'				=> 'Toàn bộ mã đã được hiển thị',
	'CBP_TOOL_SEARCH'				=> 'Tìm',
	'CBP_TOOL_MENU'					=> 'Tùy chọn khác',
	'CBP_FIND_PLACEHOLDER'			=> 'Tìm',
	'CBP_FIND_CASE'					=> 'Phân biệt hoa thường',
	'CBP_FIND_WORD'					=> 'Khớp cả từ',
	'CBP_FIND_REGEX'					=> 'Dùng biểu thức chính quy',
	'CBP_FIND_PREV'					=> 'Kết quả trước (Shift+Enter)',
	'CBP_FIND_NEXT'					=> 'Kết quả sau (Enter)',
	'CBP_FIND_CLOSE'					=> 'Đóng (Esc)',
	'CBP_FIND_COUNT'					=> '%1$d / %2$d',
	'CBP_FIND_NONE'					=> 'Không có kết quả',
	'CBP_FIND_BAD_REGEX'				=> 'Biểu thức chính quy không hợp lệ',
	'CBP_STATUS_POS'					=> 'Dòng %1$d, cột %2$d',
	'CBP_STATUS_SEL'					=> '(đã chọn %d)',
	'CBP_DL_COUNT_0'					=> 'Chưa được tải lần nào',
	'CBP_DL_COUNT_1'					=> 'Đã tải %d lần',
	'CBP_DL_COUNT_N'					=> 'Đã tải %d lần',
	'CBP_DL_PROGRESS'				=> 'Đang tải… %d%%',
	'CBP_DL_DONE'					=> 'Tải xong',
	'CBP_DL_ERROR'					=> 'Tải thất bại',
	'CBP_MENU_FONT'					=> 'Cỡ chữ',
	'CBP_MENU_FONT_DOWN'				=> 'Nhỏ hơn',
	'CBP_MENU_FONT_UP'				=> 'Lớn hơn',
	'CBP_MENU_FONT_RESET'			=> 'Đặt lại',
	'CBP_MENU_GOTO'					=> 'Đi tới dòng',
	'CBP_MENU_GOTO_BTN'				=> 'Đi',
	'CBP_MENU_CLEAR_MARKS'			=> 'Xóa mọi đánh dấu',
	'CBP_MENU_SHORTCUTS'				=> 'Phím tắt',
	'CBP_SHORTCUTS_LIST'				=> 'Ctrl+F: tìm trong mã
Enter / Shift+Enter, F3: kết quả sau / trước
Ctrl+G: đi tới dòng
Esc: đóng tìm kiếm hoặc toàn màn hình
Nhấp số dòng: tô sáng dòng (Shift+nhấp: một khoảng)
Nhấp chuột phải vào dòng: menu dòng
Nhấp đúp vào một từ: hiện các lần xuất hiện',
	'CBP_CTX_LINE'					=> 'Dòng %d',
	'CBP_CTX_MARK'					=> 'Tô sáng dòng',
	'CBP_CTX_ADDED'					=> 'Đánh dấu là thêm vào',
	'CBP_CTX_REMOVED'				=> 'Đánh dấu là bị xóa',
	'CBP_CTX_STRIKE'					=> 'Gạch ngang dòng',
	'CBP_CTX_COPY_LINE'				=> 'Sao chép dòng',
	'CBP_CTX_COPY_LINK'				=> 'Sao chép liên kết tới dòng',
	'CBP_CTX_FIND_SEL'				=> 'Tìm văn bản đã chọn',
	'CBP_CTX_CLEAR'					=> 'Xóa đánh dấu của dòng',
	'CBP_LINK_COPIED'				=> 'Đã sao chép liên kết!',
	'CBP_OCC_COUNT'					=> '%1$d lần xuất hiện của “%2$s”',
));
