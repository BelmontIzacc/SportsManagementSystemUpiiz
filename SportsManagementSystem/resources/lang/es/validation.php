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

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'El campo :attribute sólo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
    'alpha_num'            => 'El campo :attribute sólo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array.',
    'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmación de :attribute no coincide.',
    'country'              => 'El campo :attribute no es un país válido.',
    'date'                 => 'El campo :attribute no corresponde con una fecha válida.',
    'date_format'          => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other han de ser diferentes.',
    'digits'               => 'El campo :attribute debe ser un número de :digits dígitos.',
    'digits_between'       => 'El campo :attribute debe contener entre :min y :max dígitos.',
    'dimensions'           => 'El campo :attribute tiene dimensiones invalidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El campo :attribute no corresponde con una dirección de e-mail válida.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'exists'               => 'El campo :attribute no existe.',
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute debe ser igual a alguno de estos valores :values',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe ser una dirección IP válida.',
    'json'                 => 'El campo :attribute debe ser una cadena de texto JSON válida.',
    'max'                  => [
        'numeric' => 'El campo :attribute debe ser :max como máximo.',
        'file'    => 'El archivo :attribute debe pesar :max kilobytes como máximo.',
        'string'  => 'El campo :attribute debe contener :max caracteres como máximo.',
        'array'   => 'El campo :attribute debe contener :max elementos como máximo.',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo :values.',
    'mimetypes'            => 'El campo :attribute debe ser un archivo de tipo :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe tener al menos :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe contener al menos :min caracteres.',
        'array'   => 'El campo :attribute no debe contener más de :min elementos.',
    ],
    'not_in'               => 'El campo :attribute seleccionado es invalido.',
    'numeric'              => 'El campo :attribute debe ser un numero.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio',
    'required_if'          => 'El campo :attribute es obligatorio cuando el campo :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ningún campo :values están presentes.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],
    'state'                => 'El estado no es válido para el país seleccionado.',
    'string'               => 'El campo :attribute debe contener solo caracteres.',
    'timezone'             => 'El campo :attribute debe contener una zona válida.',
    'unique'               => 'El elemento :attribute ya está en uso.',
    'uploaded'             => 'El elemento :attribute fallo al subir.',
    'url'                  => 'El formato de :attribute no corresponde con el de una URL válida.',

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
        'edad' => [
            'integer' => 'El campo :attribute solo debe tener numeros enteros.',
            'between' => 'Debes ingresar una :attribute válida.',
        ],
        'boleta' => [
            'between' => 'La :attribute no es válida.',
            'unique' => 'La :attribute ya existe.',
            'integer' => 'La :attribute solo debe tener números.',
        ],
        'grupo' => [
            'max' => 'El campo :attribute debe contener como máximo 4 carácteres.',
        ],
        'semestre' => [
            'integer' => 'El campo :attribute solo debe tener numero(s) entero(s).',
        ],
        'promActual' => [
            'required' => 'El campo :attribute es obligatorio. En la parte 1.',
            'numeric' => 'El campo :attribute debe contener solo números enteros o decimales. En la parte 1.',
            'between' => 'En el campo :attribute no existe ese valor. En la parte 1.',
        ],
        'beca' => [
            'required' => 'Debes seleccionar una opcion de :attribute a solicitar. En la parte 1.',
        ],
        'lic' => [
            'required' => 'Falta elegir una opcion en :attribute terminada. En la parte 1.',
        ],
        'licenciatura' => [
            'required_if' => 'Falta escribir la :attribute terminada. En la parte 1.',
        ],
        'becaA' => [
            'required' => 'Debes seleccionar una opcion de :attribute. En la parte 1.',
        ],
        'actualBeca' => [
            'required_if' => 'Debes seleccionar una opcion del campo :attribute si ya cuentas con una. En la parte 1.',
        ],
        'historiaAC' => [
            'required' => 'Debes elegir una opcion en :attribute. En la parte 1.',
            'between' => 'Debes elegir una de las dos opciones en :attribute. En la parte 1.',
        ],
        'estado' => [
            'required' => 'Debes seleccionar la opcion :attribute de donde vienes. En la parte 2.',
        ],
        'municipio' => [
            'required' => 'Debes seleccionar la opcion :attribute de donde vienes. En la parte 2.',
        ],
        'habitantes' => [
            'required' => 'El campo de cuantas personas viven en tu casa esta vacío. En la parte 2.',
            'integer' => 'El campo de cuantas personas viven en tu casa debe tener solo números enteros. En la parte 2.',
        ],
        'habitaciones' => [
            'required' => 'El campo de cuantas :attribute hay en tu casa esta vacío. En la parte 2.',
            'integer' => 'El campo de cuantas :attribute hay en tu casa debe tener solo números enteros. En la parte 2.',
        ],
        'tCasa' => [
            'required' => 'Debes seleccionar una opcion de :attribute donde habita tu familia. En la parte 2.',
        ],
        'residencia' => [
            'required' => 'Debes seleccionar una opcion en la :attribute mientras estudias. En la parte 2.',
            'between' => 'Te falta seleccionar una opcion en el campo :attribute mientras estudias. En la parte 2.',
        ],
        'pagoMensual' => [
            'required_if' => 'Falta llenar el campo de :attribute, porque la residencia es rentada. En la parte 2.',
        ],
        'calle' => [
            'required' => 'Te falta llenar el campo :attribute. En la parte 2.',
            'max' => 'El campo :attribute no acepta más de 50 dígitos. En la parte 2.',
        ],
        'colonia' => [
            'required' => 'Te falta llenar el campo :attribute. En la parte 2.',
            'max' => 'El campo :attribute no acepta más de 50 dígitos. En la parte 2.',
        ],
        'codigoPostal' => [
            'required' => 'Te falta llenar el campo :attribute. En la parte 2.',
            'max' => 'El campo :attribute no acepta más de 8 dígitos. En la parte 2.',
        ],
        'numInterior' => [
            'max' => 'El campo :attribute no acepta más de 8 dígitos. En la parte 2.',
        ],
        'numExterior' => [
            'required' => 'Debes llenar el campo :attribute. En la parte 2.',
            'max' => 'El campo :attribute no acepta más de 8 dígitos. En la parte 2.',
        ],
        'tiempo' => [
            'required' => 'Debes seleccionar una opcion en :attribute en llegar. En la parte 2.',
            'between' => 'Falta seleccionar una opcion válida en :attribute en llegar. En la parte 2.',
        ],
        'transporte' => [
            'required' => 'Debes seleccionar una opcion en medio de :attribute. En la parte 2.',
        ],
        'viajeMensual' => [
            'required_unless' => 'Falta llenar el campo de veces :attribute por ser foráneo. En la parte 2.',
            'integer' => 'El campo veces :attribute debe llenarse con sólo números enteros. En la parte 2.',
        ],
        'transporte2' => [
            'required_unless' => 'Debes seleccionar una opcion de medio de :attribute por ser foráneo. En la parte 2.',
        ],
        'gastoMensual2' => [
            'required_unless' => 'Falta llenar el campo :attribute por ser foráneo. En la parte 2.',
            'integer' => 'El campo veces :attribute debe llenarse con sólo números enteros. En la parte 2.',
        ],
        'ingresoMensual' => [
            'required' => 'Te falta llenar el campo :attribute. En la parte 3.',
            'max' => 'El campo :attribute no acepta más de 30 dígitos. En la parte 3.',
        ],
        'gastoMensual' => [
            'required' => 'Te falta llenar el campo :attribute. En la parte 3.',
            'max' => 'El campo :attribute no acepta más de 30 dígitos. En la parte 3.',
        ],
        'noIntegrantes' => [
            'required' => 'Te falta llenar el campo :attribute en tu familia. En la parte 3.',
            'integer' => 'En :attribute en tu familia debe llenarse sólo con números enteros. En la parte 3.',
            'max' => 'El campo :attribute no acepta más de 11 dígitos. En la parte 3.',
        ],
        'apoyo' => [
            'required' => 'Te falta llenar el campo :attribute en tu familia. En la parte 3.',
            'integer' => 'En :attribute en tu familia debe llenarse sólo con números enteros. En la parte 3.',
            'max' => 'El campo :attribute no acepta más de 11 dígitos. En la parte 3.',
        ],
        'trabajo' => [
            'required' => 'Falta seleccionar una opcion en si :attribute. En la parte 3.',
        ],
        'dependencia' => [
            'required' => 'Falta elegir una opcion en si dependes de tus padres. En la parte 3.',
            'between' => 'Debes elegir solo una de las opciones que te dan en :attribute de tus padres. En la parte 3.',
        ],
        'telCasa' => [
            'required' => 'El campo :attribute está vacío. En la parte 4.',
        ],
        'telCelular' => [
            'required' => 'El campo :attribute está vacío. En la parte 4.',
        ],
        'nomTutor' => [
            'required' => 'El campo :attribute está vacío. En la parte 4.',
        ],
        'telTutor' => [
            'required' => 'El campo :attribute está vacío. En la parte 4.',
        ],
        'enfe' => [
            'required' => 'No se a seleccionado la opcion de :attribute. En la parte 4.',
        ],
        'enfermedades' => [
            'required_if' => 'Falta llenar el campo de cuales :attribute. En la parte 4.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'promActual' => 'promedio actual',
        'lic' => 'licenciatura',
        'becaA' => 'beca actual',
        'historiaAC' => 'historia académica',
        'tCasa' => 'tipo de casa',
        'pagoMensual' => 'pago mensual',
        'codigoPostal' => 'código postal',
        'numInterior' => 'número de interior',
        'numExterior' => 'número de exterior',
        'transporte2' => 'transporte',
        'gastoMensual2' => 'gasto mensual',
        'ingresoMensual' => 'ingreso mensual',
        'gastoMensual' => 'gasto mensual',
        'noIntegrantes' => 'número de integrantes',
        'telCasa' => 'teléfono de casa',
        'telCelular' => 'teléfono celular',
        'nomTutor' => 'nombre del tutor',
        'telTutor' => 'teléfono del tutor',
        'enfe' => 'enfermedades'
    ],

];
