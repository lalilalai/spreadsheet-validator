<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Row;
use Lalilalai\Spreadsheet\Validator\Result;
use Lalilalai\Spreadsheet\Validator\RowValidator;
use Lalilalai\Spreadsheet\Validator\Tests\SquareConstCellValidator;

class SquareHeadRowValidator extends RowValidator
{
    protected function validateRow(Row $_row): Result
    {
        $cellXValidator = new SquareConstCellValidator($_row->cell('A'), 'x');
        $cellXXValidator = new SquareConstCellValidator($_row->cell('B'), 'x*x');

        $results = new Result();

        $results->add($cellXValidator->result());
        $results->add($cellXXValidator->result());

        return $results;
    }
}
