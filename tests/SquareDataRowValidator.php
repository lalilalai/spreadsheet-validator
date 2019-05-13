<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Row;
use Lalilalai\Spreadsheet\Validator\Result;
use Lalilalai\Spreadsheet\Validator\RowValidator;
use Lalilalai\Spreadsheet\Validator\Tests\SquareIntegerCellValidator;

class SquareDataRowValidator extends RowValidator
{
    protected function validateRow(Row $_row): Result
    {
        $cellXValidator = new SquareIntegerCellValidator($_row->cell('A'));
        $cellXXValidator = new SquareIntegerCellValidator($_row->cell('B'));

        $results = new Result();

        $results->add($cellXValidator->result());
        $results->add($cellXXValidator->result());

        $a = intval($_row->cell('A')->value());
        $b = intval($_row->cell('B')->value());

        if ($a * $a == $b) {
            $results->add(new Result(true));
        } else {
            $results->add(new Result(false, "Row {$_row->rowNumber()} => {$a} * {$a} != {$b}"));
        }

        return $results;
    }
}
