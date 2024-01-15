<?php

declare(strict_types=1);

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;

class DocumentValidation
{

    /**
     * Validate RG
     *
     * @param string $rg
     * @return boolean
     */
    public function validateRg(string $rg): bool
    {
        $rg = preg_replace("/[^0-9A-Za-z]/", "", $rg);

        if (strlen($rg) < 6 || strlen($rg) > 9) {
            return false;
        }

        return true;
    }
}
