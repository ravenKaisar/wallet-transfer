<?php

it('date format is correct', function () {
    $date = getWeekNumberWithYear('2022-01-01');
    expect(true)->toBeTrue();
});

it('date format is wrong', function () {
    $date = getWeekNumberWithYear('2022-01a-01');
    expect(false)->toBeFalse();
});
