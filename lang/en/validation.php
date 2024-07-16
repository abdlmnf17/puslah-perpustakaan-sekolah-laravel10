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

'accepted' => 'Bidang :attribute harus diterima.',
'accepted_if' => 'Bidang :attribute harus diterima ketika :other adalah :value.',
'active_url' => 'Bidang :attribute harus berupa URL yang valid.',
'after' => 'Bidang :attribute harus berupa tanggal setelah :date.',
'after_or_equal' => 'Bidang :attribute harus berupa tanggal setelah atau sama dengan :date.',
'alpha' => 'Bidang :attribute hanya boleh berisi huruf.',
'alpha_dash' => 'Bidang :attribute hanya boleh berisi huruf, angka, dash, dan underscore.',
'alpha_num' => 'Bidang :attribute hanya boleh berisi huruf dan angka.',
'array' => 'Bidang :attribute harus berupa array.',
'ascii' => 'Bidang :attribute hanya boleh berisi karakter alphanumeric satu byte dan simbol.',
'before' => 'Bidang :attribute harus berupa tanggal sebelum :date.',
'before_or_equal' => 'Bidang :attribute harus berupa tanggal sebelum atau sama dengan :date.',
'between' => [
    'array' => 'Bidang :attribute harus memiliki antara :min dan :max item.',
    'file' => 'Bidang :attribute harus berukuran antara :min dan :max kilobita.',
    'numeric' => 'Bidang :attribute harus berada di antara :min dan :max.',
    'string' => 'Bidang :attribute harus berada di antara :min dan :max karakter.',
],
'boolean' => 'Bidang :attribute harus berupa true atau false.',
'can' => 'Bidang :attribute mengandung nilai yang tidak diizinkan.',
'confirmed' => 'Konfirmasi bidang :attribute tidak cocok.',
'current_password' => 'Kata sandi salah.',
'date' => 'Bidang :attribute harus berupa tanggal yang valid.',
'date_equals' => 'Bidang :attribute harus berupa tanggal yang sama dengan :date.',
'date_format' => 'Bidang :attribute harus sesuai dengan format :format.',
'decimal' => 'Bidang :attribute harus memiliki :decimal tempat desimal.',
'declined' => 'Bidang :attribute harus ditolak.',
'declined_if' => 'Bidang :attribute harus ditolak ketika :other adalah :value.',
'different' => 'Bidang :attribute dan :other harus berbeda.',
'digits' => 'Bidang :attribute harus berisi :digits digit.',
'digits_between' => 'Bidang :attribute harus berisi antara :min dan :max digit.',
'dimensions' => 'Bidang :attribute memiliki dimensi gambar yang tidak valid.',
'distinct' => 'Bidang :attribute memiliki nilai duplikat.',
'doesnt_end_with' => 'Bidang :attribute tidak boleh diakhiri dengan salah satu dari: :values.',
'doesnt_start_with' => 'Bidang :attribute tidak boleh dimulai dengan salah satu dari: :values.',
'email' => 'Bidang :attribute harus berupa alamat email yang valid.',
'ends_with' => 'Bidang :attribute harus diakhiri dengan salah satu dari: :values.',
'enum' => 'Pilihan :attribute yang dipilih tidak valid.',
'exists' => 'Pilihan :attribute yang dipilih tidak valid.',
'extensions' => 'Bidang :attribute harus memiliki salah satu dari ekstensi berikut: :values.',
'file' => 'Bidang :attribute harus berupa file.',
'filled' => 'Bidang :attribute harus memiliki nilai.',
'gt' => [
    'array' => 'Bidang :attribute harus memiliki lebih dari :value item.',
    'file' => 'Bidang :attribute harus lebih besar dari :value kilobita.',
    'numeric' => 'Bidang :attribute harus lebih besar dari :value.',
    'string' => 'Bidang :attribute harus lebih besar dari :value karakter.',
],
'gte' => [
    'array' => 'Bidang :attribute harus memiliki :value item atau lebih.',
    'file' => 'Bidang :attribute harus lebih besar dari atau sama dengan :value kilobita.',
    'numeric' => 'Bidang :attribute harus lebih besar dari atau sama dengan :value.',
    'string' => 'Bidang :attribute harus lebih besar dari atau sama dengan :value karakter.',
],
'hex_color' => 'Bidang :attribute harus berupa warna heksadesimal yang valid.',
'image' => 'Bidang :attribute harus berupa gambar.',
'in' => 'Pilihan :attribute yang dipilih tidak valid.',
'in_array' => 'Bidang :attribute harus ada dalam :other.',
'integer' => 'Bidang :attribute harus berupa bilangan bulat.',
'ip' => 'Bidang :attribute harus berupa alamat IP yang valid.',
'ipv4' => 'Bidang :attribute harus berupa alamat IPv4 yang valid.',
'ipv6' => 'Bidang :attribute harus berupa alamat IPv6 yang valid.',
'json' => 'Bidang :attribute harus berupa string JSON yang valid.',
'lowercase' => 'Bidang :attribute harus berupa huruf kecil.',
'lt' => [
    'array' => 'Bidang :attribute harus memiliki kurang dari :value item.',
    'file' => 'Bidang :attribute harus kurang dari :value kilobita.',
    'numeric' => 'Bidang :attribute harus kurang dari :value.',
    'string' => 'Bidang :attribute harus kurang dari :value karakter.',
],
'lte' => [
    'array' => 'Bidang :attribute tidak boleh memiliki lebih dari :value item.',
    'file' => 'Bidang :attribute harus kurang dari atau sama dengan :value kilobita.',
    'numeric' => 'Bidang :attribute harus kurang dari atau sama dengan :value.',
    'string' => 'Bidang :attribute harus kurang dari atau sama dengan :value karakter.',
],
'mac_address' => 'Bidang :attribute harus berupa alamat MAC yang valid.',
'max' => [
    'array' => 'Bidang :attribute tidak boleh memiliki lebih dari :max item.',
    'file' => 'Bidang :attribute tidak boleh lebih besar dari :max kilobita.',
    'numeric' => 'Bidang :attribute tidak boleh lebih besar dari :max.',
    'string' => 'Bidang :attribute tidak boleh lebih besar dari :max karakter.',
],
'max_digits' => 'Bidang :attribute tidak boleh memiliki lebih dari :max digit.',
'mimes' => 'Bidang :attribute harus berupa file dengan tipe: :values.',
'mimetypes' => 'Bidang :attribute harus berupa file dengan tipe: :values.',
'min' => [
    'array' => 'Bidang :attribute harus memiliki setidaknya :min item.',
    'file' => 'Bidang :attribute harus setidaknya berukuran :min kilobita.',
    'numeric' => 'Bidang :attribute harus setidaknya :min.',
    'string' => 'Bidang :attribute harus setidaknya :min karakter.',
],
'min_digits' => 'Bidang :attribute harus memiliki setidaknya :min digit.',
'missing' => 'Bidang :attribute harus hilang.',
'missing_if' => 'Bidang :attribute harus hilang ketika :other adalah :value.',
'missing_unless' => 'Bidang :attribute harus hilang kecuali :other adalah :value.',
'missing_with' => 'Bidang :attribute harus hilang ketika :values hadir.',
'missing_with_all' => 'Bidang :attribute harus hilang ketika :values hadir.',
'multiple_of' => 'Bidang :attribute harus merupakan kelipatan dari :value.',
'not_in' => 'Pilihan :attribute yang dipilih tidak valid.',
'not_regex' => 'Format bidang :attribute tidak valid.',
'numeric' => 'Bidang :attribute harus berupa angka.',
'password' => [
    'letters' => 'Bidang :attribute harus mengandung setidaknya satu huruf.',
    'mixed' => 'Bidang :attribute harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
    'numbers' => 'Bidang :attribute harus mengandung setidaknya satu angka.',
    'symbols' => 'Bidang :attribute harus mengandung setidaknya satu simbol.',
    'uncompromised' => ':attribute yang diberikan muncul dalam kebocoran data. Harap pilih :attribute lain.',
],
'present' => 'Bidang :attribute harus ada.',
'present_if' => 'Bidang :attribute harus ada ketika :other adalah :value.',
'present_unless' => 'Bidang :attribute harus ada kecuali :other adalah :value.',
'present_with' => 'Bidang :attribute harus ada ketika :values hadir.',
'present_with_all' => 'Bidang :attribute harus ada ketika :values hadir.',
'prohibited' => 'Bidang :attribute dilarang.',
'prohibited_if' => 'Bidang :attribute dilarang ketika :other adalah :value.',
'prohibited_unless' => 'Bidang :attribute dilarang kecuali :other ada di :values.',
'prohibits' => 'Bidang :attribute melarang :other untuk hadir.',
'regex' => 'Format bidang :attribute tidak valid.',
'required' => 'Bidang :attribute wajib diisi.',
'required_array_keys' => 'Bidang :attribute harus berisi entri untuk: :values.',
'required_if' => 'Bidang :attribute wajib diisi ketika :other adalah :value.',
'required_if_accepted' => 'Bidang :attribute wajib diisi ketika :other diterima.',
'required_unless' => 'Bidang :attribute wajib diisi kecuali :other ada di :values.',
'required_with' => 'Bidang :attribute wajib diisi ketika :values hadir.',
'required_with_all' => 'Bidang :attribute wajib diisi ketika :values hadir.',
'required_without' => 'Bidang :attribute wajib diisi ketika :values tidak hadir.',
'required_without_all' => 'Bidang :attribute wajib diisi ketika tidak ada satu pun dari :values yang hadir.',
'same' => 'Bidang :attribute dan :other harus cocok.',
'size' => [
    'array' => 'Bidang :attribute harus berisi :size item.',
    'file' => 'Bidang :attribute harus berukuran :size kilobita.',
    'numeric' => 'Bidang :attribute harus berukuran :size.',
    'string' => 'Bidang :attribute harus berukuran :size karakter.',
],
'starts_with' => 'Bidang :attribute harus diawali dengan salah satu dari: :values.',
'string' => 'Bidang :attribute harus berupa string.',
'timezone' => 'Bidang :attribute harus berupa zona waktu yang valid.',
'unique' => 'Bidang :attribute sudah ada sebelumnya.',
'uploaded' => 'Gagal mengunggah :attribute.',
'uppercase' => 'Bidang :attribute harus berupa huruf kapital.',
'url' => 'Bidang :attribute harus berupa URL yang valid.',
'ulid' => 'Bidang :attribute harus berupa ULID yang valid.',
'uuid' => 'Bidang :attribute harus berupa UUID yang valid.',

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
