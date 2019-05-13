<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator;

use Lalilalai\Spreadsheet\Spreadsheet\Table;
use Lalilalai\Spreadsheet\Validator\Result;
use Lalilalai\Spreadsheet\Validator\Validator;

abstract class TableValidator extends Validator
{
    public function __construct(Table $_table)
    {
        $this->validateable = $_table;
        parent::__construct();
    }

    protected function validate($validateable): Result
    {
        return $this->validateTable($this->validateable);
    }

    abstract protected function validateTable(Table $_table): Result;
}
