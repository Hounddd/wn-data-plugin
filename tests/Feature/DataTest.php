<?php

namespace Hounddd\Data\Tests\Feature;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Hounddd\Data\Tests\Classes\SimpleData;
use Spatie\LaravelData\Data;
use System\Tests\Bootstrap\PluginTestCase;
use Spatie\LaravelData\Attributes\MapInputName;

class DataTest extends PluginTestCase
{

    /** @test */
    public function it_can_create_a_data_object_from_a_stdClass_object()
    {
        $object = (object) [
            'string' => 'Winter',
            'boolean' => true,
            'date' => CarbonImmutable::create(2021, 03, 06, 12, 00, 00),
            'nullable_date' => null,
        ];

        $dataClass = new class () extends Data {
            public string $string;
            public bool $boolean;
            public CarbonImmutable $date;
            public ?Carbon $nullable_date;
        };

        $data = $dataClass::from($object);

        $this->assertEquals('Winter', $data->string);
        $this->assertTrue($data->boolean);
        $this->assertTrue(CarbonImmutable::create(2021, 03, 06, 12, 00, 00)->eq($data->date));
        $this->assertNull($data->nullable_date);
    }

    /** @test */
    public function it_can_cast_built_in_types_with_custom_casts()
    {
        $dataClass = new class ('', '') extends Data {
            public function __construct(
                public string $name,
                #[MapInputName('company_name')]
                public string $compagnyName,
            ) {
            }
        };

        $data = $dataClass::from([
            'name' => 'Winter CMS',
            'company_name' => 'The swon man compagny',
        ]);

        $this->assertEquals('Winter CMS', $data->name);
        $this->assertEquals('The swon man compagny', $data->compagnyName);
    }

    /** @test */
    public function it_can_append_data_via_method_overwrite()
    {
        $data = new class ('Winter') extends Data {
            public function __construct(public string $name)
            {
            }

            public function with(): array
            {
                return ['alt_name' => "{$this->name} aka WinterCMS"];
            }
        };

        $this->assertEquals([
            'name' => 'Winter',
            'alt_name' => 'Winter aka WinterCMS',
        ], $data->toArray());
    }

    /** @test */
    public function it_can_append_data_via_method_call()
    {
        $data = new class ('Winter') extends Data {
            public function __construct(public string $name)
            {
            }
        };

        $transformed = $data->additional([
            'company' => 'The snow man',
            'alt_name' => fn (Data $data) => "{$data->name} is best CMS",
        ])->toArray();

        $this->assertEquals([
            'name' => 'Winter',
            'company' => 'The snow man',
            'alt_name' => 'Winter is best CMS',
        ], $transformed);
    }


    /** @test */
    public function it_can_transform_to_json()
    {
        $this->assertEquals('{"string":"Hello"}', SimpleData::from('Hello')->toJson());
        $this->assertEquals('{"string":"Hello"}', json_encode(SimpleData::from('Hello')));
    }
}
