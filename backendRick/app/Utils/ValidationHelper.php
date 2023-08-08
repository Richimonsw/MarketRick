<?php

namespace App\Utils;

class ValidationHelper
{
    public static function customNameValidation()
    {
        return function ($attribute, $value, $fail) {
            if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
                return $fail('El campo ' . $attribute . ' solo puede contener letras y espacios.');
            }

            if (preg_match('/(.)\1{2}/', $value)) {
                return $fail('El campo ' . $attribute . ' no puede contener 3 letras consecutivas iguales.');
            }

            if (preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $value)) {
                return $fail('El campo ' . $attribute . ' no puede contener caracteres especiales.');
            }
        };
    }


    public static function customCedulaValidation()
    {
        return function ($attribute, $value, $fail) {
            // Validar formato numérico y longitud
            if (!preg_match('/^\d{10}$/', $value)) {
                return $fail('El campo ' . $attribute . ' debe ser un número de cédula válido.');
            }

            // Validar último dígito para personas naturales (0) y jurídicas (9)
            $ultimoDigito = substr($value, -1);

            if ($ultimoDigito !== '0' && $ultimoDigito !== '9') {
                return $fail('El último dígito del campo ' . $attribute . ' no es válido.');
            }

            // Validar dígito verificador
            $cedulaBase = substr($value, 0, 9);
            $digitoVerificador = substr($value, 9, 1);

            $coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];
            $suma = 0;

            for ($i = 0; $i < 9; $i++) {
                $producto = $cedulaBase[$i] * $coeficientes[$i];
                $suma += ($producto >= 10) ? ($producto - 9) : $producto;
            }

            $digitoCalculado = ($suma % 10 === 0) ? 0 : 10 - ($suma % 10);

            if ($digitoCalculado != $digitoVerificador) {
                return $fail('El campo ' . $attribute . ' no es una cédula válida.');
            }
        };
    }

    public static function customPhoneNumberValidation()
    {
        return function ($attribute, $value, $fail) {
            // Validar formato numérico y longitud
            if (!preg_match('/^\d{10}$/', $value)) {
                return $fail('El campo ' . $attribute . ' debe ser un número de celular válido en Ecuador.');
            }

            // Validar que empiece con el prefijo de operadoras en Ecuador
            $operadoras = ['098', '099', '096', '097', '095'];
            $prefijo = substr($value, 0, 3);

            if (!in_array($prefijo, $operadoras)) {
                return $fail('El campo ' . $attribute . ' no tiene un prefijo de operadora válido en Ecuador.');
            }
        };
    }

    public static function customDateOfBirthValidation()
    {
        return function ($attribute, $value, $fail) {
            $date = \DateTime::createFromFormat('d-m-Y', $value);

            if (!$date || $date->format('d-m-Y') !== $value) {
                return $fail('El campo ' . $attribute . ' debe ser una fecha válida en el formato DD-MM-YYYY.');
            }

            // Validar que el usuario tenga entre 10 y 90 años
            $today = new \DateTime();
            $diff = $today->diff($date);

            if ($diff->y < 10 || $diff->y > 90) {
                return $fail('La edad debe estar en el rango de 10 a 90 años.');
            }
        };
    }

    public static function customEmailValidation()
    {
        return function ($attribute, $value, $fail) {
            // Validar formato de email
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                return $fail('El campo ' . $attribute . ' no es una dirección de correo electrónico válida.');
            }

            // Limitar longitud del email
            if (strlen($value) > 255) {
                return $fail('El campo ' . $attribute . ' no puede exceder los 255 caracteres.');
            }

            // Validar que no contenga caracteres especiales inválidos
            if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $value)) {
                return $fail('El campo ' . $attribute . ' contiene caracteres no permitidos.');
            }

            // Validar que no empiece ni termine con punto
            if (strpos($value, '.') === 0 || strrpos($value, '.') === (strlen($value) - 1)) {
                return $fail('El campo ' . $attribute . ' no puede empezar ni terminar con punto.');
            }
        };
    }

    public static function customWebsiteValidation()
    {
        return function ($attribute, $value, $fail) {
            // Validar formato de URL
            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                return $fail('El campo ' . $attribute . ' no es una URL válida.');
            }

            // Limitar longitud de URL
            if (strlen($value) > 255) {
                return $fail('El campo ' . $attribute . ' no puede exceder los 255 caracteres.');
            }

            // Validar que la URL tenga un protocolo válido (http, https, ftp, ftps)
            $validProtocols = ['http', 'https', 'ftp', 'ftps'];
            $parsedUrl = parse_url($value);

            if (!isset($parsedUrl['scheme']) || !in_array($parsedUrl['scheme'], $validProtocols)) {
                return $fail('El campo ' . $attribute . ' debe tener un protocolo válido (http, https, ftp, ftps).');
            }
        };
    }
}
