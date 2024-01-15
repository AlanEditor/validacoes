<?php

declare(strict_types=1);

namespace App\Http\Validators;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DateValidation
{

    /**
     *
     * @var monthsInEnglish
     */
    private array $monthsInEnglish = [
        'janeiro' => 'January',
        'fevereiro' => 'February',
        'março' => 'March',
        'abril' => 'April',
        'maio' => 'May',
        'junho' => 'June',
        'julho' => 'July',
        'agosto' => 'August',
        'setembro' => 'September',
        'outubro' => 'October',
        'novembro' => 'November',
        'dezembro' => 'December',
    ];

    /**
     *
     * @var abreviatedMonth
     */
    private array $abreviatedMonth = [
        'jan' => 'January',
        'fev' => 'February',
        'mar' => 'March',
        'abr' => 'April',
        'mai' => 'May',
        'jun' => 'June',
        'jul' => 'July',
        'ago' => 'August',
        'set' => 'September',
        'out' => 'October',
        'nov' => 'November',
        'dez' => 'December',
    ];

    /**
     *
     * @var monthsNumber
     */
    private array $monthsNumber = [
        'January' => '01',
        'February' => '02',
        'March' => '03',
        'April' => '04',
        'May' => '05',
        'June' => '06',
        'July' => '07',
        'August' => '08',
        'September' => '09',
        'October' => '10',
        'November' => '11',
        'December' => '12',
    ];

    /**
     * Verify if data is valid
     *
     * @param string $data
     * @return bool
     * @throws \Exception
     */
    public function verifyIfDataIsValid(string $data): bool
    {
        if (strpos($data, '-') !== false) {
            $data = str_replace('-', '/', $data);
        }

        $explodeData = explode('/', $data);

        if (count($explodeData) === 1) {
            return $this->verifyIfCompleteDateWrittenIsValid($data);
        }

        if (count($explodeData) === 2) {
            return false;
        }

        $day = (int) $explodeData[0];
        $month = (int) $explodeData[1];
        $year = (int) $explodeData[2];
    
        if (!checkdate($month, $day, $year)) {
            return false;
        }

        $countYearDigits = strlen(strval($year));
       
        $format = ($countYearDigits === 2) ? 'd/m/y' : 'd/m/Y';

        $newDate = Carbon::createFromFormat($format, $data);

        return $newDate ? true : false;
    }

    /**
     * Verify if complete date written is valid
     *
     * @param string $data
     * @return boolean
     */
    private function verifyIfCompleteDateWrittenIsValid(string $data): bool
    {
        $explodeData = explode(' ', $data);

        if (count($explodeData) !== 5) {
            return false;
        }

        $day = $explodeData[0];

        $month = $this->monthsInEnglish[strtolower($explodeData[2])];
        $monthNumber = $this->monthsNumber[$month];

        $year = $explodeData[4];

        $completeDate = "{$day}/{$monthNumber}/{$year}";

        $date = Carbon::createFromFormat('d/m/Y', $completeDate);

        return $date ? true : false;
    }

}
