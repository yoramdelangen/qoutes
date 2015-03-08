# Qoutes
Get a qoute from iHeartqoutes.com through there API. This is wrapper for getting a qoute through the API of [iheartqoutes.com](http://iheartquotes.com/api).


## Installing through composer
The recommanded way to install `qoutes` is through composer:

    composer require yoramdelangen/qoutes
    
Or add it too the requirements

    "yoramdelangen/heartqoutes" : "dev-master"
    
For stable version
    
    "yoramdelangen/heartqoutes": "1.0.*"
    
## Usage
The following options are implemented and direct from the `iheartqoutes` API:

    max_lines: maximum number of lines in the quote.
    min_lines: minimum number of lines in the quote.
    max_characters: maximum number of characters in the quote.
    min_characters: minimum number of characters in the quote.

These options can be set through the `__construct(array $options=[])`:

    $options = [
        'max_lines' => 2,
        'max_characters' => 200
    ];
    $qoute = new Qoutes\Qoute($options);
    
Or chain it through functions:

    $qoute = new Qoutes\Qoute();
    $qoute->maxLines(2)->minCharacters(40)->maxCharacters(255);
    
Get certain category or tagged qoute:

    // get qoute from all sources
    $qoute->get();
    
    // get qoute from a source
    $qoute->geeky();
    $qoute->general();
    $qoute->populair();
    $qoute->religious();
    $qoute->scifi();
    
