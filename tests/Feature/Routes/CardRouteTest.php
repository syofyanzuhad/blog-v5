<?php

use function Pest\Laravel\get;

it('renders the digital card page and contains the embedded iframe', function () {
    get(route('card'))
        ->assertOk()
        ->assertSee('title', 'Syofyan Zuhad 🇵🇸 Digital Card')
        ->assertSee('https://card.laravel.cloud/@syofyanzuhad/embed', escape: false)
        ->assertSee('allowtransparency="true"', escape: false)
        ->assertSee('Syofyan Zuhad 🇵🇸 (Software Engineer)', escape: false);
});
