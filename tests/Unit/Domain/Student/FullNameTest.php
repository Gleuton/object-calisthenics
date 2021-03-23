<?php

namespace Alura\Calisthenics\Tests\Unit\Domain\Student;

use Alura\Calisthenics\Domain\Student\FullName;
use PHPUnit\Framework\TestCase;

class FullNameTest extends TestCase
{
    private string $fullName;

    protected function setUp(): void
    {
        $this->fullName = (string) new FullName(
            'Gleuton',
            'Dutra'
        );
    }

    public function testFullNameMustReturnTheName(): void
    {
        self::assertEquals(
            'Gleuton Dutra', $this->fullName
        );
    }
}
