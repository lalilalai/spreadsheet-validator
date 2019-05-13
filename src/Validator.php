<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator;

use Lalilalai\Spreadsheet\Validator\Result;

abstract class Validator
{
    private $result = null;
    private $validateable = null;

    public function __construct()
    {
        $this->result = $this->validate($this->validateable);
    }

    public function result(): Result
    {
        return $this->result;
    }

    abstract protected function validate($_validateable): Result;
}
