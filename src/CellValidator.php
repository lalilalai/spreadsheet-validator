<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator;

use Lalilalai\Spreadsheet\Spreadsheet\Cell;
use Lalilalai\Spreadsheet\Validator\Result;
use Lalilalai\Spreadsheet\Validator\Validator;

abstract class CellValidator extends Validator
{
    public function __construct(Cell $_cell)
    {
        $this->validateable = $_cell;
        parent::__construct();
    }

    protected function validate($validateable): Result
    {
        return $this->validateCell($this->validateable);
    }

    abstract protected function validateCell(Cell $_cell): Result;
}
