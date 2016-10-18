<?php

namespace Mateusjatenee\GoogleVision\Tests\Traits;

trait StubTrait
{
    protected function getApiResponseStub()
    {
        return [
            'responses' => [
                [
                    'textAnnotations' => [
                        [
                            'locale' => 'en',
                            'description' => "D. CRILLEY\n",
                            'boundingPoly' => [
                                'vertices' => [
                                    [
                                        'x' => 25,
                                        'y' => 54,
                                    ],
                                    [
                                        'x' => 384,
                                        'y' => 54,
                                    ],
                                    [
                                        'x' => 384,
                                        'y' => 147,
                                    ],
                                    [
                                        'x' => 25,
                                        'y' => 147,
                                    ],
                                ],
                            ],
                        ],
                        [
                            'description' => 'D.',
                            'boundingPoly' => [
                                'vertices' => [
                                    [
                                        'x' => 27,
                                        'y' => 54,
                                    ],
                                    [
                                        'x' => 89,
                                        'y' => 55,
                                    ],
                                    [
                                        'x' => 87,
                                        'y' => 140,
                                    ],
                                    [
                                        'x' => 25,
                                        'y' => 139,
                                    ],
                                ],
                            ],
                        ],
                        [
                            'description' => 'CRILLEY',
                            'boundingPoly' => [
                                'vertices' => [
                                    [
                                        'x' => 113,
                                        'y' => 56,
                                    ],
                                    [
                                        'x' => 384,
                                        'y' => 62,
                                    ],
                                    [
                                        'x' => 382,
                                        'y' => 147,
                                    ],
                                    [
                                        'x' => 111,
                                        'y' => 141,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

    }
}
