<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validator\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Loader;
use Lalilalai\Spreadsheet\Spreadsheet\Table;
use Lalilalai\Spreadsheet\Validator\Tests\SquareTableValidator;
use Lalilalai\Spreadsheet\Validator\Validator;

/**
 * @covers Lalilalai\Spreadsheet\Validator\Validator
 * @covers Lalilalai\Spreadsheet\Validator\TableValidator
 * @covers Lalilalai\Spreadsheet\Validator\RowValidator
 * @covers Lalilalai\Spreadsheet\Validator\CellValidator
 * @covers Lalilalai\Spreadsheet\Validator\Result
 */
class SpreadsheetValidatorTest extends \PHPUnit\Framework\TestCase
{
    private $validator = null;

    public function setUp(): void
    {
        $loader = new Loader('tests/files/test.csv');
        $this->validator = new SquareTableValidator($loader->table());
    }

    public function testValidCsv()
    {
        $result = $this->validator->result();
        $this->assertEquals(0, count($result->errors()));
    }

    public function testInvalidCsv()
    {
        $loader = new Loader('tests/files/testWrong.csv');
        $this->validator = new SquareTableValidator($loader->table());

        $result = $this->validator->result();
        $this->assertEquals(1, count($result->errors()));

        $this->assertEquals('Row 4 => 4 * 4 != 17', $result->errors()[0]);
    }
}
