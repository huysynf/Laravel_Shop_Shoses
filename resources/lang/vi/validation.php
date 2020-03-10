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

    'accepted' => 'Trường :attribute phải được chấp nhận.',
    'active_url' => ' :attribute không phải là địa chỉ web.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ' :attribute phải lớn hơn :min và nhỏ hơn :max.',
        'file' => ' :attribute phải lớn hơn :min và nhỏ hơn :max kilobytes.',
        'string' => 'The :attribute phải lớn hơn :min nhỏ hơn :max kí tự.',
        'array' => 'The :attribute phải lớn hơn :min nhỏ hơn :max phần tử.',
    ],
    'boolean' => ' :attribute dữ liệu là true hoặc failse.',
    'confirmed' => ' :attribute không giống nhau.',
    'date' => ' :attribute không phải là ngày .',
    'date_equals' => ' :attribute phải là một ngày bằng :date.',
    'date_format' => ' :attribute không đúng định dạng :format.',
    'different' => ' :attribute và :other phải khác nhau.',
    'digits' => ' :attribute phải là  :digits chữ số.',
    'digits_between' => ' :attribute khoản giũa :min và :max chữ số.',
    'dimensions' => ' :attribute kích thước hình ảnh không hợp lệ.',
    'distinct' => ' :attribute trường có giá trị trùng lặp.',
    'email' => ' :attribute phải là địa chỉ email.',
    'ends_with' => ' :attribute phải kết thúc bằng một trong những điều sau đây: :values',
    'exists' => 'thuộc tính :attribute không hợp lệ.',
    'file' => ' :attribute phải là tệp tin.',
    'filled' => ' :attribute phải có một giá trị.',
    'gt' => [
        'numeric' => ' :attribute phải lớn hơn  :value.',
        'file' => 'The :attribute phải lớn hơn :value kilobytes.',
        'string' => ' :attribute phải lớn hơn :value kí tự.',
        'array' => ' :attribute phải lớn hơn :value phần tử.',
    ],
    'gte' => [
        'numeric' => ' :attribute phải lớn hơn hoặc bằng :value.',
        'file' => ' :attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => ' :attribute phải lớn hơn hoặc bằng :value kí tự.',
        'array' => ' :attribute phải có :value  phẩn tử hoặc nhiều hơn.',
    ],
    'image' => ' :attribute phải là hình ảnh.',
    'in' => ' chọn :attribute không hiệu lực.',
    'in_array' => ' :attribute không tồn tại trong :other.',
    'integer' => ' :attribute phải là số nguyên.',
    'ip' => ' :attribute phải là địa chỉ IP.',
    'ipv4' => ' :attribute phải là địa chỉ IPv4.',
    'ipv6' => ' :attribute phải là địa chỉ IPv6.',
    'json' => ' :attribute phải là định dạng json.',
    'lt' => [
        'numeric' => ' :attribute Phải nhỏ hơn :value.',
        'file' => ' :attribute Phải nhỏ hơn :value kilobytes.',
        'string' => ' :attribute Phải nhỏ hơn :value kí tự.',
        'array' => ' :attribute Phải nhỏ hơn :value phần tử.',
    ],
    'lte' => [
        'numeric' => ' :attribute Phải nhỏ hơn hoặc bằng :value.',
        'file' => ' :attribute Phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => ' :attribute Phải nhỏ hơn hoặc bằng :value kí tự.',
        'array' => ' :attribute Phải nhỏ hơn hoặc bằng :value phần tử.',
    ],
    'max' => [
        'numeric' => ' :attribute Phải lớn hơn :max.',
        'file' => ' :attribute Phải lớn hơn :max kilobytes.',
        'string' => ' :attribute Phải lớn hơn :max kí tự.',
        'array' => ' :attribute Phải lớn hơn :max phẩn tử.',
    ],
    'mimes' => ' :attribute tệp tin phải là định dạng: :values.',
    'mimetypes' => ' :attribute phải là loại: :values.',
    'min' => [
        'numeric' => ' :attribute ít nhất phải :min.',
        'file' => ' :attribute ít nhất phải :min kilobytes.',
        'string' => ' :attribute ít nhất phải :min kí tự.',
        'array' => ' :attribute ít nhất phải :min phần tử.',
    ],
    'not_in' => ' chọn :attribute không đúng.',
    'not_regex' => ' :attribute không đúng định dạng.',
    'numeric' => ' :attribute phải là số.',
    'password' => ' sai mật khẩu.',
    'present' => ' :attribute phải lớn hơn hiện tại.',
    'regex' => ' :attribute không đúng định dạng.',
    'required' => ' :attribute không để trống.',
    'required_if' => ' :attribute không để trống khi :other là :value.',
    'required_unless' => ' :attribute không để trống trừ khi  :other một trong :values.',
    'required_with' => ' :attribute không để trống khi  :values hiện tại.',
    'required_with_all' => ' :attribute không để trống khi :values với hiện tại.',
    'required_without' => ' :attribute không để trống khi :values không phải hiện tại.',
    'required_without_all' => ' :attribute không để trống khi không :values có mặt.',
    'same' => ' :attribute và :other phải giống nhau.',
    'size' => [
        'numeric' => ' :attribute phải là  :size.',
        'file' => ' :attribute phải là :size kilobytes.',
        'string' => ' :attribute phải là :size kí tự.',
        'array' => ' :attribute phải chứa :size phần tự.',
    ],
    'starts_with' => ' :attribute phải bắt đầu với một trong những following: :values',
    'string' => ' :attribute phải là kí tự.',
    'timezone' => ' :attribute phải là thời gian một vùng.',
    'unique' => ' :attribute đã tồn tại.',
    'uploaded' => ' :attribute lỗi khi tải lên.',
    'url' => ' :attribute định dạng sai.',
    'uuid' => ' :attribute phải là một UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
