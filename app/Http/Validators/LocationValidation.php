<?php

declare(strict_types=1);

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;


class LocationValidation
{

    /**
     * Validate CEP
     *
     * @param string $cep
     * @return boolean
     */
    public function validateCep(string $cep): bool
    {
        $cep = preg_replace("/[^0-9]/", "", $cep);

        if (strlen($cep) !== 8 || !preg_match('/^[0-9]{8}$/', $cep)) {
            return false;
        }
        return true;
    }
}
