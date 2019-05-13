<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator;

use Lalilalai\Spreadsheet\Spreadsheet\Row;
use Lalilalai\Spreadsheet\Validator\Result;
use Lalilalai\Spreadsheet\Validator\Validator;

abstract class RowValidator extends Validator
{
    public function __construct(Row $_row)
    {
        $this->validateable = $_row;
        parent::__construct();
    }

    protected function validate($validateable): Result
    {
        return $this->validateRow($this->validateable);
    }

    abstract protected function validateRow(Row $_row): Result;
}
