<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Table;
use Lalilalai\Spreadsheet\Validator\Result;
use Lalilalai\Spreadsheet\Validator\TableValidator;
use Lalilalai\Spreadsheet\Validator\Tests\SquareDataRowValidator;
use Lalilalai\Spreadsheet\Validator\Tests\SquareHeadRowValidator;

class SquareTableValidator extends TableValidator
{
    protected function validateTable(Table $_table): Result
    {
        $result = new Result();

        $headRowValidator = new SquareHeadRowValidator($_table->row(0));
        $result->add($headRowValidator->result());

        for ($i = 1; $i < $_table->count(); $i++) {
            $dataRowValidator = new SquareDataRowValidator($_table->row($i));
            $result->add($dataRowValidator->result());
        }

        return $result;
    }
}
