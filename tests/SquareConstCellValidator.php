<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Cell;
use Lalilalai\Spreadsheet\Validator\CellValidator;
use Lalilalai\Spreadsheet\Validator\Result;

class SquareConstCellValidator extends CellValidator
{
    private $constValue = '';

    public function __construct(Cell $_cell, string $_constValue)
    {
        $this->constValue = $_constValue;
        parent::__construct($_cell);
    }

    protected function validateCell(Cell $_cell): Result
    {
        $this->isValid = $_cell->value() == $this->constValue;

        if ($this->isValid) {
            return new Result(true);
        } else {
            return new Result(false, "Cell {$_cell->columnName()}:{$_cell->rowNumber()} => must be {$this->constValue}");
        }
    }
}
