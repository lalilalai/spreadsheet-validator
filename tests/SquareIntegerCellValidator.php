<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Cell;
use Lalilalai\Spreadsheet\Validator\CellValidator;
use Lalilalai\Spreadsheet\Validator\Result;

class SquareIntegerCellValidator extends CellValidator
{
    protected function validateCell(Cell $_cell): Result
    {
        if (is_float($_cell->value()) || is_int($_cell->value())) {
            return new Result(true);
        } elseif ($this->match($_cell->value(), '%^[0-9]+$%u')) {
            return new Result(true);
        } else {
            return new Result(false, "Cell {$cell->columnName()}:{$cell->rowNumber()} => not integer");
        }
    }
}
