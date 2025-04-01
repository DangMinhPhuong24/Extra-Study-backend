<?php

return [
    'normal' => [
        'date' => 'Được tạo ngày ',
        'at' => ' lúc ',
        'for_customer' => 'Cho KH: ',
        'from_customer' => 'Từ KH: ',
        'happened' => 'Lịch họp sẽ bắt đầu lúc ',
        'minute' => ' phút!',
    ],
    'error' => [
        'page_not_found' => 'Không tìm thấy trang.',
        'model_not_found' => 'Không có kết quả truy vấn.',
        'unprocessable_content' => 'Nội dung không thể xử lý.',
        'forbidden' => 'Không có quyền truy cập.',
        'token' => [
            'expired' => 'Token đã hết hạn',
            'invalid' => 'Token không hợp lệ',
            'not_found' => 'Không tìm thấy Token',
        ]
    ],
    'get' => [
        'permission' => [
            'success' => 'Lấy dữ liệu thành công.',
            'error' => 'Lấy dữ liệu thất bại.',
        ],
        'role' => [
            'success' => 'Lấy dữ liệu thành công.',
            'error' => 'Lấy dữ liệu thất bại.',
        ],
        'user' => [
            'success' => 'Lấy dữ liệu thành công.',
            'error' => 'Lấy dữ liệu thất bại.',
        ],
        'profile' => [
            'success' => 'Lấy dữ liệu thành công.',
            'error' => 'Lấy dữ liệu thất bại.',
        ],
        'registerUser' => [
            'success' => 'Lấy dữ liệu thành công.',
            'error' => 'Lấy dữ liệu thất bại.',
        ],
        'register' => [
            'success' => 'Lấy dữ liệu thành công.',
            'error' => 'Lấy dữ liệu thất bại.',
        ],
    ],
    'post' => [
        'login' => [
            'success' => 'Đăng nhập thành công.',
            'error' => 'Đăng nhập thất bại.',
            'wrong_username' => 'Tên đăng nhập không chính xác.',
            'wrong_password' => 'Mật khẩu không chính xác.',
            'logged_in' => 'Tài khoản đã được đăng nhập.'
        ],
        'logout' => [
            'success' => 'Đăng xuất thành công.',
            'error' => 'Đăng xuất thất bại.',
        ],
        'refresh' => [
            'success' => 'Làm mới token thành công.',
            'error' => 'Token không hợp lệ.',
        ],
        'permission' => [
            'success' => 'Tạo dữ liệu thành công.',
            'error' => 'Tạo dữ liệu thất bại.',
        ],
        'role' => [
            'success' => 'Tạo dữ liệu thành công.',
            'error' => 'Tạo dữ liệu thất bại.',
        ],
        'user' => [
            'success' => 'Tạo dữ liệu thành công.',
            'error' => 'Tạo dữ liệu thất bại.',
            'not_found' => 'Không tìm thấy người dùng.',
        ],
        'registerUser' => [
            'success' => 'Đăng ký thời khóa biểu thành công.',
            'error' => 'Đăng ký thời khóa biểu thất bại.'
        ],
    ],
    'put' => [
        'permission' => [
            'success' => 'Cập nhật dữ liệu thành công.',
            'error' => 'Cập nhật dữ liệu thất bại.',
        ],
        'role' => [
            'success' => 'Cập nhật dữ liệu thành công.',
            'error' => 'Cập nhật dữ liệu thất bại.',
        ],
        'user' => [
            'success' => 'Cập nhật dữ liệu người dùng thành công.',
            'error' => 'Cập nhật dữ liệu người dùng thất bại.',
        ],
        'profile' => [
            'success' => 'Cập nhật thông tin cá nhân thành công.',
            'error' => 'Cập nhật thông tin cá nhân thất bại.',
        ],
        'changePassword' => [
            'success' => 'Đổi mật khẩu thành công.',
            'error' => 'Đổi mật khẩu thất bại.',
            'wrong' => 'Mật khẩu không chính xác.',
        ],
        'registerUser' => [
            'success' => 'Sửa thời khóa biểu thành công.',
            'error' => 'Sửa thời khóa biểu thất bại.'
        ],
    ],
    'delete' => [
        'permission' => [
            'success' =>  'Xóa dữ liệu thành công.',
            'error' => 'Xóa dữ liệu thất bại.',
        ],
        'role' => [
            'success' =>  'Xóa dữ liệu thành công.',
            'error' => 'Xóa dữ liệu thất bại.',
            'fail' => 'Bạn không thể xoá quyền vì có người dùng đang sử dụng'
        ],
        'user' => [
            'success' =>  'Xóa dữ liệu thành công.',
            'error' => 'Xóa dữ liệu thất bại.',
        ],
        'registerUser' => [
            'success' => 'Xóa lớp học thành công.',
            'error' => 'Xóa lớp học thất bại.',
        ],
    ],
];
