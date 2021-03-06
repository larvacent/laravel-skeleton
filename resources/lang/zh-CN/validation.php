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

    'accepted' => ':attribute 必须接受。',
    'active_url' => ':attribute 不是一个有效的网址。',
    'after' => ':attribute 必须是一个在 :date 之后的日期。',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => ':attribute 只能由字母组成。',
    'alpha_dash' => ':attribute 只能由字母、数字、中划线或下划线字符组成。',
    'alpha_num' => ':attribute 只能由字母和数字组成。',
    'array' => ':attribute 必须是一个数组。',
    'before' => ':attribute 必须是一个在 :date 之前的日期。',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ':attribute 必须介于 :min - :max 之间。',
        'file' => ':attribute 必须介于 :min - :max kb 之间。',
        'string' => ':attribute 必须介于 :min - :max 个字符之间。',
        'array' => ':attribute 必须只有 :min - :max 个单元。',
    ],
    'boolean' => ':attribute 必须为布尔值。',
    'confirmed' => ':attribute两次输入不一致。',
    'date' => ':attribute 不是一个有效的日期。',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ':attribute 的格式必须为 :format。',
    'different' => ':attribute 和 :other 必须不同。',
    'digits' => ':attribute 必须是 :digits 位的数字。',
    'digits_between' => ':attribute 必须是介于 :min 和 :max 位的数字。',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ':attribute必须是一个合法有效的电子邮件地址。',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => ':attribute不存在。',
    'file' => ':attribute必须是一个文件。',
    'filled' => ':attribute是必填的。',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ':attribute必须是一个图片 (jpeg, png, bmp 或者 gif)。',
    'in' => '选定的:attribute是无效的。',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => ':attribute必须个是整数。',
    'ip' => ':attribute必须是一个合法的IP地址。',
    'ipv4' => ':attribute必须是有效的 IPv4 地址。',
    'ipv6' => ':attribute必须是有效的 IPv6 地址。',
    'json' => ':attribute必须是正确的 JSON 格式。',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute 不能大于 :max。',
        'file' => ':attribute 不能大于 :max kb。',
        'string' => ':attribute 不能大于 :max 个字符。',
        'array' => ':attribute 最多只有 :max 个。',
    ],
    'mimes' => ':attribute 必须是一个 :values 类型的文件。',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute 必须大于等于 :min。',
        'file' => ':attribute 大小不能小于 :min KB。',
        'string' => ':attribute 至少为 :min 个字符。',
        'array' => ':attribute 至少有 :min 项。',
    ],
    'not_in' => '已选的属性 :attribute 非法。',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute必须是一个数字。',
    'password' => '密码错误。',
    'present' => 'The :attribute field must be present.',
    'regex' => ':attribute格式不正确。',
    'required' => ':attribute不能为空。',
    'required_if' => '当 :other 为 :value 时 :attribute 不能为空。',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => '当 :values 存在时 :attribute 不能为空。',
    'required_with_all' => '当 :values 存在时 :attribute 不能为空。',
    'required_without' => '当 :values 不存在时 :attribute 不能为空。',
    'required_without_all' => '当 :values 都不存在时 :attribute 不能为空。',
    'same' => ':attribute 和 :other 必须相同。',
    'size' => [
        'numeric' => ':attribute 大小必须为 :size。',
        'file' => ':attribute 大小必须为 :size KB。',
        'string' => ':attribute 必须是 :size 个字符。',
        'array' => ':attribute 必须为 :size 项。',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => ':attribute 必须是一个字符串。',
    'timezone' => ':attribute 必须是一个有效的时区值。',
    'unique' => ':attribute 已经存在。',
    'uploaded' => ':attribute 上传失败。',
    'url' => ':attribute 格式不正确。',
    'uuid' => ':attribute 必须是有效的 UUID。',

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
