<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'old_password' => [
        'required' => 'Trường bắt buộc nhập.',
    ],
    'password' => [
        'required_login' => 'Vui lòng nhập mật khẩu.',
        'required' => 'Trường bắt buộc nhập.',
        'min' => 'Mật khẩu phải có ít nhất :min ký tự.',
        'mixed' => 'Mật khẩu phải chứa cả chữ hoa và chữ thường.',
        'letters' => 'Mật khẩu phải chứa ít nhất một chữ cái.',
        'symbols' => 'Mật khẩu phải chứa ít nhất một ký tự đặc biệt.',
        'numbers' => 'Mật khẩu phải chứa ít nhất một số.',
    ],
    'new_password_confirmation' => [
        'required_with' => 'Trường bắt buộc nhập khi đã nhập mật khẩu mới.',
        'same' => 'Mật khẩu xác nhận và mật khẩu mới không khớp.',
    ],
    'name' => [
        'required' => 'Trường bắt buộc nhập.',
        'regex' => 'Họ và tên chỉ có thể chứa chữ cái.',
        'required_with' => 'Vui lòng nhập tên hoặc vai trò.',
    ],
    'date_of_birth' => [
        'date_format' => 'Ngày sinh phải là định dạng :format',
    ],
    'identity_card_number' => [
        'numeric' => 'Số căn cước phải là số.',
        'min' => 'Số căn cước phải có ít nhất :min ký tự.',
    ],
    'issued_date' => [
        'date_format' => 'Ngày cấp phải là định dạng :format',
    ],
    'email' => [
        'required' => 'Trường bắt buộc nhập.',
        'valid' => 'Địa chỉ email không hợp lệ.',
        'regex' => 'Địa chỉ email chỉ có thể chứa chữ cái và số.',
        'ends_with' => 'Địa chỉ email phải là :values',
        'unique' => 'Địa chỉ email đã được sử dụng.',
    ],
    'username' => [
        'required_login' => 'Vui lòng nhập tên đăng nhập.',
        'required' => 'Trường bắt buộc nhập.',
        'regex' => 'Tên đăng nhập không hợp lệ.',
        'unique' => 'Tên đăng nhập đã được sử dụng.',
        'exists' => 'Tài khoản không tồn tại.',
    ],
    'customer_name' => [
        'required' => 'Trường bắt buộc nhập.',
    ],
    'company_name' => [
        'required' => 'Trường bắt buộc nhập.',
    ],
    'phone_number' => [
        'required' => 'Trường bắt buộc nhập.',
        'numeric' => 'Số điện thoại phải là số.',
        'min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
        'unique' => 'Số điện thoại đã được sử dụng.',
        'required_with' => 'Vui lòng nhập số điện thoại.',
    ],
    'zalo_number' => [
        'numeric' => 'Số Zalo phải là số.',
        'min' => 'Số Zalo phải có ít nhất :min ký tự.',
        'unique' => 'Số Zalo đã được sử dụng.'
    ],
    'debt_limit' => [
        'integer' => 'Hạn mức nợ phải là một số nguyên.',
        'greater_than' => 'Hạn mức nợ phải lớn hơn :value.',
    ],
    'id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'ID phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn.',
    ],
    'debt_age_name' => [
        'required' => 'Trường bắt buộc nhập.',
        'unique' => 'Loại tuổi nợ đã được sử dụng.'
    ],
    'days_allowed' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Số ngày cho phép chậm thanh toán phải là một số nguyên.',
        'greater_than' => 'Số ngày cho phép chậm thanh toán phải lớn hơn :value.',
        'unique' => 'Số ngày cho phép chậm thanh toán đã được sử dụng.',
    ],
    'debt_group_name' => [
        'required' => 'Trường bắt buộc nhập.',
        'unique' => 'Tên nhóm nợ đã được sử dụng.'
    ],
    'start_day' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Ngày bắt đầu phải là một số nguyên.',
        'less_than' => 'Ngày bắt đầu phải nhỏ hơn ngày kết thúc.',
        'greater_than' => 'Ngày bắt đầu phải lớn hơn :value.',
        'unique_start_day' => 'Ngày bắt đầu đã nằm trong một nhóm tồn tại.',
    ],
    'end_day' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Ngày kết thúc phải là một số nguyên.',
        'greater_than' => 'Ngày kết thúc phải lớn hơn :value.',
        'unique_end_day' => 'Ngày kết thúc đã nằm trong một nhóm tồn tại.',
    ],
    'debt_group' => [
        'overwrite' => 'Ngày bắt đầu và ngày kết thúc đã ghi đè lên một nhóm tồn tại.'
    ],
    'delivery_date' => [
        'date_format' => 'Ngày giao hàng phải là định dạng :format',
    ],
    'height' => [
        'required' => 'Vui lòng nhập chiều cao.',
        'numeric' => 'Chiều cao phải là số.',
        'greater_than' => 'Chiều cao phải là số lớn hơn :value.',
        'less_than_equal' => 'Chiều cao phải là số nhỏ hơn hoặc bằng :value.',
    ],
    'length' => [
        'required' => 'Vui lòng nhập chiều dài.',
        'numeric' => 'Chiều dài phải là số.',
        'greater_than' => 'Chiều dài phải là số lớn hơn :value.',
        'less_than_equal' => 'Chiều dài phải là số nhỏ hơn hoặc bằng :value.',
    ],
    'width' => [
        'required' => 'Vui lòng nhập chiều rộng.',
        'numeric' => 'Chiều rộng phải là số.',
        'greater_than' => 'Chiều rộng phải là số lớn hơn :value.',
        'less_than_equal' => 'Chiều rộng phải là số nhỏ hơn hoặc bằng :value.',
    ],
    'quantity' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Số lượng phải là một số nguyên.',
        'greater_than' => 'Số lượng phải lớn hơn :value.',
        'less_than_equal' => 'Số lượng phải nhỏ hơn hoặc bằng :value.',
        'numeric' => 'Số lượng phải là số.',
        'lte' => 'Vui lòng nhập số nhỏ hơn hoặc bằng số lượng còn lại: ',
    ],
    'amount' => [
        'required' => 'Trường bắt buộc nhập.',
        'numeric' => 'Số tiền phải là số.',
        'greater_than' => 'Số tiền phải lớn hơn :value.',
    ],
    'delivery_charges' => [
        'numeric' => 'Phí vận chuyển phải là số.',
        'greater_than_equal' => 'Phí vận chuyển phải lớn hơn hoặc bằng :value.',
    ],
    'discount' => [
        'numeric' => 'Chiết khấu phải là số.',
        'greater_than_equal' => 'Chiết khấu phải lớn hơn hoặc bằng :value.',
    ],
    'tax_amount' => [
        'numeric' => 'Tiền thuế phải là số.',
        'greater_than' => 'Tiền thuế phải lớn hơn :value.',
    ],
    'total_cost' => [
        'required' => 'Trường bắt buộc nhập.',
        'numeric' => 'Tổng chi phí phải là số.',
        'greater_than' => 'Tổng chi phí phải lớn hơn :value.',
    ],
    'permission_name' => [
        'required' => 'Trường bắt buộc nhập.',
        'unique' => 'Tên quyền đã được sử dụng.'
    ],
    'display_permission_name' => [
        'required' => 'Trường bắt buộc nhập.',
    ],
    'group' => [
        'required' => 'Trường bắt buộc nhập.',
    ],
    'allowable_deviation' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Độ chênh cho phép phải là một số nguyên.',
        'greater_than_equal' => 'Độ chênh cho phép phải lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Độ chênh cho phép phải nhỏ hơn hoặc bằng :value.',
    ],
    'role_name' => [
        'required' => 'Vui lòng chọn vai trò.',
        'unique' => 'Tên vai trò đã được sử dụng.',
        'exists' => 'Không có kết quả truy vấn.',
    ],
    'role_type' => [
        'required' => 'Trường bắt buộc nhập.',
        'exists' => 'Không có kết quả truy vấn.'
    ],
    'start_working_date' => [
        'required' => 'Trường bắt buộc nhập.',
        'date_format' => 'Ngày bắt đầu vào làm phải là định dạng :format',
    ],
    'resignation_date' => [
        'required' => 'Trường bắt buộc nhập.',
        'date_format' => 'Ngày nghỉ việc phải là định dạng :format',
    ],
    'description' => [
        'required' => 'Trường bắt buộc nhập.',
        'max' => 'Mô tả không được dài quá :max ký tự.',
        'string' => 'Trường mô tả chi tiết phải là một chuỗi.',
    ],
    'price' => [
        'required' => 'Trường bắt buộc nhập.',
        'numeric' => 'Đơn giá phải là số.',
        'greater_than' => 'Đơn giá phải lớn hơn :value.',
    ],
    'machine_name' => [
        'required' => 'Trường bắt buộc nhập.',
        'unique' => 'Tên máy móc đã được sử dụng.'
    ],
    'buy_date' => [
        'required' => 'Trường bắt buộc nhập.',
        'date_format' => 'Ngày mua phải là định dạng :format',
    ],
    'maintenance_date' => [
        'date_format' => 'Ngày bảo dưỡng phải là định dạng :format',
    ],
    'manufacture_productivity_below_day' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'manufacture_productivity_exceed_day' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'transport_productivity_below_day' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'transport_productivity_exceed_day' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'quantity_order_return_week' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'quantity_order_return_month' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'quantity_claim_week' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'quantity_claim_month' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'time_worker_leave' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'time_machine_maintenance' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'minutes_manufacture_order_behind_schedule' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'minutes_delivery_behind_schedule' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'minutes_change_process' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'inventory_process_saw_cut' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'inventory_process_cut_trim' => [
        'integer' => 'Phải là một số nguyên.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Phải nhập số nhỏ hơn hoặc bằng :value.',
    ],
    'workday' => [
        'required' => 'Trường bắt buộc nhập.',
        'date_format' => 'Ngày sắp xếp công nhân phải là định dạng :format',
    ],
    'warehouse_location_name' => [
        'required' => 'Vui lòng nhập tên vị trí.',
        'unique' => 'Tên vị trí đã được sử dụng.'
    ],
    'limit_inventory_weight' => [
        'numeric' => 'Giới hạn lưu kho kg phải là số.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
    ],
    'limit_inventory_length' => [
        'numeric' => 'Giới hạn lưu kho mét dài phải là số.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
        'less_than_equal' => 'Giới hạn lưu kho mét dài phải là số nhỏ hơn hoặc bằng chiều dài.',
    ],
    'limit_inventory_square_meter' => [
        'required' => 'Vui lòng nhập mét vuông.',
        'numeric' => 'Mét vuông phải là số.',
        'greater_than' => 'Mét vuông phải là số lớn hơn :value.',
        'less_than_equal' => 'Mét vuông phải là số nhỏ hơn hoặc bằng :value.',
    ],
    'warehouse_name' => [
        'required' => 'Vui lòng nhập tên kho hàng.',
        'unique' => 'Tên kho hàng đã được sử dụng.'
    ],
    'limit_inventory' => [
        'numeric' => 'Giới hạn lưu kho phải là số.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
    ],
    'enterprise_establishment_date' => [
        'date_format' => 'Ngày thành lập doanh nghiệp phải là định dạng :format',
    ],
    'enterprise_birthday' => [
        'date_format' => 'Ngày sinh nhật doanh nghiệp phải là định dạng :format',
    ],
    'length_inventory_min' => [
        'numeric' => 'Phải là số.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
    ],
    'length_inventory_max' => [
        'numeric' => 'Phải là số.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
    ],
    'roll_inventory_max' => [
        'numeric' => 'Phải là số.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
    ],
    'length_sell_week' => [
        'numeric' => 'Phải là số.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
    ],
    'length_sell_month' => [
        'numeric' => 'Phải là số.',
        'greater_than_equal' => 'Phải nhập số lớn hơn hoặc bằng :value.',
    ],
    'effective_date' => [
        'date_format' => 'Ngày báo giá phải là định dạng :format.',
    ],
    'consultation_date' => [
        'date_format' => 'Ngày tư vấn phải là định dạng :format.',
    ],
    'image' => 'Phải là một hình ảnh.',
    'mimes' => 'Phải là một tập tin thuộc loại: :values.',
    'address_branches' => [
        'min' => 'Phải nhập ít nhất một chi nhánh.',
    ],
    'address_offices' => [
        'max' => 'Chỉ nhập tối đa 5 địa chỉ văn phòng.',
    ],
    'address_factories' => [
        'max' => 'Chỉ nhập tối đa 5 địa chỉ nhà máy.',
    ],
    'customer_contacts' => [
        'min' => 'Phải nhập ít nhất 1 liên hệ.',
    ],
    'title' => [
        'required' => 'Trường bắt buộc nhập.',
    ],
    'date' => [
        'required' => 'Trường bắt buộc nhập.',
        'date_format' => 'Ngày bắt đầu phải là định dạng :format.',
    ],
    'end_date' => [
        'date_format' => 'Ngày kết thúc phải là định dạng :format.',
        'after_or_equal' => 'Ngày kết thúc phải là ngày sau hoặc bằng ngày bắt đầu.'
    ],
    'start_time' => [
        'required' => 'Trường bắt buộc nhập.',
        'date_format' => 'Giờ bắt đầu phải là định dạng :format.',
    ],
    'end_time' => [
        'required' => 'Trường bắt buộc nhập.',
        'date_format' => 'Thời gian kết thúc phải là định dạng :format.',
        'after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.'
    ],
    'department_name' => [
        'required' => 'Trường bắt buộc nhập.',
        'unique' => 'Tên phòng ban đã được sử dụng.'
    ],
    'date_weight_import_warehouse' => [
        'date_format' => 'Ngày nhập kho số kg phải là định dạng :format',
    ],
    'date_length_import_warehouse' => [
        'date_format' => 'Ngày nhập kho số mét dài phải là định dạng :format',
    ],
    'customer_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn.',
    ],
    'claim_problem_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'debt_age_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'proposal_status_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'role_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn.',
    ],
    'province_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'district_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'product_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn sản phẩm.',
    ],
    'product_management_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn sản phẩm.',
    ],
    'product_qr' => [
        'required' => 'Trường bắt buộc nhập.',
        'exists' => 'Mã QR sản phẩm không hợp lệ.',
    ],
    'user_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn.',
    ],
    'order_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'product_item_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'machine_type_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'worker_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'delivery_shift_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'finished_product_form_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'warehouse_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn kho hàng.',
    ],
    'personnel_scale_id' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'factory_scale_id' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'company_type_id' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'industry_group_ids' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'product_substitutability_id' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'order_plan_handbook_id' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'quality_require_id' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'product_application_ids' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'frequency_company_visit_id' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'incentive_policy_id' => [
        'integer' => 'Phải là một số nguyên.',
    ],
    'consultation_history_problem_id' => [
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn lịch sử tư vấn.',
    ],
    'calendar_status_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
    ],
    'department_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn.',
    ],
    'branch_id' => [
        'required' => 'Vui lòng chọn chi nhánh.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn chi nhánh.',
    ],
    'user_ids' => [
        'invited' => 'Bạn không được mời chính mình.',
        'array' => 'Phải là một mảng.',
        'integer' => 'ID nguời dùng phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn người dùng.',
    ],
    'warehouse_location_id' => [
        'required' => 'ID vị trí kho là bắt buộc.',
        'integer' => 'ID vị trí kho phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn vị trí kho.',
    ],
    'warehouse_location_type_id' => [
        'required' => 'Vui lòng chọn loại vị trí.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn loại vị trí kho.',
    ],
    'warehouse_import_order_id' => [
        'required' => 'ID lệnh nhập kho là bắt buộc.',
        'integer' => 'ID lệnh nhập kho phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn lệnh nhập kho.',
    ],
    'warehouse_export_order_id' => [
        'required' => 'ID lệnh xuất kho là bắt buộc.',
        'integer' => 'ID lệnh xuất kho phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn lệnh nhập kho.',
    ],
    'product_ids' => [
        'array' => 'Phải là một mảng.',
        'integer' => 'ID sản phẩm phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn sản phẩm.',
    ],
    'warehouse_location_qr' => [
        'required' => 'Mã qr vị trí kho là bắt buộc.',
        'exists' => 'Mã qr vị trí kho không hợp lệ.',
    ],
    'machine_qr' => [
        'required' => 'Mã qr máy móc là bắt buộc.',
        'exists' => 'Mã qr máy móc không hợp lệ.',
    ],
    'weight' => [
        'required' => 'Vui lòng nhập cân nặng.',
        'numeric' => 'Cân nặng phải là số.',
        'greater_than' => 'Cân nặng phải lớn hơn :value.',
    ],
    'code' => [
        'required' => 'Vui lòng nhập mã nội bộ.',
        'unique' => 'Mã nội bộ đã được sử dụng.',
        'string' => 'Mã nội bộ phải là một chuỗi.',
    ],
    'product_name' => [
        'required' => 'Vui lòng nhập tên.',
        'string' => 'Tên phải là một chuỗi.',
    ],
    'supplier_id' => [
        'required' => 'Vui lòng chọn nhà cung cấp.',
        'exists' => 'Không có kết quả truy vấn nhà cung cấp.',
    ],
    'product_group_id' => [
        'required' => 'Vui lòng chọn nhóm sản phẩm.',
        'exists' => 'Không có kết quả truy vấn nhóm sản phẩm.',
    ],
    'specifications' => [
        'required' => 'Vui lòng nhập ít nhất một quy cách.',
        'array' => 'Quy cách phải là một mảng.',
    ],
    'surface_type' => [
        'required' => 'Vui lòng nhập chủng loại mặt.',
        'string' => 'Tên chủng loại mặt phải là một chuỗi.',
    ],
    'surface_quantification' => [
        'required' => 'Vui lòng nhập định lượng mặt.',
        'numeric' => 'Định lượng mặt phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Định lượng mặt phải là một số và lớn hơn hoặc bằng 0.',
    ],
    'surface_thickness' => [
        'required' => 'Vui lòng nhập độ dày mặt.',
        'numeric' => 'Độ dày mặt phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Độ dày mặt phải là một số và lớn hơn hoặc bằng 0.',
    ],
    'adhesive_type' => [
        'required' => 'Vui lòng nhập tên chủng loại keo.',
        'string' => 'Tên chủng loại keo phải là một chuỗi.',
    ],
    'adhesive_measurement' => [
        'numeric' => 'Định lượng keo phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Định lượng keo phải là một số và lớn hơn hoặc bằng 0.',
    ],
    'adhesive_thickness' => [
        'numeric' => 'Độ dày keo phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Độ dày keo phải là một số và lớn hơn hoặc bằng 0.',
    ],
    'base_type' => [
        'required' => 'Vui lòng nhập tên chủng loại đế.',
        'string' => 'Tên chủng loại đế phải là một số và lớn hơn hoặc bằng 0.',
    ],
    'base_measurement' => [
        'required' => 'Vui lòng nhập định lượng đế.',
        'numeric' => 'Định lượng đế phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Định lượng đế phải là một số và lớn hơn hoặc bằng 0.',
    ],
    'base_thickness' => [
        'required' => 'Vui lòng nhập độ dày đế.',
        'numeric' => 'Độ dày đế phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Độ dày đế phải là một số và lớn hơn hoặc bằng 0.',
    ],
    'adhesive_force' => [
        'required' => 'Vui lòng nhập lực dính.',
        'numeric' => 'Lực dính phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Lực dính phải là một số và lớn hơn hoặc bằng 0.',
    ],
    'temperature_from' => [
        'numeric' => 'Nhiệt độ phải là một số.',
        'required_custom' => 'Cả hai trường nhiệt độ đều phải có giá trị.',
        'from_less_than_to' => 'Trường nhiệt độ bắt đầu phải nhỏ hơn trường nhiệt độ kết thúc.'
    ],
    'temperature_to' => [
        'numeric' => 'Nhiệt độ phải là một số.',
    ],
    'expiry_year' => [
        'gt' => 'Số năm hết hạn phải lớn hơn 0.',
    ],
    'advantage' => [
        'string' => 'Trường ưu điểm phải là một chuỗi.',
    ],
    'disadvantage' => [
        'string' => 'Trường nhược điểm phải là một chuỗi.',
    ],
    'bonding_envs' => [
        'array' => 'Môi trường dán phải là một mảng.',
    ],
    'surface_materials' => [
        'array' => 'Chất lượng bề mặt phải là một mảng.',
    ],
    'printers' => [
        'array' => 'Máy in phải là một mảng.',
    ],
    'not_suitable_for' => [
        'array' => 'Không dùng cho phải là một mảng.',
    ],
    'product_group_name' => [
        'required' => 'Trường bắt buộc nhập.',
        'unique' => 'Trường tên nhóm sản phẩm đã được sử dụng.',
        'string' => 'Trường tên nhóm sản phẩm phải là một chuỗi.'
    ],
    'supplier_name' => [
        'required' => 'Trường bắt buộc nhập.',
        'string' => 'Trường tên nhà cung cấp phải là một chuỗi.',
        'unique' => 'Trường tên nhà cung cấp đã được sử dụng.',

    ],
    'address' => [
        'required' => 'Trường bắt buộc nhập.',
        'string' => 'Trường địa chỉ phải là một chuỗi.'
    ],
    'rating_point' => [
        'numeric' => 'Trường điểm đánh giá phải là một số.'
    ],
    'type' => [
        'required' => 'Trường bắt buộc nhập.',
        'type.in' => 'Trường type phải là một trong các giá trị: Nội địa, Nước ngoài.',
    ],
    'custom' => [
        'specifications.*.length' => [
            'required' => 'Vui lòng nhập chiều dài trong quy cách.',
            'numeric' => 'Chiều dài phải là một số và lớn hơn hoặc bằng 0.',
            'gte' => 'Chiều dài phải là một số và lớn hơn hoặc bằng 0.',
        ],
        'specifications.*.height' => [
            'required' => 'Vui lòng nhập chiều cao trong quy cách.',
            'numeric' => 'Chiều cao phải là một số và lớn hơn hoặc bằng 0.',
            'gte' => 'Chiều cao phải là một số và lớn hơn hoặc bằng 0.',
        ],
        'pdfs.*.path_name' => [
            'required' => 'Vui lòng nhập tên PDF.',
            'string' => 'Tên PDF phải là một chuỗi.',
        ],
        'pdfs.*.size' => [
            'required' => 'Vui lòng nhập kích thước file PDF.',
            'string' => 'Kích thước file PDF phải là một chuỗi.',
        ],
        'bonding_envs.*' => [
            'string' => 'Trường môi trường dán phải là một chuỗi.',
        ],
        'surface_materials.*' => [
            'string' => 'Trường chất lượng bề mặt phải là một chuỗi.',
        ],
        'printers.*' => [
            'string' => 'Trường máy in phải là một chuỗi.',
        ],
        'not_suitable_for.*' => [
            'string' => 'Trường không dùng cho phải là một chuỗi.',
        ],
        'permissions.*' => [
            'required' => 'Vui lòng chọn ít nhất một tác vụ.',
            'exists' => 'Không tìm thấy tên quyền.',
        ],
    ],

    'surface_quantification_tolerance' => [
        'required' => 'Vui lòng nhập dung sai định lượng mặt.',
        'numeric' => 'Dung sai định lượng mặt phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Dung sai định lượng mặt phải là một số và lớn hơn hoặc bằng 0.',
    ],

    'surface_quantification_tolerance_type_id' => [
        'required' => 'Vui lòng chọn kiểu dung sai định lượng mặt.',
        'exists' => 'Không có kết quả truy vấn dung sai định lượng mặt.',
    ],

    'adhesive_measurement_tolerance' => [
        'numeric' => 'Dung sai định lượng keo phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Dung sai định lượng keo phải là một số và lớn hơn hoặc bằng 0.',
    ],

    'adhesive_measurement_tolerance_type_id' => [
        'exists' => 'Không có kết quả truy vấn dung sai định lượng keo.',
    ],

    'base_measurement_tolerance' => [
        'required' => 'Vui lòng nhập dung sai định lượng đế.',
        'numeric' => 'Dung sai định lượng đế phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Dung sai định lượng đế phải là một số và lớn hơn hoặc bằng 0.',
    ],

    'base_measurement_tolerance_type_id' => [
        'required' => 'Vui lòng chọn kiểu dung sai định lượng đế.',
        'exists' => 'Không có kết quả truy vấn dung sai định lượng đế.',
    ],

    'surface_thickness_tolerance' => [
        'required' => 'Vui lòng nhập dung sai độ dày mặt.',
        'numeric' => 'Dung sai độ dày mặt phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Dung sai độ dày mặt phải là một số và lớn hơn hoặc bằng 0.',
    ],

    'surface_thickness_tolerance_type_id' => [
        'required' => 'Vui lòng chọn kiểu dung sai độ dày mặt.',
        'exists' => 'Không có kết quả truy vấn dung sai độ dày mặt.',
    ],

    'adhesive_thickness_tolerance' => [
        'numeric' => 'Dung sai độ dày keo phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Dung sai độ dày keo phải là một số và lớn hơn hoặc bằng 0.',
    ],

    'adhesive_thickness_tolerance_type_id' => [
        'exists' => 'Không có kết quả truy vấn dung sai độ dày keo.',
    ],

    'base_thickness_tolerance' => [
        'required' => 'Vui lòng nhập dung sai độ dày đế.',
        'numeric' => 'Dung sai độ dày đế phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Dung sai độ dày đế phải là một số và lớn hơn hoặc bằng 0.',
    ],

    'base_thickness_tolerance_type_id' => [
        'required' => 'Vui lòng chọn kiểu dung sai độ dày đế.',
        'exists' => 'Không có kết quả truy vấn dung sai độ dày đế.',
    ],

    'adhesive_force_tolerance' => [
        'required' => 'Vui lòng nhập dung sai lực dính.',
        'numeric' => 'Dung sai lực dính phải là một số và lớn hơn hoặc bằng 0.',
        'gte' => 'Dung sai lực dính phải là một số và lớn hơn hoặc bằng 0.',
    ],

    'adhesive_force_tolerance_type_id' => [
        'required' => 'Vui lòng chọn kiểu dung sai lực dính.',
        'exists' => 'Không có kết quả truy vấn dung sai lực dính.',
    ],

    'pdfs' => [
        'max' => 'Bạn chỉ có thể tải lên tối đa 10 file PDF.',
        'array' => 'PDF phải là một mảng.',
    ],

    'min_inventory' => [
        'numeric' => 'Tồn kho tối thiểu phải là một số.',
        'gte' => 'Tồn kho tối thiểu phải lớn hơn hoặc bằng 0.',
    ],

    'max_inventory' => [
        'numeric' => 'Tồn kho tối đa phải là một số.',
        'gte' => 'Tồn kho tối đa phải lớn hơn hoặc bằng 0.',
    ],

    'sort_by' => [
        'in' => 'Vui lòng chọn điều kiện sắp xếp'
    ],

    'unique_array' => 'Trường :attribute phải có các giá trị duy nhất.',

    'permissions' => [
        'required' => 'Vui lòng chọn ít nhất một tác vụ.',
        'array' => 'Quyền phải là một mảng.',
        'min' => 'Vui lòng chọn ít nhất một tác vụ.',
        'exists' => 'Không tìm thấy tên quyền.',
    ],

    'attributes' => [
        'bonding_envs' => 'Môi trường dán',
        'surface_materials' => 'Chất lượng bề mặt',
        'printers' => 'Máy in',
        'not_suitable_for' => 'Không phù hợp cho',
    ],

    'product_arrange_id' => [
        'required' => 'Trường bắt buộc nhập.',
        'integer' => 'Phải là một số nguyên.',
        'exists' => 'Không có kết quả truy vấn sản phẩm sắp xếp.',
    ],

    'register_ids' => [
        'required' => 'Vui lòng chọn ít nhất một môn học.',
        'array' => 'Phải là một mảng.',
    ],
];

